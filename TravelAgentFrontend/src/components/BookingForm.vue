<template>

<form class="max-w-sm mx-auto">
  <input type="text" id="disabled-input" aria-label="disabled input" class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" v-model="name" disabled>
  <input type="text" id="disabled-input-2" aria-label="disabled input 2" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" v-model="description" disabled readonly>
  <input type="text" id="disabled-input-2" aria-label="disabled input 2" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" v-model="price" disabled readonly>
  <input type="date" id="disabled-input-2" aria-label="disabled input 2" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" v-model="endDate">
  <input type="date" id="disabled-input-2" aria-label="disabled input 2" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" v-model="startDate">
  <button @click="book" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>

</template>
<script setup>
import { useAccommodationStore } from '@/stores/accommodationsStore';
import { useRouter } from 'vue-router';
import axios from 'axios'

const bookDetails = useAccommodationStore();

const router = useRouter();
let startDate = '';
let endDate = '';

let description = bookDetails.accommodation.description;
let name =  bookDetails.accommodation.name;
let price = bookDetails.accommodation.rate;
let id = bookDetails.accommodation.id

async function book() {
    let booking = await axios.post(`http://127.0.0.1:8000/api/contract/`, {
      name: name,
      rates: price,
      description: description,
      agent_id: '0e7eb04b-a276-48c5-9b3c-e82f79238c63',
      accommodation_id: id,
      start_date: startDate,
      end_date: endDate
    });

    router.push({ name: "List" });
    alert('Booking made successfully.')
  }
</script>
<style>
    
</style>