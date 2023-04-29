<template>
  <div>
    <HelloWorld />
    <div class="flex max-lg:justify-center">
      <div class="lg:w-1/2 pl-20 pt-20">
        <h2 class="text-[#364BDC] font-bold leading-relaxed text-5xl md:text-6xl md:leading-[80px] max-lg:text-center">
          Discover
          Most Suitable
          Property
        </h2>
        <p class="text-[#9599A6] my-10 max-lg:text-center">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam consectetur ad eum cupiditate itaque dolorem
          magnam recusandae,
        </p>
        <div class="w-full">
          <div class="bg-white py-2 px-4 flex w-fit rounded-md max-lg:mx-auto">
            <i class="fa-solid fa-location-dot text-[#192BAA] p-[4px] text-lg"></i>
            <input type="text" placeholder="Search By Location . . ."
              class="focus:white placeholder:italic text-[#9599A6] text-s p-[4px] font-medium focus:outline-none w-[300px]   text-s">
            <button class="px-8 py-2 text-xs h-fit w-fit  font-bold bg-[#192BAA] text-white rounded-lg">Search</button>
          </div>
        </div>

      </div>
      <div class="w-1/2 max-lg:hidden">
        <center>
          <img class="h-[683px] rounded-ss-[40%] rounded-ee-[40%]" src="../assets/bg-1.jpg" alt="">
        </center>
      </div>
    </div>
    <div class="m-4">
      <div class="flex justify-between px-4">
        <div>
          <h4 class="font-medium text-[#DA6217]">
            Best Choise
          </h4>
          <h3 class="font-bold text-xl text-[#192BAA]">
            Popular Residence
          </h3>
        </div>
        <p class="font-medium text-[#DA6217] my-auto">View More -></p>
      </div>
      <div class="m-4 display">
        <HousesCard />
      </div>
    </div>
    <!--Home Section 3-->
    <div class="flex">
      <div class="w-1/2 max-lg:hidden">
        <center>
          <img class="h-[683px] rounded-se-[40%] rounded-es-[40%]" src="../assets/bg-3.jpg" alt="">
        </center>
      </div>
      <div class="md:w-1/2 pl-20 pt-20">
        <h4 class="font-medium text-[#DA6217]">
          Services
        </h4>
        <h3 class="font-bold text-xl text-[#192BAA]">
          Clients Services
        </h3>
        <p class="text-[#9599A6] font-medium text-md my-6">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus repellat adipisci explicabo aut. Omnis unde
          reprehenderit laborum, iste cupiditate alias ha
        </p>
        <div class="flex space-x-4 my-6">
          <div class="bg-[#A0A8E0] px-2 py-[4px] rounded-lg w-fit">
            <i class="fa-solid fa-magnifying-glass text-lg text-[#192BAA] my-auto mx-auto"></i>
          </div>
          <h3 class="font-bold text-xl text-[#192BAA]">
            Clients Services
          </h3>
        </div>
        <div class="flex space-x-4 my-6">
          <div class="bg-[#A0A8E0] px-2 py-[4px] rounded-lg w-fit">
            <i class="fa-solid fa-magnifying-glass text-lg text-[#192BAA] my-auto mx-auto"></i>
          </div>
          <h3 class="font-bold text-xl text-[#192BAA]">
            Clients Services
          </h3>
        </div>
        <div class="flex space-x-4 my-6">
          <div class="bg-[#A0A8E0] px-2 py-[4px] rounded-lg w-fit">
            <i class="fa-solid fa-magnifying-glass text-lg text-[#192BAA] my-auto mx-auto"></i>
          </div>
          <h3 class="font-bold text-xl text-[#192BAA]">
            Clients Services
          </h3>
        </div>

      </div>
    </div>
    <div class="flex">
      <div class="md:w-1/2 pl-20 pt-20">
        <h4 class="font-medium text-[#DA6217]">
          Services
        </h4>
        <h3 class="font-bold text-xl text-[#192BAA]">
          Clients Services
        </h3>
        <p class="text-[#9599A6] font-medium text-md my-6">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus repellat adipisci explicabo aut. Omnis unde
          reprehenderit laborum, iste cupiditate alias ha
        </p>
        <div class="flex space-x-4 my-6">
          <div class="bg-[#A0A8E0] px-2 py-[4px] rounded-lg w-fit">
            <i class="fa-solid fa-magnifying-glass text-lg text-[#192BAA] my-auto mx-auto"></i>
          </div>
          <h3 class="font-bold text-xl text-[#192BAA]">
            Clients Services
          </h3>
        </div>
        <div class="flex space-x-4 my-6">
          <div class="bg-[#A0A8E0] px-2 py-[4px] rounded-lg w-fit">
            <i class="fa-solid fa-magnifying-glass text-lg text-[#192BAA] my-auto mx-auto"></i>
          </div>
          <h3 class="font-bold text-xl text-[#192BAA]">
            Clients Services
          </h3>
        </div>
        <div class="flex space-x-4 my-6">
          <div class="bg-[#A0A8E0] px-2 py-[4px] rounded-lg w-fit">
            <i class="fa-solid fa-magnifying-glass text-lg text-[#192BAA] my-auto mx-auto"></i>
          </div>
          <h3 class="font-bold text-xl text-[#192BAA]">
            Clients Services
          </h3>
        </div>

      </div>
      <div class="w-1/2 max-lg:hidden">
        <center>
          <img class="h-[683px] rounded-ss-[40%] rounded-ee-[40%]" src="../assets/bg-4.jpg" alt="">
        </center>
      </div>
    </div>

    <div class="text-white rounded-lg bg-[#DA6217] h-fit p-12 m-6">
      <center>
        <div class="p-8">
          <h2 class="text-5xl font-medium py-6">
            Get Started With MyHouse
          </h2>
          <p class="text-medium font-medium my-6">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus hic
            exercitationem facilis illo id corporis
            fugiat debitis incidunt eveniet maxime ducimus veniam perferendis ad odio quidem quas architecto, non vel?</p>
          <button class="text-white text-xl font-bold rounded-lg p-2 px-4 border border-[1px] border-white">
            Get Started
          </button>
        </div>

      </center>

    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import HelloWorld from '@/components/HelloWorld.vue'
import HousesCard from '@/components/Houses-card.vue'
export default {
  name: 'HomeView',
  components: {
    HelloWorld,
    HousesCard
  }
}
</script>
