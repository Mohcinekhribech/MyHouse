<template>
    <div class="flex">
        <div
            class="sideBar transition-all duration-300 max-sm:ml-[-58px] ease-linear w-[60px] flex flex-col h-screen p-2 top-0 bg-[#E2E6F3] px-2 border-r border-gray-700 relative">
            <div class="flex flex-col items-center mt-6 -mx-2">
                <h4 class="side hidden mx-2 my-6 font-medium text-lg text-[#364BDC]">Dashboard</h4>
                <img src="../assets/bg-1.jpg" class="image object-cover w-24 h-24  mx-2 rounded-full h-8 w-8"
                    alt="Avatar" />
                <h4 class="side hidden mx-2 mt-2 font-medium text-[#DA6217]">Mohcine Khribech</h4>
            </div>
            <div class="flex flex-col justify-between flex-1 mt-6">
                <div>
                    <div
                        class="flex cursor-pointer items-center px-2 py-2 mt-5 transition-colors duration-300 transform rounded-lg text-[#616571] hover:bg-gray-100 hover:bg-gray-800 hover:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-warehouse"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 21v-13l9 -4l9 4v13"></path>
                            <path d="M13 13h4v8h-10v-6h6"></path>
                            <path d="M13 21v-9a1 1 0 0 0 -1 -1h-2a1 1 0 0 0 -1 1v3"></path>
                        </svg>
                        <span class="side hidden mx-4 font-medium">Your Houses</span>
                    </div>
                    <div
                        class="flex cursor-pointer items-center px-2 py-2 mt-5 transition-colors duration-300 transform rounded-lg text-[#616571] hover:bg-gray-100 hover:bg-gray-800 hover:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-messages" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M21 14l-3 -3h-7a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1h9a1 1 0 0 1 1 1v10"></path>
                            <path d="M14 15v2a1 1 0 0 1 -1 1h-7l-3 3v-10a1 1 0 0 1 1 -1h2"></path>
                        </svg>
                        <span class="side hidden mx-4 font-medium">Conversations</span>
                    </div>
                    <div
                        class="flex cursor-pointer items-center px-2 py-2 mt-5 transition-colors duration-300 transform rounded-lg text-[#616571] hover:bg-gray-100 hover:bg-gray-800 hover:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home-2" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 12l-2 0l9 -9l9 9l-2 0"></path>
                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                            <path d="M10 12h4v4h-4z"></path>
                        </svg>
                        <span class="side hidden mx-4 font-medium">Home</span>
                    </div>
                    <div
                        class="flex cursor-pointer items-center px-2 py-2 mt-5 transition-colors duration-300 transform rounded-lg text-[#616571] hover:bg-gray-100 hover:bg-gray-800 hover:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                        </svg>
                        <span class="side hidden mx-4 font-medium">Logout</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full overflow-y-auto">
            <div @click="sideBar" class="p-2 w-fit cursor-pointer bg-[#E2E6F3] rounded-lg m-4 text-[#616571]">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2" width="24" height="24"
                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M4 6l16 0"></path>
                    <path d="M4 12l16 0"></path>
                    <path d="M4 18l16 0"></path>
                </svg>
            </div>
            <div class="w-full">
      <div class="bg-white py-2  px-4 flex w-fit my-6 rounded-md mx-auto">
        <i class="fa-solid fa-location-dot text-[#192BAA] p-[4px] text-lg"></i>
        <input type="text" placeholder="Search By Location . . ."
          class="focus:white placeholder:italic max-sm:placeholder:text-xs text-[#9599A6] text-s p-[4px] font-medium focus:outline-none w-[300px] max-sm:w-[200px]   max-sm:text-xs">
        <button
          class="px-8 py-2 text-xs h-fit w-fit font-bold bg-[#192BAA] text-white rounded-lg max-sm:px-2">Search</button>
      </div>
      <button class="p-2 w-fit cursor-pointer bg-[#E2E6F3] rounded-lg m-2 mx-4 font-bold  text-[#616571] flex"> <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-rounded-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <path d="M9 12h6"></path>
   <path d="M12 9v6"></path>
   <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z"></path>
</svg><span>Add New</span></button>
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg m-4">
    <table class="w-full text-sm text-left text-gray-500 ">
        <thead class="text-xs text-[#616571] uppercase bg-[#E2E6F3]">
            <tr>
                <th scope="col" class="px-6 py-3">
                    House Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Location
                </th>
                <th scope="col" class="px-6 py-3">
                    Creation Date
                </th>
                <th scope="col" class="px-6 py-3">     
                    Price
                </th>
                <th scope="col" class="px-6 py-3">     
                    contract type
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
        <tr class="bg-[#EFF1F9] border border-white borde-4  hover:bg-gray-50 ">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    ttt
                </th>
                <td class="px-6 py-4">
                    ttt
                </td>
                <td class="px-6 py-4">
                    ttt
                </td>
                <td class="px-6 py-4">
                    ttt
                </td>
                <td class="px-6 py-4">
                    ttt
                </td>
                <td class="px-6 py-4 flex space-x-4">
                    <div class="hover:text-lime-600 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
   <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
   <path d="M16 5l3 3"></path>
</svg>
                    </div>
                    <div class="hover:text-red-400 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <path d="M4 7l16 0"></path>
   <path d="M10 11l0 6"></path>
   <path d="M14 11l0 6"></path>
   <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
   <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
</svg>
                    </div>
                </td>
        </tr>
        </tbody>
    </table>
    </div>
                
            
        </div>
    </div>
    </div>
</template>

<script>
export default {
    name: 'ownerDashboard',
    methods: {
        sideBar() {
            var side = document.querySelectorAll('.side');
            var sideBar = document.querySelectorAll('.sideBar');
            var image = document.querySelectorAll('.image')
            image[0].classList.toggle('w-8');
            image[0].classList.toggle('h-8');
            if (sideBar[0].classList.contains('w-[60px]')) {
                sideBar[0].classList.replace('max-sm:ml-[-58px]', 'max-sm:ml-0');
                sideBar[0].classList.replace('w-[60px]', 'w-60');
            } else {
                sideBar[0].classList.replace('w-60', 'w-[60px]');
                sideBar[0].classList.replace('max-sm:ml-0', 'max-sm:ml-[-58px]');
            }
            for (var i in side) {
                if (side[i].classList) {
                    side[i].classList.toggle('hidden');
                }
            }
        }
    }
}
</script>

<style></style>