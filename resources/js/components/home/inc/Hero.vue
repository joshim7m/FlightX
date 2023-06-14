<template>
  <div class="hero">
    <div class="min-h-fit bg-no-repeat bg-right" style="background-image: url('/frontend/img/hero-img.png'); background-size: 49%;">
      <div class="container flex">
        <div class="flex-1 pr-2">
          <div class="heading my-20">
            <h2 class="text-4xl leading-10">Let's make a tour <br>
            <span class="font-bold text-violet-800">Discover the beauty</span></h2>
          </div>
            <div class="search-form">
              <div class="tab mb-5">
                <div class="tabs flex items-center bg-[#F3DCDC] space-x-2 text-sm rounded-full max-w-max">
                  <div class="bg-violet-800 text-white h-full px-3 py-2 rounded-l-full">One Way</div>
                  <div class="px-3 py-2">Round Trip</div>
                  <div class="px-3 py-2">Multi-City</div>
                </div>
              </div>
              <div class="form">
                <form @submit.prevent="getFlights(searchForm.from_airport, searchForm.to_airport, searchForm.departure)">
                  <div class="flying grid grid-cols-2 gap-2 items-center">
                    <div class="relative flex flex-col bg-white shadow-sm p-3 rounded-sm">
                      <label class="text-sm font-medium text-gray-500">Flying from</label>
                      <input 
                      class="text-xl font-medium bg-gray-50 focus:outline-none rounded-lg" 
                      type="text" id="flyfrom_city" v-model="searchForm.from_airport" autocomplete="off" required
                      @focus="onFocus('fly-from')" placeholder="Dhaka">
                      <span class="text-xs font-medium" id="flyfrom_name">DAC - Hazrat Shahjalal International</span>
                      <div class="text-xs text-red-500" v-for="message in validationErrors?.from_city">
                        {{ message }}
                      </div>

                      <!-- Flyon modal -->
                      <div v-if="flyfrom_focused" id="flyFromModal" 
                      class="absolute z-10 top-full left-0 w-full overflow-y-auto h-80 bg-white shadow-lg border-2">
                        <div class="airports">
                          <div class="airport border-b border-gray-200 p-3"
                          v-for="(airport, index) in airports">
                            <h3 @click="setAirport('fly-from', index)"
                             class="text-xs text-gray-600 cursor-pointer">
                              <strong :id="'from-abbr-'+ index" class="text-lg text-gray-800 mr-1">{{ airport.abbr }}</strong> 
                              <span :id="'from-name-'+ index"> {{ airport.name }}</span>
                              <span class="hidden" :id="'from-city-' + index "> {{ airport.city }}</span>
                            </h3>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="relative flex flex-col bg-white shadow-sm p-3 rounded-sm">
                      <label class="text-sm font-medium text-gray-500">Flying to</label>
                      <input 
                      class="text-xl font-medium bg-gray-50 focus:outline-none rounded-lg" 
                      type="text" id="flyTo_city" v-model="searchForm.to_airport"
                      @focus="onFocus('fly-to')" placeholder="Cox's Bazar" autocomplete="off" required> 
                      <span class="text-xs font-medium" id="flyTo_name">CXB - CXB - Cox's Bazar Airport</span>
                      <div class="text-xs text-red-500" v-for="message in validationErrors?.to_city">
                        {{ message }}
                      </div>

                      <!-- Flyto modal -->
                      <div v-if="flyto_focused" id="flyToModal" 
                      class="absolute z-10 top-full left-0 w-full overflow-y-auto h-80 bg-white shadow-lg border-2">
                        <div class="airports">
                          <div class="airport border-b border-gray-200 p-3"
                          v-for="(airport, index) in airports">
                            <h3 @click="setAirport('fly-to', index)"
                             class="text-xs text-gray-600 cursor-pointer">
                              <strong :id="'to-abbr-'+ index" class="text-lg text-gray-800 mr-1">{{ airport.abbr }}</strong> 
                              <span :id="'to-name-'+ index"> {{ airport.name }}</span>
                              <span class="hidden" :id="'to-city-' + index "> {{ airport.city }}</span>
                            </h3>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="flex flex-col bg-white shadow-sm p-3 rounded-sm">
                      <label class="text-sm font-medium text-gray-500">Departure to</label>
                      <input class="text-xl font-medium bg-gray-50 focus:outline-none rounded-lg" 
                      type="date" v-model="searchForm.departure" placeholder="5 JUN" required>
                      <span class="text-xs font-medium">2023 Monday</span>
                      <div class="text-xs text-red-500" v-for="message in validationErrors?.departure_on">
                        {{ message }}
                      </div>
                    </div>

                    <div class="flex flex-col bg-white shadow-sm p-3 rounded-sm">
                      <label class="text-sm font-medium text-gray-500">Passengers</label>
                      <input class="text-xl font-medium bg-gray-50 focus:outline-none rounded-lg" 
                      type="text" v-model="searchForm.persons" placeholder="1 Person">
                      <span class="text-xs font-medium">Economy Class</span>
                    </div>
                  </div>

                  <div class="flex items-center mt-5">
                    <button type="submit" class="max-w-max px-5 py-2 text-white text-sm font-medium bg-orange-600 rounded">Search Flights</button>

                    <div class="ml-3">
                      <p class="text-sm text-green-700" v-show="flights.length > 1">{{ flights.length }} flights found</p>
                      <p class="text-sm text-red-500" v-show="flights.length < 1"> No flight found!</p>
                    </div>
                  </div>
                </form>
              </div>
            </div>
        </div>
        <div class="flex-1"></div>
      </div>
    </div>
      
      <Flights 
      v-if="flights.length > 0 && cFC" 
      :flights="flights" 
      :searchForm="searchForm"
      @closeFC="closeFC()" />
  </div>
</template>

<script>

  import { ref, reactive, watch } from 'vue'
  import useAirports from '../../../composables/airports'
  import useFlights from '../../../composables/flights'
  import Flights from './Flights.vue'
  export default{
    components: {
      Flights
    },
    setup(){

      const flyfrom_focused = ref(false)
      const flyto_focused = ref(false)


      const { airport, getAirport, airports, getAirports } = useAirports()
      const { flights, getFlights, validationErrors, cFC } = useFlights()

      const closeFC = () => {
        cFC.value = false
      }

      const searchForm = reactive({
        from_airport: '',
        to_airport: '',
        departure: '',
        persons: '',
      })


      const setAirport = (fly, id) => {
        if(fly === 'fly-from'){
          let airport_name = document.getElementById('from-name-'+id).innerText
          let city = document.getElementById('from-city-'+ id).innerText
          let abbr = document.getElementById('from-abbr-'+ id).innerText

          searchForm.from_airport = city;
          document.getElementById('flyfrom_name').innerHTML = abbr +' - '+ airport_name;
        }else{
          let airport_name = document.getElementById('to-name-'+id).innerText
          let city = document.getElementById('to-city-'+ id).innerText
          let abbr = document.getElementById('to-abbr-'+ id).innerText

          searchForm.to_airport = city;
          document.getElementById('flyTo_name').innerHTML = abbr +' - '+ airport_name;
        }
      }

      const onFocus = (fly) => {
        if(fly === 'fly-from'){
          flyfrom_focused.value = true
        }else{
          flyto_focused.value = true
        }
          getAirports()
      }

      watch(
          () => searchForm.from_airport,
          (previous, current) => { 
            getAirports(current)
          },
          { deep: true } 
        );


      watch(
          () => searchForm.to_airport,
          (previous, current) => { 
            getAirports(current)
          },
          { deep: true } 
        );

      // watch(to_airport, (previous, current) => {
      //   getAirports(current)
      // })

      window.addEventListener('click', function(event){

        let flyFromModal = document.getElementById('flyFromModal');
        let flyfromCity = document.getElementById('flyfrom_city');

        let flyToModal = document.getElementById('flyToModal');
        let flyToCity = document.getElementById('flyTo_city');

        if(event.target == flyFromModal || event.target == flyfromCity){
          flyfrom_focused.value = true
        }else{
          flyfrom_focused.value = false
        }
        

        if(event.target == flyToModal || event.target == flyToCity){
          flyto_focused.value = true
        }else{
          flyto_focused.value = false
          }
      })

      return { 
        onFocus, 
        flyfrom_focused, 
        flyto_focused,
        
        cFC,
        closeFC,

        searchForm,

        setAirport,

        airport,
        getAirport,
        airports,
        getAirports,

        flights,
        getFlights,
        validationErrors
        
      }
    }
  }

</script>