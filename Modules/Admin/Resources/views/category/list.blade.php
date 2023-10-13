@extends('admin::master')
@section('title', $page_header)
@section('content-header', $page_header)
@section('content')
<div class="row">
    <div class="col-md-9">
        @include('admin::category.table')
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">Add {{ $page_header }}</div>
            <div class="card-body">
                <form class="" method="POST" action="{{ route($link.'.store') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Title (English) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title">
                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="title">Sub Title<span class="text-danger"></span></label>
                        <input type="text" class="form-control" id="title" name="sub_title">
                    </div>

                    <div class="form-group">
                        <label for="description">Description (English)</label>
                        <input type="text" class="form-control" id="description" name="description">
                        @if ($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
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