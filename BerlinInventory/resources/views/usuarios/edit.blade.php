@extends("layouts.app")

@section('content')

<div class="card mt-5">
    <div class="bg-primary py-3">
        <h2 class="text-white text-center">Editar Producto</h2>
    </div>

    <div class="card-body">
        <a href="{{ route('products.index') }}" class="btn btn-info btn-sm mb-3">
            <i class="fa fa-arrow-left"></i> Volver al Listado
        </a>
        
        <div class="mt-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('products.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="prod_name">Nombre del producto:</label>
                            <input type="text" name="prod_name" id="prod_name" 
                                   class="form-control @error('prod_name') is-invalid @enderror" 
                                   placeholder="Ingrese el nombre del producto" 
                                   value="{{ old('prod_name', $product->prod_name) }}" required>
                            @error("prod_name")
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price">Precio:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" step="0.01" name="price" id="price" 
                                       class="form-control @error('price') is-invalid @enderror" 
                                       placeholder="0.00" 
                                       value="{{ old('price', $product->price) }}" required>
                                @error("price")
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="stock">Cantidad en stock:</label>
                            <input type="number" name="stock" id="stock" 
                                   class="form-control @error('stock') is-invalid @enderror solo-numero" 
                                   placeholder="Ingrese la cantidad" 
                                   value="{{ old('stock', $product->stock) }}" required>
                            @error("stock")
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="min_stock">Cantidad mínima en stock:</label>
                            <input type="number" name="min_stock" id="min_stock" 
                                   class="form-control @error('min_stock') is-invalid @enderror solo-numero" 
                                   placeholder="Ingrese el mínimo requerido" 
                                   value="{{ old('min_stock', $product->min_stock) }}" required>
                            @error("min_stock")
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group mt-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">
                        <i class="fa fa-save"></i> Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Validación para solo números
    document.querySelectorAll('.solo-numero').forEach(input => {
        input.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    });
    
    // Validación para precio
    const priceInput = document.getElementById('price');
    priceInput.addEventListener('blur', function() {
        if(this.value && !isNaN(this.value)) {
            this.value = parseFloat(this.value).toFixed(2);
        }
    });
});
</script>
@endsection

@endsection