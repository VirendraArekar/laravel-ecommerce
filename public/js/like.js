$(function() {
    // alert('sku');
    $('a#favorite').click(function() {
        var sku = $(this).attr('data-id');
        var cls = $(this).attr('class');
        var like = cls.match(/active is_animating/);
        var jsondata = '';
        if (like != null) {
            jsondata = { sku: sku, action: 'like' };
        } else {
            jsondata = { sku: sku, action: 'unlike' };
        }

        console.log(jsondata);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: "http://localhost/myecom/public/like",
            data: jsondata,
            success: function(response) {
                toastr.success(response.message);
            },
            error: function(error) {
                toastr.error('error occured! please try again.');
            }
        });

    });
});