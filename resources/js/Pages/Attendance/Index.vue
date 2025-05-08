<template>
    <AppLayout>
      <template #default>
        <div class="mb-6">
          <h2 class="text-2xl font-bold mb-2">Employee Time Logs</h2>
          <div class="flex justify-between items-center">
            <input type="text" v-model="dayNote" placeholder="Enter today's date here..."
                   class="text-lg border rounded px-3 py-2 w-full max-w-md" @blur="saveDayNote" />
            <button @click="addEmployee" class="ml-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Add Employee</button>
          </div>
        </div>

        <table class="w-full bg-white shadow rounded text-sm">
          <thead class="bg-gray-200">
            <tr>
              <th class="p-2">Name</th>
              <th class="p-2">Morning In</th>
              <th class="p-2">Morning Out</th>
              <th class="p-2">Afternoon In</th>
              <th class="p-2">Afternoon Out</th>
              <th class="p-2">Evening In</th>
              <th class="p-2">Evening Out</th>
              <th class="p-2">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="record in attendances.data" :key="record.id" class="border-b">
              <td class="p-2">
                <input v-model="record.user.name" class="w-full border rounded px-1" />
              </td>
              <td class="p-2">
                <input type="time" v-model="record.morning_in" class="w-full border rounded px-1">
              </td>
              <td class="p-2">
                <input type="time" v-model="record.morning_out" class="w-full border rounded px-1">
              </td>
              <td class="p-2">
                <input type="time" v-model="record.afternoon_in" class="w-full border rounded px-1">
              </td>
              <td class="p-2">
                <input type="time" v-model="record.afternoon_out" class="w-full border rounded px-1">
              </td>
              <td class="p-2">
                <input type="time" v-model="record.evening_in" class="w-full border rounded px-1">
              </td>
              <td class="p-2">
                <input type="time" v-model="record.evening_out" class="w-full border rounded px-1">
              </td>
              <td class="p-2 flex flex-col space-y-1">
                <button @click="update(record)" class="text-blue-600 hover:underline">Save</button>
                <button @click="removeEmployee(record.id)" class="text-red-600 hover:underline">Remove</button>
              </td>
            </tr>
          </tbody>
        </table>
      </template>
    </AppLayout>
  </template>

  <script setup>
  import AppLayout from '@/Layouts/AppLayout.vue'
  import { ref } from 'vue'
  import { router } from '@inertiajs/vue3'

  defineProps({ attendances: Object })

  const today = new Date().toISOString().split('T')[0]
  const dayNote = ref(today)

  function saveDayNote() {
    console.log('Note saved:', dayNote.value)
  }

  function update(record) {
    router.put(`/attendance/${record.id}`, record, {
      preserveScroll: true,
      onSuccess: () => console.log('Updated'),
    })
  }

  function removeEmployee(id) {
    if (confirm('Are you sure you want to remove this employee?')) {
      router.delete(`/attendance/${id}`, {
        preserveScroll: true,
      })
    }
  }

  function addEmployee() {
    router.post(`/attendance`, {
      user: { name: 'New Employee' },
      morning_in: '', morning_out: '',
      afternoon_in: '', afternoon_out: '',
      evening_in: '', evening_out: ''
    })
  }
  </script>
