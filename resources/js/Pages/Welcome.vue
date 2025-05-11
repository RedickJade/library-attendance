<template>
    <div class="min-h-screen bg-gradient-to-br from-lime-100 to-white flex items-center justify-center">
      <div class="bg-white bg-opacity-70 p-10 rounded-lg shadow-md text-center max-w-lg w-full">
        <div class="flex justify-center mb-6">
          <img
            src="/library-icon.jpg"
            alt="Library Logo"
            class="w-28 h-28 rounded-full border-4 border-white shadow-md"
          />
        </div>

        <h1 class="text-3xl font-bold text-lime-800 mb-2">Bastienne Public Library</h1>
        <p class="text-gray-700 italic mb-6">“Empowering the community one page at a time.”</p>

        <div class="flex flex-col sm:flex-row justify-center gap-4">
          <Link
            :href="route('login')"
            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded shadow"
          >
            Log In
          </Link>

          <Link
            :href="route('register')"
            class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded shadow"
          >
            Register
          </Link>
        </div>
      </div>
    </div>
  </template>

  <script setup>
  import { Link } from '@inertiajs/vue3'
  </script>
