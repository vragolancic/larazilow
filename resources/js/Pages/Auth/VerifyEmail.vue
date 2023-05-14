<template>
  <div>
    You need be to verified first to see this page!
  </div>
  <div>
    <Link :href="route('verification.send')" method="post" as="button" class="text-indigo-600">Resend verification email</Link>
  </div>
</template>

<script setup>
import {Link} from '@inertiajs/vue3'

</script>
