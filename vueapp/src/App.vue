<script setup>
import {RouterLink, RouterView} from 'vue-router'
</script>

<template>
  <div class = "wrapper">
    <header>
      <h1>Simple Web Application</h1>
      <h2>By: Alex Bernard</h2>
    </header>
    <nav>
      <RouterLink to="/">Home!</RouterLink>
      <RouterLink to="/usersdb">Users</RouterLink>
      <RouterLink to="/posts">Posts</RouterLink>
    </nav>
    <RouterView />
  </div>
</template>

<style scoped>
.wrapper {
  display: flex;
  flex-direction: column;
  place-items: flex-start;
  flex-wrap: wrap;
}
</style>
