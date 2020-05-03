@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Price Option
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($priceOption, ['route' => ['priceOptions.update', $priceOption->id], 'method' => 'patch']) !!}

                        @include('price_options.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection