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
    <p>
      In 2023, I was tasked with creating an application using Docker, PHP, PHP-Slim, and
      Javascript. Due to the sensitive information this project included, I have felt unsure about
      displaying it on a public repository as portfolio work. In lieu of this, I have opted to
      create this project that was designed with similar principles, while making use of other
      tools I have not used, such as Vue, and an Application/API structure.
    </p>

    <h3>Front-End</h3>
    <p id="frontend-p1">
      This project's front end was constructed using Vue, HTML, Javascript, and CSS.
    </p>

    <p id="frontend-p2">
      Unlike my previous Senior Design project, the front-end of this application makes use of Vue
      and runs independently from the project's back-end code.
    </p>

    <h3>Back-End</h3>
    <p>
      The project's back-end coding using PHP and the framework PHP-Slim, starting from the
      <a href="https://github.com/slimphp/Slim-Skeleton">php-slim skeleton.</a>
    </p>

    <p>
      Like my previous Senior Design Project, this project uses the framework "PHP-Slim" alongside
      several files used for database connections created by Ignacio X. Domínguez.
      <br />
    </p>

    <h3>Database</h3>
    <p>

    </p>
  </main>
</template>
