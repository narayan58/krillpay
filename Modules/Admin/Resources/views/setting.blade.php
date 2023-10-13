@extends('admin::master')
@section('title', $page_header)
@section('content-header', $page_header)
@section('content')
<div class="card">
	<form class="" method="POST" action="{{ route('update.setting') }}">
		{{ csrf_field() }}
		<div class="card-header">{{ $page_header }}
			<div class="card-header-actions">
				<button type="submit" class="btn btn-success btn-sm">Submit</button>
			</div>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col">
					<ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="tab-basic-info" data-toggle="pill" href="#pills-basic" role="tab" aria-controls="pills-basic" aria-selected="true">Basic Information</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="tab-social" data-toggle="pill" href="#pills-social" role="tab" aria-controls="pills-social" aria-selected="false">Social</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="tab-metatags" data-toggle="pill" href="#pills-metatags" role="tab" aria-controls="pills-metatags" aria-selected="false">Meta Tags</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="tab-others" data-toggle="pill" href="#pills-others" role="tab" aria-controls="pills-others" aria-selected="false">Others</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="tab-homepage" data-toggle="pill" href="#pills-homepage" role="tab" aria-controls="pills-homepage" aria-selected="false">Homepage</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="tab-banner_settings" data-toggle="pill" href="#pills-banner_settings" role="tab" aria-controls="pills-banner_settings" aria-selected="false">Banner Settings</a>
						</li>
					</ul>
					<div class="tab-content" id="pills-tabContent">

						<div class="tab-pane fade show active" id="pills-basic" role="tabpanel" aria-labelledby="tab-basic-info">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="title">Title</label>
										<input type="text" class="form-control" id="title" name="title" value="{{ $settingdata->title }}" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="address">Address (English)</label>
										<input type="text" class="form-control" id="address" name="address" value="{{ $settingdata->address }}" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="mobile_no">Mobile Number</label>
										<input type="text" class="form-control" id="mobile_no" name="mobile_no" value="{{ $settingdata->mobile_no }}" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="phone_no">Phone Number</label>
										<input type="text" class="form-control" id="phone_no" name="phone_no" value="{{ $settingdata->phone_no }}" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="fax_no">Fax Number</label>
										<input type="text" class="form-control" id="fax_no" name="fax_no" value="{{ $settingdata->fax_no }}" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="email">Email</label>
										<input type="text" class="form-control" id="email" name="email" value="{{ $settingdata->email }}" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="checkmail">Check Mail Url</label>
										<input type="text" class="form-control" id="checkmail" name="checkmail" value="{{ $settingdata->checkmail }}" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="office_hour">Office Hour</label>
										<input type="text" class="form-control" id="office_hour" name="office_hour" value="{{ $settingdata->office_hour }}" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="viber">App link</label>
										<input type="text" class="form-control" id="app_link" name="app_link" value="{{ $settingdata->app_link }}" >
									</div>
								</div>
								{{-- <div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="viber">Viber</label>
										<input type="text" class="form-control" id="viber" name="viber" value="{{ $settingdata->viber }}" >
									</div>
								</div> --}}
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="messenger">Messenger</label>
										<input type="text" class="form-control" id="messenger" name="messenger" value="{{ $settingdata->messenger }}" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="whatsapp_number">Whatsapp Number</label>
										<input type="text" class="form-control" id="whatsapp_number" name="whatsapp_number" value="{{ $settingdata->whatsapp_number }}" >
									</div>
								</div>
								
								<div class="col-md-3">
									<div class="form-group">
										<label for="logo">Logo</label>
										@if(!empty($settingdata->logo))
										<img src="<?php echo $settingdata->logo ?>" class="fancybox" id="prev_logo_img" />
										@else
										<img src="{{ asset('admin/images/no-image.png', $secure = null) }}" class="fancybox" id="prev_logo_img" />
										@endif
										<a href="{{ url('/uploads/filemanager/dialog.php?type=1&field_id=logo') }}" data-fancybox-type="iframe" class="btn btn-info fancy">Insert</a>
										<button class="btn btn-danger remove_box_image" type="button">Remove</button>
										<input type="hidden" value="{{ isset($settingdata->logo)?$settingdata->logo:'' }}"  name="logo" class="form-control" id="logo">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="main_banner_image">Banner Image</label>
										@if(!empty($settingdata->main_banner_image))
										<img src="<?php echo $settingdata->main_banner_image ?>" class="fancybox" id="prev_main_banner_img" />
										@else
										<img src="{{ asset('admin/images/no-image.png', $secure = null) }}" class="fancybox" id="prev_main_banner_img" />
										@endif
										<a href="{{ url('/uploads/filemanager/dialog.php?type=1&field_id=main_banner_image') }}" data-fancybox-type="iframe" class="btn btn-info fancy">Insert</a>
										<button class="btn btn-danger remove_box_image" type="button">Remove</button>
										<input type="hidden" value="{{ isset($settingdata->main_banner_image)?$settingdata->main_banner_image:'' }}"  name="main_banner_image" class="form-control" id="main_banner_image">
									</div>
								</div>
								{{-- <div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="map_detail">Map Area</label>
										<textarea class="form-control" id="map_detail" rows="4" cols="2" name="map_detail">{{ $settingdata->map_detail }}</textarea>
									</div>
								</div> --}}
							</div>
						</div>

						<div class="tab-pane fade" id="pills-social" role="tabpanel" aria-labelledby="tab-social">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="facebook">Facebook</label>
										<input type="text" class="form-control" id="facebook" name="facebook" value="{{ $settingdata->facebook }}" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="twitter">Twitter</label>
										<input type="text" class="form-control" id="twitter" name="twitter" value="{{ $settingdata->twitter }}" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="google_plus">Google Plus</label>
										<input type="text" class="form-control" id="google_plus" name="google_plus" value="{{ $settingdata->google_plus }}" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="skype">Skype</label>
										<input type="text" class="form-control" id="skype" name="skype" value="{{ $settingdata->skype }}" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="linkedin">Linkedin</label>
										<input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ $settingdata->linkedin }}" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="youtube">YouTube</label>
										<input type="text" class="form-control" id="youtube" name="youtube" value="{{ $settingdata->youtube }}" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="instagram">Instagram</label>
										<input type="text" class="form-control" id="instagram" name="instagram" value="{{ $settingdata->instagram }}" >
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane fade" id="pills-metatags" role="tabpanel" aria-labelledby="tab-metatags">
							<div class="form-group">
								<label class="control-label" for="meta_keywords">Meta Keywords</label>
								<input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="{{ $settingdata->meta_keywords }}" >
							</div>
							<div class="form-group">
								<label class="control-label" for="meta_descriptions">Meta Descriptions</label>
								<textarea class="form-control" id="meta_descriptions" rows="10" cols="20" name="meta_descriptions">{{ $settingdata->meta_descriptions }}</textarea>
							</div>
						</div>

						<div class="tab-pane fade" id="pills-others" role="tabpanel" aria-labelledby="tab-others">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="map_detail">Service Header Content</label>
										<textarea class="form-control" id="map_detail" rows="4" cols="2" name="service_header">{{ $settingdata->service_header }}</textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="map_detail">Download Header Content</label>
										<textarea class="form-control" id="map_detail" rows="4" cols="2" name="download_header">{{ $settingdata->download_header }}</textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="map_detail">Testimonial Header Content</label>
										<textarea class="form-control" id="map_detail" rows="4" cols="2" name="testimonial_header">{{ $settingdata->testimonial_header }}</textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="map_detail">Ready to start header Content</label>
										<textarea class="form-control" id="map_detail" rows="4" cols="2" name="ready_to_start">{{ $settingdata->ready_to_start }}</textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="map_detail">Who we are header Content</label>
										<textarea class="form-control" id="map_detail" rows="4" cols="2" name="who_we_are_header">{{ $settingdata->who_we_are_header }}</textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="map_detail">Our value header Content</label>
										<textarea class="form-control" id="map_detail" rows="4" cols="2" name="our_value_header">{{ $settingdata->our_value_header }}</textarea>
									</div>
								</div>
								{{-- <div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="map_detail">Footer Content</label>
										<textarea class="form-control" id="map_detail" rows="4" cols="2" name="footer_content">{{ $settingdata->footer_content }}</textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="map_detail">Contact Us text</label>
										<textarea class="form-control" id="map_detail" rows="4" cols="2" name="contact_us_txt">{{ $settingdata->contact_us_txt }}</textarea>
									</div>
								</div> --}}
								{{-- <div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="map_detail">Partner text</label>
										<textarea class="form-control" id="map_detail" rows="4" cols="2" name="partner_text">{{ $settingdata->partner_text }}</textarea>
									</div>
								</div> --}}
								{{-- <div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="map_detail">Team header text</label>
										<textarea class="form-control" id="map_detail" rows="4" cols="2" name="team_text">{{ $settingdata->team_text }}</textarea>
									</div>
								</div> --}}
								{{-- <div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="map_detail">Our value text header</label>
										<textarea class="form-control" id="map_detail" rows="4" cols="2" name="core_value_text">{{ $settingdata->core_value_text }}</textarea>
									</div>
								</div> --}}
								{{-- <div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="consultant_text">Consultant Text</label>
										<textarea class="form-control" id="consultant_text" rows="4" cols="2" name="consultant_text">{{ $settingdata->consultant_text }}</textarea>
									</div>
								</div> --}}
							</div>
						</div>

						<div class="tab-pane fade" id="pills-homepage" role="tabpanel" aria-labelledby="tab-homepage">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="homepage_first_section_title">Homepage First Section Title</label>
										<input type="text" class="form-control" id="homepage_first_section_title" name="homepage_first_section_title" value="{{ $settingdata->homepage_first_section_title }}" >
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="homepage_first_section_desc">Homepage First Section Title</label>
										<textarea class="form-control" id="homepage_first_section_desc" rows="4" cols="2" name="homepage_first_section_desc">{{ $settingdata->homepage_first_section_desc }}</textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="wwr_video_url">About Us Video Url</label>
										<input type="text" class="form-control" id="wwr_video_url" name="wwr_video_url" value="{{ $settingdata->wwr_video_url }}" >
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="employees_number">Employees Number</label>
										<input type="text" class="form-control" id="employees_number" name="employees_number" value="{{ $settingdata->employees_number }}" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="office_no">No. of office</label>
										<input type="text" class="form-control" id="office_no" name="office_no" value="{{ $settingdata->office_no }}" >
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="volumn_no">Volumn Number</label>
										<input type="text" class="form-control" id="volumn_no" name="volumn_no" value="{{ $settingdata->volumn_no }}" >
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="customer_satisfaction">Customer satisfaction (in %)</label>
										<input type="text" class="form-control" id="customer_satisfaction" name="customer_satisfaction" value="{{ $settingdata->customer_satisfaction }}" >
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="active_user">Active User</label>
										<input type="text" class="form-control" id="active_user" name="active_user" value="{{ $settingdata->active_user }}" >
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="new_user_per_week">User Per Week</label>
										<input type="text" class="form-control" id="new_user_per_week" name="new_user_per_week" value="{{ $settingdata->new_user_per_week }}" >
									</div>
								</div>

								{{-- <div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="volumn_no">Call to Action Text</label>
										<textarea class="form-control" id="volumn_no" rows="4" cols="2" name="volumn_no">{{ $settingdata->volumn_no }}</textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="study_abroad_title">Study Abroad Title</label>
										<input type="text" class="form-control" id="study_abroad_title" name="study_abroad_title" value="{{ $settingdata->study_abroad_title }}" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="study_abroad_text">Study Abroad Text</label>
										<textarea class="form-control" id="study_abroad_text" rows="4" cols="2" name="study_abroad_text">{{ $settingdata->study_abroad_text }}</textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="why_choose_title">Why Choose Title</label>
										<input type="text" class="form-control" id="why_choose_title" name="why_choose_title" value="{{ $settingdata->why_choose_title }}" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="why_choose_text">Why Choose Text</label>
										<textarea class="form-control" id="why_choose_text" rows="4" cols="2" name="why_choose_text">{{ $settingdata->why_choose_text }}</textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="years_of_experience">Years of Experience</label>
										<input type="number" class="form-control" id="years_of_experience" name="years_of_experience" value="{{ $settingdata->years_of_experience }}" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="countries">Countries</label>
										<input type="number" class="form-control" id="countries" name="countries" value="{{ $settingdata->countries }}" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="universities">Universities</label>
										<input type="number" class="form-control" id="universities" name="universities" value="{{ $settingdata->universities }}" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="success_stories">Success Stories</label>
										<input type="number" class="form-control" id="success_stories" name="success_stories" value="{{ $settingdata->success_stories }}" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="visa_success_ratio_text">Visa Success Ratio Text</label>
										<textarea class="form-control" id="visa_success_ratio_text" rows="4" cols="2" name="visa_success_ratio_text">{{ $settingdata->visa_success_ratio_text }}</textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="how_we_work_text">How we Work Text</label>
										<textarea class="form-control" id="how_we_work_text" rows="4" cols="2" name="how_we_work_text">{{ $settingdata->how_we_work_text }}</textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="testimonial_title">Testimonial Title</label>
										<input type="text" class="form-control" id="testimonial_title" name="testimonial_title" value="{{ $settingdata->testimonial_title }}" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="testimonial_text">Testimonial Text</label>
										<textarea class="form-control" id="testimonial_text" rows="4" cols="2" name="testimonial_text">{{ $settingdata->testimonial_text }}</textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="authorization_title">Authorization Title</label>
										<input type="text" class="form-control" id="authorization_title" name="authorization_title" value="{{ $settingdata->authorization_title }}" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="authorization_text">Authorization Text</label>
										<textarea class="form-control" id="authorization_text" rows="4" cols="2" name="authorization_text">{{ $settingdata->authorization_text }}</textarea>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="authorization_bg_image">Authorization Background image</label>
										@if(!empty($settingdata->authorization_bg_image))
										<img src="<?php echo $settingdata->authorization_bg_image ?>" class="fancybox" id="prev_authorization_bg_img" />
										@else
										<img src="{{ asset('admin/images/no-image.png', $secure = null) }}" class="fancybox" id="prev_authorization_bg_img" />
										@endif
										<a href="{{ url('/uploads/filemanager/dialog.php?type=1&field_id=authorization_bg_image') }}" data-fancybox-type="iframe" class="btn btn-info fancy">Insert</a>
										<button class="btn btn-danger remove_box_image" type="button">Remove</button>
										<input type="hidden" value="{{ isset($settingdata->authorization_bg_image)?$settingdata->authorization_bg_image:'' }}"  name="authorization_bg_image" class="form-control" id="authorization_bg_image">
									</div>
								</div>
								<div class="col-md-3">
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="event_title">Event Title</label>
										<input type="text" class="form-control" id="event_title" name="event_title" value="{{ $settingdata->event_title }}" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="event_text">Event Text</label>
										<textarea class="form-control" id="event_text" rows="4" cols="2" name="event_text">{{ $settingdata->event_text }}</textarea>
									</div>
								</div> --}}
							</div>
						</div>

						<div class="tab-pane fade" id="pills-banner_settings" role="tabpanel" aria-labelledby="tab-banner_settings">
							<div class="row">
							{{-- 	<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="universities_banner_text">Universities Banner Text</label>
										<input type="text" class="form-control" id="universities_banner_text" name="universities_banner_text" value="{{ $settingdata->universities_banner_text }}" >
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="why_choose_banner_text">Why Choose Banner Text</label>
										<input type="text" class="form-control" id="why_choose_banner_text" name="why_choose_banner_text" value="{{ $settingdata->why_choose_banner_text }}" >
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="testimonial_banner_text">Testimonials Banner Text</label>
										<input type="text" class="form-control" id="testimonial_banner_text" name="testimonial_banner_text" value="{{ $settingdata->testimonial_banner_text }}" >
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="event_banner_text">Event Banner Text</label>
										<input type="text" class="form-control" id="event_banner_text" name="event_banner_text" value="{{ $settingdata->event_banner_text }}" >
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="faq_banner_text">Faq Banner Text</label>
										<input type="text" class="form-control" id="faq_banner_text" name="faq_banner_text" value="{{ $settingdata->faq_banner_text }}" >
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="scholarship_offer_banner_text">Scholarship Offer Banner Text</label>
										<input type="text" class="form-control" id="scholarship_offer_banner_text" name="scholarship_offer_banner_text" value="{{ $settingdata->scholarship_offer_banner_text }}" >
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="branch_banner_text">Branch Banner Text</label>
										<input type="text" class="form-control" id="branch_banner_text" name="branch_banner_text" value="{{ $settingdata->branch_banner_text }}" >
									</div>
								</div>
								
								<div class="col-md-6">
								</div> --}}
								
								<div class="col-md-3">
									<div class="form-group">
										<label for="homepage_first_banner_image">Homepage First Banner image</label>
										@if(!empty($settingdata->homepage_first_banner_image))
										<img src="<?php echo $settingdata->homepage_first_banner_image ?>" class="fancybox" id="prev_universities_banner_img" />
										@else
										<img src="{{ asset('admin/images/no-image.png', $secure = null) }}" class="fancybox" id="prev_universities_banner_img" />
										@endif
										<a href="{{ url('/uploads/filemanager/dialog.php?type=1&field_id=homepage_first_banner_image') }}" data-fancybox-type="iframe" class="btn btn-info fancy">Insert</a>
										<button class="btn btn-danger remove_box_image" type="button">Remove</button>
										<input type="hidden" value="{{ isset($settingdata->homepage_first_banner_image)?$settingdata->homepage_first_banner_image:'' }}"  name="homepage_first_banner_image" class="form-control" id="homepage_first_banner_image">
									</div>
								</div>
								
								
								<div class="col-md-3">
									<div class="form-group">
										<label for="mobile_app_image">Mobile App Image</label>
										@if(!empty($settingdata->mobile_app_image))
										<img src="<?php echo $settingdata->mobile_app_image ?>" class="fancybox" id="prev_why_choose_banner_img" />
										@else
										<img src="{{ asset('admin/images/no-image.png', $secure = null) }}" class="fancybox" id="prev_why_choose_banner_img" />
										@endif
										<a href="{{ url('/uploads/filemanager/dialog.php?type=1&field_id=mobile_app_image') }}" data-fancybox-type="iframe" class="btn btn-info fancy">Insert</a>
										<button class="btn btn-danger remove_box_image" type="button">Remove</button>
										<input type="hidden" value="{{ isset($settingdata->mobile_app_image)?$settingdata->mobile_app_image:'' }}"  name="mobile_app_image" class="form-control" id="mobile_app_image">
									</div>
								</div>
								
								<div class="col-md-3">
									<div class="form-group">
										<label for="faq_banner_image">FAQ Banner Image</label>
										@if(!empty($settingdata->faq_banner_image))
										<img src="<?php echo $settingdata->faq_banner_image ?>" class="fancybox" id="prev_testimonial_banner_img" />
										@else
										<img src="{{ asset('admin/images/no-image.png', $secure = null) }}" class="fancybox" id="prev_testimonial_banner_img" />
										@endif
										<a href="{{ url('/uploads/filemanager/dialog.php?type=1&field_id=faq_banner_image') }}" data-fancybox-type="iframe" class="btn btn-info fancy">Insert</a>
										<button class="btn btn-danger remove_box_image" type="button">Remove</button>
										<input type="hidden" value="{{ isset($settingdata->faq_banner_image)?$settingdata->faq_banner_image:'' }}"  name="faq_banner_image" class="form-control" id="faq_banner_image">
									</div>
								</div>
								
								<div class="col-md-3">
									<div class="form-group">
										<label for="event_banner_image">Event Banner image</label>
										@if(!empty($settingdata->event_banner_image))
										<img src="<?php echo $settingdata->event_banner_image ?>" class="fancybox" id="prev_event_banner_img" />
										@else
										<img src="{{ asset('admin/images/no-image.png', $secure = null) }}" class="fancybox" id="prev_event_banner_img" />
										@endif
										<a href="{{ url('/uploads/filemanager/dialog.php?type=1&field_id=event_banner_image') }}" data-fancybox-type="iframe" class="btn btn-info fancy">Insert</a>
										<button class="btn btn-danger remove_box_image" type="button">Remove</button>
										<input type="hidden" value="{{ isset($settingdata->event_banner_image)?$settingdata->event_banner_image:'' }}"  name="event_banner_image" class="form-control" id="event_banner_image">
									</div>
								</div>
								
								{{-- <div class="col-md-3">
									<div class="form-group">
										<label for="faq_banner_image">Faq Banner image</label>
										@if(!empty($settingdata->faq_banner_image))
										<img src="<?php echo $settingdata->faq_banner_image ?>" class="fancybox" id="prev_faq_banner_img" />
										@else
										<img src="{{ asset('admin/images/no-image.png', $secure = null) }}" class="fancybox" id="prev_faq_banner_img" />
										@endif
										<a href="{{ url('/uploads/filemanager/dialog.php?type=1&field_id=faq_banner_image') }}" data-fancybox-type="iframe" class="btn btn-info fancy">Insert</a>
										<button class="btn btn-danger remove_box_image" type="button">Remove</button>
										<input type="hidden" value="{{ isset($settingdata->faq_banner_image)?$settingdata->faq_banner_image:'' }}"  name="faq_banner_image" class="form-control" id="faq_banner_image">
									</div>
								</div> --}}
								
								{{-- <div class="col-md-3">
									<div class="form-group">
										<label for="scholarship_offer_banner_image">Get Start Banner image</label>
										@if(!empty($settingdata->get_start_banner_image))
										<img src="<?php echo $settingdata->get_start_banner_image ?>" class="fancybox" id="prev_scholarship_offer_banner_img" />
										@else
										<img src="{{ asset('admin/images/no-image.png', $secure = null) }}" class="fancybox" id="prev_scholarship_offer_banner_img" />
										@endif
										<a href="{{ url('/uploads/filemanager/dialog.php?type=1&field_id=get_start_banner_image') }}" data-fancybox-type="iframe" class="btn btn-info fancy">Insert</a>
										<button class="btn btn-danger remove_box_image" type="button">Remove</button>
										<input type="hidden" value="{{ isset($settingdata->get_start_banner_image)?$settingdata->get_start_banner_image:'' }}"  name="get_start_banner_image" class="form-control" id="get_start_banner_image">
									</div>
								</div>
								
								<div class="col-md-3">
									<div class="form-group">
										<label for="branch_banner_image">Branch Banner image</label>
										@if(!empty($settingdata->branch_banner_image))
										<img src="<?php echo $settingdata->branch_banner_image ?>" class="fancybox" id="prev_branch_banner_img" />
										@else
										<img src="{{ asset('admin/images/no-image.png', $secure = null) }}" class="fancybox" id="prev_branch_banner_img" />
										@endif
										<a href="{{ url('/uploads/filemanager/dialog.php?type=1&field_id=branch_banner_image') }}" data-fancybox-type="iframe" class="btn btn-info fancy">Insert</a>
										<button class="btn btn-danger remove_box_image" type="button">Remove</button>
										<input type="hidden" value="{{ isset($settingdata->branch_banner_image)?$settingdata->branch_banner_image:'' }}"  name="branch_banner_image" class="form-control" id="branch_banner_image">
									</div>
								</div> --}}
								
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</form>
</div>
@push('script')
<script>
$(document).ready(function(){
    $('a[data-toggle="pill"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#pills-tab a[href="' + activeTab + '"]').tab('show');
    }
});
</script>
@endpush
@endsection