<?php
namespace app\modules\admin\controllers;

use Yii,
    yii\data\Pagination,
    yii\helpers;
abstract class Common extends \yii\web\Controller
{
    const LIMIT_ON_PAGE = 10;
    protected array $message = [
        'add' => 'Добавить',
        'delete' => 'Удалить',
        'back' => 'Назад',
        'title_list' => 'Список элементов',
        'title_add' => 'Добавить элемент',
        'title_detail' => 'Редактировать элемент',
    ];

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    protected function _myBeforeAction($action){}
    public function beforeAction($action)
    {
        if( is_null(Yii::$app->user->identity) )
            $this->redirect(['/login/']);

        $this->_myBeforeAction($action);
        return parent::beforeAction($action);
    }

    protected \yii\db\ActiveRecord $model;
    protected \yii\base\Model $form;
    public function actionIndex()
    {
        return $this->redirect(['/'.$this->module->id.'/'.$this->id.'/list/']);
    }

    public function actionList()
    {
        Yii::$app->view->title = $this->message['title_list'];
        $query = $this->model::find()->orderBy(['id' => SORT_DESC]);
        $countQuery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
            'defaultPageSize' => self::LIMIT_ON_PAGE,
            'page' => ( !is_null(Yii::$app->request->get('page')) ? (int) Yii::$app->request->get('page')-1 : 0 )
        ]);

        $arItems = helpers\ArrayHelper::index(
            $query->offset($pages->offset)->limit($pages->limit)->all(),
            'id'
        );

        return $this->render(
            '..'.DIRECTORY_SEPARATOR.'default'.DIRECTORY_SEPARATOR.'page',
            [
                'type' => 'table',
                'header' => [
                    'title' => Yii::$app->view->title,
                    'btn' => [
                        [
                            'icon' => 'bi-plus-circle',
                            'title' => $this->message['add'],
                            'link' => helpers\Url::to( ['/'.$this->module->id.'/'.$this->id.'/add/' ] ),
                            'class' => 'btn-success'
                        ]
                    ],
                ],
                'data' => [
                    'head' => $this->model::getHeadTable(),
                    'items' => $arItems,
                    'link' => '/'.$this->module->id.'/'.$this->id.'/detail/',
                    'link_delete' => '/'.$this->module->id.'/'.$this->id.'/delete/',
                ],
                'pages' => $pages,
            ]
        );
    }

    public function actionAdd()
    {
        Yii::$app->view->title = $this->message['title_add'];

        $data = ['model' => $this->form];

        if ($data['model']->load(Yii::$app->request->post()) && $id = $data['model']->create())
            return $this->redirect(
                helpers\Url::to( ['/'.$this->module->id.'/'.$this->id.'/detail/', 'id' => $id ] )
            );

        $data['fields'] = $data['model']::getFormFields();
        return $this->render(
            '..'.DIRECTORY_SEPARATOR.'default'.DIRECTORY_SEPARATOR.'page_tabs',
            [
                'tab_code_active' => 'detail',
                'header' => [
                    'title' => Yii::$app->view->title,
                    'btn' => [
                        [
                            'icon' => 'bi-reply-fill',
                            'title' => $this->message['back'],
                            'link' => helpers\Url::to( ['/'.$this->module->id.'/'.$this->id.'/list/' ] ),
                            'class' => 'btn-secondary'
                        ]
                    ],
                ],
                'tabs' => [
                    'detail' => [
                        'title' => 'Элемент',
                        'link' => '',
                        'type' => 'form',
                        'data' => $data
                    ],

                ]
            ]
        );
    }

    public function actionDetail($id)
    {
        if( ($element = $this->model::find()->where(['id' => $id])->one() ) === NULL )
            throw new \yii\web\HttpException( 404, 'Элемент не найден' );

        Yii::$app->view->title = $this->message['title_detail'];
        $data = ['model' => $this->form, 'value' => $element->attributes];

        if ($data['model']->load(Yii::$app->request->post()) && $data['model']->update( $element ))
            return $this->redirect(
                helpers\Url::to( ['/'.$this->module->id.'/'.$this->id.'/detail/', 'id' => $id ] )
            );

        $data['fields'] = $data['model']::getFormFields();
        return $this->render(
            '..'.DIRECTORY_SEPARATOR.'default'.DIRECTORY_SEPARATOR.'page_tabs',
            [
                'tab_code_active' => 'detail',
                'header' => [
                    'title' => Yii::$app->view->title,
                    'btn' => [
                        [
                            'icon' => 'bi-reply-fill',
                            'title' => $this->message['back'],
                            'link' => helpers\Url::to( ['/'.$this->module->id.'/'.$this->id.'/list/' ] ),
                            'class' => 'btn-secondary'
                        ]
                    ],
                ],
                'tabs' => [
                    'detail' => [
                        'title' => 'Элемент',
                        'link' => '',
                        'type' => 'form',
                        'data' => $data
                    ],

                ]
            ]
        );
    }

    public function actionDelete($id)
    {
        if( ($element = $this->model::find()->where(['id' => $id])->one() ) === NULL )
            throw new \yii\web\HttpException( 404, 'Элемент не найден' );

        if( $element->delete() )
            return $this->redirect(
                helpers\Url::to( ['/'.$this->module->id.'/'.$this->id.'/list/' ] )
            );
        else throw new \yii\web\HttpException( 404, 'Элемент не найден' );
    }
}