$(function(){
    $('.setup').click(function(){
        $('.setup').prop('disabled', true);
        $(".setup").html(`<div class="spinner-border text-warning" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>`);
        $.ajax({
            url: "setup/setup",
            type: "post",
            dataType: 'json',
            error: function(e){
                $('.setup').prop('disabled', false);
                toastr["error"]("Error", e)

                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
            },
            success: function(d) {
                if(d.status == 1){
                    $('.setup').prop('disabled', true);
                    $(".setup").html(d.msg);
                    toastr["success"]("Sucess!!", d.msg)

                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                }else{
                    $('.setup').prop('disabled', false);
                    $(".setup").html('Start Your Set Up');
                    $('.setup').prop('disabled', false);
                    toastr["error"]("Error", d.msg)

                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                }
            }
        });
    });
})