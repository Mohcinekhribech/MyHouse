<template>
  <nav class="flex max-md:justify-between relative p-4 px-12 md:place-content-around">
    <i class="fa-solid fa-bars md:hidden text-2xl text-[#364BDC]" @click="openNav()" id="fbi"></i>
    <img class="logo" src="" alt="Logo">
    <ul class="flex space-x-6 max-md:absolute max-md:w-[220px] max-md:h-screen max-md:bg-[#F4F5F8] max-md:left-[-100%] max-md:flex-col  max-md:p-4 ease-in-out duration-300">
            <i @click="closeNav()" class="fa-solid fa-x md:hidden text-xl text-[#DA6217] p-4" id="fxi"></i>
            <li class="p-2"><a href="">MyHome</a></li>
            <li class="p-2"><a href="">MyHome</a></li>
            <li class="p-2"><a href="">MyHome</a></li>
            <li class="p-2"><a href="">MyHome</a></li>
    </ul>
</nav>
</template>

<script>
export default {
methods:{
  openNav(){
    document.querySelector("ul").classList.replace('max-md:left-[-100%]','max-md:left-[0]');
  },
  closeNav(){
  document.querySelector("ul").classList.replace('max-md:left-[0]','max-md:left-[-100%]');
  }
}
}
</script>

<style>

</style>