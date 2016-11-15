(function ($) {
    var weebroot = $('#webroot').attr('data-value');
    var rlfd = {
        options    :   {
        },
        init: function () {
            this.meal_info();
        },
        meal_info: function () {
            $('.btnViewMeal').on('click', function(){

                var modal = $('#modal-order');

                $.get(weebroot+'menus/view/api/' + $('._item', this).attr('data-menu-id'), {}, function(data){
                    data = $.parseJSON(data);
                    modal.find('#modalLabel').text(data.Menu.title);
                    modal.find('#img').attr('src', data.Menu.image);
                    modal.find('._includes > li > p').text(data.Menu.description);
                    modal.find('#_price').text(data.Menu.price);
                });

                $.get(weebroot+'add_ons/view/api/'+$('._meal', this).attr('data-meal'),{},function(data){
                    data = $.parseJSON(data);
                    var temp = '';
                    temp += '<option value="">Choose add-on</option>';
                    $.each(data, function(){
                        temp += "<option value='" + this.AddOn.id + "'>" + this.AddOn.title + "</option>";
                    });
                    $('#add-on').empty().append(temp);
                });

            });
        }
    }

    rlfd.init();
})(jQuery);