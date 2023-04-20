<template>
    <div>
        <div class="min-h-screen bg-gray-100 flex flex-col justify-center sm:py-12">
            <div class="p-10 xs:p-0 mx-auto md:w-full md:max-w-2xl">
                <div class="bg-white shadow w-full rounded-lg divide-y divide-gray-200">
                    <form @submit.prevent="onSubmitHouse">
                        <h1 class="font-bold text-center text-2xl mb-5">Update House</h1>
                        <div class="px-5 py-7">
                            <div>
                                <div>
                                    <label class="font-semibold text-sm text-gray-600 pb-1 block">House Title</label>
                                    <input v-model="house.houseTitle" required type="text"
                                        class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
                                    <label class="font-semibold text-xs text-red-500 pb-1 block"
                                        v-if="errors.errhouseTitle">{{
                                            errors.errhouseTitle }}</label>
                                </div>
                                <div>
                                    <label class="font-semibold text-sm text-gray-600 pb-1 block">House Area</label>
                                    <input v-model="house.houseArea" required type="text"
                                        class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
                                    <label class="font-semibold text-xs text-red-500 pb-1 block"
                                        v-if="errors.errhouseArea">{{
                                            errors.errhouseArea }}</label>
                                </div>

                                <div>
                                    <label class="font-semibold text-sm text-gray-600 pb-1 block">Location</label>
                                    <input v-model="house.Location" required type="text"
                                        class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
                                    <label class="font-semibold text-xs text-red-500 pb-1 block"
                                        v-if="errors.errLocation">{{
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
                                    <label class="font-semibold text-xs text-red-500 pb-1 block"
                                        v-if="errors.errhousePrice">{{
                                            errors.errhousePrice }}</label>
                                </div>
                                <div>
                                    <label class="font-semibold text-sm text-gray-600 pb-1 block">House Picture</label>
                                    <input @change="uploadimage($event)" required type="file"
                                        class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
                                    <label class="font-semibold text-xs text-red-500 pb-1 block"
                                        v-if="errors.errhousePic">{{
                                            errors.errhousePic }}</label>
                                </div>
                                <div>
                                    <label class="font-semibold text-sm text-gray-600 pb-1 block">Description</label>
                                    <textarea v-model="house.description" required type="text"
                                        class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" cols="30"
                                        rows="10"></textarea>
                                    <label class="font-semibold text-xs text-red-500 pb-1 block"
                                        v-if="errors.errdescription">{{
                                            errors.errdescription }}</label>
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
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import { userStore } from '@/stores/userStore';
export default {
    name: 'updateHouses'
    ,
    data() {
        return {
            conditions: [],
            position: 1,
            house_id: '',
            condition: '',
            house: {},
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
            }
        }
    },
    mounted()
    {
        axios.get('http://127.0.0.1:8000/api/Houses/'+this.$route.params.id,{
            headers: {
                    "Content-type": "application/json",
                    "Authorization": `Bearer ${userStore().token}`,
                }
        })
      .then(res => {this.house=res.data.data
      console.log(this.house)}
      )
    }
    ,
    methods: {
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
                    this.house.housePic = response.data.secure_url;
                })
        }
        ,
        onSubmitHouse() {
            axios.put('http://127.0.0.1:8000/api/Houses/'+this.$route.params.id, this.house, {
                headers: {
                    "Content-type": "application/json",
                    "Authorization": `Bearer ${userStore().token}`,
                }
            }
            )
                .then((res) => {
                    console.log(res)
                    this.errhousePic = false
                    this.errfloorNbrs = false
                    this.errLocation = false
                    this.errhouseArea = false
                    this.errdescription = false
                    this.errcontractType = false
                    this.errhousePrice = false
                    this.errhouseTitle = false
                    this.$router.push('/Dashboard')
                })
                .catch(error => {
                    console.log(error)
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
        },
        getDataFloor(p) {
            this.position = p
            console.log(test)
        }
    }
}
</script>

<style></style>