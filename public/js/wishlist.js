$(document).ready(function() {
    $(".btn-outline-warning").click(function(e) {
        var id = this.id;
        alert(id);
        bootbox.confirm({
            message: "Do you want to remove it?",
            size: 'small',
            buttons: {
                confirm: {
                    label: 'Delete',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'Cancel',
                    className: 'btn-secondary'
                }
            },
            callback: function(result) {
                if (result) {
                    e.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: 'DELETE',
                        url: "http://localhost/myecom/public/favorite/" + id,
                        data: { id: id },
                        success: function(response) {
                            $("#row-" + id).css('display', 'none');
                            $("#hr-" + id).css('display', 'none');
                            toastr.success(response.message);
                        },
                        error: function(error) {
                            toastr.error('error occured! please try again.');
                        }
                    });
                }
            }
        });
    });



    $('.btn-fhfhoutline-danger').click(function(e) {
        e.preventDefault();

        var id = this.id;
        alert(id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'DELETE',
            url: "http://localhost/myecom/public/cart/" + id,
            data: {
                "id": id,
            },
            contentType: 'application/json',
            dataType: 'json',
            success: function(response) {
                $("#row-" + id).css('display', 'none');
                $("#total").text(response.total);
                toastr.success(response.message);
            },
            error: function(error) {
                toastr.error('error occured! please try again.');
            }
        });
    });
});