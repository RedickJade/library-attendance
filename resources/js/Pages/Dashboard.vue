// resources/js/Pages/Dashboard.vue
<template>
  <AppLayout>
    <template #default>
      <div class="bg-lime-100 bg-opacity-60 rounded-lg shadow-md p-8 text-center">
        <div class="flex justify-center mb-4">
          <img
            src="/library-icon.jpg"
            alt="Library Logo"
            class="w-24 h-24 rounded-full border-4 border-white shadow-md"
          />
        </div>
        <h1 class="text-3xl font-bold text-lime-800">Bastienne Public Library</h1>
        <p class="mt-2 text-gray-700 text-base">
          “A room without books is like a body without a soul.” – Cicero
        </p>
        <p class="mt-6 text-sm text-gray-600 max-w-2xl mx-auto">
          Founded in 1975 at Bordeaux, France, Bastienne Public Library has served as a cornerstone of knowledge and community for generations.
          Our mission is to preserve, inspire, and cultivate a lifelong love of learning among all guests, visitors, and passionate readers alike.
          This attendance system made for the library supports our commitment to excellence in service and staff care.
        </p>
      </div>
    </template>
  </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
</script>
