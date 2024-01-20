import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
// import Login from './Login.vue'
import Login from './components/AccommodationsList.vue'
import router from './router'
import './index.css'


const app = createApp(App)

app.use(createPinia())
app.use(router)

app.mount('#app')
