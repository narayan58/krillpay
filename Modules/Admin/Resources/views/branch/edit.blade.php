@extends('admin::master')
@section('title', $page_header)
@section('content-header', $page_header)
@section('content')
<div class="row">
    <div class="col-md-9">
        @include('admin::branch.table')
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">Edit {{ $page_header }} Detail
            <div class="card-header-actions">
            <a class="card-header-action btn btn-warning" href="{{ route($link.'.create') }}">{!! ADD_ICON !!}</a>
        </div>
    </div>
            <div class="card-body">
                
                <form class="" method="POST" action="{{ route($link.'.update', $record->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <label for="title">Title (English) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $record->title }}">
                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="contact_no">Contact No. <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="contact_no" name="contact_no" value="{{ old('contact_no') ?? $record->contact_no }}">
                        @if ($errors->has('contact_no'))
                            <span class="help-block">
                                <strong>{{ $errors->first('contact_no') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label">Image</label>
                        @if(!empty(old('image')))
                            <img src="{{ old('image') }}" alt="" title="" class='fancybox' id="prev_img" />
                        @elseif(!empty($record->image))
                            <img src="{{ asset($record->image) }}" alt="" title="" class='fancybox' id="prev_img" />
                        @else
                            <img src="{{ asset('admin/images/no-image.png', $secure = null) }}" alt="" class='fancybox' title="" id="prev_img" />
                        @endif
                        <a href="{{ url('/uploads/filemanager/dialog.php?type=1&field_id=image') }}" data-fancybox-type="iframe" class="btn btn-info fancy">Insert</a>
                        <button class="btn btn-danger remove_box_image" type="button">Remove</button>
                        <button class="btn btn-warning prev_box_image" type="button" style="display: none;">Previous Image</button>
                        <input type="hidden" value="{{ old('image') ?? asset($record->image) }}"  name="image" class="form-control" id="image">
                    </div>
                    <div class="form-group">
                        <label for="address">Address <span class="text-danger">*</span></label>
                        <textarea id="my-editor" class="tinymce" name="address" placeholder="Place some text here" >{{ old('address') ?? $record->address }}</textarea>
                        @if ($errors->has('address'))
                            <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="statusid" class="form-control">
                            <option value="1" @if($record->status == '1') {{ 'selected' }} @endif >{!! PUBLISH !!}</option>
                            <option value="0" @if($record->status == '0') {{ 'selected' }} @endif >{!! UNPUBLISH !!}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Update</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection