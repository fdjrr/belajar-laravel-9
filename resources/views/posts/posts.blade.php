@extends('layouts.main')
@section('contents')
		<div class="row justify-content-center">
				<div class="text-center">
						<h2 class="my-3">{{ $title }}</h2>
				</div>
				<div class="col-md-6">
						<form action="/posts">
								<div class="input-group mb-3">
										@if (request('category'))
												<input type="hidden" name="category" value="{{ request('category') }}">
										@endif
										@if (request('author'))
												<input type="hidden" name="author" value="{{ request('author') }}">
										@endif
										<input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="">
										<button class="btn btn-dark" type="submit">Search</button>
								</div>
						</form>
				</div>
		</div>
		@if ($posts->count())
				<div class="card mb-3">
						<a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">
								<div class="position-absolute bg-dark small py-2 px-4 text-white opacity-75">{{ $posts[0]->category->name }}
								</div>
						</a>
						@if ($posts[0]->image)
								<div style="max-height: 400px; overflow:hidden;" class="img-fluid">
										<img src="/storage/{{ $posts[0]->image }}" alt="{{ $posts[0]->image }}">
								</div>
						@else
								<img src="https://source.unsplash.com/1200x400/?{{ $posts[0]->category->name }}" class="card-img-top"
										alt="{{ $posts[0]->category->name }}">
						@endif
						<div class="card-body">
								<h5 class="card-title">{{ $posts[0]->title }}</h5>
								<p class="text-muted small">
										Author by <a href="/posts?author={{ $posts[0]->author->username }}"
												class="text-decoration-none">{{ $posts[0]->author->name }}</a> on
										{{ $posts[0]->created_at->diffForHumans() }}
								</p>
								<p class="card-text">{{ $posts[0]->excerpt }}</p>
								<a href="/posts/{{ $posts[0]->slug }}" class="btn btn-sm btn-outline-dark">Read more</a>
						</div>
				</div>

				<div class="row">
						@foreach ($posts->skip(1) as $item)
								<div class="col-md-4 my-3">
										<div class="card h-100">
												<a href="/posts?category={{ $item->category->slug }}" class="text-decoration-none">
														<div class="position-absolute bg-dark small py-2 px-4 text-white opacity-75">{{ $item->category->name }}
														</div>
												</a>
												@if ($item->image)
														<img src="/storage/{{ $item->image }}" alt="{{ $item->image }}" class="img-fluid"
																style="max-height: 120px; overflow: hidden;">
												@else
														<img src="https://source.unsplash.com/1200x400/?{{ $item->category->name }}" class="card-img-top"
																alt="{{ $item->category->name }}">
												@endif
												<div class="card-body">
														<h5 class="card-title">{{ $item->title }}</h5>
														<p class="text-muted small">
																Author by <a href="/posts?author={{ $item->author->username }}"
																		class="text-decoration-none">{{ $item->author->name }}</a> on
																{{ $item->created_at->diffForHumans() }}
														</p>
														<p class="card-text">{!! $item->excerpt !!}</p>
														<a href="/posts/{{ $item->slug }}" class="btn btn-sm btn-outline-dark">Read more</a>
												</div>
										</div>
								</div>
						@endforeach
				</div>

				<div class="d-flex justify-content-end">
						{{ $posts->links() }}
				</div>
		@else
				<p class="fs-4 text-center">No post found.</p>
		@endif
@endsection
