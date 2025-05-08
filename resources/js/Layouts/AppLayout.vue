<template>
    <div class="min-h-screen bg-gray-100 flex flex-col justify-between">
      <div>
        <header class="bg-white shadow">
          <div class="max-w-7xl mx-auto py-4 px-4 flex justify-between items-center">
            <h1 class="text-xl font-bold">BASTIENNE PUBLIC LIBRARY</h1>
            <nav class="flex items-center space-x-6">
              <Link :href="route('dashboard')" class="text-gray-700 hover:underline">Home</Link>
              <Link :href="route('attendance.index')" class="text-gray-700 hover:underline">Attendances</Link>
              <button @click="logoutConfirm" class="text-red-600 hover:underline">Log Out</button>
            </nav>
          </div>
        </header>

        <main class="py-6 px-4 max-w-7xl mx-auto">
          <slot />
        </main>
      </div>

      <footer class="text-center text-sm text-gray-500 py-4">
        “Libraries will get you through times of no money better than money will get you through times of no libraries.”
      </footer>
    </div>
  </template>

  <script setup>
  import { Link, router } from '@inertiajs/vue3'

  function logoutConfirm() {
    if (confirm('Are you finished with logging employees for the day?')) {
      alert("Goodbye, administrator! Continue to keep exploring in life, and don't stop your journey!");
      router.post(route('logout'))
    }
  }
  </script>
