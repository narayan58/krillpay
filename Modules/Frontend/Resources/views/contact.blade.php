@extends('frontend::layouts.master')
@section('description', $sitedetail->meta_descriptions)
@section('keywords', $sitedetail->meta_keywords)
@section('fb_image', $sitedetail->logo)
@section('fb_url', Request::url())
@section('title', $page_header)
@section('content')
        <!-- Banner Section start -->
        <section class="banner-section payment contactbanner">
            <div class="overlay">
                <div class="shape-area">
                    <img src="{{ asset('frontend/assets/images/payment-illus-2.png') }}" class="obj-1" alt="image">
            
                </div>
                <div class="banner-content" style="padding:0">
                    <div class="container wow fadeInUp">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-lg-6 col-md-7">
                                <div class="main-content">
                                    <div class="top-area section-text">
                                     
                                        <h1 class="title">Contact Us</h1>
                                        <p class="xlr text-dark">Get to know us better.</p>
                                    </div>
                              
                                </div>
                            </div>

                            <div class="col-lg-6" >
                                <img src="{{ asset('frontend/assets/images/contact.png') }}" alt="" style="padding-top: 50px">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- Banner Section end -->

       <!-- Apply for a loan In start -->
       <section class="apply-for-loan contact">
        <div class="overlay pt-120 pb-120">
            <div class="container wow fadeInUp">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-header text-center">
                            <h2 class="title">Get in touch with us.</h2>
                            <p class="text-dark">Fill up the form and our team will get back to you within 24 hours</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="form-content">
                            <form id="contact_us_form">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="single-input">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" placeholder="What's your name?">
                                            <span class="text-danger" id="error_name"></span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="single-input">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" placeholder="What's your email?">
                                            <span class="text-danger" id="error_email"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="single-input">
                                            <label for="phone">Phone</label>
                                            <input type="text" name="phone" placeholder="(123) 480 - 3540">
                                            <span class="text-danger" id="error_phone"></span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="single-input">
                                            <label for="loan">Service interested in</label>
                                            <input type="text" name="service" placeholder="Ex. Auto Loan, Home Loan">
                                            <span class="text-danger" id="error_service"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="single-input">
                                            <label for="message">Message</label>
                                            <textarea id="contact_message" name="message" placeholder="I would like to get in touch with you..." cols="30" rows="10"></textarea>
                                            <span class="text-danger" id="error_message"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-area text-center">
                                    <button class="cmn-btn" id="contact_us_btn">Send Message</button>
                                    <p class="text-success" id="contact_success"></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Apply for a loan In end -->
@endsection