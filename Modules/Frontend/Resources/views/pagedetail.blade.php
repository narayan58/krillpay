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
                                <h3 class="text-white">{{$detail->title}}</h3>
                      
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner-section end -->

    <!-- Privacy Content In start -->
    <section class="privacy-content terms">
        <div class="overlay pt-60 pb-60">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="top-wrapper text-dark termsPages">
                            
<!--                            <h4>Background</h4>
-->                            
                      <p>{!!$detail->description!!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Create Account In end -->
    
    @endsection