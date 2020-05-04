<!-- Order Number Field -->
<div class="form-group">
    {!! Form::label('order_number', 'Order Number:') !!}
    <p>{{ $order->order_number }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $order->user_id }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $order->status }}</p>
</div>

<!-- Grand Total Field -->
<div class="form-group">
    {!! Form::label('grand_total', 'Grand Total:') !!}
    <p>{{ $order->grand_total }}</p>
</div>

<!-- Item Count Field -->
<div class="form-group">
    {!! Form::label('item_count', 'Item Count:') !!}
    <p>{{ $order->item_count }}</p>
</div>

<!-- Payment Status Field -->
<div class="form-group">
    {!! Form::label('payment_status', 'Payment Status:') !!}
    <p>{{ $order->payment_status }}</p>
</div>

<!-- Payment Method Field -->
<div class="form-group">
    {!! Form::label('payment_method', 'Payment Method:') !!}
    <p>{{ $order->payment_method }}</p>
</div>

<!-- First Name Field -->
<div class="form-group">
    {!! Form::label('first_name', 'First Name:') !!}
    <p>{{ $order->first_name }}</p>
</div>

<!-- Last Name Field -->
<div class="form-group">
    {!! Form::label('last_name', 'Last Name:') !!}
    <p>{{ $order->last_name }}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
    <p>{{ $order->address }}</p>
</div>

<!-- City Field -->
<div class="form-group">
    {!! Form::label('city', 'City:') !!}
    <p>{{ $order->city }}</p>
</div>

<!-- Country Field -->
<div class="form-group">
    {!! Form::label('country', 'Country:') !!}
    <p>{{ $order->country }}</p>
</div>

<!-- Post Code Field -->
<div class="form-group">
    {!! Form::label('post_code', 'Post Code:') !!}
    <p>{{ $order->post_code }}</p>
</div>

<!-- Phone Number Field -->
<div class="form-group">
    {!! Form::label('phone_number', 'Phone Number:') !!}
    <p>{{ $order->phone_number }}</p>
</div>

<!-- Notes Field -->
<div class="form-group">
    {!! Form::label('notes', 'Notes:') !!}
    <p>{{ $order->notes }}</p>
</div>

