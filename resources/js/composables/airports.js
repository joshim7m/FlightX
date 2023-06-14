import { ref } from 'vue'

export default function useAirports(){

  const airports = ref({})
  const airport = ref({})


  const getAirports = async (search_airport = '') => {
    axios.get('/api/airports?search_airport=' + search_airport)
      .then(response => {
        airports.value = response.data.data
      })
  }

  const getAirport = async (id) => {
    axios.get('/api/airports/'+ id)
      .then(response => {
        airport.value = response.data.data
        console.log(airport.value)
      })
  }

  return { airport, getAirport, airports, getAirports }
}