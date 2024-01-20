<template>
<div class="dark:bg-gray-900 h-screen flex items-center justify-center">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Stack Rate
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
            <!-- Add more rows as needed -->
        </tbody>
    </table>
</div>
<!-- <RouterView />  -->

</template>
<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'
import { useAccommodationStore } from '@/stores/accommodationsStore';
  
let accommodations = ref([]);
onMounted(async () => {

let items = await axios.get('http://127.0.0.1:8000/api/accommodation');

accommodations.value = items.data;

console.log(items.data);

})

function changeState(id, name, description, price) {
    const accommodationValues = useAccommodationStore();
    accommodationValues.accommodation.id = id;
    accommodationValues.accommodation.name = name;
    accommodationValues.accommodation.description = description;
    accommodationValues.accommodation.rate = price;

    }

</script>
<style>
    
</style>