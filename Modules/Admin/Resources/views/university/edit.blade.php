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
        <form class="" method="POST" action="{{ route($link.'.update', $record->id) }} ">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label class="control-label" for="title">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $record->title }}">
                        @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="location">Location <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="location" name="location" value="{{ old('location') ?? $record->location }}">
                        @if ($errors->has('location'))
                        <span class="help-block">
                            <strong>{{ $errors->first('location') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="description">Description <span class="text-danger">*</span></label>
                        <textarea class="tinymce" name="description">{{ old('description') ?? $record->description }}</textarea>
                        @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="facts_and_figure">Facts and Figure </label>
                        <textarea class="tinymce" name="facts_and_figure">{{ old('facts_and_figure') ?? $record->facts_and_figure }}</textarea>
                        @if ($errors->has('facts_and_figure'))
                        <span class="help-block">
                            <strong>{{ $errors->first('facts_and_figure') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="finance_and_intake">Finance and Intake </label>
                        <textarea class="tinymce" name="finance_and_intake">{{ old('finance_and_intake') ?? $record->finance_and_intake }}</textarea>
                        @if ($errors->has('finance_and_intake'))
                        <span class="help-block">
                            <strong>{{ $errors->first('finance_and_intake') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="facebook_link">Facebook Link</label>
                        <input type="text" class="form-control" id="facebook_link" name="facebook_link" value="{{ old('facebook_link') ?? $record->facebook_link }}">
                        @if ($errors->has('facebook_link'))
                        <span class="help-block">
                            <strong>{{ $errors->first('facebook_link') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="website_link">Website Link</label>
                        <input type="text" class="form-control" id="website_link" name="website_link" value="{{ old('website_link') ?? $record->website_link }}">
                        @if ($errors->has('website_link'))
                        <span class="help-block">
                            <strong>{{ $errors->first('website_link') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="twitter_link">Twitter Link</label>
                        <input type="text" class="form-control" id="twitter_link" name="twitter_link" value="{{ old('twitter_link') ?? $record->twitter_link }}">
                        @if ($errors->has('twitter_link'))
                        <span class="help-block">
                            <strong>{{ $errors->first('twitter_link') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="youtube_link">Youtube Link</label>
                        <input type="text" class="form-control" id="youtube_link" name="youtube_link" value="{{ old('youtube_link') ?? $record->youtube_link }}">
                        @if ($errors->has('youtube_link'))
                        <span class="help-block">
                            <strong>{{ $errors->first('youtube_link') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="country_id">Country</label>
                        <select name="country_id" id="country_id" class="form-control">
                            <option value="">Select Options</option>
                            @if($countries->isNotEmpty())
                            @foreach($countries as $item)
                            <option value="{{ $item->id }}" @if(old('country_id') ?? $record->country_id === $item->id) selected @endif>{{ $item->title }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="video_url">Video Url</label>
                        <input type="text" class="form-control" id="video_url" name="video_url" value="{{ old('video_url') ?? $record->video_url }}">
                        @if ($errors->has('video_url'))
                        <span class="help-block">
                            <strong>{{ $errors->first('video_url') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label">Banner Image <span class="text-danger">*</span></label>
                        @if(isset($record->image) || old('image') != null)
                        <img src="{{ old('image') ?? asset($record->image) }}" alt="" title="" class='fancybox' id="prev_img" />
                        @else
                        <img src="{{ asset('admin/images/no-image.png', $secure = null) }}" alt="" class='fancybox'
                            title="" id="prev_img" />
                        @endif
                        <a href="{{ url('/uploads/filemanager/dialog.php?type=1&field_id=image') }}"
                            data-fancybox-type="iframe" class="btn btn-info fancy">Insert</a>
                        <button class="btn btn-danger remove_box_image" type="button">Remove</button>
                        <button class="btn btn-warning prev_box_image" type="button" style="display: none;">Previous
                            Image</button>
                        <input type="hidden" value="{{ old('image') ?? asset($record->image) }}" name="image" class="form-control" id="image">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Logo <span class="text-danger">*</span></label>
                        @if(isset($record->logo) || old('logo') != null)
                        <img src="{{ old('logo') ?? asset($record->logo) }}" alt="" title="" class='fancybox' id="prev_logo_img" />
                        @else
                        <img src="{{ asset('admin/images/no-image.png', $secure = null) }}" alt="" class='fancybox'
                            title="" id="prev_logo_img" />
                        @endif
                        <a href="{{ url('/uploads/filemanager/dialog.php?type=1&field_id=logo') }}"
                            data-fancybox-type="iframe" class="btn btn-info fancy">Insert</a>
                        <button class="btn btn-danger remove_box_image" type="button">Remove</button>
                        <button class="btn btn-warning prev_box_image" type="button" style="display: none;">Previous
                            Image</button>
                        <input type="hidden" value="{{ old('logo') ?? asset($record->logo) }}" name="logo" class="form-control" id="logo">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1" @if((int)(old('status') ?? $record->status) == 1) selected @endif>{!! PUBLISH !!}</option>
                            <option value="0" @if((int)(old('status') ?? $record->status) == 0) selected @endif>{!! UNPUBLISH !!}</option>
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
