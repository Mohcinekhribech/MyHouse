<template>
  <div class="flex max-sm:flex-col ">
    <div class="sm:w-1/2 sm:mx-auto">
      <img :src="house.housePic" alt="">
    </div>
    <div class="sm:w-1/2 mx-auto">
      <h2 class="text-[#192BAA] text-3xl font-bold text-center m-8">{{ house.houseTitle }}</h2>
      <div class="mx-6">
        <span class="flex text-[#616571] font-medium my-4">
          {{ house.description }}
        </span>
        <div>
          <div v-if="house.conditions!=[]">
            <h3 class="text-[#192BAA] text-lg font-bold ">Conditions :</h3>
            <div v-for="condition in house.conditions" :key="condition">
              <div class="text-[#DA6217] font-medium text-md flex space-x-4 my-[4px] mx-4">
                <div class="text-[#DA6217] w-fit p-[2px] rounded-lg bg-[#FFD3B8]"><svg xmlns="http://www.w3.org/2000/svg"
                    class="icon icon-tabler icon-tabler-info-circle" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                    <path d="M12 9h.01"></path>
                    <path d="M11 12h1v4h1"></path>
                  </svg></div> <span>{{ condition.condition }}</span>
              </div>
            </div>
          </div>
          <button @click="createConversation(house.Owner_id)"
            class="p-2 bg-[#DA6217] text-white flex space-x-4 text-sm font-medium rounded-lg m-2 mx-auto">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send" width="24" height="24"
              viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
              stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M10 14l11 -11"></path>
              <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5"></path>
            </svg> <span>Send Message to Owner</span>
          </button>
        </div>

      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import { userStore } from '../stores/userStore';
export default {
  name: 'House-info',
  props: {
    house: Object
  },
  methods: {
    createConversation(ownerId) {
      console.log(userStore().userId)
      if(userStore().userId){
        axios.post('http://127.0.0.1:8000/api/conversation', {
          client_id: userStore().userId,
          owner_id: ownerId,
        },
          {
            headers: {
              "Content-type": "application/json",
              "Authorization": `Bearer ${userStore().token}`,
            }
          }
        )
        .then((res) => {
          this.$router.push('/messages')
      })
      }else {
        this.$router.push('/login')
      }
    }
  }
}
</script>

<style></style>