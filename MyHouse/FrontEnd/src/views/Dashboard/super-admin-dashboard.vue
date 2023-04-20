<!-- <template>
    <superAdminLayout>
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
                            <td class="px-6 py-4 flex space-x-4">
                                <div @click="deleteHouse(house.id)" class="hover:text-red-400 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </superAdminLayout>
</template>

<script>
import axios from 'axios'
import superAdminLayout from '@/Layouts/superAdminLayout.vue';
import { houseStore } from '@/stores/houseStore';
import { userStore } from '@/stores/userStore';
export default {
    name: 'superAdminDashboard',
    components: {
        superAdminLayout
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

<style></style> -->
<script></script>