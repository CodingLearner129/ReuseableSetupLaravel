$(function () {
    // Jquery form validation for Password must contain at least ONE UPPERCASE LETTER
    $.validator.addMethod("upperLetterPassword", function (value, element) {
        return this.optional(element) || /[A-Z]/.test(value);
    }, validation.new_password_upperLetterPassword);

    // Jquery form validation for Password must contain at least ONE lowercase letter
    $.validator.addMethod("lowerLetterPassword", function (value, element) {
        return this.optional(element) || /[a-z]/.test(value);
    }, validation.new_password_lowerLetterPassword);

    // Jquery form validation for Password must contain at least ONE digit
    $.validator.addMethod("digitPassword", function (value, element) {
        return this.optional(element) || /[0-9]/.test(value);
    }, validation.new_password_digitPassword);

    // Jquery form validation for Password must contain at least ONE SPECIAL CHARACTERS
    $.validator.addMethod("specialLetterPassword", function (value, element) {
        return this.optional(element) || /[!@#$%&*]/.test(value);
    }, validation.new_password_specialLetterPassword);

    $.validator.addMethod("notEqualTo", function (value, element) {
        return $("#current_password").val() != value;
    }, validation.new_password_notEqualToCurrentPassword);

    $('#change_password_form').validate({
        ignore: [],
        rules: {
            current_password: {
                required: true,
                minlength: 8,
                maxlength: 15,
            },
            new_password: {
                required: true,
                minlength: 8,
                maxlength: 15,
                notEqualTo: true,
                upperLetterPassword: true,
                lowerLetterPassword: true,
                digitPassword: true,
                specialLetterPassword: true,
            },
            confirm_password: {
                required: true,
                minlength: 8,
                equalTo: new_password,
            },
        },
        messages: {
            current_password: {
                required: validation.current_password_required,
                minlength: validation.current_password_minlength,
                maxlength: validation.current_password_maxlength,
            },
            new_password: {
                required: validation.new_password_required,
                minlength: validation.new_password_minlength,
                maxlength: validation.new_password_maxlength,
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
                element.closest('.form-group.mb-4').append(error);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });

    if(result.msg){
        $.growl.error({
            title: "error",
            message: result.msg,
        });
    }

});
