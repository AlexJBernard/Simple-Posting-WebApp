<script setup>
const props = defineProps({
  username: {
    type: String,
    required: true
  },
  text: {
    type: String,
    required: true
  }
})
</script>

<template>
  <div>
    <p id="postText">{{ props.username }}</p>
    <label for="postText">{{ props.text }}</label>
  </div> <br />
</template>
