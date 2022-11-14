<nav class="navbar navbar-expand-lg navbar-dark bg-danger p-3">
		<div class="container">
				<a class="navbar-brand fw-bold" href="/">Example App</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
						aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav">
								<li class="nav-item">
										<a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="/about">About Me</a>
								</li>
								<li class="nav-item">
										<a class="nav-link {{ Request::is('posts') ? 'active' : '' }}" href="/posts">All Posts</a>
								</li>
						</ul>

						<ul class="navbar-nav ms-auto">
								@auth
										<li class="nav-item dropdown">
												<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
														aria-expanded="false">
														{{ auth()->user()->name }}
												</a>
												<ul class="dropdown-menu">
														<li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
														<li>
																<hr class="dropdown-divider">
														</li>
														<li>
																<form action="/logout" method="POST">
																		@csrf
																		<button type="submit" class="dropdown-item">Log Out</button>
																</form>
														</li>
												</ul>
										</li>
								@else
										<li class="nav-item">
												<a href="/login" class="nav-link">Login</a>
										</li>
								@endauth
						</ul>
				</div>
		</div>
</nav>
