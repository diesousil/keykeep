<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="{{url("/")}}" class="brand-link">
	<img src="/img/logo.png"
		alt="<?php echo config("app.name"); ?> Logo"
		class="brand-image img-circle elevation-3"
		style="opacity: .8">
	<span class="brand-text font-weight-light"><?php echo config("app.name"); ?></span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
			
			<li class="nav-item">
				<a href="{{url("/")}}" class="nav-link">
					<i class="nav-icon fa fa-home"></i>
					<p>Home</p>
				</a>
			</li>
			
			<li class="nav-item has-treeview">
				<a href="{{url("/groups")}}" class="nav-link">
				<i class="nav-icon fa fa-object-group"></i>
				<p>
					Groups
					<i class="right fas fa-angle-left"></i>
				</p>
				</a>
				<ul class="nav nav-treeview">
				<li class="nav-item">
					<a href="{{url("/groups")}}" class="nav-link">
					<i class="nav-icon"></i>
					<p>List</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="{{url("/groups/create")}}" class="nav-link">
					<i class="nav-icon"></i>
					<p>Create</p>
					</a>
				</li>
				</ul>
			</li>
			<li class="nav-item has-treeview">
				<a href="{{url("/credentials")}}" class="nav-link">
				<i class="nav-icon fas fa-key"></i>
				<p>
					Credentials
					<i class="right fas fa-angle-left"></i>
				</p>
				</a>
				<ul class="nav nav-treeview">
				<li class="nav-item">
					<a href="{{url("/credentials")}}" class="nav-link">
					<i class="nav-icon"></i>
					<p>List</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="{{url("/credentials/create")}}" class="nav-link">
					<i class="nav-icon"></i>
					<p>Create</p>
					</a>
				</li>
				</ul>
			</li>
			<li class="nav-item has-treeview">
				<a href="#" class="nav-link">
				<i class="nav-icon fas fa-shield-alt"></i>
				<p>
					Users
					<i class="right fas fa-angle-left"></i>
				</p>
				</a>
				<ul class="nav nav-treeview">
				
				<li class="nav-item">
					<a href="{{url("/users")}}" class="nav-link">
					<i class="nav-icon"></i>
					<p>List</p>
					</a>
				</li>
				<!--saquei-->
				</ul>
				<ul class="nav nav-treeview">
				
					<li class="nav-item">
					<a href="{{url("/users/create")}}" class="nav-link">
						<i class="nav-icon"></i>
						<p>Create</p>
					</a>
					</li>
					<!--saquei-->
				</ul>
			</li>
			
			
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>