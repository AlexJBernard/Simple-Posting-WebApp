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
  <h1>Test</h1>
  <div class="users">
    <span>Check console</span>
  </div>
</template>

<style scoped>
</style>
