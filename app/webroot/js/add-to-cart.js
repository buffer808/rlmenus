(function ($) {
    var weebroot = $('#webroot').attr('data-value');
    var user_id = $('#user_id').attr('data-value');
    var rlfd = {
        options: {},
        init: function () {
            this.meal_info();
            this.add_order();
            this.addon_order();
            this.edit_addon();
            this.update_addon();
            this.remove_order();
            this.submit_order();
        },
        remove_preloader: function (modal) {
            return modal.find('.modal-content .overlay').remove();
        },
        load_preloader: function (modal) {
            return modal.append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
        },
        meal_info: function () {
            $('a[href="#modal-cart"]').on('click', function (e) {
                e.preventDefault();

                var modal = $('#modal-cart');
                var meal = $(this).attr('data-meal');

                rlfd.load_preloader(modal.find('.modal-content'));

                $.get(weebroot + 'menus/view/api/' + $(this).attr('data-menu-id'), {}, function (data) {
                    data = $.parseJSON(data);
                    modal.find('#_title').text(data.Menu.title);

                    if (data.Menu.image) modal.find('#_image').attr('src', data.Menu.image);

                    modal.find('#_description').text(data.Menu.description);
                    modal.find('#_price').text(data.Menu.price);
                    modal.find('a').attr('data-id', data.Menu.id);
                    modal.find('a').attr('data-meal', meal);
                }).done(rlfd.remove_preloader($('#modal-cart')));

            });
        },
        add_order: function () {
            $('#modal-cart a#add-order').on('click', function (e) {
                e.preventDefault();

                var menu_id = $(this).attr('data-id');
                var meal = $(this).attr('data-meal');

                var $data = {
                    data: {
                        'menu_id': menu_id,
                        'meal': meal,
                    }
                };

                $.post(weebroot + 'orders/api/add/', $data, function (result) {
                    // console.log(result);
                });

                $('#modal-option button[data-target="#modal-addon"]').attr('data-menu-id', menu_id);

            });

            $('#modal-option button[data-target="#modal-addon"]').on('click', function (e) {
                e.preventDefault();
                $('#modal-addon a#submit-addon').attr('data-menu-id', $(this).attr('data-menu-id'));

            });
        },
        remove_order: function () {
            $('a.remove-menu-id').on('click', function (e) {
                e.preventDefault();

                $.post(weebroot + 'orders/api/del', {
                    data: {
                        'meal': $(this).attr('data-meal'),
                        'menu_id': $(this).attr('id'),
                        'menu_cat': $(this).attr('data-cat')
                    }
                }, function (result) {
                    var data = $.parseJSON(result);
                    if (data.msg == 'success')
                        location.reload();
                });

            });
        },
        /**************************
         * AddOn
         *************************/
        addon_order: function () {
            $('#modal-addon a#submit-addon').on('click', function (e) {
                e.preventDefault();

                var modal = $('#modal-addon');
                var meal = $(this).attr('data-meal');
                var menu_id = $(this).attr('data-menu-id');

                var $data = {
                    data: {
                        'meal': meal
                    }
                };

                var addons = $('input[name*="addon"]').serializeArray();
                $d = [];
                $.each(addons, function (k, v) {
                    $d.push({
                        'menu_id': menu_id, 'addon_id': v.value,
                        'numOrder': modal.find('input[count-addon-id="' + v.value + '"]').val()
                    });
                });

                $data.data.addons = $d;

                $.post(weebroot + 'orders/api/add-addon/', $data, function (result) {
                    // console.log(result);
                });

                window.location = $(this).attr('href');
            });
        },
        edit_addon: function () {
            $('form#frmCart a.edit-menu').on('click', function (e) {
                e.preventDefault();

                var modal = $('#modal-cart');
                var meal = $(this).attr('data-meal');
                var menu_id = $(this).attr('data-menu-id');
                var addon_id = $(this).attr('data-addon-id');
                var num_order = $(this).attr('data-num-order');

                rlfd.load_preloader(modal.find('.modal-content'));

                $.post(weebroot + 'orders/api/view-addon', {
                    addon_id: $(this).attr('data-addon-id'),
                }, function (data) {
                    data = $.parseJSON(data);
                    modal.find('#_title').text(data.title);

                    if (data.image) modal.find('#_image').attr('src', data.image);

                    modal.find('#_description').text(data.description);
                    modal.find('#_price').text(data.price);
                    modal.find('input.num-order').attr('value', num_order);
                    modal.find('#update-addon').attr({
                        'data-meal': meal,
                        'data-menu-id': menu_id,
                        'data-addon-id': addon_id,
                    }).text('Update Order ')
                        .append('<i class="glyphicon glyphicon-shopping-cart"></i>')
                        .removeAttr('data-target');
                }).done(rlfd.remove_preloader($('#modal-cart')));

            });
        },
        update_addon: function () {
            $('#modal-cart').on('click', 'a#update-addon', function (e) {
                e.preventDefault();
                var modal = $('#modal-cart');
                $.post(weebroot + 'orders/api/update-addon', {
                    data: {
                        'meal': $(this).attr('data-meal'),
                        'menu_id': $(this).attr('data-menu-id'),
                        'addon_id': $(this).attr('data-addon-id'),
                        'num_order': modal.find('input.num-order').val(),
                    }
                }, function (result) {
                    var data = $.parseJSON(result);
                    if (data.msg == 'success')
                        location.reload();
                });
            });
        },
        /*************************
         * end AddOn
         ************************/

        submit_order: function(){
            $('form#frmCart input[type="submit"]').on('click', function(e){
                e.preventDefault();

                $.post(weebroot + 'orders/api/submit-order', {}, function (result) {
                    var result = $.parseJSON(result);
                    if (result.msg == 'success')
                        location.reload();

                });
            });
        }
    };

    rlfd.init();
})(jQuery);