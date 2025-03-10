<script setup>
  // Vue imports
  import { ref, onMounted } from 'vue'
  import { useRoute } from 'vue-router'

  // JavaScript files
  import UserServiceDB from '../services/UserServiceDB.js'
  import { CurrentUser } from '../state/CurrentUser.js'
  import { CurrentRoute } from '../state/CurrentRoute'

  onMounted(() => {
    CurrentRoute.setRoute(useRoute().name)
  })

  const users = ref(null)
  const selectUser = ref(null)

  onMounted(() => {
    UserServiceDB.getUsers().then(
      (response) => {
        users.value = response.data.data
      }
    ).catch(
      (error) => {
        console.log(error.message)
      }
    );
  })

  async function swapUsers() {
    console.log(selectUser.value)
    UserServiceDB.getUser(selectUser.value).then(
      (response) => {
        const user = response.data.data.user;
        CurrentUser.changeUser(user.id)
      }
    ).catch(
      (error) => {
        console.log(error.message)
      }
    )
  }
</script>

<template>
  <h1>User Database</h1>
  <div class="users">
    <select name="User" id="UserList" v-model="selectUser" v-on:change="swapUsers()">
      <option v-for="user in users" :key="user.id" :value="user.id">{{ user.username }}</option>
    </select>
  </div>
</template>

<style scoped>
</style>
