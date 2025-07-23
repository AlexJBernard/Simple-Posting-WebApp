<script setup>
  // Vue imports
  import { ref, onMounted } from 'vue'
  import { useRoute } from 'vue-router'

  // JavaScript files
  import UserService from '../services/UserService.js'
  import { CurrentUser } from '../state/CurrentUser.js'
  import { CurrentRoute } from '../state/CurrentRoute.js'

  const users = ref(null)
  const selectUser = ref(null)
  const connected = ref(false)

  onMounted(async () => {
    // Change the current route name
    CurrentRoute.setRoute(useRoute().name)

    // UserService (fetchAPI)
    users.value = await UserService.getUsers()
    if (users.value) {
      connected.value = true
    }
  })

  async function swapUsers() {

    const response = await UserService.getUser(selectUser.value)

    if (response.statusCode == 200) {
      const user = response.user
      CurrentUser.changeUser(user.id)
    } else {
      console.log(response.statusCode)
      console.log(response.message)
    }
  }
</script>

<template>
  <h1>User Database</h1>
  <div v-if="connected" class="users">
    <h2>Select a Username</h2>
    <select name="User" id="UserList" v-model="selectUser" v-on:change="swapUsers()">
      <option v-for="user in users" :key="user.id" :value="user.id">{{ user.username }}</option>
    </select>
  </div>
  <div v-else class="error">
    <p>ERROR: Database Connection failed</p>
  </div>
</template>

<style scoped>

</style>
