@extends('admin::master')
@section('title', $page_header)
@section('content-header', $page_header)
@section('content')
<div class="card">
	<div class="card-header">{{ $page_header }}</div>
	<div class="card-body">
	    <h4>Welcome to Dashboard</h4>
	</div>
</div>
@endsection