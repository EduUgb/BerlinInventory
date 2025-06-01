@extends('layouts.app')

@section('content')

<div class="card mt-5">
    <div class="bg-primary py-3">
        <h2 class="text-white text-center">Lista de cambios</h2>
    </div>

    <div class="card-body">

        <a href="{{ url('/') }}" class="btn btn-info btn-sm mb-3">
            <i class="fa fa-arrow-left"></i> Volver
        </a>

        @foreach ($logs as $log)
            <div class="mt-4 border p-3 rounded mb-3">
                <p><strong>ID:</strong> {{ $log->id }}</p>
                <p><strong>Nombre del Producto:</strong> {{ $log->products->prod_name ?? 'N/A' }}</p>
                <p><strong>Cantidad en Stock:</strong> {{ $log->products->stock ?? 'N/A' }}</p>
                <p><strong>Precio:</strong> {{ $log->products->price ?? 'N/A' }}</p>
                <p><strong>Cantidad mínima en stock:</strong> {{ $log->products->min_stock ?? 'N/A' }}</p>
                <p><strong>Usuario:</strong> {{ $log->usuario->user_name ?? 'N/A' }}</p>
                <p><strong>Acción:</strong> {{ $log->action }}</p>
                <p><strong>Fecha:</strong> {{ $log->created_at }}</p>
                <p><strong>Datos antiguos:</strong> {{ $log->old_data }}</p>
                <p><strong>Datos nuevos:</strong> {{ $log->new_data }}</p>
            </div>
        @endforeach
                    
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <form action="{{ route('export') }}" method="GET" class="border p-4 rounded shadow-sm bg-white">
                                <h4 class="text-center mb-4">Exportar Registros</h4>
                                
                                <div class="form-group mb-3">
                                    <label for="format" class="form-label">Formato de exportación:</label>
                                    <select name="format" id="format" class="form-select" required>
                                        <option value="" disabled selected>Seleccione formato</option>
                                        <option value="json">JSON</option>
                                        <option value="csv">CSV</option>
                                    </select>
                                </div>
                                
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-download me-2"></i> Exportar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $logs->links('pagination::bootstrap-4') }}
        </div>

    </div>
</div>

@endsection
