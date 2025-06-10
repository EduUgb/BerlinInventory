@vite(['resources/css/lector.css', 'resources/css/styles.css'])
<!DOCTYPE html>
<html lang="es">



</head>

<body>
    <header class="navbar">
        <div class="logo-section"onclick="window.location.href='/dashboard'">
            <img src="/images/logo1.png" alt="Logo" class="logo" />
        </div>
        <nav class="nav-links">
            <button onclick="window.location.href='/usuarios'" class="button2">
                <span class="button_top">Usuarios</span>
            </button>
            <button onclick="window.location.href='/products'" class="button2">
                <span class="button_top">Productos</span>
            </button>
            <button onclick="window.location.href='/export/show'" class="button2">
                <span class="button_top">Registro</span>
            </button>
                <button onclick="window.location.href='/lector'" class="button2">
                <span class="button_top">Lector</span>
            </button>
            <!-- Botón logout -->
            <button onclick="logout()" class="Btn">
                <div class="sign">
                    <svg viewBox="0 0 512 512">
                        <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
                    </svg>
                </div>
                <div class="text">Logout</div>
            </button>
        </nav>
    </header>

    <h1 class="h1s" >Lector de Archivos CSV y JSON</h1>
    <form action="{{ route('lector.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" required>
        <button class="button4" type="submit">Subir y Leer</button>
    </form>

    @isset($data)
        @if(is_array($data) && count($data))
        <div class="conta">
            <table>
                <thead>
                    <tr>
                        @foreach(array_keys($data[0]) as $key)
                            <th>{{ $key }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                        <tr>
                            @foreach($row as $cell)
                                <td>{{ is_array($cell) ? json_encode($cell) : $cell }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        @else
            <p>No se pudo leer el contenido del archivo.</p>
        @endif
    
    @endisset

    <script>
        // Función para manejar el logout
        async function logout() {
            try {
                const response = await fetch('/logout', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    credentials: 'same-origin',
                });
                
                if (response.ok) {
                    window.location.href = '/login';
                } else {
                    console.error('Error en logout');
                }
            } catch (error) {
                console.error('Error en logout:', error);
            }
        }

        // Mostrar nombre del archivo seleccionado
        document.querySelector('input[type="file"]').addEventListener('change', function(e) {
            const fileName = e.target.files[0] ? e.target.files[0].name : 'Ningún archivo seleccionado';
            console.log('Archivo seleccionado:', fileName);
        });
    </script>
</body>
</html>