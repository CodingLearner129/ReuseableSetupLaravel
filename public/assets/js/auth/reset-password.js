$(function () {

    // Jquery form validation for Email must be validated
    $.validator.addMethod("customEmail", function (value, element) {
        return this.optional(element) || /^[a-zA-Z0-9.+_-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i.test(value);
    }, validation.email_customEmail);

    // Jquery form validation for Password must contain at least ONE UPPERCASE LETTER
    $.validator.addMethod("upperLetterPassword", function (value, element) {
        return this.optional(element) || /[A-Z]/.test(value);
    }, validation.password_upperLetterPassword);

    // Jquery form validation for Password must contain at least ONE lowercase letter
    $.validator.addMethod("lowerLetterPassword", function (value, element) {
        return this.optional(element) || /[a-z]/.test(value);
    }, validation.password_lowerLetterPassword);

    // Jquery form validation for Password must contain at least ONE digit
    $.validator.addMethod("digitPassword", function (value, element) {
        return this.optional(element) || /[0-9]/.test(value);
    }, validation.password_digitPassword);

    // Jquery form validation for Password must contain at least ONE SPECIAL CHARACTERS
    $.validator.addMethod("specialLetterPassword", function (value, element) {
        return this.optional(element) || /[!@#$%&*]/.test(value);
    }, validation.password_specialLetterPassword);

    $('#reset_password_form').validate({
        ignore: [],
        rules: {
            password: {
                required: true,
                minlength: 8,
                maxlength: 15,
                upperLetterPassword: true,
                lowerLetterPassword: true,
                digitPassword: true,
                specialLetterPassword: true,
            },
            confirm_password: {
                required: true,
                minlength: 8,
                equalTo: password,
            },
        },
        messages: {
            password: {
                required: validation.password_required,
                minlength: validation.password_minlength,
                maxlength: validation.password_maxlength,
            },
            confirm_password: {
                required: validation.confirm_password_required,
                minlength: validation.confirm_password_minlength,
                equalTo: validation.confirm_password_equalTo,
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
