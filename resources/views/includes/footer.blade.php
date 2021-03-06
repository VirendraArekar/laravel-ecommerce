<!-- ##### Footer Area Start ##### -->
<footer class="footer_area clearfix" style="padding-bottom:0px;margin-top:0px;">
    <div class="container">
        <div class="row">
            <!-- Single Widget Area -->
            <div class="col-12 col-md-6">
                <div class="single_widget_area d-flex mb-30">
                    <!-- Logo -->
                    <div class="footer-logo mr-50">
                        <a href="#"><img src="img/core-img/logo2.png" alt=""></a>
                    </div>
                    <!-- Footer Menu -->
                    <div class="footer_menu">
                        <ul>
                        <li><a href="{{url('/')}}">Shop</a></li>
                            <li><a href="{{url('contact')}}">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Single Widget Area -->
            <div class="col-12 col-md-6">
                <div class="single_widget_area mb-30">
                    <ul class="footer_widget_menu">
                    <li><a href="{{url('order')}}">Order Status</a></li>
                        <li><a href="#">Payment Options</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Use</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row align-items-end">
            <!-- Single Widget Area -->
            <div class="col-12 col-md-6">
                <div class="single_widget_area">
                    <div class="footer_heading mb-30">
                        <h6>Subscribe</h6>
                    </div>
                    <div class="subscribtion_form">
                        <form action="#" method="post">
                            <input type="email" name="mail" class="mail" placeholder="Your email here" disabled>
                            <button type="button" class="submit"><i class="fa fa-long-arrow-right" aria-hidden="true" disabled></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Single Widget Area -->
            <div class="col-12 col-md-6">
                <div class="single_widget_area">
                    <div class="footer_social_area">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>

<div class="row mt-5" >
            <div class="col-md-12 text-center">
                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This made <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="{{url('/')}}" target="_blank">Virendra Arekar</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>

    </div>
</footer>
<!-- ##### Footer Area End ##### -->

<!-- jQuery (Necessary for All JavaScript Plugins) -->
<script src="{{asset('js/jquery/jquery-2.2.4.min.js')}}"></script>
<script src="{{asset('build/toastr.min.js')}}"></script>
<!-- Popper js -->
<script src="{{asset('js/popper.min.js')}}"></script>
<!-- Bootstrap js -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- Plugins js -->
<script src="{{asset('js/plugins.js')}}"></script>
<!-- Classy Nav js -->
<script src="{{asset('js/classy-nav.min.js')}}"></script>
<!-- Active js -->
<script src="{{asset('js/active.js')}}"></script>
<script src="{{asset('js/cart.js')}}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

<script src="{{asset('js/checkout.js')}}"></script>
<script src="{{asset('js/wishlist.js')}}"></script>
@yield('script')
<script>
    $(document).ready(function () {
        $('#posts').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                     "url": "{{ url('allproduct') }}",
                     "dataType": "json",
                     "type": "POST",
                     "data":{ _token: "{{csrf_token()}}"}
                   },
            "columns": [
                { "data": "id" },
                { "data": "sku" },
                { "data": "name" },
                { "data": "brand_id" },
                { "data": "category_id" }
            ]

        });
    });
</script>
<script>
$(function() {
    $('#searchform').one('submit', function myFormSubmitCallback(evt) {
        evt.stopPropagation();
        evt.preventDefault();
        var $this = $(this);
        var keyword = $('#headerSearch').val();
        if (keyword !== '') {
            var url = "<?php echo url('search'); ?>" + '/' + keyword;
            $('#searchform').attr('action', url);
            $this.submit();
        } else {
            $this.one('submit', myFormSubmitCallback);
        }
    });


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
        var auth = "{{ Auth::check() ? true : false }}";

        if(auth !== ''){
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

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
        }
        else{
            $("#modalLoginForm").modal("show");
        }

    });

    $("form[name='loginform']").validate({
        rules: {

            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 3,
                maxlength : 20
            }
        },
        messages: {
            email: {
                required: "<p class='text-danger'>Enter your Email</p>",
                email: "<p class='text-danger'>Please enter a valid email address.</p>",
            },
            password: {
                required: "<p class='text-danger'>Enter your password</p>",
                minlength: "<p class='text-danger'>Password must 3 to 20 char long.</p>",
            }
        },
        submitHandler: function(form) {
            var email = $('#eml').val();
            var pass = $('#pwd').val();
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

            $.ajax({
                type: 'POST',
                url: "http://localhost/myecom/public/login",
                data: {email : email, password : pass},
                success: function(response) {
                    if(response.auth)
                    {
                        toastr.success('User logged in.');
                        location.reload();
                    }
                    else{
                        toastr.error('Authentication failed.');
                    }
                },
                error: function(error) {
                    toastr.error('error occured! please try again.');
                }
            });

        }
    });

});
</script>
</body>

</html>
