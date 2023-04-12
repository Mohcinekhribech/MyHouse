<script setup>
import { RouterLink, RouterView } from 'vue-router'
import HelloWorld from './components/HelloWorld.vue'
</script>

<template>
  <RouterView />
</template>

<style>
.display {
        display: grid;
        grid-gap: 5px;
        grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
    }
</style>
