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
                        <label class="control-label" for="facebook_link">Facebook Link</label>
                        <input type="text" class="form-control" id="facebook_link" name="facebook_link" value="{{ old('facebook_link') ?? $record->facebook_link }}">
                        @if ($errors->has('facebook_link'))
                        <span class="help-block">
                            <strong>{{ $errors->first('facebook_link') }}</strong>
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
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label>Is Event? <span class="text-danger">*</span></label>
                        <div>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="is_event" value="1" id="eventYes" @if((int)(old('is_event') ?? $record->is_event) == 1) checked @endif>
                                <label class="form-check-label" for="eventYes">Yes</label>
                            </div>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="is_event" value="0" id="eventNo" @if((int)(old('is_event') ?? $record->is_event) == 0) checked @endif>
                                <label class="form-check-label" for="eventNo">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Image <span class="text-danger">*</span></label>
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
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{ old('date') ?? $record->date }}">
                    </div>
                    <div class="form-group">
                        <label for="time">Time</label>
                        <input type="text" class="form-control" id="time" name="time" value="{{ old('time') ?? $record->time }}">
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
