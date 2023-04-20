<template>
    <addHouse />
</template>

<script>
import axios from 'axios';
import addHouse from '@/components/add-house.vue'
export default {
    name: 'addForm'
    ,
    components:{
        addHouse
    }
    ,
    methods: {
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
        onSubmitFloor(){
            axios.post('http://127.0.0.1:8000/api/Floors',{
                house_id:this.house_id,
                roomNbrs:this.roomNbrs
            }, {
                headers: {
                    "Content-type": "application/json",
                    "Authorization": `Bearer ${document.cookie}`,
                }
            }
            ).then(res => {
                this.subPosition++
            })
        }
    }
}
</script>

<style></style>