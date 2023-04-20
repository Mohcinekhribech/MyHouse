<template>
    <div class="flex">
        <div
            class="sideBar transition-all duration-300 max-sm:ml-[-58px] ease-linear w-[60px] flex flex-col h-screen p-2 top-0 bg-[#E2E6F3] px-2 border-r border-gray-700 relative">
            <div class="flex flex-col items-center mt-6 -mx-2">
                <h4 class="side hidden mx-2 my-6 font-medium text-lg text-[#364BDC]">Dashboard</h4>
                <img :src="user.avatar" class="image object-cover w-24 h-24  mx-2 rounded-full h-8 w-8"
                    alt="Avatar" />
                <h4 class="side hidden mx-2 mt-2 font-medium text-[#DA6217]">{{ user.name }}</h4>
            </div>
            <div class="flex flex-col justify-between flex-1 mt-6">
                <div>
                    <router-link to="/Dashboard"
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
                    </router-link>
                    <router-link to="/Dashboard/messages"
                        class="flex cursor-pointer items-center px-2 py-2 mt-5 transition-colors duration-300 transform rounded-lg text-[#616571] hover:bg-gray-100 hover:bg-gray-800 hover:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-messages" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M21 14l-3 -3h-7a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1h9a1 1 0 0 1 1 1v10"></path>
                            <path d="M14 15v2a1 1 0 0 1 -1 1h-7l-3 3v-10a1 1 0 0 1 1 -1h2"></path>
                        </svg>
                        <span class="side hidden mx-4 font-medium">Conversations</span>
                    </router-link>
                    <router-link to="/"
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
                    </router-link>
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
        <div class="w-full overflow-y-auto mx-2">
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
            <slot></slot>
        </div>
    </div>
</template>

<script>
import { userStore } from '../../stores/userStore';
export default {
    name: 'DashboardLayout',
    data()
    {
        return {
            user:userStore().user
        }
    }
    ,
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