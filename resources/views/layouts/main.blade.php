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

<body>
		@include('partials.navbar')
		<div class="container">
				@yield('contents')
		</div>

		<script src="/assets/js/bootstrap.bundle.min.js"></script>
		<script src="/assets/js/script.js"></script>
</body>

</html>
