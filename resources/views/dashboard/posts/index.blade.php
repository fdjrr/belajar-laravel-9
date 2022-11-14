@extends('dashboard.layouts.main')
@section('contents')
		<div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
				<h3>{{ $title }}</h3>
		</div>
		@include('partials.alert')
		<div class="d-flex justify-content-end my-3">
				<a href="/dashboard/posts/create" class="text-decoration-none">Create new post</a>
		</div>
		<div class="table-responsive">
				<table class="align-items-center table text-center align-middle">
						<thead>
								<tr>
										<th scope="col">#</th>
										<th scope="col">Title</th>
										<th scope="col">Category</th>
										<th scope="col">Action</th>
								</tr>
						</thead>
						<tbody>
								@foreach ($posts as $item)
										<tr>
												<th scope="row">{{ $loop->iteration }}</th>
												<td>{{ $item->title }}</td>
												<td>{{ $item->category->name }}</td>
												<td>
														<a href="/dashboard/posts/{{ $item->slug }}"
																class="badge text-decoration-none text-bg-primary p-2">Detail</a>
														<a href="/dashboard/posts/{{ $item->slug }}/edit"
																class="badge text-decoration-none text-bg-warning text-bg-warning p-2">Edit</a>
														<form action="/dashboard/posts/{{ $item->slug }}" method="POST" class="d-inline">
																@method('delete')
																@csrf
																<button class="badge text-bg-danger border-0 p-2"
																		onclick="return confirm('Are you sure?')">Delete</button>
														</form>
												</td>
										</tr>
								@endforeach
						</tbody>
				</table>
		</div>
@endsection
