@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Address
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($address, ['route' => ['addresses.update', $address->id], 'method' => 'patch']) !!}

                        @include('addresses.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection