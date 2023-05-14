<template>
  <h1 class="text-3xl mb-4">Your Notification</h1>
  <section v-if="notifications.data.length" class="text-gray-700">
    <div v-for="notification in notifications.data" :key="notification.id" class="border-b border-gray-200 py-4 flex justify-between">
      <div>
        <span v-if="notification.type == 'App\\Notifications\\OfferMade'">
          Offer <Price :price="notification.data.amount" /> for
          <Link :href="route('realtor.listing.show', {listing: notification.data.listing_id})" class="text-indigo-600">listing</Link>
          was made!
        </span>
      </div>
      <Link
        v-if="!notification.read_at"
        method="PUT"
        :href="route('notification.seen', {notification: notification.id})"
        class="btn-outline text-xs font-medium"
        as="button"
      >
        Mark as read
      </Link>
      <span v-else>procitano</span>
    </div>
  </section>
  <EmptyState v-else>Not notification</EmptyState>
  <section v-if="notifications.data.length" class="w-full flex justify-center mt-8">
    <Pagination :links="notifications.links" />
  </section>
</template>

<script setup>
import {Link} from '@inertiajs/vue3'
import Price from '@/Components/Price.vue'
import EmptyState from '@/Components/UI/EmptyState.vue'
import Pagination from '@/Components/UI/Pagination.vue'

defineProps({
  notifications: Array,
})

</script>
