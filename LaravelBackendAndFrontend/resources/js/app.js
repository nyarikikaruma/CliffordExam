import {createApp} from 'vue'
import axios from 'axios'
import App from './App.vue'
import router from './router';
import { createPinia } from 'pinia';

const pinia = createPinia()

const mainRouter= router
window.axios = axios;
    if(localStorage.getItem('token') === null) {
    mainRouter.push({name: 'Login'} )
    }
    else {
        mainRouter.push({name: 'List'});
        }

    axios.defaults.baseURL = 'http://127.0.0.1:8000/api'
createApp(App).use(router).use(pinia).mount("#app")
