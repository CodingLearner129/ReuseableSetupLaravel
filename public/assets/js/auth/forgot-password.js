$(function () {

    // Jquery form validation for Email must be validated
    $.validator.addMethod("customEmail", function (value, element) {
        return this.optional(element) || /^[a-zA-Z0-9.+_-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i.test(value);
    }, validation.email_customEmail);

    $('#forgot_password_form').validate({
        ignore: [],
        rules: {
            email: {
                required: true,
                email: true,
                customEmail: true
            },
        },
        messages: {
            email: {
                required: validation.email_required,
                email: validation.email_email,
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
