<li class="{{ Request::is('menus*') ? 'active' : '' }}">
    <a href="{{ route('menus.index') }}"><i class="fa fa-edit"></i><span>Menus</span></a>
</li>

<li class="{{ Request::is('priceOptions*') ? 'active' : '' }}">
    <a href="{{ route('priceOptions.index') }}"><i class="fa fa-edit"></i><span>Price Options</span></a>
</li>

