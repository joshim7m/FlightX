<template>
  <div @click="$emit('closeFC')" class="fixed inset-0 z-20 bg-gray-400 opacity-50">
  </div>
  <div class="container fixed top-14 right-0 bottom-0 z-30 bg-white shadow-lg rounded-lg border-t-2 border-violet-600 overflow-y-auto" id="flights-container">
    <div class="flex flex-col h-full">
      <div class="header flex items-center p-5 border-b border-gray-200 bg-gray-50">
        <div class="px-2 py-1 mr-3 cursor-pointer" @click="$emit('closeFC')">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
          </svg>
        </div>
        <div>
          <h2 class="text-2xl font-medium font-gray-800">{{ searchForm.from_airport + ' - ' +searchForm.to_airport }}<span class="text-sm text-gray-500">(ECONOMY)</span></h2>
          <span class="text-sm text-gray-500">{{ searchForm.departure }} | Adult: 1</span>
        </div>
      </div>
        <div class="flex-1 body p-5">
          <div class="font-medium mb-2">{{ flights.length }} Availabes Flights</div>
          <div class="flex items-center shadow border border-gray-200 rounded mb-5">
            <div class="item flex items-center border-r border-gray-200 pl-2 pr-5 py-2">
              <img class="w-8 mr-1" src="/frontend/img/bg.png" alt="">
              <div>
                <h3 class="text-sm/3 font-gray-700">BG</h3>
                <span class="text-xs text-gray-500">4 Flights</span>
              </div>
            </div>
            <div class="item flex items-center border-r border-gray-200 pl-2 pr-5 py-2">
              <img class="w-8 mr-1" src="/frontend/img/vq.png" alt="">
              <div>
                <h3 class="text-sm/3 font-gray-700">VQ</h3>
                <span class="text-xs text-gray-500">3 Flights</span>
              </div>
            </div>
            <div class="item flex items-center border-r border-gray-200 pl-2 pr-5 py-2">
              <img class="w-8 mr-1" src="/frontend/img/2a.png" alt="">
              <div>
                <h3 class="text-sm/3 font-gray-700">2A</h3>
                <span class="text-xs text-gray-500">2 Flights</span>
              </div>
            </div>
            <div class="item flex items-center border-r border-gray-200 pl-2 pr-5 py-2">
              <img class="w-8 mr-1" src="/frontend/img/bs.png" alt="">
              <div>
                <h3 class="text-sm/3 font-gray-700">BS</h3>
                <span class="text-xs text-gray-500">2 Flights</span>
              </div>
            </div>
          </div>

          <!-- Flights  -->
          <div class="flights-card">
            <div v-for="flight in flights" class="card rounded-lg shadow-lg px-2 mb-5 flex justify-between">
              <div class="w-2/3 flex items-center justify-between">
                <div class="flex">
                  <img class="w-10 h-10" src="/frontend/img/bg.png" alt="">
                  <div>
                    <h3 class="text-xl font-medium font-gray-800">{{ flight.from_city }}</h3>
                    <span class="block text-xs text-gray-600">{{ flight.from_airport }}</span>
                    <span class="block text-xs text-gray-600">{{ flight.departure_on }}</span>
                  </div>
                </div>
                <div>
                  <img class="w-6 mb-2" src="/frontend/img/plane.png" alt="">
                  <div>
                    <span class="block text-xs text-gray-600">{{ flight.stops }} Stops</span>
                    <span class="block text-xs text-gray-600">{{ flight.duration }}h</span>
                  </div>
                </div>
                <div>
                  <h3 class="text-xl font-medium font-gray-800">{{ flight.to_city }}</h3>
                  <span class="block text-xs text-gray-600">{{ flight.to_airport }}</span>
                  <span class="block text-xs text-gray-600">{{ flight.arrival_on }}</span>
                </div>
              </div>
              <div class="w-1/3 flex justify-end">
                <div class="w-64 p-2 text-white bg-blue-500 flex flex-col items-end rounded-r-lg">
                  <span class="mt-2 mb-14">Partially Refundable</span>
                  <span class="">{{ flight.ticket_price }}</span>
                  <a class="my-3 bg-violet-800 text-white uppercase font-medium px-2 py-1 max-w-max rounded shadow outline-none" href="#">Book Now</a>
                  <div class="text-white text-sm font-medium">Show more</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="footer p-5 border-t border-gray-200">Footer</div>
      </div>
  </div>
</template>


<script >

export default{

  props: ['flights', 'searchForm']

}

</script>


  // import { defineEmits } from 'vue'

  // const emit = defineEmits(['closeFC'])

  // const closeFC = () => {
  //   emit('closeFC')
  // }