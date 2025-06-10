<template>
  <div>
    <header class="navbar">
      <div class="logo-section" onclick="window.location.href='/dashboard'">
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
    <button onclick="window.location.href='/lector'" class="button2">
    <span class="button_top">Lector</span>
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


</style>
