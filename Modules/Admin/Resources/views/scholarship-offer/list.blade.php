@extends('admin::master')
@section('title', $page_header)
@section('content-header', $page_header)
@section('content')
<div class="card">
    <div class="card-header">{{ $page_header }}
        <div class="card-header-actions">
            <a class="card-header-action btn btn-warning" href="{{ route($link.'.create') }}">{!! ADD_ICON !!}</a>
        </div>
    </div>
    <div class="card-body">
        <form class="">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" id="title" title="title"
                            value="{{ isset($_GET['title'])?$_GET['title']:'' }}"
                            placeholder="Search By Title">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Search By Country</label>
                        <select class="form-control select2" name="country" id="country">
                            <option value="">Search By Country</option>
                            @if(!empty($countrylist))
                            @foreach($countrylist as $cat)
                            <option value="{{ $cat->id }}" @if(isset($_GET['country']) && $_GET['country']==$cat->id)
                                {{ 'selected' }} @endif>{{ $cat->title }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="vi-hidden">x</label>
                        <button type="submit" class="btn btn-primary">Search</button>
                        <a href="{{ route($link.'.index') }}" class="btn btn-danger">Reset</a>
                    </div>
                </div>
            </div>
        </form>
        <div class="clearfix"></div>
        <br>
        <table class="table table-hover table-sm">
            <thead class="bg-primary">
                <tr>
                    <th>S.No</th>
                    <th>Title</th>
                    <th>Country</th>
                    <th>Description</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(!$list->isEmpty())
                <?php $count = 1; ?>
                @foreach ($list as $item)
                <tr>
                    <th>{{ $count++ }}</th>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->country->title ?? '' }}</td>
                    <td>{{ Str::limit($item->description, 100) }}</td>
                    <td class="text-center"><a href="{{ asset($item->image) }}" target="_blank">{!! LINK_ICON !!}</a></td>
                    <td class="text-center">{!! getStatus($item->status) !!}</td>
                    <td class="text-center">
                        <a href="{{ route($link.'.edit', $item->id) }}"> {!! EDIT_ICON !!}</a>&nbsp;|
                        <a href="{{ route($link.'.delete', $item->id) }}" class="resetbtn">{!! DELETE_ICON !!} </a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr class="text-center">
                    <td colspan="7">{!! NO_RECORD !!}</td>
                </tr>
                @endif
            </tbody>
        </table>
        
    </div>
</div>
@endsection