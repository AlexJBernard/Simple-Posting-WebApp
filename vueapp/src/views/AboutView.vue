<script setup>
import{ onMounted } from 'vue'
import {useRoute} from 'vue-router'

import { CurrentRoute } from '../state/CurrentRoute'

onMounted(() => {
  CurrentRoute.setRoute(useRoute().name)
})
</script>

<template>
  <main>
    <h1>Alex Bernard</h1>
  </main>
</template>
