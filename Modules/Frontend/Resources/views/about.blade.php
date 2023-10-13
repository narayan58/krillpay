@extends('frontend::layouts.master')
@section('description', $sitedetail->meta_descriptions)
@section('keywords', $sitedetail->meta_keywords)
@section('fb_image', $sitedetail->logo)
@section('fb_url', Request::url())
@section('title', $page_header)
@section('content')
        <!-- Banner Section start -->
    <section class="banner-section about-us">
        <div class="overlay">
            <div class="banner-content">
                <div class="container wow fadeInUp">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-lg-10">
                            <div class="main-content text-center">
                                <div class="top-area section-text dark-sec">
                                    <h5 class="sub-title">Who We Are?</h5>
                                    <h2 class="title">Financial inclusion for the unbanked in Africa</h2>

                                    <h5>
                                       {!! $sitedetail->who_we_are_header !!}
                                    </h5>
                                    <div class="magnific-area d-flex align-items-center justify-content-around">
                   
                                        <a class="mfp-iframe popupvideo" href="{{ $sitedetail->wwr_video_url }}">
                                            <img src="{{ asset('frontend/assets/images/icon/popup-icon.png') }}" alt="icon">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="banner-img-bottom pb-60">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                     
                    </div>
                </div>
                <div class="stars-info pt-90">
                    <div class="row justify-content-center justify-content-around">
                        <div class="col-sm-3">
                            <div class="single-box">
                                <div class="icon-box">
                                    <img src="{{ asset('frontend/assets/images/icon/stats-info-icon-1.png') }}" alt="icon">
                                </div>
                                <h5 class="text-dark">{{ $sitedetail->employees_number }}+ employees</h5>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="single-box">
                                <div class="icon-box">
                                    <img src="{{ asset('frontend/assets/images/icon/stats-info-icon-2.png') }}" alt="icon">
                                </div>
                                <h5 class="text-dark">{{ $sitedetail->office_no }}+ offices around the world</h5>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="single-box">
                                <div class="icon-box">
                                    <img src="{{ asset('frontend/assets/images/icon/stats-info-icon-3.png') }}" alt="icon">
                                </div>
                                <h5 class="text-dark">{{ $sitedetail->volumn_no }} in processed volume in last year</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </section>
    <!-- Banner Section end -->
        @if($aboutus)
        <!-- About Us In start -->
        <section class="about-section">
            <div class="overlay pt-120 pb-120">
                <div class="container wow fadeInUp">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="text-area">
                                <h5 class="sub-title">{{ $aboutus->title }}</h5>
                                <h2 class="title">{{ $aboutus->sub_title }}</h2>
                                <p class="text-dark">{!! $aboutus->description !!}</p>
                            </div>
                            <!--<div class="row cus-mar mt-3">-->
                            <!--    <div class="col-xl-4 col-md-4">-->
                            <!--        <div class="count-content text-center">-->
                            <!--            <div class="count-number">-->
                            <!--                <h4 class="counter text-dark">{{ $sitedetail->customer_satisfaction }}</h4>-->
                            <!--                <h4 class="static">%</h4>-->
                            <!--            </div>-->
                            <!--            <p class="text-dark">Customer satisfaction</p>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--    <div class="col-xl-4 col-md-4">-->
                            <!--        <div class="count-content text-center">-->
                            <!--            <div class="count-number ">-->
                            <!--                <h4 class="counter text-dark">{{ $sitedetail->active_user }}</h4>-->
                            <!--                <h4 class="static">M</h4>-->
                            <!--            </div>-->
                            <!--            <p class="text-dark">Monthly active users</p>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--    <div class="col-xl-4 col-md-4">-->
                            <!--        <div class="count-content text-center">-->
                            <!--            <div class="count-number ">-->
                            <!--                <h4 class="counter text-dark">{{ $sitedetail->new_user_per_week }}</h4>-->
                            <!--                <h4 class="static">K</h4>-->
                            <!--            </div>-->
                            <!--            <p class="text-dark">New Users per week</p>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                        <div class="col-lg-6 text-end">
                            <div class="img-area">
                                <!--<img class="img-1" src="{{ asset('frontend/assets/images/about1.jpg') }}"  alt="image">
                                <img class="img-2" src="{{ asset('frontend/assets/images/about2.jpg') }}"  alt="image">-->
<!--                                <img class="img-4" src="{{ asset('frontend/assets/images/about3.jpg') }}"  alt="image">

-->
                                <img class="img-4" src="{{ asset($aboutus->image) }}"  alt="image">
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
        <!-- About Us In end -->
        @if($aboutus1)
         <section class="about-section about-section-two">
            <div class="overlay pb-120">
                <div class="container wow fadeInUp">
                    <div class="row align-items-center">
                        <div class="col-lg-6 text-end">
                            <div class="img-area">
                                <img class="img-1" src="{{ asset($aboutus1->image) }}"  alt="image">
                             
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="text-area">
                                <h5 class="sub-title">{{ $aboutus1->title }}</h5>
                                <h2 class="title">{{ $aboutus1->sub_title }}</h2>
                                <p class="text-dark">{!! $aboutus1->description !!}</p>
                            </div>
                           
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        @endif

           <!-- Our Values start -->
    <section class="our-values">
        <div class="overlay pt-60 pb-120">
            <div class="container wow fadeInUp">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-6">
                        <div class="section-header text-center">
<!--                            <h5 class="sub-title">Our values</h5>
-->                            <h5 class="title" style="font-size:30px !important">{!! $sitedetail->our_value_header !!}</h5>
<!--                            <p></p>
-->                        </div>
                    </div>
                </div>
                <div class="row cus-mar align-items-center">
                    @foreach($values as $item)
                    <div class="col-lg-6">
                        <div class="single-box d-flex">
                            <div class="img-box">
                                <img src="{{ asset($item->image) }}" alt="icon">
                            </div>
                            <div class="text-box">
                                <h4>{{ $item->title }}</h4>
                                <p class="text-dark">{!! $item->description !!}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Our Values end -->
    
    
    
    <!-- Our Team start -->
    <section class="our-team">
        <div class="overlay pt-120 pb-120">
            <div class="container wow fadeInUp">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-6">
                        <div class="section-header text-center">
                            <h5 class="sub-title">Our team</h5>
                            <h4 class="title">Experienced & Professional</h4>
<!--                            <p> A team you would want for your company.</p>
-->                        </div>
                    </div>
                </div>
                <div class="row cus-mar align-items-center">
                    @foreach($teams as $item)
                <div class="col-lg-4 col-sm-6">
                        <div class="single-box">
                            <div class="img-box">
                                <img src="{{ asset($item->image) }}" title="{{$item->name}}"  alt="{{$item->name}}">
                               </div>
                            <div class="body-area">
                                <div class="name_and_social d-flex align-items-center justify-content-center">
                                      <h5 >{{$item->name}}</h5>
                                        <a class="ms-2" href="{{$item->linkedin_link}}" target="_blank"><img src="{{asset('frontend/assets/images/linkedin.png')}}" alt="icon"></a>
                                   
                                </div>
                              
                                <p class="designation">{{$item->designation}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
           
           
             
                </div>
            </div>
        </div>
    </section>
    <!-- Our Team end -->
    
    @endsection