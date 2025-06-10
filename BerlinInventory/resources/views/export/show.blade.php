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
        <h2 class="text-white text-center">
            <i class="fas fa-history me-2"></i> Lista de cambios
        </h2>
    </div>

    <div class="card-body">

        <a href="{{ url('/') }}" class="btn btn-info btn-sm mb-3">
            <i class="fas fa-arrow-left"></i> Volver
        </a>

        @foreach ($logs as $log)
            <div class="border rounded p-4 mb-4 shadow-sm bg-light" data-aos="fade-right">
                <p><strong><i class="fas fa-hashtag"></i> ID:</strong> {{ $log->id }}</p>
                <p><strong><i class="fas fa-box"></i> Nombre del Producto:</strong> {{ $log->product->prod_name ?? 'N/A' }}</p>
                <p><strong><i class="fas fa-warehouse"></i> Cantidad en Stock:</strong> {{ $log->product->stock ?? 'N/A' }}</p>
                <p><strong><i class="fas fa-dollar-sign"></i> Precio:</strong> {{ $log->product->price ?? 'N/A' }}</p>
                <p><strong><i class="fas fa-exclamation-triangle"></i> Cantidad mínima:</strong> {{ $log->product->min_stock ?? 'N/A' }}</p>
                <p><strong><i class="fas fa-user"></i> Usuario:</strong> {{ $log->usuario->user_name ?? 'N/A' }}</p>
                <p><strong><i class="fas fa-pencil-alt"></i> Acción:</strong> {{ $log->action }}</p>
                <p><strong><i class="fas fa-calendar-alt"></i> Fecha:</strong> {{ $log->created_at }}</p>
                <p><strong><i class="fas fa-database"></i> Datos antiguos:</strong> {{ $log->old_data }}</p>
                <p><strong><i class="fas fa-database"></i> Datos nuevos:</strong> {{ $log->new_data }}</p>
            </div>
        @endforeach

        <!-- Formulario de exportación -->
        <div class="container mb-5" data-aos="zoom-in">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="{{ route('export') }}" method="GET" class="border p-4 rounded shadow-sm bg-white">
                        <h4 class="text-center mb-4">
                            <i class="fas fa-file-export me-2"></i>Exportar Registros
                        </h4>
                        
                        <div class="form-group mb-3">
                            <label for="format" class="form-label">Formato de exportación:</label>
                            <select name="format" id="format" class="form-select" required>
                                <option value="" disabled selected>Seleccione formato</option>
                                <option value="json">JSON</option>
                                <option value="csv">CSV</option>
                            </select>
                        </div>
                        
                        <div class="d-grid">
 <!-- From Uiverse.io by barisdogansutcu --> 
                                            <button class="download-button">
                                            <div class="docs">
                                                <svg
                                                viewBox="0 0 24 24"
                                                width="20"
                                                height="20"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                fill="none"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="css-i6dzq1"
                                                >
                                                <path
                                                    d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"
                                                ></path>
                                                <polyline points="14 2 14 8 20 8"></polyline>
                                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                                <polyline points="10 9 9 9 8 9"></polyline>
                                                </svg>
                                                Descargar
                                            </div>
                                            <div class="download">
                                                <svg
                                                viewBox="0 0 24 24"
                                                width="24"
                                                height="24"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                fill="none"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="css-i6dzq1"
                                                >
                                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                <polyline points="7 10 12 15 17 10"></polyline>
                                                <line x1="12" y1="15" x2="12" y2="3"></line>
                                                </svg>
                                            </div>
                                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Paginación -->
        <div class="d-flex justify-content-center mt-4">
            {{ $logs->links('pagination::bootstrap-4') }}
        </div>

    </div>
</div>

@endsection
