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
          <Link :href="route('notification.index')" class="relative text-gray-500 pr-2 py-2">
            &#128276;
            <div v-if="notificationCount" class="absolute right-0 top-0 w-5 h-5 bg-red-700 text-white font-medium border border-white rounded-full text-xs text-center">
              {{ notificationCount }}
            </div>
          </Link>

          <Link :href="route('realtor.listing.index')" class="text-gray-500 font-bold">{{ user.name }}</Link>
          <Link :href="route('realtor.listing.create')" class="btn-primary">+ Create Listing</Link>
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

const page = usePage()

const flashSuccess = computed(() => page.props.flash.success)
const user = computed(() => page.props.user)
const notificationCount = computed(() => Math.min(page.props.user.notificationCount))

</script>

