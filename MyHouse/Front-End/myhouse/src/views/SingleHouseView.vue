<template>
  <div>
    <HelloWorld />
    <div class="min-h-[60vh] h-fit rounded-lg m-4 relative ">
      <img src="../assets/bg-2.jpg" class="h-full w-full brightness-50 absolute rounded-lg" alt="">
      <div class="absolute">
        <h2 class="text-white text-3xl font-bold text-center m-8 ">House Title</h2>
        <p class="font-medium text-white p-2 mx-auto w-3/4 text-center">Lorem ipsum dolor sit, amet consectetur
          adipisicing elit. Distinctio nobis officiis, impedit expedita vitae
          dolorem vero natus est! Harum, beatae ipsa nihil repellendus odit deleniti dolorum fugiat? Sapiente, quod
          veritatis?</p>
      </div>
      <p class="absolute top-[85%] font-bold text-[#DA6217] text-lg p-2">120 m2</p>
    </div>
    <div class="m-4">
      <div class="bg-[#F0F2F8] border border-[1px] border-gray-300 p-2 rounded-lg">
        <ul
          class="hidden text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg shadow sm:flex dark:divide-gray-700 dark:text-gray-400">
          <li class="w-full">
            <a href="#"
              class="inline-block w-full p-4 text-gray-900 bg-gray-100 rounded-l-lg focus:ring-4 focus:ring-blue-300 active focus:outline-none "
              aria-current="page">
              <span class="mx-auto flex w-fit">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home-2" width="24" height="24"
                  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                  stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M5 12l-2 0l9 -9l9 9l-2 0"></path>
                  <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                  <path d="M10 12h4v4h-4z"></path>
                </svg>
                <p>House</p>
              </span>
            </a>
          </li>
          <li class="w-full">
            <div
              class="inline-block w-full p-4 bg-white hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">
              Floor 1</div>
          </li>
          <li class="w-full">
            <a href="#"
              class="inline-block w-full p-4 bg-white hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">Floor
              2</a>
          </li>
          <li class="w-full">
            <a href="#"
              class="inline-block w-full p-4 bg-white rounded-r-lg hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">Floor3</a>
          </li>
        </ul>

        <div v-if="showHousInfo">
          <houseInfo />
        </div>
        <div v-else>
          <FloorInfo />
        </div>
        


      </div>
    </div>

  </div>
</template>

<script>
import HouseInfo from '../components/House-info.vue'
import FloorInfo from '../components/Floor-info.vue'
import HelloWorld from '../components/HelloWorld.vue'
export default {
  name: 'SingleHouse',
  components:{
    HouseInfo,
    FloorInfo,
    HelloWorld
  },
  data(){
    return {
      showHousInfo : true,
    }
  }
}
</script>

<style></style>