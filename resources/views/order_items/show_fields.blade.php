<!-- Order Id Field -->
<div class="form-group">
    {!! Form::label('order_id', 'Order Id:') !!}
    <p>{{ $orderItem->order_id }}</p>
</div>

<!-- Menu Id Field -->
<div class="form-group">
    {!! Form::label('menu_id', 'Menu Id:') !!}
    <p>{{ $orderItem->menu_id }}</p>
</div>

<!-- Quantity Field -->
<div class="form-group">
    {!! Form::label('quantity', 'Quantity:') !!}
    <p>{{ $orderItem->quantity }}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', 'Price:') !!}
    <p>{{ $orderItem->price }}</p>
</div>

