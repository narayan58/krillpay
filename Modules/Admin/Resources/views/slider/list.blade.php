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
    <div class="card-body table-responsive">
        <table id="sortable" class="table table-hover table-sm dataTable compact">
            <thead class="bg-primary">
                <tr>
                    <th><span class="handle"><i class="fa fa-arrows"></i></span></th>
                    <th>Title(English)</th>
                    <th class="text-center">Open Image</th>
                    <th class="text-center">Published Date</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = ($list->currentpage()-1)*$list->perpage()+1; ?>
                <?php $sort_orders = ''; ?>
                @if(!empty($list))
                @foreach ($list as $item)
                <?php $sort_orders .= $item->sort_order . ','; ?>
                <tr id="{{ $item->id }}">
                    <td class="move">
                        <span class="handle">
                            <i class="fa fa-ellipsis-v"></i>
                            <i class="fa fa-ellipsis-v"></i>
                        </span>
                    </td>
                    <td>{{ Str::limit($item->title, $limit = 50, $end = '...') }}</td>
                    <td class="text-center"><a href="{{ asset($item->image) }}" target="_blank"><i class="fa fa-external-link" aria-hidden="true"></i></a></td>
                    <td class="text-center">{{ $item->published_date }}</td>
                    <td class="text-center">{!! getStatus($item->status) !!}</td>
                    <td class="text-center">
                        <a href="{{ route($link.'.edit', $item->id) }}"> {!! EDIT_ICON !!}</a>&nbsp;|
                        <a href="{{ route($link.'.delete', $item->id) }}" class="resetbtn">{!! DELETE_ICON !!} </a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="5">{!! NO_RECORD !!}</td>
                </tr>
                @endif
            </tbody>
        </table>
        {{ $list->links() }}
    </div>
</div>
@push('script')
    <script type="text/javascript">
        $('#sortable').tableDnD({
        onDrop: function (table, row) {
            $.post("{{ route('ajax.sorting') }}", {ids_order: $.tableDnD.serialize(), sort_orders: '<?php echo $sort_orders; ?>', table: 'tbl_slider', _token: '{!! csrf_token() !!}'}, function(data){
                console.log(data);
            });
        }
    });
    </script>
@endpush
@endsection