@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Order Item
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($orderItem, ['route' => ['orderItems.update', $orderItem->id], 'method' => 'patch']) !!}

                        @include('order_items.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection