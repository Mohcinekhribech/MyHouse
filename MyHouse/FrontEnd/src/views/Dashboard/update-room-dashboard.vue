<template>
    <div class="min-h-screen bg-gray-100 flex flex-col justify-center sm:py-12">
        <div class="p-10 xs:p-0 mx-auto md:w-full md:max-w-2xl">
            <h1 class="font-bold text-center text-2xl mb-5">update Room</h1>
            <div class="bg-white shadow w-full rounded-lg divide-y divide-gray-200">
                <form @submit.prevent="onSubmitRoom">
                    <div class="px-5 py-7">
                        <div>
                            <label class="font-semibold text-sm text-gray-600 pb-1 block">Rooms Area</label>
                            <input v-model="room.RoomArea" required type="number"
                                class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
                            <label class="font-semibold text-xs text-red-500 pb-1 block" v-if="errors.errRoomArea">{{
                                errors.errRoomArea }}</label>
                        </div>
                        <div>
                            <label class="font-semibold text-sm text-gray-600 pb-1 block">Rooms Picture</label>
                            <div>
                            <img class="h-40 w-40 mx-auto" :src="room.RoomPic" alt="">
                        </div>
                            <input @change="uploadimage($event)" required type="file"
                                class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
                            <label class="font-semibold text-xs text-red-500 pb-1 block" v-if="errors.errRoomPic">{{
                                errors.errRoomPic }}</label>
                        </div>
                        <div>
                            <label class="font-semibold text-sm text-gray-600 pb-1 block">Rooms Type</label>
                            <input v-model="room.RoomType" required type="number"
                                class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
                            <label class="font-semibold text-xs text-red-500 pb-1 block" v-if="errors.errRoomType">{{
                                errors.errRoomType }}</label>
                        </div>
                        <div>
                            <label class="font-semibold text-sm text-gray-600 pb-1 block">Windows Numbers</label>
                            <input v-model="room.WindowsNbrs" required type="number"
                                class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
                            <label class="font-semibold text-xs text-red-500 pb-1 block" v-if="errors.errWindowsNbrs">{{
                                errors.errWindowsNbrs }}</label>
                        </div>
                        <div>
                            <label class="font-semibold text-sm text-gray-600 pb-1 block">description</label>
                            <textarea v-model="room.description" required 
                                class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" ></textarea>
                            <label class="font-semibold text-xs text-red-500 pb-1 block" v-if="errors.errdescription">{{
                                errors.errdescription }}</label>
                        </div>
                        <button type="submit"
                            class="transition duration-200 bg-blue-500 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center inline-block">
                            <span class="inline-block mr-2">update</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="w-4 h-4 inline-block">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import { houseStore } from '../../stores/houseStore';
// import { positions } from '@/stores/store.js';
export default {
    name: 'updateRoom',
    data() {
        return {
            room: {},
            errors: {
                errRoomArea: false,
                errRoomPic: false,
                errRoomType: false,
                errWindowsNbrs: false,
                errdescription:false
            },
            store:houseStore()
            ,
            p:2,
            position:1
        }
    }
    ,
    props: {
        floors_id: Number,
        roomNbrs: Number,
        floorPosition:Number
    },
    mounted(){
        axios.get('http://127.0.0.1:8000/api/Rooms/'+this.$route.params.id,
        {
                headers: {
                    "Content-type": "application/json",
                    "Authorization": `Bearer ${document.cookie}`,
                }
            })
        .then(res=> {this.room = res.data.data
        console.log(this.room.RoomArea)
         })
    }
    ,
    methods: {
        onSubmitRoom() {
            this.room.floors_id = this.floors_id;
            axios.put('http://127.0.0.1:8000/api/Rooms/'+this.$route.params.id, this.room, {
                headers: {
                    "Content-type": "application/json",
                    "Authorization": `Bearer ${document.cookie}`,
                }
            }
            )
                .then((res) => {
                    console.log(res)
                    if(this.roomNbrs == this.position){
                        let count = this.floorPosition+1;
                        this.$emit('dataEvent', 1,count);
                    }
                    this.room.RoomPic = '';
                    this.room.RoomType = '';
                    this.room.WindowsNbrs = '';
                    this.room.roomArea = '';
                    this.errors.errRoomArea = false;
                    this.errors.errRoomPic = false;
                    this.errors.errRoomType = false;
                    this.errors.errWindowsNbrs = false;
                    this.errors.errdescription = false;
                    this.position++;
                    
                    this.$router.push('/Dashboard/houses/info/'+this.store.floors[0].houses_Id)
                })
                .catch(error => {
                    console.log(error)
                    if (error.response) {
                        if (error.response.data.errors.roomArea) {
                            this.errors.errRoomArea = error.response.data.errors.roomArea[0]
                        }
                        if (error.response.data.errors.RoomPic) {
                            this.errors.errRoomPic = error.response.data.errors.RoomPic[0]
                        }
                        if (error.response.data.errors.RoomType) {
                            this.errors.errRoomType = error.response.data.errors.RoomType[0]
                        }
                        if (error.response.data.errors.WindowsNbrs) {
                            this.errors.errWindowsNbrs = error.response.data.errors.WindowsNbrs[0]
                        }
                        if (error.response.data.errors.description) {
                            this.errors.errdescription = error.response.data.errors.description[0]
                        }
                    }
                })
        },
        uploadimage(event) {
            this.loading = true;
            let file = event.target.files[0];
            let formData = new FormData();
            formData.append('file', file);
            formData.append('upload_preset', 'ozbl32lz');
            axios.post('https://api.cloudinary.com/v1_1/dssb587ew/upload', formData)
                .then(response => {
                    console.log(response);
                    this.loading = false;
                    this.room.RoomPic = response.data.secure_url;
                })
        }
    }
}
</script>

<style></style>