@extends('frontend::layouts.master')
@section('description', $sitedetail->meta_descriptions)
@section('keywords', $sitedetail->meta_keywords)
@section('fb_image', $sitedetail->logo)
@section('fb_url', Request::url())
@section('title', $page_header)
@section('content')
    
    
 <div class="nhp-banner-c">
 <img src="{{ asset('frontend/images/appointment-banner.jpg') }}" alt="Book an Appointment"/>
    <section class="breadcrumb-part">
        <div class="container">
            <div class="row">
            <div class="col-12 text-center">
                    <div class="breadcrumb-title">
                        <h1>Book an Appointment</h1>
                        <p style="font-weight:700; margin-top: 50px;">Book an appointment with one of our expert consultant!</p>
                    </div>
                </div>
            </div>
            
        </div>
	</section>
 </div>
    
    
  <section class="contuct-bottom style-two">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                   <div class="con-bottom-inner">
                       <h6>Through <span>FACEBOOK</span></h6>
                       <div class="nec-social">
                           <ul>
                               <li><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                           </ul>

                        </div>
                        <h6>Through <span>EMAIL</span></h6>
                        <div class="nec-social">
                           <ul>
                               <li><a href="mailto: {{ $sitedetail->email }}" >{{ $sitedetail->email }}</a></li>
                           </ul>
                           
                        </div>
                        <p>Please provide the details with your preferred date and time of appointment, we will get back to you as soon as possible.</p>

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
    
@endsection