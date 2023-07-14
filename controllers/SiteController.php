<?php
namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

class SiteController extends Controller
{
    use \app\tools\MaxMindDB, \app\tools\SitePhone;
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->redirect('/task/?id=1');
    }
    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionLogin()
    {
        if( !is_null(Yii::$app->user->identity) )
            return $this->redirect(['admin/']);

        $params =['model' => new \app\models\forms\LoginForm];
        if ($params['model']->load(Yii::$app->request->post()) && $params['model']->login()) {
            return $this->redirect(['admin/']);
        }
        return $this->render('login', $params);
    }

    public function actionTask($id)
    {
        \Yii::$app->init->active_menu_code = 't'.$id;
        if( in_array($id,[1,2]) )
            return $this->render('task'.$id, []);

        if( Yii::$app->request->isAjax )
        {
            $post = Yii::$app->request->post();
            $city = $post['city'];
            $this->setUserCity($city);
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return $this->asJson([
                'phone' => $this->getSitePhoneByCity($city),
                'phone_tel' => $this->clearPhone( $this->getSitePhoneByCity($city) )
            ]);
        }

        $city = $this->getUserCity();
        return $this->render('task3', [
            'city' =>  \yii\helpers\ArrayHelper::map(
                \app\modules\admin\models\CityModel::find()->select(['code','title'],)->asArray()->all(),
                'code', 'title'
            ),
            'user_city' => $city,
            'user_phone' => $this->clearPhone( $this->getSitePhoneByCity($city) )
        ]);
    }
}
