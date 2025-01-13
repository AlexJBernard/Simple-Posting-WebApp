<script setup>
const props = defineProps({
  posts: {
    type: Array,
    required: true
  }
})
</script>
<template>
  <ul class="PostList">
    <li v-for="post in props.posts" v-bind:key = post.id>{{post.text}}</li>
  </ul>
</template>
