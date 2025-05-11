<template>
    <GuestLayout>
      <form @submit.prevent="submit" class="space-y-4">
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
        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Login</button>

        <p class="text-center text-sm text-gray-600 mt-4">
          Don’t have an account?
          <Link :href="route('register')" class="text-blue-600 hover:underline">Sign up</Link>
        </p>
      </form>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import { useForm, Link, router } from '@inertiajs/vue3'

const form = useForm({
   email: '',
   password: '',
})

function submit() {
   form.post(route('login'))
}
</script>
