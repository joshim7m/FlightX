import { ref } from 'vue'
import NProgress from 'nprogress';

export default function useFlights(){

  const flights = ref({})
  const cFC = ref()
  const validationErrors = ref({})

  const getFlights = async(flyFrom, flyTo, departure) => {
    
    validationErrors.value = '';

    NProgress.start();
    axios.get('/api/flights?fly_from=' +flyFrom+
        '&fly_to=' +flyTo+
        '&departure=' +departure
        )
      .then(response => {
        flights.value = response.data.data
        if(flights.value.length > 0){
            cFC.value = true
          }
        console.log(response.data.data)
      })
      .catch(error => {
        if(error.response?.data){
          validationErrors.value = error.response.data.errors
        }
      })
      .finally(() => NProgress.done())
  }

  

  return { flights, getFlights, validationErrors, cFC }
}