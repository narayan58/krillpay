@extends('admin::master')
@section('title', $page_header)
@section('content-header', $page_header)
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ $page_header }}
                <div class="card-header-actions">
                    <a class="card-header-action btn btn-warning" href="{{ route($link.'.index') }}">{!! VIEWLIST_ICON !!}</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover table-hover">
                    <tr>
                        <th>Name</th>
                        <th>{{ $record->name }}</th>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <th>{{ $record->address }}</th>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <th>{{ $record->email }}</th>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <th>{{ $record->phoneno }}</th>
                    </tr>
                    <tr>
                        <th>IP Address</th>
                        <th>{{ $record->ip_address }}</th>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <th>{{ $record->inserted_date }}</th>
                    </tr>
                    <tr>
                        <th>message</th>
                        <th>{!! $record->message !!}</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Reply :</div>
            <div class="card-body">
                <form method="POST" action="{{ route($link.'.store') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $record->email }}" readonly="true">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control tinymce" rows="6" cols="8" name="message_reply"></textarea>
                        @if ($errors->has('message_reply'))
                        <span class="help-block">
                            <strong>{{ $errors->first('message_reply') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="feedbackid" value="{{ $record->id }}">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">Previous Reply :</div>
    <div class="card-body">
        <table class="table table-hover table-striped">
            <tr>
                <td>Date</td>
                <td>Message</td>
            </tr>
            @if(!empty($messagelist))
            @foreach($messagelist as $k => $item)
                <tr>
                    <th>{{ $item->inserted_datetime }}</th>
                    <th>{!! $item->message_reply !!}</th>
                </tr>
            @endforeach
            @endif
        </table>
    </div>
</div>
@endsection