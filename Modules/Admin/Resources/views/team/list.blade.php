@extends('admin::master')
@section('title', $page_header)
@section('content-header', $page_header)
@section('content')
<div class="row">
    <div class="col-md-9">
        @include('admin::team.table')
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">Add {{ $page_header }}</div>
            <div class="card-body">
                <form class="" method="POST" action="{{ route($link.'.store') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="name">Designation <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="designation" value="{{ old('designation') }}">
                        @if ($errors->has('designation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('designation') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="name">Linkedin Profile Link <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="linkedin_link" value="{{ old('linkedin_link') }}">
                        @if ($errors->has('linkedin_link'))
                            <span class="help-block">
                                <strong>{{ $errors->first('linkedin_link') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label">Image</label>
                        @if(!empty($record->image))
                            <img src="{{ asset($record->image) }}" alt="" title="" class='fancybox' id="prev_img" />
                        @elseif(!empty(old('image')))
                            <img src="{{ old('image') }}" alt="" title="" class='fancybox' id="prev_img" />
                        @else
                            <img src="{{ asset('admin/images/no-image.png', $secure = null) }}" alt="" class='fancybox' title="" id="prev_img" />
                        @endif
                        <a href="{{ url('/uploads/filemanager/dialog.php?type=1&field_id=image') }}" data-fancybox-type="iframe" class="btn btn-info fancy">Insert</a>
                        <button class="btn btn-danger remove_box_image" type="button">Remove</button>
                        <button class="btn btn-warning prev_box_image" type="button" style="display: none;">Previous Image</button>
                        <input type="hidden" value="{{ isset($record->image)?asset($record->image):old('image') }}"  name="image" class="form-control" id="image">
                        @if ($errors->has('image'))
                            <span class="help-block">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="statusid" class="form-control">
                            <option value="1">{!! PUBLISH !!}</option>
                            <option value="0">{!! UNPUBLISH !!}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection