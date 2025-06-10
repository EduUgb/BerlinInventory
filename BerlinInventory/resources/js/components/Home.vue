<template>
  <div>
    <header class="navbar">
      <div class="logo-section">
        <img :src="logo" alt="Logo" class="logo" />
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

  <!-- Botón logout si está autenticado -->
        <!-- Botón logout si está autenticado -->


  <!-- Botón login si NO está autenticado -->
              <button @click="logout"class="Btn" v-if="isAuthenticated">
                
                <div class="sign"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>
                
                <div class="text"> Logout</div>
              </button>
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
            />
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
            <div
              class="content-item"
              v-for="(item, index) in extraItems"
              :key="index"
            >
              <!-- Tarjetas normales para los primeros 3 items -->
              <div v-if="!item.title.includes('contacto')">
                <img :src="item.image" alt="Extra Image" class="extra-image" />
                <div class="extra-text">
                  <h3>{{ item.title }}</h3>
                  <p>{{ item.description }}</p>
                </div>
              </div>
              
              <!-- Tarjeta especial para contacto con efecto de botón -->
              <a v-else :href="'/contacto'" class="contact-card">
                <img :src="item.image" alt="Contacto" class="contact-image" />
                <span class="contact-text">

                  <span class="hover-text">Contáctanos</span>
                </span>
              </a>
            </div>
          </section>

    </main>

    <footer class="footer-bar">
      <p>&copy; {{ new Date().getFullYear() }} BerlInventory. Todos los derechos reservados.</p>
    </footer>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import '../../css/styles.css' // Ajusta según tu ruta real

const logo = '/images/logo1.png'
const img1 = '/images/imagen1.jpeg'
const img2 = '/images/imagen2.jpeg'
const img3 = '/images/imagen3.jpeg'
const extra1 = '/images/imagen4.jpeg'
const extra2 = '/images/imagen5.jpeg'
const extra3 = '/images/imagen6.jpeg'
const contacto = '/images/contacto.png'

const images = ref([img1, img2, img3])
const titles = ref([
  "Control de Usuarios",
  "Gestión de Productos",
  "Reportes y Estadísticas"
])
const descriptions = ref([
  "Administra usuarios, permisos y roles de forma sencilla.",
  "Organiza tu inventario y controla tus productos en tiempo real.",
  "Genera informes detallados sobre tu inventario y actividad."
])

const extraItems = ref([
  {
    image: extra1,
    title: "Innovación Continua",
    description: "Siempre buscando mejorar con las mejores herramientas tecnológicas."
  },
  {
    image: extra2,
    title: "Soporte 24/7",
    description: "Atención constante para resolver cualquier duda o problema."
  },
  {
    image: extra3,
    title: "Interfaz Intuitiva",
    description: "Diseño pensado para que cualquier usuario pueda manejar el sistema fácilmente."
  },
    {
    image: contacto,
    title: "Ponte en contacto con nosotros",
    description: "Si tienes alguna duda o necesitas ayuda, no dudes en contactarnos."
  }
])

const currentIndex = ref(0)
function nextImage() {
  currentIndex.value = (currentIndex.value + 1) % images.value.length
}
onMounted(() => {
  setInterval(nextImage, 6000)
})

// Estado básico de autenticación
const isAuthenticated = ref(true) // Cambia esta lógica para detectar si hay sesión

// Método logout
async function logout() {
  try {
    await fetch('/logout', {
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        'Content-Type': 'application/json',
        'Accept': 'application/json',
      },
      credentials: 'same-origin',
    })
    // Redirigir al login después de logout
    window.location.href = '/login'
  } catch (error) {
    console.error('Error en logout:', error)
  }
}
</script>

<style scoped>
/* Estilo básico para el botón logout en la navbar */
.logout-button {
  background: none;
  border: none;
  color: #000000;
  cursor: pointer;
  font-size: 1rem;
  padding: 0;
  margin-left: 15px;

}
.logout-button:hover {
  color: #ff4d4d;
}
/* Estilos existentes se mantienen */

/* Nuevos estilos para la tarjeta de contacto */
.contact-card {
  position: relative;
  display: block;
  text-decoration: none;
  color: #e8e8e8;
  width: 100%;
  height: 100%;
  overflow: hidden;
  background: linear-gradient(-45deg, #00ff77 0%, #7b168b 100%);
  transition: all 0.3s cubic-bezier(0.215, 0.610, 0.355, 1);
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.contact-image {
  width: 100%;
  height: 200px;
  object-fit: cover;


}

.contact-text {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  pointer-events: none;
}

.contact-text span {
  position: absolute;
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.3s cubic-bezier(0.215, 0.610, 0.355, 1);
  font-weight: 600;
  font-size: 1.5rem;
}

.initial-text {
  opacity: 1;
}

.hover-text {
  opacity: 0;
  transform: translateY(100%);
}

.contact-card:before,
.contact-card:after {
  content: "";
  position: absolute;
  width: 24px;
  height: 24px;
  pointer-events: none;
  transition: all 0.3s cubic-bezier(0.215, 0.610, 0.355, 1);
}

.contact-card:before {
  top: 0;
  left: 0;
  border-top: 2px solid #e8e8e8;
  border-left: 2px solid #e8e8e8;
}

.contact-card:after {
  bottom: 0;
  right: 0;
  border-bottom: 2px solid #e8e8e8;
  border-right: 2px solid #e8e8e8;
}

.contact-card:hover {
  box-shadow: 0 0 30px rgba(248, 155, 41, 0.4),
              0 0 30px rgba(255, 15, 123, 0.4);
}

.contact-card:hover .contact-image {
  opacity: 0.4;
}

.contact-card:hover .initial-text {
  opacity: 0;
  transform: translateY(-100%);
}

.contact-card:hover .hover-text {
  opacity: 1;
  transform: translateY(0);
}

.contact-card:hover:before,
.contact-card:hover:after {
  width: 100%;
  height: 100%;
}

.contact-card:active {
  transform: scale(0.95);
  box-shadow: 0 0 10px rgba(248, 155, 41, 0.4),
              0 0 10px rgba(255, 15, 123, 0.4);
}

/* Ajustes para mantener consistencia con las otras tarjetas */
.content-item {
  /* Asegúrate que tenga position: relative si no la tiene */
  position: relative;
  overflow: hidden;
  }

</style>
