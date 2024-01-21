<template>
    <button type="button" class="w-full text-center text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Bookings/Contracts list</button>
    <RouterLink to="/"><button class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Go to All Accommodations</button></RouterLink>
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
                          Accomodation name
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Start date
                      </th>
                      <th scope="col" class="px-6 py-3">
                          End date
                      </th>
                  </tr>
              </thead>
              <tbody v-for="(contract, index) in contracts" :key="index" >
                  <tr   class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                      <td class="px-6 py-4">
                          {{ contract.name }}
                      </td>
                      <td class="px-6 py-4">
                          {{ contract.rates }}
                      </td>
                      <td class="px-6 py-4">
                          {{ contract.accommodation.name }}
                      </td>
                      <td class="px-6 py-4">
                          {{ contract.start_date }}
                      </td>
                      <td class="px-6 py-4">
                          {{ contract.end_date }}
                      </td>
                  </tr>
              </tbody>
          </table>
      </div>

      </template>
      <script setup>
      import { ref, onMounted } from 'vue'
      import axios from 'axios'

      let contracts = ref([]);

      onMounted( async () => {
        await axios.post('/contract/', null, {
        headers: {
        'Accept': 'application/json',
        'Authorization': `Bearer ${localStorage.getItem('token')}`
            }}).then((response) => {
        contracts.value = response.data
      }).catch(error=> {
        console.log(error);
      })

      })
      </script>
      <style>

      </style>
