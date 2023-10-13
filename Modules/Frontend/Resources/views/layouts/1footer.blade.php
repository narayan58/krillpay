<footer class="footer-part footer-bg-dark">
    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="footer-logo">
                        <a href="{{ route('index') }}"><img src="{{ $sitedetail->logo }}" alt="{{ $sitedetail->title }} Logo" /></a>
                        <p style="font-style:italic; color: #C5C5C5;">- from possibility to reality -</p>
                        <ol class="flat-list">
                            @if (isset($sitedetail->facebook))
                            <li><a href="{{ $sitedetail->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            @endif
                            @if (isset($sitedetail->twitter))
                            <li><a href="{{ $sitedetail->twitter }}" target="_blank"><i
                            class="fa fa-twitter"></i></a></li>
                            @endif
                            @if (isset($sitedetail->linkedin))
                            <li><a href="{{ $sitedetail->linkedin }}"
                            target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            @endif
                            @if (isset($sitedetail->youtube))
                            <li><a href="{{ $sitedetail->youtube }}" target="_blank"><i
                            class="fa fa-youtube"></i></a></li>
                            @endif
                        </ol>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 mt-4 mt-sm-0">
                    <div class="footer-widget-item">
                        <h3>{{ $menuname['footer_name_1']->name ?? '' }}</h3>
                        <ul class="footer-widget-link">
                            @if(!empty($menulist['footermenu_1']))
                            @foreach($menulist['footermenu_1'] as $k => $item)
                            <li><a href="{{ $item['link'] }}"><i class="fa fa-chevron-right"></i> {{ $item['label'] }}</a></li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 mt-4 mt-lg-0">
                    <div class="footer-widget-item">
                        <h3>Business Hours</h3>
                        <ul class="footer-widget-office-time">
                            <li>
                                <p>Opening Day:</p>
                                <p>{{ $sitedetail->office_hour }}</p>
                            </li>
                            <li>
                                <p>Vacation:</p>
                                <p>All Saturdays</p>
                                <p>All Public Holidays</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 mt-4 mt-lg-0">
                    <div class="footer-widget-item subscribe-widget">
                        <h3>Subscribe</h3>
                        <p>Enter your email and get latest updates and offers from Forbid.</p>
                        <form id="subscribe-form">
                            @csrf
                            <input type="text" name="newslettermail" id="Email" title="Your Email ..." required
                            placeholder="Your Email ..." />
                            <a href="javascript:void(0)" id="newsLetterBtn"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </form>
                    </div>
                    <span class="text-danger" id="NewsletterEmail"></span>
                    <span class="text-success" id="success_message_news_letter"></span>
                </div>
            </div>
            <div class="row footer-icon-area">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="sin-footer-icon">
                        <div class="footer-icon">
                            <a href="tel:{{ $sitedetail->phone_no }}"><i class="fa fa-phone"></i></a>
                        </div>
                        <div class="footer-icon-text">
                            <h4>call us</h4>
                            <span>{{ $sitedetail->phone_no }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="sin-footer-icon">
                        <div class="footer-icon">
                            <a href="mailto: {{ $sitedetail->email }}"><i class="fa fa-envelope"></i></a>
                        </div>
                        <div class="footer-icon-text">
                            <h4>Email Us</h4>
                            <span>{{ $sitedetail->email }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4  col-sm-4">
                    <div class="sin-footer-icon">
                        <div class="footer-icon">
                            <a href="{{ route('contact') }}"><i class="fa fa-home"></i></a>
                        </div>
                        <div class="footer-icon-text">
                            <h4>Location</h4>
                            <span>{{ $sitedetail->address }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <p>Copyright &copy;<span> {{ $sitedetail->title }} | All rights reserved</span></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<input type="hidden" value="{{ url('/') }}" id="baseurl" name="baseurl">
<div class="backtotop">
    <i class="fa fa-angle-up backtotop_btn"></i>
</div>