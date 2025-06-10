<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Berlin Inventory</title>
    @vite('resources/js/app.js') {{-- Carga correcta del frontend --}}
</head>
<body>
    <div id="app"></div>
</body>
</html>
