
@vite(['resources/css/contacto.css'])
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contáctanos - Berlinventory</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    

</head>
<body>
    <!-- Encabezado con animación -->
    <header class="contact-header">
        <div class="header-content">
            <h1>Contáctanos</h1>
            <p>Estamos aquí para ayudarte con cualquier pregunta sobre Berlinventory</p>
        </div>
        <div class="header-wave">
            <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
                <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
                <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
            </svg>
        </div>
                <a href="{{ route('dashboard') }}" class="button">
                    Volver
                </a>

    </header>

    <!-- Tarjetas de contacto -->
    <div class="container">
        <div class="contact-cards">
            <!-- Tarjeta 1: Ubicación -->
            <div class="contact-card">
                <div class="card-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <h3>Oficina principal</h3>
                <p>Berlín, Usulután, El Salvador</p>
                <a href="https://maps.app.goo.gl/UvUrW3aLzDp7RQso6" target="_blank">Ver en mapa</a>
            </div>

            <!-- Tarjeta 2: Teléfono -->
            <div class="contact-card">
                <div class="card-icon">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <h3>Teléfono</h3>
                <p>+503 1010 1919</p>

            </div>

            <!-- Tarjeta 3: Email -->
            <div class="contact-card">
                <div class="card-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <h3>Correo electrónico</h3>
                <p>info@berlinventory.com</p>

            </div>

            <!-- Tarjeta 4: Horario -->
            <div class="contact-card">
                <div class="card-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <h3>Horario de atención</h3>
                <p>Lunes a Viernes: 9:00 am - 4:00 pm</p>
                <p>Sábados: 10:00 am - 2:00 pm</p>
                <a href="#map">Ver ubicación</a>
            </div>
        </div>
    </div>

    <!-- Mapa -->
    <div class="container map-container">
        <h2>Nuestra ubicación</h2>
        <div class="map-wrapper">
            <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3879.603907805807!2d-88.53235465668392!3d13.49848754379032!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f7b4b8ef99e7e63%3A0x29202e2612fc6fab!2zQmVybMOtbiwgVXN1bHV0w6Fu!5e0!3m2!1ses-419!2ssv!4v1749508178861!5m2!1ses-419!2ssv" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>

    <script>
        // Pequeña animación adicional para las tarjetas al cargar
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.contact-card');
            cards.forEach((card, index) => {
                card.style.animation = fadeInUp 0.5s ease ${index * 0.1}s forwards;
                card.style.opacity = '0';
            });
        });
    </script>
</body>
</html>
