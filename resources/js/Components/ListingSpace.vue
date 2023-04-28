<template>
  <div>
    <span class="font-bold">{{ listing.beds }}</span> bds |
    <span class="text-gray-400">{{ listing.baths }}</span> ba |
    <span class="text-gray-400">{{ listing.area }}</span> m²
  </div>
</template>

<script setup>
defineProps({
  listing : Object,
})

</script>
