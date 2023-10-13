@extends('frontend::layouts.master')
@section('description', $sitedetail->meta_descriptions)
@section('keywords', $sitedetail->meta_keywords)
@section('fb_image', $sitedetail->logo)
@section('fb_url', Request::url())
@section('title', $page_header)
@section('content')
<div class="nhp-banner-c">
 <img src="{{ isset($sitedetail->branch_banner_image) ? asset($sitedetail->branch_banner_image) : $sitedetail->main_banner_image }}" alt="{{ $page_header }}"/>
    <section class="breadcrumb-part">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-title">
                        <h1>{{ $page_header }}</h1>
                        <p style="color:#fff; font-weight:700; margin-top: 20px;">{{ $sitedetail->branch_banner_text }}</p>
                    </div>
                </div>
            </div>
            <div class="breadcrumb-link">
                <ul class="flat-list">
                    <li><a href="index-2.html">Home</a></li>
                    <li><a href="{{ route('branch') }}">{{ $page_header }}</a></li>
                </ul>
            </div>
        </div>
	</section>
</div>
    
<section class="gallery-block cards-gallery">
    <div class="container">
        <div class="heading">
            <h2>{{ $page_header }}</h2>
        </div>
        <div class="row">
            @if($list->isNotEmpty())
            @foreach($list as $item)
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 transform-on-hover">
                    <a class="lightbox" href="#">
                        <img src="{{ isset($item->image) ? asset($item->image) : $sitedetail->logo }}" alt="{{ $item->title }}" class="card-img-top"/>
                    </a>
                    <div class="card-body">
                        <h6><a href="#">{{ $item->title }}</a></h6>
                        <p class="text-muted card-text">{!! $item->address !!}</p>
                        <p class="text-muted card-text">{{ $item->contact_no }}</p>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@endsection
@push('script')
<script src="{{ asset('frontend/scripts/baguetteBox.min.js') }}"></script>
<script>
    baguetteBox.run('.cards-gallery', { animation: 'slideIn'});
</script>
@endpush