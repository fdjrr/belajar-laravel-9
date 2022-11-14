@extends('dashboard.layouts.main')
@section('contents')
		<div class="my-3">
				<a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">
						<div class="position-absolute bg-dark small py-2 px-4 text-white opacity-75">{{ $post->category->name }}
						</div>
				</a>
				@if ($post->image)
						<div style="max-height: 350px; overflow:hidden;">
								<img src="/storage/{{ $post->image }}" alt="{{ $post->image }}">
						</div>
				@else
						<img src="https://source.unsplash.com/1200x400/?{{ $post->category->name }}" class="card-img-top"
								alt="{{ $post->category->name }}">
				@endif
				<h5 class="my-3">{{ $post->title }}</h5>
				<p class="text-muted small">
						Author by <a href="/posts?author={{ $post->author->username }}"
								class="text-decoration-none">{{ $post->author->name }}</a>
						on
						{{ $post->created_at->diffForHumans() }}
				</p>
				<div class="border-dark border p-2">
						{!! $post->body !!}
				</div>
				<div class="d-flex justify-content-end mt-3">
						<a href="/dashboard/posts" class="text-decoration-none small text-muted border-dark border p-2">Back
								to My
								Posts</a>
				</div>
		</div>
@endsection
