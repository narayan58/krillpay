@extends('frontend::layouts.master')
@section('description', $sitedetail->meta_descriptions)
@section('keywords', $sitedetail->meta_keywords)
@section('fb_image', $sitedetail->logo)
@section('fb_url', Request::url())
@section('title', $page_header)
@section('content')
<div class="nhp-banner-c">
    <img src="{{ isset($sitedetail->event_banner_image) ? asset($sitedetail->event_banner_image) : $sitedetail->main_banner_image }}" alt="{{ $page_header }} Banner" />
    <section class="breadcrumb-part">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-title">
                        <h1>{{ $page_header }}</h1>
                        <p style="color:#fff; font-weight:700; margin-top: 20px;">{{ $sitedetail->event_banner_text }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="breadcrumb-link">
                <ul class="flat-list">
                    <li><a href="index-2.html">Home</a></li>
                    <li><a href="upcoming-events.html">{{ $page_header }}</a></li>
                </ul>
            </div>
        </div>
    </section>
</div>


<section class="section-p">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                @include('frontend::components.quick-links')
                <div class="sin-sidebar">
                    <h2>Book an Appointment</h2>
                    <div class="nhp-sin-contact">
                        <p style="text-align:center;">Book an appointment with one of our expert consultants!</p>
                        <div style="height:50px;">
                            <p class="form-messege"></p>
                        </div>
                        <div class="per-form">
                            <form class="per-con-form" id="contact-form">
                                @csrf
                                <input class="form-control" type="text" name="name" id="contact_name"
                                    title="Enter your Full Name" required placeholder="Full name*" autocomplete="off">
                                <input class="form-control" type="email" name="email" id="contact_email"
                                    title="Enter your E-mail" required placeholder="Your e-mail*" autocomplete="off" />
                                <textarea class="form-control" name="message" id="contact_message" required
                                    placeholder="Enter your preferred Date and Time ..." autocomplete="off"></textarea>
                                <input type="submit" value="Request" id="contact_us_btn">
                            </form>
                            <p class="text-danger" id="contact_error"></p>
                            <p class="text-success" id="contact_success"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xl-8">

                <div class="page" id="page1">
                    @if($list->isNotEmpty())
                    @foreach ($list as $item)
                    <div class="nhp-pagination-t">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="pra-img d-flex align-items-center">
                                    <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" />
                                    <div class="pra-img-overlay">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="pra-cont">
                                    <h3>{{ $item->title }}</h3>

                                    <p>
                                        <i class="fa fa-calendar nhp-uvi"></i>
                                        {{ Carbon\Carbon::parse($item->date)->isoFormat('D MMMM, Y') }}</i><br>
                                        <i class="fa fa-clock-o nhp-uvi"></i> {{ $item->time }}</i><br>
                                        <i class="fa fa-map-marker nhp-uvi"></i> {{ $item->location }}</i><br>
                                    </p>
                                    @if(isset($item->facebook_link))
                                    <a href="{{ $item->facebook_link }}" target="_blank">View on Facebook</a>
                                    @endif
                                    <a href="registration-form.html">Register to attend</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif

                    <ul id="NHPag" class="nhp-pagination">
                        <li><a href="#">Previous</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">...</a></li>
                        <li><a href="#">Next</a></li>
                        <li><a href="#">Last</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
</section>

@endsection