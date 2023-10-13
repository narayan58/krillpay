@extends('frontend::layouts.master')
@section('description', $sitedetail->meta_descriptions)
@section('keywords', $sitedetail->meta_keywords)
@section('fb_image', $sitedetail->logo)
@section('fb_url', Request::url())
@section('title', $page_header)
@section('content')
<section class="banner-part">
    <div class="swiper-container banner-slider home-one"
        data-swiper-config='{"loop": true, "effect": "fade", "speed": 800, "autoplay": 5000, "paginationClickable": true }'>
        <div class="swiper-wrapper">
            
            @if ($sliders->isNotEmpty())
                @foreach($sliders as $item)
                <div class="swiper-slide banner-item"
                    data-bg-image="{{ asset($item->image) }}">
                    <div class="container">
                        <div class="row d-flex justify-content-center">
                            <div class="col-xl-12 banner-caption">
                                <h2 class="brand-color animated" style="color: #e20a17 !important;" data-animate="fadeInUp">{{ $item->title }}</h2>
                                <h1 class="brand-color" data-animate="fadeInUp">{{ $item->sub_title }}
                                </h1>
                                <div class="banner-line"></div>
                                <p class="secondary-color" data-animate="fadeInUp"><b>{!! $item->description !!}</b></p>
                                
                                @if(isset($item->btn_url))
                                <a href="{{ $item->btn_url }}" class="btn-1 btn-darks" data-animate="fadeInUp">{{ $item->btn_text }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif

        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>


<div class="call-to-action">
    <div class="container">
        <div class="request-content">
            <div class="row d-flex align-items-center">
                <div class="col-xl-9 col-md-8 col-sm-7">
                    <h4>{{ $sitedetail->call_to_action_title }}</h4>
                    <p>{!! $sitedetail->call_to_action_text !!}</p>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-5 text-center text-sm-right">
                    <a href="{{ route('appointment') }}" class="btn-1">Book an Appointment</a>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="study-abroad-part section-p">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-head">
                    <h2>{{ $sitedetail->study_abroad_title }}</h2>
                    <p>{!! $sitedetail->study_abroad_text !!}</p>
                </div>
            </div>

            @if($study_abroad->isNotEmpty())
                @foreach($study_abroad as $item)
                {{-- @dd($item) --}}
                <div class="col-sm-6 col-lg-4">
                    <div class="study-abroad-item">
                        <div class="study-abroad">
                        <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" /></div>
                        <h2><a href="{{ route('studyAbroad', $item->slug) }}">{{ $item->title }}</a></h2>
                        <p>{!! Str::limit($item->description, 119) !!}</p>
                    </div>
                </div>
                @endforeach
            @endif

            <div class="col-sm-6 col-lg-4">
                <div class="study-abroad-item">
                    <div class="study-abroad"><img src="{{ asset('frontend/images/world-map.png') }}" alt="Other Visa Services" />
                    </div>
                    <h2><a href="{{ route('page.detail', 'our-services') }}">Other Visa Services</a></h2>
                    <p>{{ $sitedetail->title }} also processes student dependant/spouse visa, parents visitor visa,
                        family visit visa ...</p>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="why-choose-part section-p pad-bot-50">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-head">
                    <h2>{{ $sitedetail->why_choose_title }}</h2>
                    <p>{!! $sitedetail->why_choose_text !!}</p>
                </div>
            </div>
        </div>

        <div class="row">
            @if($why_choose->isNotEmpty())
            @foreach ($why_choose as $item)
            <div class="col-lg-4 col-sm-6">
                <div class="why-choose-item">
                    <div class="icon-box"><i class="{{ $item->icon }}"></i></div>
                    <h5><a>{{ $item->title }}</a></h5>
                    <p>{!! Str::limit($item->description, 119) !!}</p>
                </div>
            </div>
            @endforeach
            @endif
        </div>

    </div>
</section>

<section class="counter-part counter-b">
    <div class="container">
        <div class="counter-box">
            <div class="row">

                <div class="col-6 col-sm-6 col-lg-3 d-flex justify-content-center justify-content-lg-start">
                    <div class="counter-item">
                        <div class="count-des">
                            <i class="flaticon2-calendar-3"></i>
                        </div>
                        <div class="count-des">
                            <h2 class="counter">{{ $sitedetail->years_of_experience }}</h2>
                            <h6>+</h6>
                            <p>Years of Experience</p>
                        </div>
                    </div>
                </div>

                <div
                    class="col-6 col-sm-6 col-lg-3 d-flex justify-content-center justify-content-lg-start mt-4 mt-sm-0">
                    <div class="counter-item">
                        <div class="count-des">
                            <i class="flaticon2-map"></i>
                        </div>
                        <div class="count-des">
                            <h2 class="counter">{{ $sitedetail->countries }}</h2>
                            <p>Countries</p>
                        </div>
                    </div>
                </div>

                <div
                    class="col-6 col-sm-6 col-lg-3 d-flex justify-content-center justify-content-lg-start mt-4 mt-lg-0">
                    <div class="counter-item">
                        <div class="count-des">
                            <i class="flaticon2-architecture-and-city"></i>
                        </div>
                        <div class="count-des">
                            <h2 class="counter">{{ $sitedetail->universities }}</h2>
                            <h6>+</h6>
                            <p>Universities</p>
                        </div>
                    </div>
                </div>

                <div
                    class="col-6 col-sm-6 col-lg-3 d-flex justify-content-center justify-content-lg-start mt-4 mt-lg-0">
                    <div class="counter-item">
                        <div class="count-des">
                            <i class="flaticon2-checkmark"></i>
                        </div>
                        <div class="count-des">
                            <h2 class="counter">{{ $sitedetail->success_stories }}</h2>
                            <h6>+</h6>
                            <p>Success Story</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="about-us section-p bg_dark" style="background-image: url({{ asset($why_we_are_different->image) }});">
    <div class="container">
        <div class="row">
            <div class="col-xl-8">
                <h3>{{ $why_we_are_different->title }}</h3>
                <h6>{{ $why_we_are_different->sub_title }}</h6>
                <p>{!! $why_we_are_different->description !!}</p>
                <div class="progress_bar_wrap">
                    <div class="progress_bar">
                        <span class="dial" data-number="100"></span>
                        <span class="pro-num">100%</span>
                        <p>Free Advice</p>
                    </div>

                    <div class="progress_bar">
                        <span class="dial" data-number="100"></span>
                        <span class="pro-num">100%</span>
                        <p>Satisfied Clients</p>
                    </div>

                    <div class="progress_bar">
                        <span class="dial" data-number="90"></span>
                        <span class="pro-num">90%</span>
                        <p>Visa Success</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


<section class="skill-part section-p">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-xl-5 offset-xl-1">
                <div class="skill-box">
                    <div class="section-head-2">
                        <h2>Visa Success <span>Ratio</span></h2>
                        <p>{!! $sitedetail->visa_success_ratio_text !!}</p>
                    </div>


                    <div class="progressbar-box">
                        @foreach($countries as $item)
                        <div class="progressbar-wrapper">
                            <div class="progress vertical bottom">
                                <div class="progress-bar six-sec-ease-in-out"
                                    role="progressbar" data-transitiongoal="{{ $item->success_percentage }}"></div>
                            </div>
                            <h5 class="font-size-16">{{ $item->title }}</h5>
                            <span>{{ $item->success_percentage }}%</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="  col-12 col-xl-5 col-lg-6 offset-xl-1">
                <div class="section-head-2 mb-3">
                    <h2>How We <span>Work?</span></h2>
                    <p>{!! $sitedetail->how_we_work_text !!}</p>
                </div>
                <div class="story-box">
                    <div class="row no-gutters justify-content-center">

                        @if($workings->isNotEmpty())
                        @foreach ($workings as $k => $item)
                        <div class="story-item d-sm-flex align-items-sm-center">
                            <div class="year text-center text-sm-right">
                                <div class="years year-left">STEP {{ $k+1 }}</div>
                            </div>
                            <div class="comment-box">
                                <div class="story-comment story-comment-right text-left mt-0">
                                    <p>{!! $item->description !!}</p>
                                    <img src="{{ asset($item->image) }}" alt="{{ $item->title }}">
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="testimonial-part section-p">
    <div class="container">
        <div class="row">
            <div class="col-md-6 ">
                <div class="testimonial-contact-form">
                    <div class="section-head-2">
                        <h2>General <span>Enquiry</span></h2>
                        <p>If you wish to make a query, please complete the form below and submit.</p>
                    </div>
                    <p class="form-messege"></p>
                    <form class="contact-form"  id="contact-form">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label>Free Consultation</label>
                            </div>
                            <div class="col-12 col-lg-12">
                                <input class="form-control" type="text" id="contact_name" name="name" title="Enter your Full Name"
                                    required placeholder="Full name*" autocomplete="off" />
                            </div>
                            <div class="col-12 col-lg-12">
                                <input class="form-control" type="email" id="contact_email" name="email" title="Enter your E-mail"
                                    required placeholder="Your e-mail*" autocomplete="off" />
                            </div>
                            <div class="col-12">
                                <textarea class="form-control" required placeholder="Enter your message here..." id="contact_message"
                                    autocomplete="off"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn-1" id="contact_us_btn">SEND US</button>
                            </div>
                        </div>
                    </form>
                    <p class="text-danger" id="contact_error"></p>
                    <p class="text-success" id="contact_success"></p>
                </div>
            </div>

            <div class="col-12 col-xl-6 col-lg-6 mb-5 mb-lg-0">
                <div class="testimonial-box">
                    <div class="section-head-2">
                        <h2>{!! getLastWordBold($sitedetail->testimonial_title) !!}</h2>
                        <p>{!! $sitedetail->testimonial_text !!}</p>
                    </div>
                    <div class="swiper-container testimonial-slider"
                        data-swiper-config='{"loop": true, "effect": "slide", "speed": 800, "autoplay": 5000, "paginationClickable": true, "spaceBetween": 25 }'>
                        <div class="swiper-wrapper">

                            @if($testimonial->isNotEmpty())
                            @foreach($testimonial as $item)
                            <div class="swiper-slide testimonial-item">
                                <div class="row">
                                    <div class="col-8 offset-2 col-sm-5 col-xl-4 offset-sm-0 mb-3 mb-sm-0">
                                        <div class="person-detail">
                                            <div class="person-img">
                                                <img src="{{ asset($item->image) }}"
                                                    alt="{{ $item->name }}">
                                            </div>
                                            <h3>{{ $item->name }}</h3>
                                            <p>{{ $item->university_name }}</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-7 col-xl-8">
                                        <div class="person-comment">
                                            <h4>{{ $item->university_name }}</h4>
                                            <ul class="flat-list star">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                            <div class="mains-comment">
                                                <p><i class="fa fa-quote-left"></i>{!! Str::limit($item->description , 119) !!} <i
                                                        class="fa fa-quote-right"></i> </p>
                                            </div>
                                            <a href="{{ route('testimonial') }}" class="nhp-tb-button">View More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</section>


<section class="authorization-part section-p" style="background: url({{ $sitedetail->authorization_bg_image }}) no-repeat;    background-size: cover;
    background-position: center;background-attachment: fixed;">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="section-head-2">
                    <h2>{{ $sitedetail->authorization_title }}</h2>
                    <p class="white">{!! $sitedetail->authorization_text !!}</p>
                    {{-- <a href="###" class="btn-1">View More</a> --}}
                </div>
            </div>
            <div class="col-md-6 text-center text-lg-left">
                <div class="prac-det-carousel">
                    <div class="authorization-slider swiper-container"
                        data-swiper-config='{"loop": true, "effect": "slide", "speed": 1200, "autoplay": 10000, "paginationClickable": true }'>
                        <div class="swiper-wrapper">
                            @if($certificates->isNotEmpty())
                            @foreach ($certificates as $item)
                            <div class="swiper-slide"><img src="{{ asset($item->image) }}"
                                alt="{{ $item->title }}" /></div>
                                @endforeach
                                @endif
                        </div>

                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="events-part section-p bg_dark">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-head">
                    <h2>{{ $sitedetail->event_title }}</h2>
                    <p>{!! $sitedetail->event_text !!}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="swiper-container events-slider"
                    data-swiper-config='{"loop": true, "effect": "slide", "speed": 2000, "autoplay": 10000, "paginationClickable": true,"slidesPerView" : 3 ,"spaceBetween": 30,"breakpoints": { "500": { "slidesPerView": 1},"768": { "slidesPerView": 2 }}}'>

                    <div class="swiper-wrapper">
                        @if($events->isNotEmpty())
                        @foreach($events as $item)
                        <div class="swiper-slide">
                            <div class="events-item text-center">
                                <div class="events-img">
                                    <img src="{{ asset($item->image) }}"
                                        alt="{{ $item->title }}" />
                                    <div class="events-social">
                                        <ul>
                                            <li><a href="{{ route('events') }}"><i class='fa fa-external-link'
                                                        title="View Details"></i></a></li>
                                            <li><a href="###"><i class='fa fa-pencil-square-o'
                                                        title="Register for the Event"></i></a></li>
                                            @isset($item->facebook_link)
                                            <li><a href="{{ $item->facebook_link }}"
                                                target="_blank"><i class='fa fa-facebook'
                                                title="View on Facebook"></i></a></li>
                                                @endisset
                                        </ul>
                                    </div>
                                </div>
                                <div class="events-des">
                                    <h4>{{ $item->title }}</h4>
                                    <p>{{ $item->location }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="uwr-logo-part section-p">
    <div class="swiper-container uwr-logo-slider"
        data-swiper-config='{"loop": true, "effect": "slide", "speed": 900, "autoplay": 1500,"spaceBetween": 15, "paginationClickable": true, "slidesPerView" : 5 ,"breakpoints": { "320": { "slidesPerView": 1},"768": { "slidesPerView": 3 }}}'>
        @if ($universities->isNotEmpty())
        @foreach($universities as $item)
        <div class="swiper-wrapper">
            <div class="swiper-slide uwr-logo-item">
                <a href="{{ route('university.detail', $item->slug) }}"><img src="{{ asset($item->image) }}"
                        alt="{{ $item->titlee }}" /></a>
            </div>
           @endforeach
           @endif
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
