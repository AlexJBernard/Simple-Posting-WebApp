<script setup>
  import { ref, onMounted } from 'vue'
  import UserServiceDB from '../services/UserServiceDB.js'

  const users = ref(null)
  const singleuser = ref(null)

  onMounted(() => {
    UserServiceDB.getUsers().then(
      (response) => {
        users.value = response.data.data
        console.log(response)
      }
    ).catch(
      (error) => {
        console.log(error)
      }
    );
    UserServiceDB.getUser().then(
      (response) => {
        singleuser.value = response.data.data
        console.log(response)
      }
    ).catch(
      (error) => {
        console.log(error)
      }
    );
  })
</script>

<template>
  <h1>User Database</h1>
  <div class="users">
    <ul v-for="user in users" :key="user.id">
      <li>{{ user.firstname }} {{ user.lastname }}</li>
    </ul>
  </div>
</template>

<style scoped>
</style>
