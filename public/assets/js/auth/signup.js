$(function () {

    // Jquery form validation for Contact must be validated
    $.validator.addMethod(
        "regex",
        function (value, element, regexp) {
            if (regexp.constructor != RegExp) {
                regexp = new RegExp(regexp);
            } else if (regexp.global) {
                regexp.lastIndex = 0;
            }
            return this.optional(element) || regexp.test(value);
        },
        validation.phone_regex
    );

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

    $('#signup_form').validate({
        ignore: [],
        rules: {
            email: {
                required: true,
                email: true,
                customEmail: true
            },
            name: {
                required: true,
                // minlength: 5,
                maxlength: 50,
            },
            // phone: {
            //     // required: true,
            //     regex: /^\+?\d{1,4}?[-.\s]?\(?\d{1,3}?\)?[-.\s]?\d{1,4}[-.\s]?\d{1,4}[-.\s]?\d{1,9}$/,
            //     maxlength: 17,
            //     // regex: /^\+?\d*$/,
            //     // regex: /^(\+\d{1,2}\s?)?1?\-?\.?\s?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/,
            //     // regex: /^(\\+\\d{1,3}( )?)?((\\(\\d{1,3}\\))|\\d{1,3})[- .]?\\d{3,4}[- .]?\\d{4}$/,
            //     minlength: 10,
            //     // maxlength: 16,
            // },
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
            email: {
                required: validation.email_required,
                email: validation.email_email,
            },
            name: {
                required: validation.name_required,
                // minlength: validation.name_minlength,
                maxlength: validation.name_maxlength,
            },
            phone: {
                // required: validation.phone_required,
                minlength: validation.phone_minlength,
                maxlength: validation.phone_maxlength,
            },
            address: {
                required: validation.address_required,
                minlength: validation.address_minlength,
                maxlength: validation.address_maxlength,
            },
            postcode: {
                required: validation.postcode_required,
                minlength: validation.postcode_minlength,
                maxlength: validation.postcode_maxlength,
            },
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
