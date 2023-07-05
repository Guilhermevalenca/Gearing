<template>
    <div>
        <h1>{{ title }}</h1>
        <form @submit.prevent="updateComment()">
            <textarea v-model="comment" cols="110" rows="25"></textarea><br>
            <button>Atualizar resposta</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';
import { io } from 'socket.io-client';
import Swal from 'sweetalert2';

export default{
    data() {
        return {
            socket: io(this.$store.state.req.webSocket),
            comment: ''
        }
    },
    props: {
        title: String,
        id: Number,
        idTopic: Number
    },
    methods: {
        updateComment() {
            Swal.fire({
                title: 'Aguarde',
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
            axios.post(`${this.$store.state.req.api}/forum/updateComment.php`,{
                id: localStorage.getItem('idSession'),
                title: this.title,
                commentId: this.id,
                commentUpdate: this.comment
            })
            .then(response => {
                Swal.close()
                if(response.data.success) {
                    this.socket.emit('view-comment', this.idTopic);
                    this.$emit('closeWindow');
                }else{
                    console.log(response.data.error)
                    Swal.fire({
                        title: 'error',
                        text: 'Não foi possivel editar sua resposta',
                        customClass: {
                            popup: 'swal-popup-custom',
                            title: 'swal-title-custom',
                            htmlContainer: 'swal-html-container-custom',
                        }
                    })
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
        axios.post(`${this.$store.state.req.api}/forum/editComment.php`,{
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
<style scoped>
h1{
    font-size: 1.2em;
}
</style>