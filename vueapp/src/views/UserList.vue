<script setup>
  import { ref, onMounted } from 'vue'
  import UserService from '../services/UserService.js'

  const users = ref(null)

  onMounted(() => {
    UserService.getUsers().then(
      (response) => {
        users.value = response.data.data
        console.log(response)
        console.log("Users: Value")
        console.log(users.value)
        console.log("Users: Target")
        console.log(users.value.target.data)
      }
    ).catch(
      (error) => {
        console.log(error)
      }
    )
  })
</script>

<template>
  <h1>User List</h1>
  <div class="users">
    <ul>
      <li v-for="user in users" :key="user.id">{{user.username}}</li>
    </ul>
  </div>
</template>

<style scoped>
</style>
