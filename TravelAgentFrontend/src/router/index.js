import { createRouter, createWebHistory } from 'vue-router'
import Home from '../App.vue'
import HomeView from '../components/AccommodationsList.vue'
import Details from '../components/AccomodationDetails.vue'
import Book from '../components/BookingForm.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    // {
    //   path: '/',
    //   name: 'Home',
    //   component: Home
    // },
    {
      path: '/',
      name: 'List',
      component: HomeView
    },
    {
      path: '/accommodation/:id',
      name: 'Accommodation',
      component: Details
    },
    {
      path: '/book/:id',
      name: 'Book',
      component: Book
    }
  ]
})

export default router
