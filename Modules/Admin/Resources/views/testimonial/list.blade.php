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
        <div class="clearfix"></div>
        <br>
        <table class="table table-hover table-sm">
            <thead class="bg-primary">
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Country</th>
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
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->designation }}</td>
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