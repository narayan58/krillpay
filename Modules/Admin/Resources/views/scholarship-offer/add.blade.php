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
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" >
                        @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="description">Description</label>
                        <br>
                        <textarea id="my-editor" class="tinymce" name="description" placeholder="Place some text here" >{{ old('description') }}</textarea>
                        @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="scholarship_amount">Scholarship Amount</label>
                        <br>
                        <textarea id="my-editor" class="tinymce" name="scholarship_amount" placeholder="Place some text here" >{{ old('scholarship_amount') }}</textarea>
                        @if ($errors->has('scholarship_amount'))
                        <span class="help-block">
                            <strong>{{ $errors->first('scholarship_amount') }}</strong>
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
                        <label class="control-label" for="valid_till">Valid Till<span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="valid_till" name="valid_till" value="{{ old('valid_till') }}" >
                        @if ($errors->has('valid_till'))
                        <span class="help-block">
                            <strong>{{ $errors->first('valid_till') }}</strong>
                        </span>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label">Featured Image <span class="text-danger">*</span></label>
                        @if(!empty($record->image))
                        <img src="{{ $record->image }}" alt="" title="" class='fancybox' id="prev_img" />
                        @elseif(!empty(old('image')))
                        <img src="{{ old('image') }}" alt="" title="" class='fancybox' id="prev_img" />
                        @else
                        <img src="{{ asset('admin/images/no-image.png', $secure = null) }}" alt="" class='fancybox' title="" id="prev_img" />
                        @endif
                        <a href="{{ url('/uploads/filemanager/dialog.php?type=1&field_id=image') }}" data-fancybox-type="iframe" class="btn btn-info fancy">Insert</a>
                        <button class="btn btn-danger remove_box_image" type="button">Remove</button>
                        <button class="btn btn-warning prev_box_image" type="button" style="display: none;">Previous Image</button>
                        <input type="hidden" value="{{ isset($record->image)?$record->image:old('image') }}"  name="image" class="form-control" id="image">
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