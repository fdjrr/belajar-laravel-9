@extends('dashboard.layouts.main')
@section('contents')
		<div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
				<h3>{{ $title }}</h3>
		</div>

		<form action="/dashboard/posts/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
				@method('put')
				@csrf
				<div class="mb-3">
						<label for="inputTitle" class="form-label">Title</label>
						<input type="name" name="title" value="{{ old('title', $post->title) }}"
								class="form-control @error('title')
                is-invalid
            @enderror" id="inputTitle">
						@error('title')
								<div class="invalid-feedback">
										{{ $message }}
								</div>
						@enderror
				</div>
				<div class="mb-3">
						<label for="inputSlug" class="form-label">Slug</label>
						<input type="name" name="slug" value="{{ old('slug', $post->slug) }}"
								class="form-control @error('slug')
                is-invalid
            @enderror" id="inputSlug">
						@error('slug')
								<div class="invalid-feedback">
										{{ $message }}
								</div>
						@enderror
				</div>
				<div class="mb-3">
						<label for="inputCategoryId" class="form-label">Category</label>
						<select class="form-select @error('category_id')
            is-invalid
        @enderror" name="category_id"
								id="inputCategoryId">
								<option value="">Pilih Category</option>
								@foreach ($categories as $item)
										@if (old('category_id', $post->category_id) == $item->id)
												<option value="{{ $item->id }}" selected>{{ $item->name }}</option>
										@endif
										<option value="{{ $item->id }}">{{ $item->name }}</option>
								@endforeach
						</select>
						@error('category_id')
								<div class="invalid-feedback">
										{{ $message }}
								</div>
						@enderror
				</div>
				<div class="mb-3">
						<label for="inputImage" class="form-label">Post Image</label>
						<img src="{{ asset('storage/' . $post->image) }}" alt=""
								class="img-preview img-fluid col-sm-5 img-thumbnail d-block mb-3">
						<input class="form-control @error('image')
              is-invalid
          @enderror" type="file"
								name="image" id="inputImage" onchange="previewImage()">
						@error('image')
								<div class="invalid-feedback">
										{{ $message }}
								</div>
						@enderror
				</div>
				<div class="mb-3">
						<input type="hidden" name="body" id="content" value="{{ old('body', $post->body) }}">
						<trix-editor input="content"></trix-editor>
						@error('body')
								<p class="text-danger">{{ $message }}</p>
						@enderror
				</div>
				<div class="d-flex justify-content-end">
						<button type="submit" class="btn btn-primary">Update Post</button>
				</div>
		</form>

		<script>
				const title = document.querySelector('#inputTitle')
				const slug = document.querySelector('#inputSlug')

				title.addEventListener('change', function() {
						fetch('/dashboard/posts/createSlug?title=' + title.value)
								.then(response => response.json())
								.then(data => slug.value = data.slug)
				})

				document.addEventListener('trix-file-accept', function(e) {
						e.preventDefault()
				})

				function previewImage() {
						const image = document.querySelector('#inputImage')
						const imgPreview = document.querySelector('.img-preview')

						imgPreview.style.display = 'block'

						const oFReader = new FileReader()
						oFReader.readAsDataURL(image.files[0])
						oFReader.onload = function(oFEvent) {
								imgPreview.src = oFEvent.target.result
						}
				}
		</script>
@endsection
