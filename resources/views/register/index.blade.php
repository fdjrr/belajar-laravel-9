<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Example App - {{ $title }}</title>
		<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="/assets/css/style.css">
</head>

<body class="bg-light">
		<div class="container">
				<div class="row vh-100 align-items-center">
						<div class="col-12 d-flex justify-content-center">
								<div class="card" style="width: 450px">
										<div class="card-header small text-muted p-3">{{ $title }}</div>
										<div class="card-body">
												<form action="/register" method="POST">
														@csrf
														<div class="mb-3">
																<label for="inputYourName" class="form-label">Your Name</label>
																<input type="text" name="name" value="{{ old('name') }}"
																		class="form-control @error('name')
                                is-invalid
                                @enderror"
																		id="inputYourName" required>
																@error('name')
																		<div class="invalid-feedback small">
																				{{ $message }}
																		</div>
																@enderror
														</div>
														<div class="mb-3">
																<label for="inputUsername" class="form-label">Username</label>
																<input type="text" name="username" value="{{ old('username') }}"
																		class="form-control @error('username')
                                    is-invalid
                                @enderror"
																		id="inputUsername" required>
																@error('username')
																		<div class="invalid-feedback small">
																				{{ $message }}
																		</div>
																@enderror
														</div>
														<div class="mb-3">
																<label for="inputEmail" class="form-label">Email address</label>
																<input type="email" name="email" value="{{ old('email') }}"
																		class="form-control @error('email')
                                    is-invalid
                                @enderror"
																		id="inputEmail" required>
																@error('email')
																		<div class="invalid-feedback small">
																				{{ $message }}
																		</div>
																@enderror
														</div>
														<div class="mb-3">
																<div class="d-flex">
																		<label for="inputPassword" class="form-label flex-grow-1">Password</label>
																</div>
																<input type="password" name="password"
																		class="form-control @error('password')
                                    is-invalid
                                @enderror"
																		id="inputPassword" required>
																@error('password')
																		<div class="invalid-feedback small">
																				{{ $message }}
																		</div>
																@enderror
														</div>
														<div class="d-flex justify-content-end align-items-center d-grid gap-2">
																<small>Already registred? <a href="/login" class="text-decoration-none">Login</a></small>
																<button type="submit" class="btn btn-primary">Submit</button>
														</div>
												</form>
										</div>
								</div>
						</div>
				</div>
		</div>

		<script src="/assets/js/bootstrap.bundle.min.js"></script>
		<script src="/assets/js/script.js"></script>
</body>

</html>
