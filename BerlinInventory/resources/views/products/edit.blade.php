@extends("layouts.app")

@section('content')

<!-- Vite: importar CSS y JS personalizados -->
@vite(['resources/css/usuario-detalle.css', 'resources/js/usuario-detalle.js'])

<!-- AOS y Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


<div class="card mt-5" data-aos="fade-up">
    <div class="bg-primary py-3">
        <h2 class="text-white text-center"><i class="fas fa-box me-2"></i>Editar Producto</h2>
    </div>

    <div class="card-body">
        <a href="{{ route('products.index') }}" class="btn btn-info btn-sm mb-3">
            <i class="fas fa-arrow-left"></i> Volver
        </a>

        <form action="{{ route('products.update', $product->id) }}" method="POST" data-aos="fade-right">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nombre del producto:</label>
                <input type="text" name="prod_name" class="form-control" placeholder="Escriba el nombre" value="{{ old('prod_name', $product->prod_name) }}">
                @error("prod_name")
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Cantidad en stock:</label>
                <input type="number" name="stock" class="form-control" placeholder="Escriba en números" value="{{ old('stock', $product->stock) }}">
                @error("stock")
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Precio:</label>
                <input type="number" step="0.01" name="price" class="form-control" placeholder="Escriba el precio" value="{{ old('price', $product->price) }}">
                @error("price")
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Cantidad mínima en stock:</label>
                <input type="number" name="min_stock" class="form-control" placeholder="Escriba en números" value="{{ old('min_stock', $product->min_stock) }}">
                @error("min_stock")
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button class="btn btn-success btn-sm" type="submit">
                <i class="fas fa-save"></i> Guardar Cambios
            </button>
        </form>
    </div>
</div>

@endsection
