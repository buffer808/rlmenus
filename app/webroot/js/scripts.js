(function($){
    var weebroot = $('#webroot').attr('data-value');
    var rlfd_app = {
        init    :   function(){
            this.ratings();
            this.send_message();
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
            $('div#modal-contact form button[type="submit"]').on('click', function(e){
                e.preventDefault();

                var modal = $('#modal-contact .modal-content');

                modal.append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');

                $('div#modal-contact form').submit();

            });
        }
    }

    rlfd_app.init()

})(jQuery);