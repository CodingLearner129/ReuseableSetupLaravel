if (Object.keys(result).length > 0) {
    if (result.msg) {
        // $.growl.error({
        //     title: "error",
        //     message: result.msg,
        // });
        let error = (result.msg).split('; ');
        error.forEach(element => {
            $.growl.error({
                title: "error",
                message: element,
            });
        });
    }
    if (result.error_message) {
        $.growl.error({
            title: "error",
            message: result.error_message,
        });
    }
    if (result.success_message) {
        $.growl.notice({
            title: "success",
            message: result.success_message,
        });
    }
}
