<template>
    <div>
        <div v-if="!conversationStore.Loading" class="flex m-6 space-x-4 h-[90vh]">
            <div class="w-1/3 bg-white p-[2px] rounded-lg">
                <div @click="conversationStore.checkConversation(i)"
                    v-for="conversation, i in conversationStore.conversations" :key="conversation"
                    class="flex space-x-4 bg-[#F4F5F8] p-2 m-2 rounded-lg">
                    <img class="h-[40px] w-[40px] rounded-full" :src="conversation.owner.avatar" alt="">
                    <span class="font-medium text-xs my-auto">{{ conversation.owner.name }} </span>
                </div>
            </div>
            <div class="w-full bg-white rounded-lg p-2">
                <div class="flex space-x-4 bg-[#F4C0A0] p-2 rounded-lg">
                    <img class="h-[40px] w-[40px] rounded-full" :src="conversationStore.messages.owner.avatar" alt="">
                    <span class="font-medium my-auto">{{ conversationStore.messages.owner.name }}</span>
                </div>
                <div class="h-[76%] overflow-y-auto m-2 relative">
                    <div v-for="conversationMessage in conversationStore.messages.messages" :key="conversationMessage">
                        <div v-if="conversationMessage.user_id == user.userId"
                            class="bg-[#F4F5F8] min-w-fit max-w-[60%] rounded-lg m-2 place-self-end ml-[40%]">
                            <p class="text-xs px-6 py-2 font-medium place-self-end">{{ conversationMessage.message }}</p>
                        </div>
                        <div v-else class="bg-[#F4F5F8] min-w-fit max-w-[60%] rounded-lg m-2 place-self-end ">
                            <p class="text-xs px-6 py-2 font-medium place-self-end">{{ conversationMessage.message }}</p>
                        </div>
                    </div>

                </div>
                <div>
                    <div class="w-full">
                        <div class="bg-[#F4F5F8] p-2 flex m-2 rounded-lg">
                            <input type="text" v-model="message" placeholder="Your Message . . ."
                                class="focus:white placeholder:italic bg-[#F4F5F8] text-[#9599A6] text-s p-[4px] font-medium focus:outline-none w-full text-s">
                            <button
                                @click="conversationStore.sendMessage(conversationStore.messages.id, user.userId, user.token, message)"
                                class="bg-[#DA6217] text-white p-2 rounded-lg left-4 "><svg
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                                </svg>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div v-else>
            <div role="status" class="absolute w-full h-screen">
                <svg aria-hidden="true" class="mx-auto mt-[50%] w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="currentColor" />
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="currentFill" />
                </svg>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
</template>

<script>
import DashboardLayoutVue from '../Layouts/DashboardLayout.vue'
import { userStore } from '../../stores/userStore'
import { conversationStore } from '../../stores/conversationStore'
export default {
    name: 'messagesDashboard',
    components: {
        DashboardLayoutVue
    },
    data() {
        return {
            message: '',
            user: userStore(),
            conversationStore: conversationStore()
        }
    }
    ,
    beforeCreate() {
        conversationStore().getConversations(userStore().userId, userStore().token)
    }
}
</script>

<style></style>