<template>
    <DashboardLayout>
        <div class="w-full">
            <div class="bg-white py-2 px-4 flex w-fit rounded-md mx-auto">
                <i class="fa-solid fa-location-dot text-[#192BAA] p-[4px] text-lg"></i>
                <input @input="store.search(search, type)" v-model="search" type="text"
                    placeholder="Search By Location . . ."
                    class="focus:white placeholder:italic max-sm:placeholder:text-xs text-[#9599A6] text-s p-[4px] font-medium focus:outline-none w-[120px] sm:w-[300px]  text-s">
            </div>
            <router-link to="/Dashboard/houses/add"
                class="p-2 w-fit cursor-pointer bg-[#E2E6F3] rounded-lg m-2 mx-4 font-bold  text-[#616571] flex">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-rounded-plus" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M9 12h6"></path>
                    <path d="M12 9v6"></path>
                    <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z"></path>
                </svg><span>Add New</span></router-link>
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
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="house in store.houses" :key="house"
                            class="bg-[#EFF1F9] border border-white borde-4  hover:bg-gray-50 ">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ house.houseTitle }}
                            </th>
                            <td class="px-6 py-4">
                                {{ house.Location }}
                            </td>
                            <td class="px-6 py-4">
                                {{ house.created_at }}
                            </td>
                            <td class="px-6 py-4">
                                {{ house.housePrice }}
                            </td>
                            <td class="px-6 py-4">
                                {{ house.contractType }}
                            </td>
                            <td class="px-6 py-4">
                                <p v-if="house.accepted==0"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </p>
                                <p v-else>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>

                                </p>
                            </td>
                            <td class="px-6 py-4 flex space-x-4 my-auto">
                                <router-link :to="'/Dashboard/houses/update/' + house.id"
                                    class="hover:text-lime-600 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                        </path>
                                        <path d="M16 5l3 3"></path>
                                    </svg>
                                </router-link>
                                <div @click="deleteHouse(house.id)" class="hover:text-red-400 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 7l16 0"></path>
                                        <path d="M10 11l0 6"></path>
                                        <path d="M14 11l0 6"></path>
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                    </svg>
                                </div>
                                <router-link :to="'Dashboard/houses/info/' + house.id"
                                    class="hover:text-red-400 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>

                                </router-link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </DashboardLayout>
</template>

<script>
import axios from 'axios'
import DashboardLayout from '../Layouts/DashboardLayout.vue';
import { houseStore } from '../../stores/houseStore';
import { userStore } from '../../stores/userStore';
export default {
    name: 'ownerDashboard',
    components: {
        DashboardLayout
    },
    data() {
        return {
            store: houseStore()
        }
    },
    mounted() {
        this.store.getHouseInfo(false, userStore().userId)
    },
    methods: {
        deleteHouse(id) {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        axios.delete('http://127.0.0.1:8000/api/Houses/' + id,
                            {
                                headers: {
                                    "Content-type": "application/json",
                                    "Authorization": `Bearer ${userStore().token}`,
                                }
                            })
                            .then(() => {
                                this.store.getHouseInfo(false, userStore().userId)
                            }
                            )
                        swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                        });
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });
        }
    }
}
</script>

<style></style>