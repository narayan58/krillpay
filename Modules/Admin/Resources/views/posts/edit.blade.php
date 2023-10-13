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
                    <input type="text" class="form-control" id="title" name="title" value="{{ $record->title }}" >
                    @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
                </div>

                <div class="form-group">
                    <label class="control-label" for="title">Sub title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="title" name="sub_title" value="{{ $record->sub_title }}" >
                    @if ($errors->has('sub_title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('sub_title') }}</strong>
                    </span>
                @endif
                </div>
                <div class="form-group">
                    <label class="control-label" for="description">Description <span class="text-danger">*</span></label>
                    <br>
                    <textarea id="my-editor" class="tinymce" name="description" placeholder="Place some text here" >{{ $record->description }}</textarea>
                    @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="published_date">Choose Category</label>
                    <div style="height: 250px; overflow-y: scroll;">
                        <ul class="list-unstyled">
                            @if(!empty($categorylist))
                            @foreach($categorylist as $cat)
                            <li><input type="checkbox" name="category[]" value="{{ $cat->id }}"
                                @foreach ($record->category as $postcat)
                                @if ($postcat->id == $cat->id)
                                checked
                                @endif
                            @endforeach > {{ $cat->title }}</li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Featured Image</label>
                    @if(!empty($record->image))
                        <img src="{{ asset($record->image) }}" alt="" class="fancybox" title="" id="prev_img" />
                    @else
                        <img src="{{ asset('admin/images/no-image.png', $secure = null) }}" alt="" class="fancybox" title="" id="prev_img" />
                    @endif
                    <a href="{{ url('/uploads/filemanager/dialog.php?type=1&field_id=image') }}" data-fancybox-type="iframe" class="btn btn-info fancy">Insert</a>
                    <button class="btn btn-danger remove_box_image" type="button">Remove</button>
                    <button class="btn btn-warning prev_box_image" type="button" style="display: none;">Previous Image</button>
                    <input type="hidden" value="{{ isset($record->image)?asset($record->image):'' }}"  name="image" class="form-control" id="image">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="statusid" class="form-control">
                        <option value="1" @if($record->status == '1') {{ 'selected' }} @endif>{!! PUBLISH !!}</option>
                        <option value="0" @if($record->status == '0') {{ 'selected' }} @endif>{!! UNPUBLISH !!}</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Update</button>
                    <button type="reset" class="btn btn-danger resetbtn">Clear</button>
                </div>
            </div>
            </div>
        </form>
    </div>
</div>
@endsection