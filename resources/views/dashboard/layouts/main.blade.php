<!doctype html>
<html lang="en">

<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>{{ $title }}</title>
		<link href="/assets/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0-beta.0/dist/trix.css">

		<style>
				.bd-placeholder-img {
						font-size: 1.125rem;
						text-anchor: middle;
						-webkit-user-select: none;
						-moz-user-select: none;
						user-select: none;
				}

				@media (min-width: 768px) {
						.bd-placeholder-img-lg {
								font-size: 3.5rem;
						}
				}

				.b-example-divider {
						height: 3rem;
						background-color: rgba(0, 0, 0, .1);
						border: solid rgba(0, 0, 0, .15);
						border-width: 1px 0;
						box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
				}

				.b-example-vr {
						flex-shrink: 0;
						width: 1.5rem;
						height: 100vh;
				}

				.bi {
						vertical-align: -.125em;
						fill: currentColor;
				}

				.nav-scroller {
						position: relative;
						z-index: 2;
						height: 2.75rem;
						overflow-y: hidden;
				}

				.nav-scroller .nav {
						display: flex;
						flex-wrap: nowrap;
						padding-bottom: 1rem;
						margin-top: -1px;
						overflow-x: auto;
						text-align: center;
						white-space: nowrap;
						-webkit-overflow-scrolling: touch;
				}

				body {
						font-size: .875rem;
				}

				.feather {
						width: 16px;
						height: 16px;
				}

				/*
	* Sidebar
	*/

				.sidebar {
						position: fixed;
						top: 0;
						/* rtl:raw:
		right: 0;
		*/
						bottom: 0;
						/* rtl:remove */
						left: 0;
						z-index: 100;
						/* Behind the navbar */
						padding: 48px 0 0;
						/* Height of navbar */
						box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
				}

				@media (max-width: 767.98px) {
						.sidebar {
								top: 5rem;
						}
				}

				.sidebar-sticky {
						height: calc(100vh - 48px);
						overflow-x: hidden;
						overflow-y: auto;
						/* Scrollable contents if viewport is shorter than content. */
				}

				.sidebar .nav-link {
						font-weight: 500;
						color: #333;
				}

				.sidebar .nav-link .feather {
						margin-right: 4px;
						color: #727272;
				}

				.sidebar .nav-link.active {
						color: #2470dc;
				}

				.sidebar .nav-link:hover .feather,
				.sidebar .nav-link.active .feather {
						color: inherit;
				}

				.sidebar-heading {
						font-size: .75rem;
				}

				/*
	* Navbar
	*/

				.navbar-brand {
						padding-top: .75rem;
						padding-bottom: .75rem;
						background-color: rgba(0, 0, 0, .25);
						box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
				}

				.navbar .navbar-toggler {
						top: .25rem;
						right: 1rem;
				}

				.navbar .form-control {
						padding: .75rem 1rem;
				}

				.form-control-dark {
						color: #fff;
						background-color: rgba(255, 255, 255, .1);
						border-color: rgba(255, 255, 255, .1);
				}

				.form-control-dark:focus {
						border-color: transparent;
						box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
				}

				trix-toolbar [data-trix-button-group='file-tools'] {
						display: none;
				}
		</style>
</head>

<body>

		@include('dashboard.layouts.header')

		<div class="container-fluid">
				<div class="row">
						@include('dashboard.layouts.sidebar')

						<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
								@yield('contents')
						</main>
				</div>
		</div>

		<script src="/assets/js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="https://unpkg.com/trix@2.0.0-beta.0/dist/trix.umd.min.js"></script>
</body>

</html>
