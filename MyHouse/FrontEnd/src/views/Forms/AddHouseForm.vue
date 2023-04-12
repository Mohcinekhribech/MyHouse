<template>
    <div class="min-h-screen bg-gray-100 flex flex-col justify-center sm:py-12">
        <img class="w-full" :src="housePic" alt="">
        <div class="p-10 xs:p-0 mx-auto md:w-full md:max-w-2xl">
            <h1 class="font-bold text-center text-2xl mb-5">Add House</h1>
            <div class="bg-white shadow w-full rounded-lg divide-y divide-gray-200">
                <form @submit.prevent="onSubmitHouse">
                    <div class="px-5 py-7">
                        <div class="cursor-pointer" v-if="position == 1">
                            <div>
                                <label class="font-semibold text-sm text-gray-600 pb-1 block">House Title</label>
                                <input v-model="house.houseTitle" required type="text"
                                    class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
                                <label class="font-semibold text-xs text-red-500 pb-1 block" v-if="errors.errhouseTitle">{{
                                    errors.errhouseTitle }}</label>
                            </div>
                            <div>
                                <label class="font-semibold text-sm text-gray-600 pb-1 block">House Area</label>
                                <input v-model="house.houseArea" required type="text"
                                    class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
                                <label class="font-semibold text-xs text-red-500 pb-1 block" v-if="errors.errhouseArea">{{
                                    errors.errhouseArea }}</label>
                            </div>

                            <div>
                                <label class="font-semibold text-sm text-gray-600 pb-1 block">Location</label>
                                <input v-model="house.Location" required type="text"
                                    class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
                                <label class="font-semibold text-xs text-red-500 pb-1 block" v-if="errors.errLocation">{{
                                    errors.errLocation }}</label>
                            </div>
                            <div>
                                <label class="font-semibold text-sm text-gray-600 pb-1 block">Contract Type</label>
                                <select v-model="house.contractType"
                                    class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full">
                                    <option value="Buy">Buy</option>
                                    <option value="Rent">Rent</option>
                                </select>
                                <label class="font-semibold text-xs text-red-500 pb-1 block"
                                    v-if="errors.errcontractType">{{
                                        errors.errcontractType }}</label>
                            </div>
                            <div>
                                <label class="font-semibold text-sm text-gray-600 pb-1 block">Price</label>
                                <input v-model="house.housePrice" required type="text"
                                    class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
                                <label class="font-semibold text-xs text-red-500 pb-1 block" v-if="errors.errhousePrice">{{
                                    errors.errhousePrice }}</label>
                            </div>
                            <div>
                                <label class="font-semibold text-sm text-gray-600 pb-1 block">Floor Numbers</label>
                                <input v-model="house.floorNbrs" required type="number"
                                    class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
                                <label class="font-semibold text-xs text-red-500 pb-1 block" v-if="errors.errfloorNbrs">{{
                                    errors.errfloorNbrs }}</label>
                            </div>
                            <div>
                                <label class="font-semibold text-sm text-gray-600 pb-1 block">House Picture</label>
                                <input @change="uploadimage('house', $event)" required type="file"
                                    class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
                                <label class="font-semibold text-xs text-red-500 pb-1 block" v-if="errors.errhousePic">{{
                                    errors.errhousePic }}</label>
                            </div>
                            <div>
                                <label class="font-semibold text-sm text-gray-600 pb-1 block">Description</label>
                                <textarea v-model="house.description" required type="text"
                                    class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" cols="30"
                                    rows="10"></textarea>
                                <label class="font-semibold text-xs text-red-500 pb-1 block" v-if="errors.errdescription">{{
                                    errors.errdescription }}</label>
                            </div>
                            <div>
                                <label class="font-semibold text-sm text-gray-600 pb-1 block">Conditions</label>
                                <div class="flex space-x-4">
                                    <input v-model="condition" required type="text"
                                        class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
                                    <div @click="addCondtion"
                                        class="bg-[#DA6217] p-[3px] my-auto mb-6 rounded-lg text-white cursor-pointer"><svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <div v-for="(c)  in conditions" :key="c"
                                        class="bg-[#DA6217] flex justify-between text-white font-medium p-2 rounded-lg m-2">
                                        <p>{{ c }}</p>
                                        <div @click="deleteCondition(c)" class="cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
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
                    </div>
                </form>
                <div v-if="position == 2">
                    <form v-if="subPosition == 1" @submit.prevent="onSubmitFloor">
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
                    <form v-if="subPosition == 2" @submit.prevent="onSubmitRoom">
                        <div class="px-5 py-7">

                            <div>
                                <label class="font-semibold text-sm text-gray-600 pb-1 block">House Title</label>
                                <input v-model="house.houseTitle" required type="text"
                                    class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
                                {{ house.houseTitle }}
                                <label class="font-semibold text-xs text-red-500 pb-1 block" v-if="errorHouseTitle">{{
                                    errorHouseTitle }}</label>
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
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name: 'addHouse',
    data() {
        return {
            conditions: [],
            position: 1,
            subPosition: '',
            roomNbrs: '',
            condition: '',
            roomPic: '',
            house: {
                Owner_id: 1,
                housePic: '',
                floorNbrs: '',
                Location: '',
                houseArea: '',
                description: '',
                contractType: '',
                housePrice: '',
                houseTitle: ''
            },
            errors: {
                errconditions: false,
                errhousePic: false,
                errfloorNbrs: false,
                errLocation: false,
                errhouseArea: false,
                errdescription: false,
                errcontractType: false,
                errhousePrice: false,
                errhouseTitle: false
            },
            rooms: [],
            room: {
                roomArea: '',
                RoomPic: '',
                RoomType: '',
                WindowsNbrs: '',
                floors_id: ''
            }
        }
    },
    methods: {
        addCondtion() {
            if (this.conditions.length < 4) {
                this.conditions.push(this.condition);
                this.condition = [];
            }
        },
        deleteCondition(i) {
            let index = this.conditions.indexOf(i);
            if (index > -1) { // only splice array when item is found
                this.conditions.splice(index, 1); // 2nd parameter means remove one item only
            }

        },
        uploadimage(ref, event) {
            this.loading = true;
            let file = event.target.files[0];
            let formData = new FormData();
            formData.append('file', file);
            formData.append('upload_preset', 'ozbl32lz');
            axios.post('https://api.cloudinary.com/v1_1/dssb587ew/upload', formData)
                .then(response => {
                    console.log(response);
                    this.loading = false;
                    switch (ref) {
                        case 'house': this.house.housePic = response.data.secure_url;
                            break;
                        case 'room': this.house.roomPic = response.data.secure_url;
                            break;
                    }
                })
        },
        onSubmitHouse() {
            axios.post('http://127.0.0.1:8000/api/Houses', this.house, {
                headers: {
                    "Content-type": "application/json",
                    "Authorization": `Bearer ${document.cookie}`,
                }
            }
            )
                .then((res) => {
                    if (this.conditions.length) {
                        axios.post('http://127.0.0.1:8000/api/conditions',{
                            condition:this.conditions,
                            house_id:res.data.data.id
                        }
                            , {
                            headers: {
                                "Content-type": "application/json",
                                "Authorization": `Bearer ${document.cookie}`,
                            }
                        })
                    }
                    console.log();
                    this.errhousePic = false
                    this.errfloorNbrs = false
                    this.errLocation = false
                    this.errhouseArea = false
                    this.errdescription = false
                    this.errcontractType = false
                    this.errhousePrice = false
                    this.errhouseTitle = false
                })
                .catch(error => {
                    if (error.response.data.errors) {
                        if (error.response.data.errors.housePic) {
                            this.errors.errhousePic = error.response.data.errors.housePic[0]
                        }
                        if (error.response.data.errors.description) {
                            this.errors.errdescription = error.response.data.errors.description[0]
                        }
                        if (error.response.data.errors.houseTitle) {
                            this.errors.errhouseTitle = error.response.data.errors.houseTitle[0]
                        }
                        if (error.response.data.errors.houseArea) {
                            this.errors.errhouseArea = error.response.data.errors.houseArea[0]
                        }
                        if (error.response.data.errors.housePrice) {
                            this.errors.errhousePrice = error.response.data.errors.housePrice[0]
                        }
                        if (error.response.data.errors.floorNbrs) {
                            this.errors.errfloorNbrs = error.response.data.errors.floorNbrs[0]
                        }
                        if (error.response.data.errors.contractType) {
                            this.errors.errcontractType = error.response.data.errors.contractType[0]
                        }
                        if (error.response.data.errors.Location) {
                            this.errors.errLocation = error.response.data.errors.Location[0]
                        }
                    }
                })
        }
    }
}
</script>

<style></style>