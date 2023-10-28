$(function () {

    $('#otp_verification_form').validate({
        ignore: [],
        rules: {
            otp: {
                required: true,
                minlength: 6,
            },
        },
        messages: {
            otp: {
                required: validation.otp_required,
                minlength: validation.otp_minlength,
            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            if (element.attr("name") == "profile_picture") {
                error.appendTo("#profile_picture_error")
            } else {
                element.closest('.field-wrapper.input').append(error);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });

});

