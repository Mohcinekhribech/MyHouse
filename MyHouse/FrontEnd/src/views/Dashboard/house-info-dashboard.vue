<template>
    <DashboardLayout>
        {{ floors }}
        <div v-for="floor, i in Store.floors " :key="floor">
            <div class="my-4">
                <div
                    class="flex w-full items-center rounded px-6 pb-2 pt-2.5 text-xs font-medium uppercase text-[#192BAA] transition duration-150 ease-in-out bg-[#E2E6F3]">
                    <button
                        class="flex w-full items-center rounded px-6 pb-2 pt-2.5 text-xs font-medium uppercase text-[#192BAA] transition duration-150 ease-in-out bg-[#E2E6F3]"
                        @click="show($event)">
                        Floor {{ i + 1 }}
                        <span class="ml-2 w-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </button>
                    <div class="flex space-x-4 py-2 px-4">
                        <button @click="showForm" class="hover:text-lime-600 cursor-pointer text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>

                        </button>
                        <button class="hover:text-red-400 cursor-pointer text-gray-500">
                            <svg @click="deleteFloor(floor.id)" xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 7l16 0"></path>
                                <path d="M10 11l0 6"></path>
                                <path d="M14 11l0 6"></path>
                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <ul class="hidden float-left my-2 w-full overflow-hidden rounded-lg border-none">
                    <li v-for="(room, i) in floor.Rooms" :key="room" class="flex bg-white my-2">
                        <div
                            class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600">
                            Room {{ i + 1 }}
                        </div>
                        <div class="flex space-x-4 py-2 px-4">
                            <router-link :to="'/Dashboard/houses/Rooms/' + room.id">
                                <button class="hover:text-lime-600 cursor-pointer text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                        </path>
                                        <path d="M16 5l3 3"></path>
                                    </svg>
                                </button>
                            </router-link>
                            <button class="hover:text-red-400 cursor-pointer text-gray-500">
                                <svg @click="deleteRoom(room.id)" xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 7l16 0"></path>
                                    <path d="M10 11l0 6"></path>
                                    <path d="M14 11l0 6"></path>
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                </svg>
                            </button>
                        </div>

                    </li>
                </ul>
                <div :id="floor.id" class="hidden">
                    <addRoomVue :floors_id="floor.id" :dashboard="true" @AddRoomInfo="getDataFromChild" />
                </div>
            </div>
        </div>

    </DashboardLayout>
</template>

<script>
import DashboardLayout from '../Layouts/DashboardLayout.vue';
import { houseStore } from '@/stores/houseStore';
import addRoomVue from '@/components/add-room.vue'
import axios from 'axios';

export default {
    name: 'houseInfoDashboard',
    components: {
        DashboardLayout,
        addRoomVue
    },
    data() {
        return {
            Store: houseStore()
        }
    }
    ,
    mounted() {
        this.Store.getHouseInfo(this.$route.params.id)
    },
    methods: {
        show($event) {
            console.log($event.target.parentElement.parentElement.children[1])
            $event.target.parentElement.parentElement.children[1].classList.toggle('hidden')
        },
        showForm($event) {
            $event.target.parentElement.parentElement.parentElement.parentElement.children[2].classList.toggle('hidden')
            // $event.target.parentElement.parentElement.children[2].classList.toggle('hidden')
        },
        deleteRoom(id) {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        axios.delete('http://127.0.0.1:8000/api/Rooms/' + id, {
                            headers: {
                                "Content-type": "application/json",
                                "Authorization": `Bearer ${document.cookie}`,
                            }
                        })
                            .then(res => {
                                this.Store.getHouseInfo(this.$route.params.id)
                            })
                        swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                        });
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });

        },
        deleteFloor(id) {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        axios.delete('http://127.0.0.1:8000/api/Floors/' + id, {
                            headers: {
                                "Content-type": "application/json",
                                "Authorization": `Bearer ${document.cookie}`,
                            }
                        })
                            .then(res => {
                                this.Store.getHouseInfo(this.$route.params.id)
                            })
                        swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                        });
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });
        }
        ,
        getDataFromChild(bool, id) {
            if (bool) {
                swal({
                    title: "Room Added Seccessfully!",
                    text: "You clicked the button!",
                    icon: "success",
                });
                document.getElementById(id).classList.toggle('hidden')
            }
            this.Store.getHouseInfo(this.$route.params.id)

        }
    }
}
</script>

<style></style>