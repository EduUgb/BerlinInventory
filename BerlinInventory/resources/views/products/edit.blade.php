@extends("layouts.app")

@section('content')

<div class="card mt-5">
    <div class="bg-primary py-3">
        <h2 class="text-white text-center " >Lista de productos</h2>
</div>


<div class="card-body" >

    <a href="{{ route('products.index') }}" class="btn btn-info btn-sm mb-3"><i class="fa fa-arrow-left"></i> Back</a>
            <div class="mt-4">

    <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
 
            <div class="mt-2">
                <label for="">Nombre del producto:</label>
                <input type="text" name="prod_name" placeholder="Escriba el texto" class="form-control" value="{{ $product->prod_name }}">
                @error("prod_name")
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
 
            <div class="mt-2">
                <label for="">Cantidad en stock:</label>

                <input type="text" name="stock" placeholder="Escriba en números" class="form-control solo-numero" value="{{ $product->stock }}">
                @error("stock")
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
 
            <div class="mt-2">
                <label for="">Precio:</label>
                <input type="text" name="price" placeholder="Escriba en números" class="form-control" value="{{ $product->price }}" >
                @error("price")
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-2">
                <label for="">Cantidad mínima en stock:</label>
                <input type="text" name="min_stock" placeholder="Escriba en números" class="form-control" value="{{ $product->min_stock }}">
                @error("min_stock")
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-2">
                <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-save"></i> Submit</button>
            </div>
 
        </form>

</div>




@endsection