<template>
  <div>
    <HelloWorld />
    <div v-if="!house.Loading">
      <div class="min-h-[60vh] h-fit rounded-lg m-4 relative ">
        <img :src="house.houses.housePic" class="h-full w-full brightness-50 absolute rounded-lg" alt="">
        <div class="absolute w-full">
          <h2 class="text-white text-3xl font-bold text-center m-8 ">{{ house.houses.houseTitle }}</h2>
          <p class="font-medium text-white p-2 mx-auto w-3/4 text-center">{{ house.houses.description }}</p>
        </div>
        <p class="absolute top-[85%] font-bold text-[#DA6217] text-lg p-2">120 m2</p>
      </div>
      <div class="m-4">
        <div class="bg-[#F0F2F8] border border-[1px] border-gray-300 p-2 rounded-lg">
          <ul
            class="hidden text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg shadow sm:flex dark:divide-gray-700 dark:text-gray-400">
            <li class="w-full">
              <a @click="showHouse = true"
                class="inline-block w-full p-4 text-gray-900 bg-gray-100 rounded-l-lg focus:ring-4 focus:ring-blue-300 active focus:outline-none "
                aria-current="page">
                <span class="mx-auto flex w-fit">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home-2" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5 12l-2 0l9 -9l9 9l-2 0"></path>
                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                    <path d="M10 12h4v4h-4z"></path>
                  </svg>
                  <p>House</p>
                </span>
              </a>
            </li>
            <li v-for="i in house.houses.floorNbrs" :key="i" @click="showFloor(i)" class="w-full">
              <div
                class="inline-block w-full p-4 bg-white hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">
                Floor {{ i }}</div>
            </li>
          </ul>

          <div v-if="showHouse">
            <houseInfo :house="house.houses" />
          </div>
          <div v-else>
            <FloorInfo :floor="floor" />
          </div>



        </div>
      </div>
    </div>
    <div v-else>
      <div role="status" class="absolute w-full h-screen">
        <svg aria-hidden="true"
          class="mx-auto mt-[50%] w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
          viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
            fill="currentColor" />
          <path
            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
            fill="currentFill" />
        </svg>
        <span class="sr-only">Loading...</span>
      </div>
    </div>
  </div>
</template>

<script>
import HouseInfo from '@/components/House-info.vue'
import FloorInfo from '@/components/Floor-info.vue'
import HelloWorld from '@/components/HelloWorld.vue'
import { houseStore } from '../../stores/houseStore'
export default {
  name: 'SingleHouse',
  components: {
    HouseInfo,
    FloorInfo,
    HelloWorld
  },
  data() {
    return {
      showHouse: true,
      house: houseStore(),
      floor: {}
    }
  },
  mounted() {
    houseStore().getHouseInfo(this.$route.params.id)
    this.floor = this.house.floors[0]
  },
  methods: {
    showFloor(i) {
      this.floor = this.house.floors[i - 1];
      this.showHouse = false
    }
  }
}
</script>

<style></style>