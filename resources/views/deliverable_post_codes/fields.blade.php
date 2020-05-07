<!-- Post Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('post_code', 'Post Code:') !!}
    {!! Form::text('post_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('status', 0) !!}
        {!! Form::checkbox('status', '1', null) !!}
    </label>
</div>


<!-- Delivery Fees Field -->
<div class="form-group col-sm-6">
    {!! Form::label('delivery_fees', 'Delivery Fees:') !!}
    {!! Form::number('delivery_fees', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('deliverablePostCodes.index') }}" class="btn btn-default">Cancel</a>
</div>
