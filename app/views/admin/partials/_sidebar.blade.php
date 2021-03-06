<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
	<ul class="nav navbar-nav side-nav">
		<li class="active">
			<a href="{{ route('admin.dashboard') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
		</li>
		<li>
			<a href="{{ route('select.city') }}"><i class="fa fa-fw fa-desktop"></i> Front View</a>
		</li>
		<li>
			<a href="{{ route('admin.restaurants.index') }}"><i class="fa fa-fw fa-book"></i> Restaurants</a>
		</li>
		<li>
			<a href="{{ route('admin.foods.index') }}"><i class="fa fa-fw fa-spoon"></i> Foods</a>
		</li>
		<li>
			<a href="{{ route('admin.categories.index') }}"><i class="fa fa-fw fa-tags"></i> Categories</a>
		</li>
		<li>
			<a href="{{ route('admin.orders.index') }}"><i class="fa fa-fw fa-money"></i> Orders</a>
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
					<a href="{{ route('admin.accounts.index') }}">Accounts</a>
				</li>
				<li>
					<a href="{{ route('admin.roles.index') }}">Roles</a>
				</li>
				<li>
					<a href="{{ route('admin.permissions.index') }}">Permissions</a>
				</li>
			</ul>
		</li>
	</ul>
</div>
