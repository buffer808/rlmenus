(function ($) {
    var weebroot = $('#webroot').attr('data-value');
    var rlfd = {
        options    :   {
        },
        init: function () {
            this.veiw_meal();
        },
        meal_modal_temp :    function($data){

        },
        veiw_meal: function () {
            $('.btnViewMeal').on('click', function(){
                $.get(weebroot+'menus/view/api/' + $('._item', this).attr('data-menu-id'), {}, function(data){
                    var modal = $('#modal-order');
                    data = $.parseJSON(data);
                    modal.find('#modalLabel').text(data.Menu.title);
                    modal.find('#img').attr('src', data.Menu.image);
                    modal.find('._includs > li > p').text(data.Menu.description);
                    modal.find('#_price').text(data.Menu.price);

                });

            });
        }
    }

    rlfd.init();
})(jQuery);