@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Deliverable Post Code
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($deliverablePostCode, ['route' => ['deliverablePostCodes.update', $deliverablePostCode->id], 'method' => 'patch']) !!}

                        @include('deliverable_post_codes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection