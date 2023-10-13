@extends('frontend::layouts.master')
@section('description', $sitedetail->meta_descriptions)
@section('keywords', $sitedetail->meta_keywords)
@section('fb_image', $sitedetail->logo)
@section('fb_url', Request::url())
@section('title', $page_header)
@section('content')

    <!-- banner-section start -->
    <section class="banner-section inner-banner privacy-content">
        <div class="overlay">
            <div class="banner-content d-flex align-items-center">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-lg-7 col-md-10">
                            <div class="main-content">
                                <h3 class="text-white">{{$page_header}}</h3>
                      
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner-section end -->

    <!-- Privacy Content In start -->
    <section class="faq relative">
        <div class="overlay pt-120">
            <div class="container wow fadeInUp">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-header text-center">
                            
                            <h2 class="title">FAQ</h2>
                            <p>Some frequently asked questions</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-7">
                        <div class="accordion" id="accordionExample">
                            @foreach ($list as $k => $item)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{ $k }}" aria-expanded="true" aria-controls="collapseOne{{ $k }}">
                                {{ $item->title }}
                                </button>
                                </h2>
                                <div id="collapseOne{{ $k }}" class="accordion-collapse collapse @if($loop->first) show @endif" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <span>
                                            {!! $item->description !!}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="faq_img">
                                    <img src="{{ asset($sitedetail->faq_banner_image) }} " alt="" >
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>
    <!-- Create Account In end -->
    
    @endsection