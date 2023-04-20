import { defineStore } from 'pinia';
import axios from 'axios';

export const houseStore = defineStore('houseStore', {
  state: () => ({
    floors: {},
    houses: {},
    Loading: false
  }),
  actions: {
    getHouseInfo(id, ownerId, type) {
      this.Loading = true;
      if (id) {
        axios.get('http://127.0.0.1:8000/api/Houses/index/' + id)
          .then(res => {
            this.floors = res.data.data.floors
            this.houses = res.data.data
            this.Loading = false
          })
      } else if (ownerId) {
        axios.get('http://127.0.0.1:8000/api/Houses/index/?id=' + ownerId)
          .then(res => {
            this.houses = res.data.data
            this.Loading = false
          })
      } else if (type) {
        axios.get('http://127.0.0.1:8000/api/Houses/index?type=' + type)
          .then(res => {
            this.houses = res.data.data
            this.Loading=false
          }
          )
      } else
        axios.get('http://127.0.0.1:8000/api/Houses/index')
          .then(res => {
            console.log(res.data.data)
            this.houses = res.data.data
            this.Loading = false
          })
    },
    search(location,type,ownerId){
      if(location){
        if(ownerId)
        {
          axios.get('http://127.0.0.1:8000/api/Houses/index/?id=' + ownerId+'&search='+location)
          .then(res => {
            this.houses = res.data.data
          })
        }else if (type) {
          axios.get('http://127.0.0.1:8000/api/Houses/index?type=' + type+'&search='+location)
            .then(res => {
              this.houses = res.data.data
            }
            )
        } else
        axios.get('http://127.0.0.1:8000/api/Houses/index?search='+location)
          .then(res => {
            this.houses = res.data.data
          })
      }else this.getHouseInfo(false,ownerId,type)

      console.log(this.houses)
    }
  }
})