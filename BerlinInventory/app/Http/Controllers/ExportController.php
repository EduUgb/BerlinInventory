<?php

namespace App\Http\Controllers;
use App\Models\InventoryLogs;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ExportController extends Controller
{
    public function __invoke(Request $request)
    {
        // Validar el formato de exportación
        $request->validate([
            'format' => 'required|in:json,csv' // Asegura que el formato sea válido
        ]);
        
        $logs = InventoryLogs::with(['usuario', 'products'])
                ->orderBy('created_at', 'desc')
                ->get();

        $fileName = 'inventroy_logs_'.date('Y-m-d-H-i-s').'.'.$request->format;

        if ($request -> format === 'json'){
            return $this->exportJson($logs, $fileName);
        }
        return $this->exportCsv($logs, $fileName);
    }

    protected function exportJson($data, $filename)
    {
        return response()->streamDownload(
            function () use ($data) {
                echo json_encode($data, JSON_PRETTY_PRINT);
            },
            $filename,
            ['Content-Type' => 'application/json']
        );
    }

    protected function exportCsv($data, $filename)
    {
        return response()->streamDownload(
            function () use ($data) {
                $handle = fopen('php://output', 'w');
                
                // Encabezados CSV
                fputcsv($handle, [
                    'ID', 
                    'Usuario', 
                    'Producto', 
                    'Acción', 
                    'Fecha', 
                    'Datos Antiguos', 
                    'Datos Nuevos'
                ]);
                
                // Filas de datos
                foreach ($data as $log) {
                    fputcsv($handle, [
                        $log->id,
                        $log->usuario->user_name ?? 'N/A',
                        $log->products->prod_name ?? 'N/A',
                        $log->action,
                        $log->created_at,
                        $log->old_data,
                        $log->new_data
                    ]);
                }
                
                fclose($handle);
            },
            $filename,
            ['Content-Type' => 'text/csv']
        );
    }
    public function show()
    {
        $logs = InventoryLogs::with(['usuario', 'products'])
                ->orderBy('created_at', 'desc')
                ->paginate(3);

        return view('export.show', compact('logs'));
    }

}

