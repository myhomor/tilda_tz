$(document).ready(function() {
    $('.js-phone').inputmask('+7 (999)-999-99-99');

    $('.js-select-city').on('change',function (){
        var _this = $(this);
        console.log(_this.val());
        $.ajax({
            url: $(location).attr('href'),
            method: "POST",
            data: {'city':_this.val()},
            dataType: "json",
            beforeSend: function () {
                $.notify({message: 'Меняем телефон'}, {type: 'info'});
            }
        }).done( function (res) {
            if(res.hasOwnProperty('phone') && res.hasOwnProperty('phone_tel'))
                $(document).find('.js-phone')
                    .attr('href','tel:'+res.phone_tel)
                    .val(res.phone);
        });
    });
});