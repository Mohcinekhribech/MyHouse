import { defineStore } from 'pinia';
import axios from 'axios';

export const conversationStore = defineStore('conversationStore', {
  state: () => ({
    conversations:{},
    messages:{},
    Loading:'',
  }),
  actions:{
    getConversations(id,token){
        this.Loading=true;
        axios.get('http://127.0.0.1:8000/api/conversation?id=' + id,
        {
            headers: {
                "Content-type": "application/json",
                "Authorization": `Bearer ${token}`,
            }
        }).then(res => {
            console.log(id)
            this.conversations = res.data.data
            this.messages = this.conversations[0]
            this.Loading = false
        })
    },
    sendMessage(id,userId,token,message) {
        if (message) {
            this.Loading=true;
            axios.post('http://127.0.0.1:8000/api/Messages',
                {
                    conversations_id: id,
                    user_id: userId,
                    message: message
                }
                ,
                {
                    headers: {
                        "Content-type": "application/json",
                        "Authorization": `Bearer ${token}`,
                    }
                })
                .then(
                    this.getConversations(userId,token)
                    
                    )
        }
    },
    checkConversation(i)
    {
        this.messages = this.conversations[i]
    }
  }
})