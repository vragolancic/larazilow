<template>
  <div>
    <div class="bg-gray-100">
      <nav
        class="
          container
          px-6
          py-8
          mx-auto
          md:flex md:justify-between md:items-center
        "
      >
        <ul
          class="
            flex-col
            mt-8
            space-y-4
            md:flex
            md:space-y-0
            md:flex-row
            md:items-center
            md:space-x-10
            md:mt-0
          "
        >
          <Link :href="`/`" class="text-sm font-bold text-gray-800 hover:text-blue-400">
            Home
          </Link>
          <Link :href="`/listing`" class="text-sm font-bold text-gray-800 hover:text-blue-400">
            Listings
          </Link>
        </ul>
        <div v-if="user" class="flex items-center gap-4">
          <div class="text-gray-500 font-bold">{{ user.name }}</div>
          <Link :href="`/listing/create`" class="btn-primary">Create Listing</Link>
          <div>
            <Link class="btn-primary" :href="route('logout')" method="delete" as="button">Logout</Link>
          </div>
        </div>
        <div v-else class="flex items-center gap-4">
          <Link :href="route('user-account.create')">Register</Link>
          <Link :href="route('login')">Sign-in</Link>
        </div>
      </nav>
    </div>
  </div>


  <main class="container mx-auto p-4 w-full">
    <div v-if="flashSuccess" class="mb-4 border rounded-md p-2 shadow-sm border-green-200 bg-green-50">
      {{ flashSuccess }}
    </div>

    <slot>Default</slot>
  </main>
</template>

<script setup>
import {Link, usePage} from '@inertiajs/vue3'
import {computed} from 'vue'

const flashSuccess = computed(() => page.props.flash.success)
const user = computed(() => page.props.user)

const page = usePage()
</script>

<style scoped>
    .success{
        background-color: green;
        color: white;
    }
</style>
