<template>
    <GuestLayout>
      <form @submit.prevent="submit" class="space-y-4">
        <div>
          <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
          <input v-model="form.name" id="name" type="text" class="mt-1 block w-full border rounded px-3 py-2" required>
          <div v-if="form.errors.name" class="text-sm text-red-600 mt-1">{{ form.errors.name }}</div>
        </div>
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <input v-model="form.email" id="email" type="email" class="mt-1 block w-full border rounded px-3 py-2" required>
          <div v-if="form.errors.email" class="text-sm text-red-600 mt-1">{{ form.errors.email }}</div>
        </div>
        <div>
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <input v-model="form.password" id="password" type="password" class="mt-1 block w-full border rounded px-3 py-2" required>
          <div v-if="form.errors.password" class="text-sm text-red-600 mt-1">{{ form.errors.password }}</div>
        </div>
        <div>
          <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
          <input v-model="form.password_confirmation" id="password_confirmation" type="password" class="mt-1 block w-full border rounded px-3 py-2" required>
        </div>
        <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">Register</button>

        <p class="text-center text-sm text-gray-600 mt-4">
          Already have an account?
          <Link :href="route('login')" class="text-green-600 hover:underline">Login</Link>
        </p>
      </form>
    </GuestLayout>
  </template>

  <script setup>
  import GuestLayout from '@/Layouts/GuestLayout.vue'
  import { useForm, Link, router } from '@inertiajs/vue3'

  const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
  })

  function submit() {
    form.post(route('register'), {
      onSuccess: () => router.visit(route('login'))
    })
  }
  </script>
