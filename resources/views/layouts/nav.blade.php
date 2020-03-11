<ul class="navbar-nav mr-auto">
	<li class="{{ Request::is('routeName*') ? 'active' : '' }}" role="menuitem">
		<a class="nav-link" href="{{route('products.index')}}">@lang('products.index')</a>
	</li>
</ul>
