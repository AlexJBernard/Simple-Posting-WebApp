<script setup>
  import { ref, onMounted } from 'vue'
  import UserServiceDB from '../services/UserServiceDB.js'
  import { CurrentUser } from '../state/CurrentUser.js'

  const users = ref(null)
  const selectUser = ref(null)

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
  })

  async function swapUsers() {
    console.log(selectUser.value)
    UserServiceDB.getUser(selectUser.value).then(
      (response) => {
        const user = response.data.data.user;
        console.log(user)
        CurrentUser.changeUser(user.id)
        console.log(CurrentUser)
      }
    ).catch(
      (error) => {
        console.log(error)
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
