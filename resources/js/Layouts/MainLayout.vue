<template>
  <Link :href="`/listing`">Listings</Link>&nbsp;
  <Link :href="`/listing/create`">Create Listing</Link>

  <div v-if="flashSuccess" class="success">
    {{ flashSuccess }}
  </div>

  <slot />
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
