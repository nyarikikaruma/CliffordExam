import { createRouter, createWebHistory } from 'vue-router'
import Login from '../components/Login.vue'
import HomeView from '../components/AccommodationsList.vue'
import Details from '../components/AccomodationDetails.vue'
import Book from '../components/BookingForm.vue'
import Bookings from '../components/Accommodation.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/login',
      name: 'Login',
      component: Login
    },
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
    },
    {
      path: '/bookings',
      name: 'Bookings',
      component: Bookings
    }
  ]
})

export default router
