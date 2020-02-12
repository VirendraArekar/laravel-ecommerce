$(function() {
    $("form[name='checkout']").validate({
        rules: {
            first_name: {
                required: true,
                minlength: 3
            },
            last_name: {
                required: true,
                minlength: 3
            },
            email: {
                required: true,
                email: true
            },
            country: {
                required: true,
                minlength: 3
            },
            street_address: {
                required: true,
                minlength: 20
            },
            street_address2: {
                minlength: 3
            },
            postcode: {
                required: true,
                maxlength: 6,
                number: true
            },
            city: {
                required: true,
                minlength: 3
            },
            phone_number: {
                required: true,
                minlength: 10,
                maxlength: 10

            },
            email_address: {
                required: true,
                email: true

            }


        },

        submitHandler: function(form) {
            form.submit();
        }
    });
});