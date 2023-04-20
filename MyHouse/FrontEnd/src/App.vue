<script setup>
import { RouterLink, RouterView } from 'vue-router'
import HelloWorld from './components/HelloWorld.vue'
import { onMounted } from "vue";
import { Datepicker, Input, initTE } from "tw-elements";

onMounted(() => {
  initTE({ Datepicker, Input });
});
</script>

<template>
  <RouterView />
</template>

<style>
.display {
        display: grid;
        grid-gap: 5px;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    }
</style>
