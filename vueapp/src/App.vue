<script setup>
import { ref, watch } from 'vue'
import { RouterLink, RouterView } from 'vue-router'

import { CurrentRoute } from './state/CurrentRoute.js'


const onHome = ref(true)
watch(CurrentRoute, (route) => {
  onHome.value = route.routeName == 'home' || route.routeName == 'about'
})

</script>

<template>
  <body class="wrapper">
  <div class="heading-bar">
    <div class="heading-title">
      <h3>The Single Page Forum</h3>
    </div>
    <nav class="heading-nav">
      <RouterLink class="router-item" to="/posts">Posts</RouterLink>
      <RouterLink class="router-item" to="/users">Users</RouterLink>
      <RouterLink class="router-item" to="/about">About</RouterLink>
      <RouterLink class="router-item" to="/">Home</RouterLink>
    </nav>
  </div>
  <main class = "wrapper-view">
    <div class="wrapper-item" v-if="!onHome">
      <h2><u>The One Page Forum!</u></h2>
      <div>
        <p>
          Welcome to the One Page Forum! The following is a simple application which allows the
          user to submit a post under the account name of one of four preset users. All comments
          are then displayed on the associated 'Posts' section, in chronological order.
        </p>
        <p>
          Demonstration of HTTP requests, Databases, and sorting. Each section below details how
          each component was designed.
        </p>
        <h3>Users</h3>
        <p class="comp-func">
          Displays the available list of user accounts.
        </p>
        <h3>Posts</h3>
        <p class="comp-func">
          Displays all posts made to the post database.
        </p>

      </div>
    </div>
    <div class="wrapper-item">
      <RouterView />
    </div>
  </main>

  </body>
</template>

<style scoped>
.wrapper {
  display: flex;
  flex-direction: column;
  place-items: flex-start;
  flex-wrap: wrap;
}

.wrapper-view {
  width:100%;

  display: flex;
  flex-direction: row;
  place-items: flex-start;
  justify-content:space-between;
  align-items:stretch;
}

.wrapper-item {
  flex: 1 1;
}

.heading-bar {
  position: sticky;
  top:0;
  width:100%;
  background-color:azure;

  /* FLEX SETTINGS */
  display: flex;
  flex-direction: row;
  justify-content:space-between;
  align-items:baseline;
}

.heading-title {
  flex:1 1;
}

.heading-nav {
  flex:1 1;

  /* FLEX SETTINGS */
  display: flex;
  flex-direction: row-reverse;
  align-items:flex-end;
}

.router-item {
  margin-right:5%;

  padding-top: 2%;
  padding-bottom: 2%;
  padding-left: 5%;
  padding-right: 5%;

  /* BORDER SETTINGS */
  border-width:3px;
  border-style:solid;
  border-color:black;

  /* FLEX SETTINGS */
  align-self:flex-end;
}
</style>
