@extends('admin::master')
@section('title', $page_header)
@section('content-header', $page_header)
@section('content')
<div class="card">
    <div class="card-header">{{ $page_header }}
        <div class="card-header-actions">
        </div>
    </div>
    <div class="card-body">
        <table id="sortable" class="table table-striped table-hover todo-list ui-sortable" >
            <tr class="nodrag nodrop">
                <th>S.No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Sent date</th>
{{--                 <th class="text-center">Action</th>
 --}}            </tr>
            <?php $count = 1; ?>
            @foreach ($list as $item)
            <tr>
                <td>{{ $count++ }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->created_at }}</td>
               {{--  <td class="text-center">
                    @if ($item->viewed == '0')
                    <a href="{{ route('contact.edit', $item->id) }}"> {!!NEW_STATUS !!} </a>
                    @else
                    {!! VIEW_STATUS !!}
                    @endif
                </td> --}}
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection