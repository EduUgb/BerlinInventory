@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="mb-0">Detalles del Producto</h2>
                <a href="{{ route('products.index') }}" class="btn btn-light btn-sm">
                    <i class="fa fa-arrow-left"></i> Volver al Listado
                </a>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="detail-item">
                        <h5 class="detail-label">ID del Producto:</h5>
                        <p class="detail-value">{{ $product->id }}</p>
                    </div>

                    <div class="detail-item">
                        <h5 class="detail-label">Nombre del Producto:</h5>
                        <p class="detail-value">{{ $product->prod_name }}</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="detail-item">
                        <h5 class="detail-label">Precio:</h5>
                        <p class="detail-value">${{ number_format($product->price, 2) }}</p>
                    </div>

                    <div class="detail-item">
                        <h5 class="detail-label">Stock Actual:</h5>
                        <p class="detail-value">
                            {{ $product->stock }}
                            @if($product->stock <= $product->min_stock)
                                <span class="badge bg-danger ms-2">Stock Bajo</span>
                            @endif
                        </p>
                    </div>

                    <div class="detail-item">
                        <h5 class="detail-label">Stock Mínimo Requerido:</h5>
                        <p class="detail-value">{{ $product->min_stock }}</p>
                    </div>
                </div>
            </div>

            <div class="mt-4 border-top pt-3">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning me-2">
                        <i class="fa fa-edit"></i> Editar Producto
                    </a>
                    
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" 
                                onclick="return confirm('¿Estás seguro de eliminar este producto?')">
                            <i class="fa fa-trash"></i> Eliminar Producto
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .detail-item {
        margin-bottom: 1.5rem;
    }
    .detail-label {
        color: #6c757d;
        font-size: 0.9rem;
        margin-bottom: 0.3rem;
    }
    .detail-value {
        font-size: 1.1rem;
        font-weight: 500;
    }
</style>

@endsection