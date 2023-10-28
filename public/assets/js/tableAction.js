$(document).on("click", ".change-status", function () {
    const changeStatusUrl = $(this).data("href");
    const attr = $(this).prev("input");
    const status = attr.attr("checked") == "checked" ? 1 : 0;
    const tableElement = "#" + $(this).parents("table").attr("id");
    const showStatus = $(this).data("status");
    $.ajax({
        type: "POST",
        url: changeStatusUrl,
        data: {
            status: status,
        },
        dataType: "json",
        success: function (response) {
            if (response.status == 200) {
                if (status == 1) {
                    attr.removeAttr("checked");
                } else {
                    attr.attr("checked", "checked");
                }
                if (showStatus == "1") {
                    if ($.fn.DataTable.fnIsDataTable(tableElement)) {
                        $(tableElement).DataTable().ajax.reload();
                    }
                }
                $.growl.notice({
                    title: "success",
                    message: response.message,
                });
            } else {
                if (status == 1) {
                    attr.attr("checked", "checked");
                } else {
                    attr.removeAttr("checked");
                }
                if (showStatus == "1") {
                    if ($.fn.DataTable.fnIsDataTable(tableElement)) {
                        $(tableElement).DataTable().ajax.reload();
                    }
                }
                $.growl.error({
                    title: "error",
                    message: response.message,
                });
            }
        },
        error: function (error) {
            if (status == 1) {
                attr.attr("checked", "checked");
            } else {
                attr.removeAttr("checked");
            }
            if (showStatus == "1") {
                if ($.fn.DataTable.fnIsDataTable(tableElement)) {
                    $(tableElement).DataTable().ajax.reload();
                }
            }
            $.growl.error({
                title: "error",
                message: somethingWentWrong,
            });
        },
    });
});

$(document).on("click", ".approve-btn", function () {
    const url = $(this).data("href");
    Swal.fire({
        title: areYouSure,
        text: wontRevert,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "var(--coffee-dark)",
        cancelButtonColor: "var(--coffee-light)",
        confirmButtonText: yesApprove,
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    _method: "PUT",
                },
                dataType: "json",
                beforeSend: function () {
                    swal.fire({
                        title: pleaseWait,
                        text: isWorking,
                        onOpen: function () {
                            swal.showLoading();
                        },
                    });
                },
                success: function (response) {
                    if (response.status == 500) {
                        swal.hideLoading();
                        swal.fire(oops, response.message, "error");
                    } else {
                        if ($.fn.DataTable.fnIsDataTable(tableElement)) {
                            $(tableElement).DataTable().ajax.reload();
                        }
                        Swal.fire(approvedSuccess, response.message, "success");
                    }
                },
                complete: function () {
                    $(tableElement).DataTable().ajax.reload();
                    swal.hideLoading();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    swal.hideLoading();
                    swal.fire(oops, somethingWentWrong, "error");
                },
            });
        }
    });
});

$(document).on("click", ".delete-btn", function () {
    const url = $(this).data("href");
    Swal.fire({
        title: areYouSure,
        text: wontRevert,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "var(--coffee-dark)",
        cancelButtonColor: "var(--coffee-light)",
        confirmButtonText: yesDelete,
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    _method: "DELETE",
                },
                dataType: "json",
                beforeSend: function () {
                    swal.fire({
                        title: pleaseWait,
                        text: isWorking,
                        onOpen: function () {
                            swal.showLoading();
                        },
                    });
                },
                success: function (response) {
                    if (response.status == 500) {
                        swal.hideLoading();
                        swal.fire(oops, response.message, "error");
                    } else {
                        if ($.fn.DataTable.fnIsDataTable(tableElement)) {
                            $(tableElement).DataTable().ajax.reload();
                        }
                        Swal.fire(deleted, response.message, "success");
                    }
                },
                complete: function () {
                    $(tableElement).DataTable().ajax.reload();
                    swal.hideLoading();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    swal.hideLoading();
                    swal.fire(oops, somethingWentWrong, "error");
                },
            });
        }
    });
});
