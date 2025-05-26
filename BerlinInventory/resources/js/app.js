import('./bootstrap');
import { createApp } from 'vue'
import Home from './components/Home.vue'

const app = createApp(Home)
app.mount('#app')
