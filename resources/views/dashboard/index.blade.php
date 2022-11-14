@extends('dashboard.layouts.main')
@section('contents')
		<div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
				<h3>Welcome back, {{ auth()->user()->name }}</h3>
		</div>
@endsection
