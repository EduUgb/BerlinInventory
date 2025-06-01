@extends("layouts.app")

@section('content')
<!-- resources/views/export.blade.php -->
<form action="{{ route('export') }}" method="GET">
    <div class="form-group">
        <label for="format">Formato de exportación:</label>
        <select name="format" id="format" class="form-control" required>
            <option value="">Seleccione formato</option>
            <option value="json">JSON</option>
            <option value="csv">CSV</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary mt-3">
        <i class="fas fa-download"></i> Exportar
    </button>
</form>

@endsection