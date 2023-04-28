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
        <Link :href="`/listing/create`" class="flex  justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create Listing</Link>
      </nav>
    </div>
  </div>


  <main class="container mx-auto p-4">
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

const page = usePage()
</script>

<style scoped>
    .success{
        background-color: green;
        color: white;
    }
</style>
