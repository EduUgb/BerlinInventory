<template>
  <div>
    <header class="navbar">
      <div class="logo-section">
        <img :src="logo" alt="Logo" class="logo" />
      </div>
      <nav class="nav-links">
            <a href="/usuarios" class="nav-link">Usuarios</a>



        <a href="/products" class="nav-link">Productos</a>
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
          <img :src="item.image" alt="Extra Image" class="extra-image" />
          <div class="extra-text">
            <h3>{{ item.title }}</h3>
            <p>{{ item.description }}</p>
          </div>
        </div>
      </section>
    </main>

    <footer class="footer-bar">
      <p>&copy; {{ new Date().getFullYear() }} BerlInventory. Todos los derechos reservados.</p>
    </footer>
  </div>
</template>

<script setup>
import logo from '/images/logo1.png'
import img1 from '/images/imagen1.jpeg'
import img2 from '/images/imagen2.jpeg'
import img3 from '/images/imagen3.jpeg'
import extra1 from '/images/imagen4.jpeg'
import extra2 from '/images/imagen5.jpeg'
import extra3 from '/images/imagen6.jpeg'

import '../../css/styles.css' // Asegúrate de que la ruta al CSS sea correcta

import { ref, onMounted } from 'vue'

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
  }
])

const currentIndex = ref(0)

function nextImage() {
  currentIndex.value = (currentIndex.value + 1) % images.value.length
}

onMounted(() => {
  setInterval(nextImage, 6000)
})
</script>
