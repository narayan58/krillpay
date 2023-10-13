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
        <form method="POST" action="{{ route($link.'.update', $record->id) }} ">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label class="control-label" for="slug">Permalink<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') ?? $record->slug }}" >
                        @if ($errors->has('slug'))
                        <span class="help-block">
                            <strong>{{ $errors->first('slug') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="title">Title<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $record->title }}" >
                        @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="sub_title">Sub Title</label>
                        <input type="text" class="form-control" id="sub_title" name="sub_title" value="{{ old('sub_title') ?? $record->sub_title }}">
                        @if ($errors->has('sub_title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('sub_title') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                    <label class="control-label" for="description">Description</label>
                    <br>
                    <textarea id="my-editor" class="tinymce" name="description" placeholder="Place some text here" >{{ old('description') ?? $record->description }}</textarea>
                    @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                    @endif
                </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label>Image - Recommended Size (1920*470)</label>
                        <?php if (!empty($record->image)) { ?>
                        <img src="{{ old('image') ?? asset($record->image) }}" alt="" title="" class="fancybox" id="prev_img" />
                        <?php } else { ?>
                        <img src="{{ asset('admin/images/no-image.png', $secure = null) }}" alt="" title="" class="fancybox" id="prev_img" />
                        <?php } ?>
                        @if ($errors->has('image'))
                        <span class="help-block">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                        @endif
                        <a href="<?php echo url('/uploads/filemanager/dialog.php?type=1&field_id=image') ?>" data-fancybox-type="iframe" class="btn btn-info fancy">Insert</a>
                        <button class="btn btn-danger remove_box_image" type="button">Remove</button>
                        <button class="btn btn-warning prev_box_image" type="button" style="display: none;">Previous Image</button>
                        <input type="hidden" value="{{ old('image') ?? asset($record->image) }}"  name="image" class="form-control" id="image">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="published_date">Published Date <span class="text-danger">*</span></label>
                        <input type="text" class="form-control datepicker" id="published_date" name="published_date" value="{{ old('published_date') ?? $record->published_date }}" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="btn_text">Button Text</label>
                        <input type="text" class="form-control" id="btn_text" name="btn_text" value="{{ old('btn_text') ?? $record->btn_text }}">
                        @if ($errors->has('btn_text'))
                        <span class="help-block">
                            <strong>{{ $errors->first('btn_text') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="btn_url">Button Link</label>
                        <input type="text" class="form-control" id="btn_url" name="btn_url" value="{{ old('btn_url') ?? $record->btn_url }}">
                        @if ($errors->has('btn_url'))
                        <span class="help-block">
                            <strong>{{ $errors->first('btn_url') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="statusid" class="form-control">
                            <option value="1" {{ (old('status') ?? $record->status == '1')? 'selected' : '' }} >{!! PUBLISH !!}</option>
                            <option value="0" {{ (old('status') ?? $record->status == '0')? 'selected' : '' }} >{!! UNPUBLISH !!}</option>
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