<template>
  <div>
    <HelloWorld />
    <div class="w-full">
      <div class="bg-white py-2  px-4 flex w-fit my-6 rounded-md mx-auto">
        <i class="fa-solid fa-location-dot text-[#192BAA] p-[4px] text-lg"></i>
        <input type="text" placeholder="Search By Location . . ."
          class="focus:white placeholder:italic max-sm:placeholder:text-xs text-[#9599A6] text-s p-[4px] font-medium focus:outline-none w-[300px] max-sm:w-[200px]   max-sm:text-xs">
        <button
          class="px-8 py-2 text-xs h-fit w-fit font-bold bg-[#192BAA] text-white rounded-lg max-sm:px-2">Search</button>
      </div>
    </div>
    <div class="m-6 display">
      <div v-for="house in houses" :key="house">
        <HousesCard :house="house" />
      </div>
    </div>
  </div>
</template>
<script>
import HelloWorld from '@/components/HelloWorld.vue';
import HousesCard from '../components/Houses-card.vue';
import axios from 'axios';
export default {
  name: 'Houses-View',
  components: {
    HelloWorld,
    HousesCard,
  },
  data()
  {
    return{
      houses:{}
    }
  }
  ,
  mounted(){
    axios.get('http://127.0.0.1:8000/api/Houses/index?type='+this.$route.params.type,{
    headers: {
                    "Content-type": "application/json",
                    "Authorization": `Bearer ${document.cookie}`,
                }
              }
    )
    .then(res => {this.houses=res.data.data
    console.log(this.houses)}
    )
  }
}
</script>
