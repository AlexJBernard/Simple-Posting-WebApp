<script setup>
  import { ref } from 'vue'
  import PostService from '../services/PostService.js'

  const postText = ref("");

  async function submitForm() {
    console.log(postText.value)
    PostService.postPost(postText.value)
    .then(() => {
      console.log("Exit success");
    }).catch((error) => {
      console.log(error);
    });

  }

</script>

<template>
  <h1>Create Post</h1>
  <form @submit.prevent="submitForm">
    <textarea v-model="postText"></textarea>
    <button type="submit">Submit</button>
  </form>
</template>
