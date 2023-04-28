<template>
  <div class="grid grid-cols-3 gap-4">
    <Box v-for="listing in listings" :key="listing.id">
      <div>
        <Link :href="route('listing.show', {listing: listing.id} )">
          <ListingSpace :listing="listing" class="text-lg" />
          <ListingAddress :listing="listing" />
        </Link>
      </div>
      <div class="flex m-2 justify-end">
        <div>
          <Link
            class="mr-2 py-1.5 px-3 bg-blue-500 hover:bg-blue-700 rounded-md text-sm font-semibold shadow-sm text-white shadow-sm"
            :href="route('listing.edit', {listing: listing.id})"
            as="button"
          >
            Edit
          </Link>
        </div>
        <div>
          <Link
            class="py-1.5 px-3 bg-amber-600 hover:bg-amber-700 rounded-md text-sm font-semibold shadow-sm text-white shadow-sm"
            :href="route('listing.destroy', {listing: listing.id})" method="delete" as="button"
          >
            Delete
          </Link>
        </div>
      </div>
    </Box>
  </div>
</template>

<script setup>
import ListingAddress from '@/Components/ListingAddress.vue'
import {Link} from '@inertiajs/vue3'
import Box from '@/Components/UI/Box.vue'
import ListingSpace from '@/Components/ListingSpace.vue'

defineProps({
  listings : Array,
})

</script>
