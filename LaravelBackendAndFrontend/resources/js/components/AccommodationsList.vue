<template>
<button type="button" class="w-full text-center text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Accommodations list</button>
<div class="flex justify-between items-center">
    <button @click="logout" type="button" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Logout</button>
    <RouterLink :to="{name: 'Bookings'}">
        <button type="button" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Booking Lists</button>
    </RouterLink>
</div>
  <div class="dark:bg-gray-900 flex items-center justify-center">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                  <th scope="col" class="px-6 py-3">
                      Name
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Stack Rate
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Options
                  </th>
              </tr>
          </thead>
          <tbody v-for="(accommodation, index) in accommodations" :key="index" >
              <tr   class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                  <td class="px-6 py-4">
                      {{ accommodation.name }}
                  </td>
                  <td class="px-6 py-4">
                      {{ accommodation.rates }}
                  </td>
                  <td>
                      <div class="px-6 pt-4 pb-2">
                          <RouterLink :to="{name: 'Accommodation', params:{id: accommodation.id }}">
                              <button @click="changeState(accommodation.id, accommodation.name, accommodation.description, accommodation.rates)" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                                  Open accommodation
                              </button>
                          </RouterLink>
                      </div>
                  </td>
              </tr>
          </tbody>
      </table>
  </div>

  </template>
  <script setup>
  import { ref, onMounted } from 'vue'
  import axios from 'axios'
  import { useAccommodationStore } from '@/stores/accommodationsStore';
import router from '../router';

const mainRouter= router

  let accommodations = ref([]);

  onMounted( async () => {
    await axios.post('/accommodation', null, {
    headers: {
    'Accept': 'application/json',
    'Authorization': `Bearer ${localStorage.getItem('token')}`
        }}).then((response) => {
    accommodations.value = response.data
  }).catch(error=> {
    console.log(error);
  })

  })

  function changeState(id, name, description, price) {
      const accommodationValues = useAccommodationStore();
      accommodationValues.accommodation.id = id;
      accommodationValues.accommodation.name = name;
      accommodationValues.accommodation.description = description;
      accommodationValues.accommodation.rate = price;

    }
async function logout() {
    console.log('token before logout is: ', localStorage.getItem('token'));
    await axios.post('/logout', null, {
  headers: {
    'Accept': 'application/json',
    'Authorization': `Bearer ${localStorage.getItem('token')}`
  }
  }).then((response)=> {
        console.log(response)
        localStorage.removeItem('token')
        localStorage.removeItem('user_id')
        mainRouter.push({name: 'Login'})

    })

}
  </script>
  <style>

  </style>
