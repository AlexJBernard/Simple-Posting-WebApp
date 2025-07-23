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

  onMounted(async () => {
    CurrentRoute.setRoute(useRoute().name)

    const response = await PostService.getPosts()
    if (response.statusCode == 200) {
      allPosts.value = response.posts;
    } else {
      console.log(response.statusCode)
      console.log(response.error)
    }
  });

  async function updatePosts() {
    await PostService.getPosts()
    .then((response) => {
      allPosts.value = response.posts
    }).catch((error) => {
      console.log(error)
    });
  }

  async function submitForm() {
    isSent.value = true
    const response = await PostService.createPost(postText.value, CurrentUser.userId)

    console.log(response)

    if (response.postSuccess) {
      console.log("Post success!")
      await updatePosts();
    }
    isSent.value = false;
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
