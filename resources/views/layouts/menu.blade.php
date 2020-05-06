<li class="{{ Request::is('menus*') ? 'active' : '' }}">
    <a href="{{ route('menus.index') }}"><i class="fa fa-edit"></i><span>Menus</span></a>
</li>

<li class="{{ Request::is('priceOptions*') ? 'active' : '' }}">
    <a href="{{ route('priceOptions.index') }}"><i class="fa fa-edit"></i><span>Price Options</span></a>
</li>

<li class="{{ Request::is('orders*') ? 'active' : '' }}">
    <a href="{{ route('orders.index') }}"><i class="fa fa-edit"></i><span>Orders</span></a>
</li>

<li class="{{ Request::is('orderItems*') ? 'active' : '' }}">
    <a href="{{ route('orderItems.index') }}"><i class="fa fa-edit"></i><span>Order Items</span></a>
</li>

<li class="{{ Request::is('addresses*') ? 'active' : '' }}">
    <a href="{{ route('addresses.index') }}"><i class="fa fa-edit"></i><span>Addresses</span></a>
</li>

