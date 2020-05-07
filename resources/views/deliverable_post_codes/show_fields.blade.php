<!-- Post Code Field -->
<div class="form-group">
    {!! Form::label('post_code', 'Post Code:') !!}
    <p>{{ $deliverablePostCode->post_code }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $deliverablePostCode->status }}</p>
</div>

<!-- Delivery Fees Field -->
<div class="form-group">
    {!! Form::label('delivery_fees', 'Delivery Fees:') !!}
    <p>{{ $deliverablePostCode->delivery_fees }}</p>
</div>

