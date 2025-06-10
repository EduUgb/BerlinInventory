@extends('layouts.app')

@section('content')

<!-- Vite: importar CSS y JS personalizados -->
@vite(['resources/css/usuario-detalle.css', 'resources/js/usuario-detalle.js'])

<!-- AOS y Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<div class="card mt-5" data-aos="fade-up">
    <div class="bg-primary py-3">
        <h2 class="text-white text-center"><i class="fas fa-boxes me-2"></i>CuscAdmin</h2>
    </div>

    <div class="card-body">
        <a href="{{ url('/') }}" class="btn btn-info btn-sm mb-3"><i class="fas fa-arrow-left"></i> Volver</a>
        <a href="{{ route('products.create') }}" class="btn btn-success btn-sm mb-3">
            <i class="fas fa-boxes"></i> Nuevo Producto
        </a>
        @if ($products->isEmpty())
            <div class="alert alert-info" data-aos="fade-in">No hay productos registrados.</div>
        @else
            <table class="table align-items-center table-bordered" data-aos="fade-up">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nombre del Producto</th>
                        <th>Cantidad en Stock</th>
                        <th>Precio</th>
                        <th>Cantidad mínima</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr data-aos="fade-right">
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->prod_name }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td>{{ $product->min_stock }}</td>
                            <td>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary btn-sm mb-1">
                                        <i class="fas fa-eye"></i> Ver
                                    </a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info btn-sm mb-1">
                                        <i class="fas fa-pencil-alt"></i> Editar
                                    </a>
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este producto?')">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

@endsection
