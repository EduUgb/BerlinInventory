<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>BerlInventory Online</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
</head>
<body>
    <div id="app">
        <header class="navbar">
            <div class="logo-section">
                <img src="logo1.png" alt="Logo" class="logo">
            </div>
            <nav class="nav-links">
                <a href="#" class="nav-link">Usuarios</a>
                <a href="#" class="nav-link">Productos</a>
                <a href="#" class="nav-link login-link">Iniciar sesión</a>
            </nav>
        </header>

        <main class="main-content">
            <h1>Bienvenido a BerlInventory Online</h1>
            <p>Gestiona tus usuarios y productos de manera eficiente.</p>

        <div class="slider-container">
            <div class="slider-image-area">
                <transition name="slide-fade" mode="out-in">
                    <img 
                        :src="images[currentIndex]" 
                        :key="images[currentIndex]" 
                        alt="Slide" 
                        class="slider-image"
                    >
                </transition>
            </div>


            <div class="slider-text-area">
                <transition name="slide-fade" mode="out-in">
                    <div class="slider-text" :key="titles[currentIndex]">
                        <h2>{{ titles[currentIndex] }}</h2>
                        <p>{{ descriptions[currentIndex] }}</p>
                    </div>
                </transition>
            </div>
        </div>
            
        <section class="extra-content">
            <div class="content-item" v-for="(item, index) in extraItems" :key="index">
                <img :src="item.image" alt="Extra Image" class="extra-image" />
                <div class="extra-text">
                <h3>{{ item.title }}</h3>
                <p>{{ item.description }}</p>
                </div>
            </div>
         </section>

        </main>

        <footer class="footer-bar">
            <p>&copy; <?php echo date("Y"); ?> BerlInventory. Todos los derechos reservados.</p>
        </footer>
    </div>


<script>
    new Vue({
        el: '#app',
        data: {
            images: ["imagen1.jpeg", "imagen2.jpeg", "imagen3.jpeg"],
            currentIndex: 0,
            titles: [
            "Control de Usuarios",
            "Gestión de Productos",
            "Reportes y Estadísticas"
            ],
            descriptions: [
            "Administra usuarios, permisos y roles de forma sencilla.",
            "Organiza tu inventario y controla tus productos en tiempo real.",
            "Genera informes detallados sobre tu inventario y actividad."
            ],
            extraItems: [
            {
                image: "imagen4.jpeg",
                title: "Innovación Continua",
                description: "Siempre buscando mejorar con las mejores herramientas tecnológicas."
            },
            {
                image: "imagen5.jpeg",
                title: "Soporte 24/7",
                description: "Atención constante para resolver cualquier duda o problema."
            },
            {
                image: "imagen6.jpeg",
                title: "Interfaz Intuitiva",
                description: "Diseño pensado para que cualquier usuario pueda manejar el sistema fácilmente."
            }
            ]
        },
        methods: {
            nextImage() {
                this.currentIndex = (this.currentIndex + 1) % this.images.length;
            },
            prevImage() {
                this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
            }
        },
        mounted() {
            setInterval(this.nextImage, 6000);
        }
    });

</script>


</body>
</html>
