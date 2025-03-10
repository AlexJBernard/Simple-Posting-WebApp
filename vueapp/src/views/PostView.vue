<script setup>
  // Vue imports
  import { ref, onMounted } from 'vue'
  import { useRoute } from 'vue-router'

  // Vue components
  import PostList from '../components/PostList.vue'

  // JavaScript Files
  import PostService from '../services/PostService.js'

  // JavaScript classes
  import { CurrentUser } from '../state/CurrentUser.js'
  import { CurrentRoute } from '../state/CurrentRoute.js'

  const postText = ref("");
  const allPosts = ref([]);
  const isSent = ref(false);

  onMounted(() => {
    CurrentRoute.setRoute(useRoute().name)

    PostService.getPosts()
    .then((posts) => {
      // Initialize allPosts value as the posts retrived from the API
      allPosts.value = posts.data.data;
    }).catch((error) => {
      console.log(error.message);
    })
  });

  async function updatePosts() {
    PostService.getPosts()
    .then((posts) => {
      allPosts.value = posts.data.data;
    }).catch((error) => {
      console.log(error);
    });
  }

  async function submitForm() {
    isSent.value = true
    console.log(postText.value);
    PostService.postPost(postText.value, CurrentUser.userId)
    .then(() => {
      postText.value = "";
      updatePosts();
      isSent.value = false;
    }).catch((error) => {
      console.log(error);
      isSent.value = false;
    });

  }

</script>

<template>
  <div class="postwrapper">

  </div>
  <div>
    <h1>Create Post</h1>
    <form @submit.prevent="submitForm">
      <textarea v-model="postText"></textarea>
      <button v-show="{ isSent }" type="submit">Submit</button>
    </form>
  </div>
  <div>
    <PostList :posts=allPosts />
  </div>
</template>

<style>
.postwrapper {
  display:flex;
  flex-direction:row;
}
</style>
