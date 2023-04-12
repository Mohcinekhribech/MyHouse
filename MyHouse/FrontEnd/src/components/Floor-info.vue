<template>
  <div>
          <div class="m-4">
            <span class="text-white bg-[#192BAA] p-2 rounded-lg text-sm border border-[1px] font-medium">Room 1</span>
          </div>
          <div class="flex">
            <div class="w-1/2">
              <img src="../assets/bg-2.jpg" alt="">
            </div>
            <div class="w-1/2 m-4">
              <div>
                <h3 class="text-[#192BAA] text-lg font-bold ">Room description :</h3>
                <span class="flex text-[#616571] font-medium my-4">
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit. At, maiores cumque. Placeat accusamus
                  ducimus
                  aut. Velit illo harum earum repellat perferendis inventore laborum non quasi ipsum odit. Corporis,
                  earum
                  itaque?
                </span>
              </div>
              <div class="text-[#DA6217] font-medium text-md flex space-x-4 my-[4px] mx-4">
                <div class="text-[#DA6217] w-fit p-[2px] rounded-lg bg-[#FFD3B8]">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-window" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path
                      d="M12 3c-3.866 0 -7 3.272 -7 7v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1 -1v-10c0 -3.728 -3.134 -7 -7 -7z">
                    </path>
                    <path d="M5 13l14 0"></path>
                    <path d="M12 3l0 18"></path>
                  </svg>
                </div>
                <span>Windows : 2</span>
              </div>
              <div class="text-[#DA6217] font-medium text-md flex space-x-4 my-[4px] mx-4">
                <div class="text-[#DA6217] w-fit p-[2px] rounded-lg bg-[#FFD3B8]">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-door" width="24" height="24"
                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M14 12v.01"></path>
                    <path d="M3 21h18"></path>
                    <path d="M6 21v-16a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v16"></path>
                  </svg>
                </div>
                <span>Room Type : bed Room</span>
              </div>
              <button class="p-2 bg-[#DA6217] text-white flex space-x-4 text-sm font-medium rounded-lg m-6 mx-auto">
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
</template>

<script>
export default {
  name:'Floor-info'
}
</script>

<style>

</style>