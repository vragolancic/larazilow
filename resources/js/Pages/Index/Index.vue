<template>
  <div>Index</div>
  <Link href="/hello">ShowPage</Link>
  <div>Props: {{ message }}</div>
</template>

<script setup>
import {Link} from '@inertiajs/vue3'

defineProps({
  message : String,
})
</script>

