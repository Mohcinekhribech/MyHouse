<template>
  <router-link class="w-fit" :to="`/house/${house.id}`">
    <div class="w-[300px] max-sm:w-[200px] mx-auto my-4 hover:bg-[#F0F4FE]">
            <img class="h-[200px] w-[300px] rounded-lg" :src="house.housePic" alt="">
            <div class="p-[2px]">
              <p class="text-lg max-sm:text-sm font-bold text-[#192BAA]">{{ house.houseTitle }}</p>
              <p class="text-md max-sm:text-sm font-bold text-[#192BAA]"><i class="fa-solid fa-location-dot text-[#DA6217] pr-2 text-lg"></i>{{ house.Location }}</p>
              <p class="text-lg max-sm:text-sm font-bold text-[#9599A6]"><span class="text-[#DA6217] pr-2">$</span>{{house.housePrice}}</p>
              <p class="text-[#9599A6] text-xs font-medium">{{ house.description }}</p>
            </div>
          </div>
  </router-link>
</template>

<script>
export default {
    name:'House-card',
    props:{
      house:Object
    }
}
</script>

<style>

</style>