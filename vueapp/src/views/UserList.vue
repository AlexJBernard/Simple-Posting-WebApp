<script setup>
  import { ref, onMounted } from 'vue'
  import UserService from '../services/UserService.js'
  import { CurrentUser } from '../state/CurrentUser.js'

  const users = ref(null)
  const selectUser = ref(0);

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

  async function swapUsers() {
    UserService.getUser(selectUser.value).then(
      (response) => {
        const user = response.data.data;
        CurrentUser.changeUser(user)
      }
    )
  }


</script>

<template>
  <h1>CHARACTER SELECT</h1>
  <div class="users">
    <select name="User" id="UserList" v-model="selectUser" v-on:change="swapUsers()">
      <option v-for="user in users" :key="user.id" :value="user.id">{{ user.username }}</option>
    </select>
  </div>
</template>

<style scoped>
</style>
