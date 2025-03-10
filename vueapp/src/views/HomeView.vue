<script setup>
// Vue imports
import { onMounted } from 'vue'
import { useRoute } from 'vue-router'

// JavaScript classes
import { CurrentRoute } from '../state/CurrentRoute'

onMounted(() => {
  CurrentRoute.setRoute(useRoute().name)
})
</script>

<template>
  <main>
    <h2>Application By: Alex Bernard</h2>
    <p>
      The following is a simple web application made to demonstrate a basic understanding of Vue,
      MySQL, PHP, and Docker.
    </p>

    <h3>Front-End</h3>
    <p>
      This project's front end was created primarily using Vue, HTML, Javascript, and CSS.
    </p>

    <h3>Back-End</h3>
    <p>
      The project's back-end is made using PHP and the framework PHP-Slim and was built by
      using the <a href="https://github.com/slimphp/Slim-Skeleton">php-slim skeleton</a> as a basis.
    </p>
    <h3>Database</h3>
  </main>
</template>
