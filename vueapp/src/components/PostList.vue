<script setup>
import PostItem from '../components/PostItem.vue'

const props = defineProps({
  posts: {
    type: Array,
    required: true
  }
})
</script>
<template>
  <ul class="PostList">
    <PostItem v-for="post in props.posts"
    v-bind:key=post.id
    :username=post.User.username
    :text=post.text
    ></PostItem>
  </ul>
</template>
