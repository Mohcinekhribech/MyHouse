<template>
    <div class="min-h-screen bg-gray-100 flex flex-col justify-center sm:py-12">
        <div class="p-10 xs:p-0 mx-auto md:w-full md:max-w-md">
            <h1 class="font-bold text-center text-2xl mb-5">Your Logo</h1>
            <div class="bg-white shadow w-full rounded-lg divide-y divide-gray-200">
                <form @submit.prevent="onSubmit">
                    <div class="px-5 py-7">
                        <div>
                            <label class="font-semibold text-sm text-gray-600 pb-1 block">Full Name</label>
                            <input v-model="name" required type="text"
                                class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
                            <label class="font-semibold text-xs text-red-500 pb-1 block" v-if="errorName">{{
                                errorName }}</label>
                        </div>
                        <div>
                            <label class="font-semibold text-sm text-gray-600 pb-1 block">E-mail</label>
                            <input v-model="email" required type="email"
                                class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
                            <label class="font-semibold text-xs text-red-500 pb-1 block" v-if="errorEmail">{{
                                errorEmail }}</label>
                        </div>

                        <div>
                            <label class="font-semibold text-sm text-gray-600 pb-1 block">Role</label>
                            <select v-model="role" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" id="">
                                <option value="client">Client</option>
                                <option value="owner">Owner</option>
                            </select>
                            <label class="font-semibold text-xs text-red-500 pb-1 block" v-if="errorEmail">{{
                                errorEmail }}</label>
                        </div>
                        <div>
                            <label class="font-semibold text-sm text-gray-600 pb-1 block">Password</label>
                            <input v-model="password" required type="password"
                                class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
                            <label class="font-semibold text-xs text-red-500 pb-1 block" v-if="errorPassword">{{
                                errorPassword }}</label>
                        </div>
                        <div>
                            <label class="font-semibold text-sm text-gray-600 pb-1 block">Confirm Password</label>
                            <input v-model="password_confirmation" required type="password"
                                class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
                        </div>
                        <button type="submit"
                            class="transition duration-200 bg-blue-500 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center inline-block">
                            <span class="inline-block mr-2">Login</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="w-4 h-4 inline-block">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </button>
                    </div>
                </form>

                <div class="py-5">
                    <div class="grid grid-cols-2 gap-1">
                        <div class="text-center sm:text-left whitespace-nowrap">
                            <button
                                class="transition duration-200 mx-5 px-5 py-4 cursor-pointer font-normal text-sm rounded-lg text-gray-500 hover:bg-gray-200 focus:outline-none focus:bg-gray-300 focus:ring-2 focus:ring-gray-400 focus:ring-opacity-50 ring-inset">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" class="w-4 h-4 inline-block align-text-top">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                <span class="inline-block ml-1">Back to your-app.com</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name: 'register',
    data() {
        return {
            name: '',
            email: '',
            password: '',
            role: '',
            password_confirmation: '',
            errorName: false,
            errorEmail: false,
            errorPassword: false,
            errorRole: false,
        }
    },
    methods: {
        onSubmit() {
            axios.post('http://127.0.0.1:8000/api/Register', {
                name: this.name,
                email: this.email,
                role: this.role,
                password: this.password,
                password_confirmation: this.password_confirmation
            })
                .then(res => {
                    document.cookie = res.data.data.token
                    localStorage.setItem('role', res.data.data.user.role)
                    this.errorName = false
                    this.errorEmail = false
                    this.errorPassword = false
                    this.errorRole = false
                })
                .catch(error => {   
                    if (error.response.data.errors) {
                        if (error.response.data.errors.name) {
                            this.errorName = error.response.data.errors.name[0]
                        }
                        if (error.response.data.errors.email) {
                            this.errorEmail = error.response.data.errors.email[0]
                        }
                        if (error.response.data.errors.role) {
                            this.errorRole = error.response.data.errors.role[0]
                        }
                        if (error.response.data.errors.password) {
                            this.errorPassword = error.response.data.errors.password[0]
                        }
                    }
                })
        }
    }
}
</script>