@extends('includes.index')
@section('content')
<div class="contact-area d-flex align-items-center">

    <div class="google-map">
    <img src="{{ asset('img/avatar/profile.jpg')}}" alt="" >
    </div>

    <div class="contact-info">
        <h2>How to Find Me</h2>
        <h4 class="text-center text-primary">Virendra Arekar</h4>
        <p>I am a Full Stack Developer. I have 4 + yr experience. Developing new Mobile app and Website is my hobby</p>

        <div class="contact-address mt-50">
            <p><span>address:</span> 21/4th floor, Mrudungachrya Co-operative Housing society, Mahim Mumbai 400016</p>
            <p><span>Mobile:</span> +8483988837</p>
            <p><a href="mailto:virendra.arekar@gmail.com">virendra.arekar@gmail.com</a></p>
        </div>
    </div>

</div>

@endsection
