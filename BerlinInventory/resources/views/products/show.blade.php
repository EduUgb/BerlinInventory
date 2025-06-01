@extends('layouts.app')

@section('content')

<div class="card mt-5">
    <div class="bg-primary py-3">
        <h2 class="text-white text-center " >Lista de productos</h2>
</div>


<div class="card-body" >

    <a href="{{ route('products.index') }}" class="btn btn-info btn-sm mb-3"><i class="fa fa-arrow-left"></i> Volver</a>
            <div class="mt-4">

                <p><strong>ID:</strong> {{ $product->id }}</p>
                <p><strong>Nombre del Producto:</strong> {{ $product->prod_name }}</p>
                <p><strong>Cantidad en Stock:</strong> {{ $product->stock }}</p>
                <p><strong>Precio:</strong> {{ $product->price }} </p>
                <p><strong>Cantidad mínima en stock:</strong> {{ $product->min_stock }}</p>
            </div>


</div>



@endsection