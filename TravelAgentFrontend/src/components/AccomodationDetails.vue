<template>
    <div class="container mx-auto mt-8">
      <h1 class="text-2xl font-semibold mb-4">Accommodation Details</h1>
      <div class="max-w-sm rounded overflow-hidden shadow-lg bg-amber-300">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{ accommodationValues.accommodation.name }}</div>
                <p class="text-gray-700 text-base">
                {{ accommodationValues.accommodation.description }}
                </p>
            </div>
            <div class="px-6 pt-4 pb-2">
                <RouterLink to="/"><button class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Go to All Accommodations</button></RouterLink>
                <RouterLink :to="{name: 'Book', params: {id: accommodationValues.accommodation.id}}"><button class="inline-block bg-gray-400 rounded-full px-3 py-1 text-sm font-semibold text-green-300 mr-2 mb-2">Book Accommodation</button></RouterLink>
            </div>
        </div>
    </div>
</template>
<script setup>
import { useAccommodationStore } from '../stores/accommodationsStore'
import axios from 'axios';
import { useRouter } from 'vue-router';

const router = useRouter();
const accommodationValues = useAccommodationStore();

</script>
<style lang="">
    
</style>