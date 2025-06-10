<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileReaderController extends Controller
{
    public function index()
    {
        return view('lector');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,json',
        ]);

        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $data = [];

        if ($extension === 'csv') {
            $rows = array_map('str_getcsv', file($file));
            $headers = array_shift($rows);
            foreach ($rows as $row) {
                $data[] = array_combine($headers, $row);
            }
        } elseif ($extension === 'json') {
            $json = file_get_contents($file);
            $data = json_decode($json, true);
        }

        return view('lector', compact('data'));
    }
}
