@extends('admin::master')
@section('title', $page_header)
@section('content-header', $page_header)
@section('content')
<div class="card">
    <div class="card-header">{{ $page_header }}
        <div class="card-header-actions">
            <a class="card-header-action btn btn-warning" href="{{ route($link.'.index') }}">{!! VIEWLIST_ICON !!}</a>
        </div>
    </div>
    <div class="card-body">
        <form class="" method="POST" action="{{ route($link.'.store') }}">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label class="control-label" for="title">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                        @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="heading_title">Heading Title</label>
                        <input type="text" class="form-control" id="heading_title" name="heading_title" value="{{ old('heading_title') }}">
                        @if ($errors->has('heading_title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('heading_title') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="sub_title">Sub Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="sub_title" name="sub_title" value="{{ old('sub_title') }}">
                        @if ($errors->has('sub_title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('sub_title') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="description">Description <span class="text-danger">*</span></label>
                        <textarea class="tinymce" name="description">{{ old('description') }}</textarea>
                        @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label" for="req_document_desc">Required Documents</label>
                        <textarea class="tinymce" name="req_document_desc">{{ old('req_document_desc') }}</textarea>
                        @if ($errors->has('req_document_desc'))
                        <span class="help-block">
                            <strong>{{ $errors->first('req_document_desc') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="application_procedure_desc">Application Procedures</label>
                        <textarea class="tinymce" name="application_procedure_desc">{{ old('application_procedure_desc') }}</textarea>
                        @if ($errors->has('application_procedure_desc'))
                        <span class="help-block">
                            <strong>{{ $errors->first('application_procedure_desc') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="visa_procedure_fee_desc">Visa Procedure and Fees</label>
                        <textarea class="tinymce" name="visa_procedure_fee_desc">{{ old('visa_procedure_fee_desc') }}</textarea>
                        @if ($errors->has('visa_procedure_fee_desc'))
                        <span class="help-block">
                            <strong>{{ $errors->first('visa_procedure_fee_desc') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="title">Meta Title</label>
                        <input type="text" class="form-control" id="title" name="meta_title"
                            value="{{ old('meta_title') }}">
                        @if ($errors->has('meta_title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('meta_title') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="title">Meta Keywords</label>
                        <input type="text" class="form-control" id="title" name="meta_keywords"
                            value="{{ old('meta_keywords') }}">
                        @if ($errors->has('meta_keywords'))
                        <span class="help-block">
                            <strong>{{ $errors->first('meta_keywords') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="title">Meta Description</label>
                        <input type="text" class="form-control" id="title" name="meta_description"
                            value="{{ old('meta_description') }}">
                        @if ($errors->has('meta_description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('meta_description') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="country_id">Country <span class="text-danger">*</span></label>
                        <select name="country_id" id="country_id" class="form-control">
                            <option value="">Please Select Below Options</option>
                            @if(!empty($countrylist))
                            @foreach($countrylist as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                            @endif
                        </select>
                        @if ($errors->has('country_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('country_id') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label">Image <span class="text-danger">*</span></label>
                        @if(old('image') != null)
                        <img src="{{ old('image') }}" alt="" title="" class='fancybox' id="prev_img" />
                        @else
                        <img src="{{ asset('admin/images/no-image.png', $secure = null) }}" alt="" class='fancybox'
                            title="" id="prev_img" />
                        @endif
                        <a href="{{ url('/uploads/filemanager/dialog.php?type=1&field_id=image') }}"
                            data-fancybox-type="iframe" class="btn btn-info fancy">Insert</a>
                        <button class="btn btn-danger remove_box_image" type="button">Remove</button>
                        <button class="btn btn-warning prev_box_image" type="button" style="display: none;">Previous
                            Image</button>
                        <input type="hidden" value="{{ old('image') }}" name="image" class="form-control" id="image">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Banner Image <span class="text-danger">*</span></label>
                        @if(old('banner_image') != null)
                        <img src="{{ old('banner_image') }}" alt="" title="" class='fancybox' id="prev_banner_img" />
                        @else
                        <img src="{{ asset('admin/images/no-image.png', $secure = null) }}" alt="" class='fancybox' title="" id="prev_banner_img" />
                        @endif
                        <a href="{{ url('/uploads/filemanager/dialog.php?type=1&field_id=banner_image') }}"
                            data-fancybox-type="iframe" class="btn btn-info fancy">Insert</a>
                        <button class="btn btn-danger remove_box_image" type="button">Remove</button>
                        <button class="btn btn-warning prev_box_image" type="button" style="display: none;">Previous
                            Image</button>
                        <input type="hidden" value="{{ old('banner_image') }}" name="banner_image" class="form-control" id="banner_image">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1" @if(old('status') === '1') selected @endif>{!! PUBLISH !!}</option>
                            <option value="0" @if(old('status') === '0') selected @endif>{!! UNPUBLISH !!}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-danger resetbtn">Clear</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
