<template>
    <div>
        <div  v-if="subPosition == 1"  class="min-h-screen bg-gray-100 flex flex-col justify-center sm:py-12">
            <div class="p-10 xs:p-0 mx-auto md:w-full md:max-w-2xl">

                <div class="bg-white shadow w-full rounded-lg divide-y divide-gray-200">
                    <form @submit.prevent="onSubmitFloor">
                        <h1 class="font-bold text-center text-2xl mb-5">Add Floor {{ position }}</h1>
                        <div class="px-5 py-7">
                            <div>
                                <label class="font-semibold text-sm text-gray-600 pb-1 block">Rooms Numbers</label>
                                <input v-model="roomNbrs" required type="number"
                                    class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
                            </div>
                            <button type="submit"
                                class="transition duration-200 bg-blue-500 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center inline-block">
                                <span class="inline-block mr-2">Next</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" class="w-4 h-4 inline-block">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div v-if="subPosition == 2">
            <addRoom :floors_id="floors_id" :floorPosition="position" :roomNbrs="roomNbrs" @dataEvent="getDataFromChild"/>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import addRoom from '@/components/add-room.vue'
import { userStore } from '../stores/userStore'
export default {
    name: 'addFloor',
    components: {
        addRoom
    },
    data() {
        return {
            roomNbrs: '',
            floors_id: '',
            position:1,
            subPosition: 1,
            floorPosition: '',
            roomPosition:''
        }
    },
    props: {
        houses_id: Number,
        floorNbrs:Number
    },
    created() {
        console.log(this.houses_id)
    }
    ,
    methods: {
        onSubmitFloor() {
            axios.post('http://127.0.0.1:8000/api/Floors', {
                houses_id: this.houses_id
            }, {
                headers: {
                    "Content-type": "application/json",
                    "Authorization": `Bearer ${userStore().token}`,
                }
            }
            ).then(res => {
                console.log(this.position)
                this.floors_id = res.data.id
                this.subPosition=2
            })
        },
        getDataFromChild(p,floorPosition)
        {
            this.subPosition = p
            this.position=floorPosition
            if(this.floorNbrs+1 == floorPosition){
                        this.$emit('dataEvent',3);
                    }
        }
    }

}
</script>

<style></style>