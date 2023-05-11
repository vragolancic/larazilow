<template>
  <Box>
    <template #header>Offer #{{ offer.id }} <span v-if="offer.accepted_at" class="bg-green-200 text-green-900 p-1 rounded-md uppercase ml-2">accepted</span></template>

    <section class="flex items-center justify-between">
      <div>
        <Price :price="offer.amount" class="font-bold text-xl" />
        <div>
          Difference <Price :price="difference" />
        </div>
        <div class="text-gray-500 text-sm">
          Made by {{ offer.bidder.name }}
        </div>
        <div class="text-gray-500 text-sm">
          Made on {{ madeOn }}
        </div>
      </div>
      <div>
        <Link v-if="!isSold" :href="route('realtor.offer.accept', {offer: offer.id})" method="PUT" class="btn-outline text-xs font-medium" as="button">Accept</Link>
      </div>
    </section>
  </Box>
</template>

<script setup>

import Box from '@/Components/UI/Box.vue'
import {Link} from '@inertiajs/vue3'
import Price from '@/Components/Price.vue'
import {computed} from 'vue'

const props = defineProps({
  offer: Object,
  listingPrice: Number,
  isSold: Boolean,
})

const difference = computed(
  () => props.offer.amount - props.listingPrice,
)

const madeOn = computed(
  () =>  new Date(props.offer.created_at).toDateString(),
)

</script>
