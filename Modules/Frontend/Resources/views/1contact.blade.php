@extends('frontend::layouts.master')
@section('description', $sitedetail->meta_descriptions)
@section('keywords', $sitedetail->meta_keywords)
@section('fb_image', $sitedetail->logo)
@section('fb_url', Request::url())
@section('title', $page_header)
@section('content')
<div class="google-map">
    <iframe width="100%" height="425" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="{{ $sitedetail->map_detail }}"></iframe>
</div>

<section class="contact-info">
    <div class="container-fluid no-pad">
        <div class="contact-info-inner">
            <div class="row no-gutters">
                <div class="col-md-4">
                    
                    <div class="email-info sin-cont-info d-flex align-items-center">
                        <div class="center-wrap">
                            <i class="flaticon-telephone-of-old-design"></i>
                            <h3>call Us</h3>
                            <p>Phone: <a href="tel:{{ $sitedetail->phone_no }}">{{ $sitedetail->phone_no }}</a></p>
                            <p><a href="tel:{{ $sitedetail->mobile_no }}">{{ $sitedetail->mobile_no }}</a></p>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="office-location sin-cont-info d-flex align-items-center">
                        <div class="center-wrap">
                            <i class="flaticon-map-pin-marked"></i>
                            <h3>office location</h3>
                            <p>Address: {{ $sitedetail->address }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="call-us sin-cont-info d-flex align-items-center">
                        <div class="center-wrap">
                            <i class="flaticon-at"></i>
                            <h3>Email Us</h3>
                            <p>Mail:<a href="mailto:{{ $sitedetail->email }}"> {{ $sitedetail->email }} </a></p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
<section class="contact-bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="con-bottom-inner">
                    <h4>SOCIALISE <span>WITH US</span></h4>
                    <div class="per-social">
                        <ul>
                            @if (isset($sitedetail->facebook))
                            <li><a href="{{ $sitedetail->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            @endif

                            @if (isset($sitedetail->twitter))
                            <li><a href="{{ $sitedetail->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a>
                            </li>
                            @endif

                            @if (isset($sitedetail->linkedin))
                            <li><a href="{{ $sitedetail->linkedin }}" target="_blank"><i class="fa fa-linkedin"></i></a>
                            </li>
                            @endif

                            @if (isset($sitedetail->youtube))
                            <li><a href="{{ $sitedetail->youtube }}" target="_blank"><i class="fa fa-youtube"></i></a>
                            </li>
                            @endif
                        </ul>
                    </div>
                    <h4>Make an <span>Enquiry</span></h4>
                    <p>Use this form to make a general enquiry.</p>
                    
                    <form class="con-page-form" id="contact-form">
                        @csrf
                        <textarea name="message" id="contact_message" placeholder="Message"></textarea>
                        <input type="text" name="name" id="contact_name"  placeholder="Name *" class="mar-r" autocomplete="off">
                        <input type="text" name="email" id="contact_email"  placeholder="Email *" autocomplete="off">
                        <button  type="submit" id="contact_us_btn">Submit</button>
                    </form>
                    <p class="text-danger" id="contact_error"></p>
                    <p class="text-success" id="contact_success"></p>
                </div>
                
            </div>
        </div>
    </div>
</section>
<section class="nhp-news">
    <div class="container">
        <div class="row">
            <div class="nhp-news-box">
                <div class="row no-gutters d-flex align-items-center">
                    <div class="col-lg-1 col-md-3 col-sm-3 col-4">
                        <div class="p-relative">
                            <div class="news-icon"> <i class="fa fa-newspaper-o"></i></div>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-7 col-sm-7 col-8 text-left">
                        <div class="swiper-container nhp-news-slider"
                            data-swiper-config='{"loop": true, "effect": "slide","speed": 2000,"autoplay": 5000,"paginationClickable":true,"nextButton":".swiper-button-next","prevButton":".swiper-button-prev"}'>
                            
                            <div class="swiper-wrapper">
                                @if($news->isNotEmpty())
                                @foreach($news as $item)
                                <div class="swiper-slide">
                                    <h5>{{ $item->title }}</h5>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-2 col-sm-2 d-none d-sm-inline-block">
                        
                        <div class="twitter-sldier-button">
                            <div class="swiper-button-prev">
                                <i class="fa fa-angle-left"></i>
                            </div>
                            <div class="swiper-button-next">
                                <i class="fa fa-angle-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection