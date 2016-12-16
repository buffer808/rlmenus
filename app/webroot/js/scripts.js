(function($){
    var weebroot = $('#webroot').attr('data-value');
    var rlfd_app = {
        init    :   function(){
            // this.send_message();
            if($('body.homepage').length){
                rlfd_app.home_ratings();
            }else{
                rlfd_app.ratings();
            }
        },
        home_ratings :   function () {

            $('input.rating').on('change', function(e){
                e.preventDefault();

                var rate = $(this).val();
                var rate_msg = $('.feedback textarea[name*="' + $(this).attr('data-rate-msg') + '"]');

                if(rate < 5){
                    rate_msg.attr('required', true);
                }else{
                    rate_msg.removeAttr('required');
                }

            })
        },
        ratings :   function () {
            $('input.rating').on('change', function(e){
                e.preventDefault();

                var rate = $(this).val();
                var rate_msg = $('#current-meal textarea[name*="' + $(this).attr('data-rate-msg') + '"]');

                if(rate < 5){
                    rate_msg.attr('required', true);
                }else{
                    rate_msg.removeAttr('required');
                }

            })
        },
        send_message:   function(){
            $('div#modal-contact form button[type="submit"]').submit(function(e){
                e.preventDefault();

                var modal = $('#modal-contact .modal-content');

                modal.append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');

                // $(this).submit();
                $('div#modal-contact form').submit();

            });
        }
    }

    rlfd_app.init()

})(jQuery);