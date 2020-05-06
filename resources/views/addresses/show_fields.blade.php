<!-- First Name Field -->
<div class="form-group">
    {!! Form::label('first_name', 'First Name:') !!}
    <p>{{ $address->first_name }}</p>
</div>

<!-- Last Name Field -->
<div class="form-group">
    {!! Form::label('last_name', 'Last Name:') !!}
    <p>{{ $address->last_name }}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
    <p>{{ $address->address }}</p>
</div>

<!-- City Field -->
<div class="form-group">
    {!! Form::label('city', 'City:') !!}
    <p>{{ $address->city }}</p>
</div>

<!-- Post Code Field -->
<div class="form-group">
    {!! Form::label('post_code', 'Post Code:') !!}
    <p>{{ $address->post_code }}</p>
</div>

<!-- Phone Number Field -->
<div class="form-group">
    {!! Form::label('phone_number', 'Phone Number:') !!}
    <p>{{ $address->phone_number }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $address->user_id }}</p>
</div>

