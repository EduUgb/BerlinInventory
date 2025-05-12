@extends('layouts.app')

@section('content')

<div class="card mt-5">
    <div class="bg-primary py-3">
        <h2 class="text-white text-center " >CuscAdmin</h2>
</div>


<div class="card-body">
    <a href="{{ route('products.create') }}" class="btn btn-success btn-sm mb-3"> <i class="fa fa-plus"></i> Create Product</a>
    <table class="table align-items-center">

  <thead>
        <tr>
            <th>ID</th> 
            <th>Nombre del Producto</th>
            <th>Cantidad en Stock</th>
            <th>Precio</th>
            <th>Cantidad mínima en Stock</th>
            
        </tr>
    </thead>
    <tbody>
        
        @if ($products->isEmpty())
    <div class="alert alert-info">No hay productos registrados.</div>
    @else
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->prod_name }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->price }}</td> 
                <td>{{ $product->min_stock }}</td>
                <td>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
 
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> View</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Edit</a>
 
                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                        </form>
                    </td>
            </tr>
            
        @endforeach
    @endif

    </tbody>

</table>



</div>


<div class=""
@endsection