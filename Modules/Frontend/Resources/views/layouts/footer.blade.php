<!-- Get Start In start -->
<section class="get-start wow fadeInUp mt-150">
    <div class="overlay">
        <div class="container">
            <div class="col-12">
                <div class="get-content">
                    <div class="section-text">
                        <h3 class="title text-white">Ready to get started?</h3>
                        <p class="text-white">{!! $sitedetail->ready_to_start !!}</p>
                    </div>
                    <a data-toggle="modal" data-target="#demoModal1" class="cmn-btn join-mail1" style="cursor: pointer;">Join our mailing list</a>
<!--                     <a href="{{ route('contact') }}" class="cmn-btn green-btn">Join our mailing list</a>
-->                    <img src="{{ asset('frontend/assets/images/get-start.png') }}" alt="images">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Get Start In end -->

<div class="modal fade "   id="demoModal1"  tabindex="-1" role="dialog"
         aria-labelledby="demoModal1" aria-hidden="true">
        <div class="modal-dialog   modal-dialog-centered  " role="document">
            <div class="modal-content">
                <button type="button" class="close light" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body" style="background-image: url('https://images.unsplash.com/photo-1536147116438-62679a5e01f2?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80')">
                    <div  >
                        <div class="px-sm-4 py-sm-4 ">
                            <div class=" bg-light rounded px-4 py-4">
                                <div class="text-center" >
                                    <img src="{{asset('frontend/assets/images/gift.svg') }}" alt="">
                                </div>
                                <h2 class="pt-sm-3 text-center">Join our Mailing List</h2>
                              <!--  <p class="text-muted text-center">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                </p>-->
                                <form id="subscribe-form1">
                                        @csrf
                                        <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" placeholder="Enter Name">
                                        <span id="newsNameError1" class="text-danger"></span>

                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                        <span id="NewsletterEmail1" class="text-danger"></span>

                                    </div>

                                    <button id="newsLetterBtn1" class="btn cmn-btn btn-block btn-cta w-100 mt-4">Subscribe</button>
<!--                                    <button id="hey" class="btn cmn-btn btn-block btn-cta w-100 mt-4">Subscribe</button>
-->                                </form>
                                 <span class="text-success" id="success_message_news_letter1"></span>
                           
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
<!-- Footer Area Start -->
<div class="footer-section">
    <div class="container">
        <div class="row cus-mar pt-120 pb-120 justify-content-between wow fadeInUp">
            <div class="col-xl-3 col-lg-3 col-md-4 col-6">
                <div class="footer-box">
                    <a href="{{ route('index') }}" class="logo">
                        <img src="{{ asset($sitedetail->logo) }}" alt="{{ $sitedetail->title }}" title="{{ $sitedetail->title }}">
                    </a>
                    <div class="social_icons d-flex mt-4">
                        @if (isset($sitedetail->facebook))
                        <a href="{{ $sitedetail->facebook }}" target="_blank">
                            <img src="{{ asset('frontend/assets/images/facebook 1.png') }}" alt="">
                        </a>
                        @endif

                        @if (isset($sitedetail->twitter))
                        <a href="{{ $sitedetail->twitter }}" target="_blank" class="ms-3">
                            <img src="{{ asset('frontend/assets/images/twitter 1.png') }}" alt="">
                        </a>
                        @endif

                        @if (isset($sitedetail->instagram))
                        <a href="{{ $sitedetail->instagram }}" target="_blank" class="ms-3">
                            <img src="{{ asset('frontend/assets/images/instagram 1.png') }}" alt="">
                        </a>
                        @endif

                        @if (isset($sitedetail->youtube))
                        <a href="{{ $sitedetail->youtube }}" target="_blank" class="ms-3">
                            <img src="{{ asset('frontend/assets/images/youtube (1)') }} 1.png" alt="">
                        </a>
                        @endif
                    </div>
                    
                </div>
            </div>
           <!-- <div class="col-xl-2 col-lg-2 col-6">
                <div class="footer-box">
                    <h5>Company</h5>
                    <ul class="footer-link">
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="about.html">Awards</a></li>
                        <li><a href="career-single.html">Careers</a></li>
                    </ul>
                </div>
            </div>-->
           <div class="col-xl-3 col-lg-3 col-6">
                <div class="footer-box">
                    <h5>Company</h5>
                    <ul class="footer-link">
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="https://app.termly.io/document/privacy-policy/a7d71276-1bc0-4599-86d1-4bcb3b34fa1b" target=_blank>Privacy Policy</a></li>
                        <li><a href="https://app.termly.io/document/terms-of-use-for-website/bf75279c-125e-4b41-93bf-7a810b0ccfa9" target="_blank">Terms and Condition</a></li>
                        {{-- <li><a href="{{ route('page.detail','privacy-policy') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('page.detail','terms-and-conditions') }}">Terms and Condition</a></li> --}}
                        <li><a href="{{ route('faq')}}">FAQs</a></li>
                    </ul>
                </div>
            </div>
           <!-- <div class="col-xl-2 col-lg-2 col-6">
                <div class="footer-box">
                    <h5>Useful Links</h5>
                    <ul class="footer-link">
                        <li><a href="product.html">Products</a></li>
                        <li><a href="business-loan.html">Business Loan</a></li>
                        <li><a href="affiliate.html">Affiliate Program</a></li>
                        <li><a href="blog-list.html">Blog</a></li>
                    </ul>
                </div>
            </div>-->
            <div class="col-xl-3 col-lg-3 col-6">
                <div class="footer-box">
                    <h5>Support</h5>
                    <ul class="footer-link">
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-12">
                    <div class="left" style="margin-bottom:20px;">
                        <p class="text-dark"> © <?php echo date('Y') ?> {{ $sitedetail->title }}. All Rights Reserved.</p>
                    </div>
                   <!-- <div class="right">
                        <a href="privacy-policy.html" class="cus-bor mr-2">Privacy </a>
                        <a href="terms-conditions.html" class="ms-3">Terms &amp; Condition </a>
                    </div>-->
            </div>
        </div>
    </div>
    
</div>
<!-- Footer Area End -->