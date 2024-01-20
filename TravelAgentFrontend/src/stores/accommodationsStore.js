import { defineStore } from 'pinia'

export const useAccommodationStore = defineStore({
    id: 'accommodations',
  state: () => ({
      accommodation: {
        id: '',
        name:  '',
        description: '',
        rate: 0
    }
  }),
  actions: {
    
  }
})