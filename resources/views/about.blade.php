@extends('layouts.app')
@section('content')
<section class="banner">
    <div class="bannerimage">
        <img src="{{ url('design/style') }}/images/about.png" alt="image">
    </div>
    <div class="bennertext">
        <div class="innertitle">
            <h2>Consulting for IT Issues and programming consults<br>
                Made by ITI Students.</h2>
            <p>We connect users with professionals into one platform through asking 
                questions or <br>Zoom meetings.</p>
        </div>
    </div>
    <span class="banner-title">About us</span>
</section>
<section class="Company-overview">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <h2>
                    Company Overview
                </h2>
                <p>
                    This is a professional consulting web application specially 
                    in IT fields as it provides a rich community of professionals that can solve users’
                    problems or consulting them in many different IT fields at the available time of them. <br>
                    The application also can help any starter and student wants to learn and need help or guide 
                    to tell them which way can take or how to solve errors.
                </p>
            </div>
            <div class="col-md-6 col-sm-12">
                <img src="{{ url('design/style') }}/images/about3.png" alt="image">
            </div>
        </div>
    </div>
</section>
@endsection
