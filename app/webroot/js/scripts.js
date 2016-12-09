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
            $('form#send_message button[type="button"]').on('click', function(e){
                e.preventDefault();

                var form = $('form#send_message');
                var formData = form.serialize();
                var data_target = $(this).attr('data-target');

                $(this).removeAttr('data-target');

                $.post(weebroot + 'send_inquiry', formData, function (result) {
                    console.log(result);
                });
                // console.log(formData);

            });
        }
    }

    rlfd_app.init()

})(jQuery);