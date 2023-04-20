<template>
  <div>
    <HelloWorld />
    <div v-if="!houses.Loading">
      <div class="flex max-lg:justify-center">
        <div class="lg:w-1/2 lg:pl-20 max-lg:px-4 pt-20">
          <h2
            class="text-[#364BDC] font-bold leading-relaxed max-sm:text-3xl text-5xl md:text-6xl md:leading-[80px] max-lg:text-center">
            Discover
            Most Suitable
            Property
          </h2>
          <p class="text-[#9599A6] my-10 max-lg:text-center text-md max-sm:text-sm">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam consectetur ad eum cupiditate itaque dolorem
            magnam recusandae,
          </p>
          <div class="w-full">
            <div class="bg-white py-2 px-4 flex w-fit rounded-md max-lg:mx-auto">
              <i class="fa-solid fa-location-dot text-[#192BAA] p-[4px] text-lg"></i>
              <input @input="houses.search(search)" v-model="search" type="text" placeholder="Search By Location . . ."
                class="focus:white placeholder:italic max-sm:placeholder:text-xs text-[#9599A6] text-s p-[4px] font-medium focus:outline-none w-[120px] sm:w-[300px]  text-s">
            </div>
          </div>

        </div>
        <div class="w-1/2 max-lg:hidden">
          <center>
            <img class="h-[683px] rounded-ss-[40%] rounded-ee-[40%]" src="../../assets/bg-1.jpg" alt="">
          </center>
        </div>
      </div>
      <div class="m-4 mx-auto">
        <div class="flex justify-between px-4">
          <div>
            <h4 class="font-medium max-sm:text-xs text-[#DA6217]">
              Best Choise
            </h4>
            <h3 class="font-bold text-xl max-sm:text-sm text-[#192BAA]">
              Popular Residence
            </h3>
          </div>
          <p class="font-medium text-[#DA6217] my-auto max-sm:text-sm">View More -></p>
        </div>
        <div class="m-2 display">
          <div v-for="house in houses.houses" :key="house">
            <HousesCard :house="house" />
          </div>
        </div>
      </div>
      <!--Home Section 3-->
      <div class="flex">
        <div class="w-1/2 max-lg:hidden">
          <center>
            <img class="h-[683px] rounded-se-[40%] rounded-es-[40%]" src="../../assets/bg-3.jpg" alt="">
          </center>
        </div>
        <div class="sm:w-1/2 max-sm:px-4 lg:pl-20 mx-auto pt-20">
          <h4 class="font-medium text-[#DA6217]">
            Services
          </h4>
          <h3 class="font-bold text-xl text-[#192BAA]">
            Clients Services
          </h3>
          <p class="text-[#9599A6] font-medium text-md my-6 max-sm:text-sm">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus repellat adipisci explicabo aut. Omnis unde
            reprehenderit laborum, iste cupiditate alias ha
          </p>
          <div class="flex space-x-4 my-6">
            <div class="bg-[#A0A8E0] px-2 py-[4px] rounded-lg w-fit">
              <i class="fa-solid fa-magnifying-glass text-lg text-[#192BAA] my-auto mx-auto"></i>
            </div>
            <h3 class="font-bold sm:text-xl text-[#192BAA] ">
              Clients Services
            </h3>
          </div>
          <div class="flex space-x-4 my-6">
            <div class="bg-[#A0A8E0] px-2 py-[4px] rounded-lg w-fit">
              <i class="fa-solid fa-magnifying-glass text-lg text-[#192BAA] my-auto mx-auto"></i>
            </div>
            <h3 class="font-bold sm:text-xl text-[#192BAA]">
              Clients Services
            </h3>
          </div>
          <div class="flex space-x-4 my-6">
            <div class="bg-[#A0A8E0] px-2 py-[4px] rounded-lg w-fit">
              <i class="fa-solid fa-magnifying-glass text-lg text-[#192BAA] my-auto mx-auto"></i>
            </div>
            <h3 class="font-bold sm:text-xl text-[#192BAA]">
              Clients Services
            </h3>
          </div>

        </div>
      </div>
      <div class="flex">
        <div class="sm:w-1/2 max-sm:px-4 lg:pl-20 mx-auto pt-20">
          <h4 class="font-medium text-[#DA6217]">
            Services
          </h4>
          <h3 class="font-bold text-xl text-[#192BAA]">
            Clients Services
          </h3>
          <p class="text-[#9599A6] font-medium text-md my-6 max-sm:text-sm">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus repellat adipisci explicabo aut. Omnis unde
            reprehenderit laborum, iste cupiditate alias ha
          </p>
          <div class="flex space-x-4 my-6">
            <div class="bg-[#A0A8E0] px-2 py-[4px] rounded-lg w-fit">
              <i class="fa-solid fa-magnifying-glass text-lg text-[#192BAA] my-auto mx-auto"></i>
            </div>
            <h3 class="font-bold sm:text-xl text-[#192BAA]">
              Clients Services
            </h3>
          </div>
          <div class="flex space-x-4 my-6">
            <div class="bg-[#A0A8E0] px-2 py-[4px] rounded-lg w-fit">
              <i class="fa-solid fa-magnifying-glass text-lg text-[#192BAA] my-auto mx-auto"></i>
            </div>
            <h3 class="font-bold sm:text-xl text-[#192BAA]">
              Clients Services
            </h3>
          </div>
          <div class="flex space-x-4 my-6">
            <div class="bg-[#A0A8E0] px-2 py-[4px] rounded-lg w-fit">
              <i class="fa-solid fa-magnifying-glass text-lg text-[#192BAA] my-auto mx-auto"></i>
            </div>
            <h3 class="font-bold sm:text-xl text-[#192BAA]">
              Clients Services
            </h3>
          </div>

        </div>
        <div class="w-1/2 max-lg:hidden">
          <center>
            <img class="h-[683px] rounded-ss-[40%] rounded-ee-[40%]" src="../../assets/bg-4.jpg" alt="">
          </center>
        </div>
      </div>
      <div class="text-white rounded-lg bg-[#DA6217] h-fit p-12 m-6">
        <center>
          <div class="p-[2px] sm:p-8">
            <h2 class="text-5xl max-sm:text-2xl font-medium py-2 sm:py-6">
              Get Started With MyHouse
            </h2>
            <p class="sm:text-md max-sm:text-sm font-medium my-2 sm:my-6">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus
              hic
              exercitationem facilis illo id corporis
              fugiat debitis incidunt eveniet maxime ducimus veniam perferendis ad odio quidem quas architecto, non vel?
            </p>
            <button class="text-white sm:text-xl font-bold rounded-lg p-2 px-4 border border-[1px] border-white">
              Get Started
            </button>
          </div>

        </center>

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
// @ is an alias to /src
import HelloWorld from '@/components/HelloWorld.vue'
import HousesCard from '@/components/Houses-card.vue'
import { houseStore } from '../../stores/houseStore'
export default {
  name: 'HomeView',
  components: {
    HelloWorld,
    HousesCard
  },
  data() {
    return {
      houses: houseStore(),
      search:''
    }
  },
  mounted() {
    this.houses.getHouseInfo();
    console.log(this.houses.houses)
  }
}
</script>
