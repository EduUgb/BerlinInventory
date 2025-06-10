@extends('layouts.app')

@section('content')

<!-- Vite: importar CSS y JS desde resources -->
@vite(['resources/css/usuario-detalle.css', 'resources/js/usuario-detalle.js'])

<!-- AOS y Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<div class="card mt-5" data-aos="fade-up">
    <div class="bg-primary py-4">
        <h2 class="text-white text-center"><i class="fas fa-box-open me-2"></i>Lista de productos</h2>
    </div>

    <div class="card-body">
        <a href="{{ route('products.index') }}" class="btn btn-info btn-sm mb-4">
            <i class="fas fa-arrow-left"></i> Volver
        </a>

        <div class="mt-3">
            <div class="info-item" data-aos="fade-right">
                <strong>ID:</strong> {{ $product->id }}
            </div>
            <div class="info-item" data-aos="fade-left">
                <strong>Nombre del Producto:</strong> {{ $product->prod_name }}
            </div>
            <div class="info-item" data-aos="fade-right">
                <strong>Cantidad en Stock:</strong> {{ $product->stock }}
            </div>
            <div class="info-item" data-aos="fade-left">
                <strong>Precio:</strong> ${{ $product->price }}
            </div>
            <div class="info-item" data-aos="fade-up">
                <strong>Cantidad mínima en stock:</strong> {{ $product->min_stock }}
            </div>
        </div>
    </div>
</div>

@endsection
