<template>
    <div>
        <h1>{{ title }}</h1>
        <form @submit.prevent="updateComment">
            <textarea v-model="comment" cols="30" rows="10"></textarea><br>
            <button>Atualizar comentario</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';

export default{
    data() {
        return {
            comment: ''
        }
    },
    props: {
        title: String,
        id: Number
    },
    methods: {
        updateComment() {
            Swal.fire({
                title: 'aguarde',
                showConfirmButton: false,
                willOpen: () => {
                    Swal.showLoading();
                },
                willClose: () => {
                    Swal.hideLoading();
                },
                customClass: {
                    popup: 'swal-popup-custom',
                    title: 'swal-title-custom',
                    htmlContainer: 'swal-html-container-custom',
                }
            })
            axios.post('http://localhost:8000/forum/updateComment.php',{
                id: localStorage.getItem('idSession'),
                title: this.title,
                commentId: this.id,
                commentUpdate: this.comment
            })
            .then(response => {
                Swal.close()
                if(response.data.success) {
                    this.$emit('closeWindow')
                }else{
                    console.log(response.data.error)
                }
            })
            .catch (error => {
                console.log(error)
            })
        }
    },
    created() {
        Swal.fire({
            title: 'aguarde',
            willOpen: () => {
                Swal.showLoading();
            },
            willClose: () => {
                Swal.hideLoading();
            },
            customClass: {
                popup: 'swal-popup-custom',
                title: 'swal-title-custom',
                htmlContainer: 'swal-html-container-custom',
            }
        })
        axios.post('http://localhost:8000/forum/editComment.php',{
            id: localStorage.getItem('idSession'),
            title: this.title,
            commentId: this.id
        })
        .then(response => {
            Swal.close();
            if(response.data.success) {
                this.comment = response.data.message
            }else{
                console.log(response.data.error)
            }
        })
        .catch(error => {
            console.log(error)
        })
    }
}
</script>