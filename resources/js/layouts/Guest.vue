<template>
  <div class="min-h-screen">
    <header class="w-full bg-white shadow">
      <div class="container">
        <div class="flex justify-between items-center h-16">
          <!-- Logo -->
          <div class="">
            <div class="shrink-0 flex items-center">
              <a href="#">
                <img src="/frontend/img/Logo.png" alt="">
              </a>
            </div>
          </div>

          <!-- Menu -->
          <div class="hidden sm:flex justify-center items-center space-x-8">
            <router-link to="/home" active-class="border-b-2 border-purple-500"
            class="px-2 py-5 font-medium text-base">
              Home
            </router-link>
            <router-link to="/flights" active-class="border-b-2 border-purple-500"
            class="px-2 py-5 font-medium text-base">
              Flights
            </router-link>
            <router-link to="/hotels" active-class="border-b-2 border-purple-500"
            class="px-2 py-5 font-medium text-base">
              Hotels
            </router-link>
            <router-link to="/contact" active-class="border-b-2 border-purple-500"
            class="px-2 py-5 font-medium text-base">
              Contact
            </router-link>
          </div>

          <!-- Profile -->
          <div class="flex justify-end items-center space-x-3">
            <router-link to="/support" active-class="border-b-2 border-purple-500"
            class="px-2 py-5 font-medium text-base">
              Support
            </router-link>
            <router-link class="px-4 py-2 rounded-lg text-base border-2 border-purple-700" to="login">Sing in</router-link>
          </div>
        </div>
      </div>
    </header>

    <main class="mt-1">
      <div class="">
        <div class="">
            <router-view></router-view>
        </div>
      </div>
    </main>

    <footer class="mt-44 bg-white">
      <div class="min-h-fit bg-no-repeat bg-right bg-gradient-to-r from-violet-900 to-fuchsia-800" style="background-size: 49%;">

      <div class="container flex">
        <div class="flex-1 pt-14 pb-10">

          <div class="mb-5">
            <a href="#">
              <img src="/frontend/img/Logo.png" alt="">
            </a>
          </div>
          <div class="menu flex flex-col gap-y-2 text-sm">
            <a href="#">Latest News</a>
            <a href="#">Terms & Conditions</a>
            <a href="#">Privacy</a>
            <a href="#">About Us</a>
            <a href="#">FAQs</a>
          </div>

        </div>
        <div class="flex-1 flex flex-col justify-end text-sm text-white py-10">
          <div class="flex flex-col px-14 gap-2 text-sm">
            <span><span>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline mr-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
              </svg>
            </span>01720304002</span>

            <span><span>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline mr-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
              </svg>
            </span>hello@flightx.com</span>

            <span><span>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline mr-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
              </svg>
            </span>Lake Park, Rd No 63, Gulshan Dhaka</span>
          </div>

          <div class="mt-10 flex items-center px-14 gap-4">
            <a href=""><img class="w-6" src="/frontend/img/social/fb.png" alt=""></a>
            <a href=""><img class="w-6" src="/frontend/img/social/tw.png" alt=""></a>
            <a href=""><img class="w-5" src="/frontend/img/social/ins.png" alt=""></a>
          </div>
        </div>
      </div>

    </div>
    </footer>
  </div>
</template>
