<template>
  <Box>
    <div>
      <Link :href="route('listing.show', {listing: listing.id} )">
        <div class="flex items-center gap-4">
          <Price :price="listing.price" class="text-2xl font-bold" />
          <div class="text-xs text-gray-500">
            <Price :price="monthlyPayment" /> pm
          </div>
        </div>
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
</template>

<script setup>
import Box from '@/Components/UI/Box.vue'
import {Link} from '@inertiajs/vue3'
import Price from '@/Components/Price.vue'
import ListingSpace from '@/Components/ListingSpace.vue'
import ListingAddress from '@/Components/ListingAddress.vue'

import {useMonthlyPayment} from '@/Composables/useMonthlyPayment'

const props = defineProps({listing: Object})

const { monthlyPayment } = useMonthlyPayment(props.listing.price, 2.5, 25)
</script>
