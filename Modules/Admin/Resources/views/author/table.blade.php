<div class="card">
    <div class="card-header">List of {{ $page_header }}</div>
    <div class="card-body table-responsive">
        <table class="table table-hover table-sm dataTablePagination compact">
            <thead class="bg-primary">
                <tr>
                    <th width="10px">S.No</th>
                    <th>Name</th>
                    <th>Slug</th>
                    {{-- <th>Link</th> --}}
                    <th width="50px">Status</th>
                    <th width="50px">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 1; ?>
                @if(!empty($list))
                @foreach ($list as $item)
                <tr>
                    <td>{{ $count++ }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->slug }}</td>
                    {{-- <td><a href="{{ route('category',$item->slug) }}" target="_blank">{!! LINK_ICON !!}</a></td> --}}
                    <td class="text-center">{!! getStatus($item->status) !!}</td>
                    <td width="100px" class="center-align">
                        <a href="{{ route($link.'.edit', $item->id) }}">{!! EDIT_ICON !!} </a>&nbsp;|&nbsp;
                        <a href="{{ route($link.'.delete', $item->id) }}" class="resetbtn">{!! DELETE_ICON !!}</a>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>