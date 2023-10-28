$(function () {
    // Jquery form validation for Email must be validated
    $.validator.addMethod("customEmail", function (value, element) {
        return this.optional(element) || /^[a-zA-Z0-9.+_-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i.test(value);
    }, validation.email_customEmail);

    // Jquery form validation for fileSize must be less than x kb
    $.validator.addMethod('fileSize', function (value, element, param) {
        return this.optional(element) || (element.files[0].size <= param * 1000)
    }, validation.image_maxSize);

    // $('#cafe_type').select2({
    //     minimumResultsForSearch: Infinity,
    // });

    // $('#cafe_filter').select2({
    //     minimumResultsForSearch: Infinity,
    //     placeholder: selectCafeFilter,
    // });

    $('#edit_profile_form').validate({
        ignore: [],
        rules: {
            name: {
                required: true,
                minlength: 5,
                maxlength: 50,
            },
            email: {
                required: true,
                email: true,
                customEmail: true
            },
            // address: {
            //     required: true,
            //     minlength: 8,
            //     maxlength: 500,
            // },
            picture__input: {
                required: false,
                extension: "jpg|jpeg|png",
                fileSize: maxSize,
            },
            // "cafe_filter[]": {
            //     required: true,
            // },
        },
        messages: {
            name: {
                required: validation.full_name_required,
                minlength: validation.full_name_minlength,
                maxlength: validation.full_name_maxlength,
            },
            email: {
                required: validation.email_required,
                email: validation.email_email,
            },
            // address: {
            //     required: validation.address_required,
            //     minlength: validation.address_minlength,
            //     maxlength: validation.address_maxlength,
            // },
            picture__input: {
                extension: validation.image_extension,
            },
            // "cafe_filter[]": {
            //     required: validation.cafe_filter_required,
            // },
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
