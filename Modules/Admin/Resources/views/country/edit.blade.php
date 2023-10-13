@extends('admin::master')
@section('title', $page_header)
@section('content-header', $page_header)
@section('content')
<div class="row">
    <div class="col-md-9">
        @include('admin::country.table')
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
                        <input type="text" class="form-control" id="title" name="title" value="{{ $record->title }}">
                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="title">Success Rate(%) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="success_percentage" name="success_percentage" value="{{ $record->success_percentage }}">
                        @if ($errors->has('success_percentage'))
                            <span class="help-block">
                                <strong>{{ $errors->first('success_percentage') }}</strong>
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