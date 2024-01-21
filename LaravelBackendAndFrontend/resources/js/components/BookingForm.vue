<template>
<button type="button" class="w-full text-center text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Book Accommodation</button>
<RouterLink to="/"><button class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Go to All Accommodations</button></RouterLink>
<form class="max-w-sm mx-auto mt-4">
  <input type="text" id="disabled-input" aria-label="disabled input" class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" v-model="name" disabled>
  <input type="text" id="disabled-input-2" aria-label="disabled input 2" class="mt-4 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" v-model="description" disabled readonly>
  <input type="text" id="disabled-input-2" aria-label="disabled input 2" class="mt-4 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" v-model="price" disabled readonly>
  <label for="start" class="mt-4">Enter start date</label>
  <input type="date" name="start" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" v-model="endDate">
  <label for="end" class="mt-4">Enter name for end date</label>
  <input type="date" name="end" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" v-model="startDate">
</form>
<div class="flex justify-center items-center mt-4" >
    <button @click="book" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

</div>

</template>
<script setup>
import { useAccommodationStore } from '@/stores/accommodationsStore';
import { useRouter } from 'vue-router';
import axios from 'axios'
import { ref } from 'vue'

const bookDetails = useAccommodationStore();

const router = useRouter();
let startDate = ref('');
let endDate = ref('');

let description = bookDetails.accommodation.description;
let name =  bookDetails.accommodation.name;
let price = bookDetails.accommodation.rate;
let id = bookDetails.accommodation.id

async function book() {

    console.log('Our user id is: ',localStorage.getItem('user_id'));
    let booking = await axios.post(`/contract/store`, {
      name: name,
      rates: price,
      description: description,
      agent_id: localStorage.getItem('user_id'),
      accommodation_id: id,
      start_date: startDate.value,
      end_date: endDate.value
    }).then((response) => {
        router.push({ name: "List" });
        alert('Booking made successfully.')
    }).catch(error => {
        console.log(error);
    });

  }
</script>
<style>

</style>
