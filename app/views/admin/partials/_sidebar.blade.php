<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
	<ul class="nav navbar-nav side-nav">
		<li class="active">
			<a href="{{ route('admin.dashboard') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
		</li>
		<li>
			<a href="{{ route('admin.restaurant') }}"><i class="fa fa-fw fa-book"></i> Restaurants</a>
		</li>
		<li>
			<a href="{{ route('admin.food') }}"><i class="fa fa-fw fa-spoon"></i> Foods</a>
		</li>
		<li>
			<a href="{{ route('admin.categories.index') }}"><i class="fa fa-fw fa-tags"></i> Categories</a>
		</li>
		<li>
			<a href="{{ route('admin.order') }}"><i class="fa fa-fw fa-money"></i> Orders</a>
		</li>
		<li>
			<a href="javascript:;" data-toggle="collapse" data-target="#locations">
				<i class="fa fa-fw fa-map-marker"></i> Localization <i class="fa fa-fw fa-caret-down"></i></a>
			<ul id="locations" class="collapse">
				<li>
					<a href="{{ route('admin.areas.index') }}">Areas</a>
				</li>
				<li>
					<a href="{{ route('admin.cities.index') }}">Cities</a>
				</li>
				<li>
					<a href="{{ route('admin.states.index') }}">States</a>
				</li>
				<li>
					<a href="{{ route('admin.countries.index') }}">Countries</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="javascript:;" data-toggle="collapse" data-target="#users"><i class="fa fa-fw fa-user"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
			<ul id="users" class="collapse">
				<li>
					<a href="#">Accounts</a>
				</li>
				<li>
					<a href="#">Roles</a>
				</li>
				<li>
					<a href="#">Permissions</a>
				</li>
			</ul>
		</li>
		<li>
			<a href=""><i class="fa fa-fw fa-wrench"></i> Settings</a>
		</li>
	</ul>
</div>
