<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
		<div class="position-sticky sidebar-sticky pt-3">
				<ul class="nav flex-column">
						<li class="nav-item">
								<a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page"
										href="/dashboard">Dashboard</a>
						</li>
						<li class="nav-item">
								<a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">My Posts</a>
						</li>
				</ul>

				@can('admin')
						<h6
								class="sidebar-heading d-flex justify-content-between align-items-center text-muted text-uppercase mt-4 mb-1 px-3">
								<span>Administrator</span>
						</h6>
						<ul class="nav flex-column mb-2">
								<li class="nav-item">
										<a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
												Post Categories
										</a>
								</li>
						</ul>
				@endcan
		</div>
</nav>
