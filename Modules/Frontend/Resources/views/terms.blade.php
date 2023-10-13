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
                                <h3 class="text-white">Terms And Conditions</h3>
                      
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
                        <div class="top-wrapper">
                            
                            <h4>Background</h4>
                            
                      <p class="text-dark">
                          We provide economic infrastructure for the internet. Businesses of all sizes use our software and services to accept payments and manage their businesses online. Stripe cares about the security and privacy of the personal data that is entrusted to us.

This Privacy Policy (“Policy”) describes the “Personal Data” that we collect about you, how we use it, how we share it, your rights and choices, and how you can contact us about our privacy practices. This Policy also outlines your data subject rights, including the right to object to some uses of your Personal Data by us. Please visit the Stripe Privacy Center for more information about our privacy practices.

“Stripe”, “we”, “our” or “us” means the Stripe entity responsible for the collection and use of personal data under this Privacy Policy. It differs depending on your country. Learn more.

“Personal Data” means any information that relates to an identified or identifiable individual, and can include information about how you engage with our Services (e.g. device information, IP address).

“Services” means the products and services that Stripe indicates are covered by this Policy, which may include Stripe-provided devices and apps. Our “Business Services” are Services provided by Stripe to entities (“Business Users”) who directly and indirectly provide us with “End Customer” Personal Data in connection with those Business Users’ own business and activities. Our “End User Services” are those Services which Stripe directs to individuals (rather than entities) so that those individuals do business directly with Stripe. “Sites” means Stripe.com and the other websites that Stripe indicates are covered by this Policy. Collectively, we refer to Sites, Business Services and End User Services as “Services”.


                          
                          
                      </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Create Account In end -->
    
    @endsection