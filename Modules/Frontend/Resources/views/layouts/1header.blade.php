<header class="header-part">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-sm-7 col-6 text-left">
                <div class="header-item">
                    <p class="pl-0"><i class="fa fa-phone"></i> <span class="d-none d-md-inline-block">Phone:</span>
                    {{ $sitedetail->phone_no }} <span class="d-none d-xl-inline-block">;</span> {{ $sitedetail->mobile_no }}</p>
                    <p class="d-none d-md-inline-block"><i class="fa fa-clock-o"></i> <span
                    class="d-none d-sm-inline-block">We are open:</span> {{ $sitedetail->office_hour }}</p>
                </div>
            </div>
            <div class="col-sm-5 col-6 text-left text-sm-right">
                <div class="header-icon">
                    {{--                     <a href="#" id="nhp-mobile-alert" class="btn-1 d-none d-md-inline-block">Mobile Website</a>
                    --}}
                    <ul class="flat-list social-icon d-inline-block">
                        @if(isset($sitedetail->facebook))
                        <li><a href="{{ $sitedetail->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        @endif
                        @if(isset($sitedetail->twitter))
                        <li><a href="{{ $sitedetail->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a>
                    </li>
                    @endif
                    @if(isset($sitedetail->linkedin))
                    <li><a href="{{ $sitedetail->linkedin }}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                    @endif
                    @if(isset($sitedetail->youtube))
                    <li><a href="{{ $sitedetail->youtube }}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
</header>
<nav id="navigation" class="navbar navbar-expand-lg nav-bg-white">
<div class="container">
    <a class="navbar-brand" href="{{ route('index') }}"><img src="{{ $sitedetail->logo }}"
    alt="{{ $sitedetail->title }}" /></a>
    <div class="collapse navbar-collapse" id="nav-list">
        <ul class="navbar-nav ml-auto">
            @if(!empty($menulist['primarymenu']))
            @foreach($menulist['primarymenu'] as $k => $item)
            @if(!empty($item['child']))
            <li class="nav-item custom-dropdown-box">
                <a href="{{ $item['link'] }}">{{ $item['label'] }}</a>
                <ul class="dropdown-child-manu">
                    @foreach($item['child'] as $kf => $first)
                    <li><a href="{{ $first['link'] }}">{{ $first['label'] }}</a></li>
                    @endforeach
                </ul>
            </li>
            @else
            <li class="nav-item">
                <a href="{{ $item['link'] }}" class="@if(request()->url() == $item['link']) active @endif">{{ $item['label'] }}</a>
            </li>
            @endif
            @endforeach
            @endif
        </ul>
    </div>
    <button class="second-nav-toggler" type="button">
    <img src="{{ asset('frontend/images/menu.png') }}" alt="Menu" />
    </button>
</div>
</nav>
<div id="mobile-nav" data-prevent-default="true" data-mouse-events="true">
<div class="mobile-nav-box">
    <div class="mobile-logo">
        <a href="{{ route('index') }}" class="mobile-main-logo"><img src="{{ $sitedetail->logo }}"
        alt="{{ $sitedetail->title }}" /></a>
        <a href="#" class="manu-close"><img src="{{ asset('frontend/images/cancel.png') }}" alt="Close" /></a>
    </div>
    <ul class="mobile-list-nav">
        @if(!empty($menulist['sidemenu']))
        @foreach($menulist['sidemenu'] as $k => $item)
        @if(!empty($item['child']))
        <li><a href="{{ $item['link'] }}" class="dropdownlink">{{ $item['label'] }}</a>
        <ul class="submenuItems">
            @foreach($item['child'] as $kf => $first)
            <li><a href="{{ $first['link'] }}">{{ $first['label'] }}</a></li>
            @endforeach
        </ul>
    </li>
    @else
    <li><a href="{{ $item['link'] }}" class="@if(request()->url() == $item['link']) active @endif">{{ $item['label'] }}</a>
    @endif
    @endforeach
    @endif
</ul>
<div class="achivement-blog">
    <ul class="flat-list">
        @if(isset($sitedetail->facebook))
        <li>
            <a href="{{ $sitedetail->facebook }}" target="_blank">
                <i class="fa fa-facebook"></i>
            </a>
        </li>
        @endif
        @if(isset($sitedetail->twitter))
        <li>
            <a href="{{ $sitedetail->twitter }}" target="_blank">
                <i class="fa fa-twitter"></i>
            </a>
        </li>
        @endif
        @if(isset($sitedetail->linkedin))
        <li>
            <a href="{{ $sitedetail->linkedin }}" target="_blank">
                <i class="fa fa-linkedin"></i>
            </a>
        </li>
        @endif
    </ul>
</div>
</div>
</div>