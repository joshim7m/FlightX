<template>
  <div class="min-h-screen">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center">
        <div class="flex flex-1">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
              Authenticated
            </div>

            <div class="flex flex-1 justify-between">
              <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <router-link to="/" active-class="border-b-2 border-indigo-400">
                  Home
                </router-link>
                <router-link to="/contact" active-class="border-b-2 border-indigo-400">
                  Contact
                </router-link>
              </div>

            </div>
        </div>
      </div>
    </div>

    <main>
      <div class="py-12">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
          <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
              <router-view></router-view>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</template>
