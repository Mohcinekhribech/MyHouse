import { defineStore } from 'pinia';
import axios from 'axios';

export const userStore = defineStore('userStore', {
  state: () => ({
    token: localStorage.getItem('token'),
    userId: localStorage.getItem('id'),
    role: localStorage.getItem('role'),
    user: {
      name: localStorage.getItem('name'),
      email: localStorage.getItem('email'),
      avatar: localStorage.getItem('avatar')
    }
  }),
  actions: {
    getUserInfo(info) {
      this.token = info.token
      this.userId = info.userId
      this.role = info.role
      this.user = info.user
    }
  }
})
