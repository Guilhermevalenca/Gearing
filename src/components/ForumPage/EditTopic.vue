<template>
    <section>
        <div>
            <strong>{{title}}</strong>
        </div>
    </section>
    <section>
        <form @submit.prevent="updateTopic()">
            <div>
                <strong>Descrição:</strong><br>
                <textarea v-model="newMessage" cols="110" rows="25"></textarea>
            </div>
            <button>Editar</button>
        </form>
    </section>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';
import io from 'socket.io-client';

export default{
    data() {
        return {
            socket: io(this.$store.state.req.webSocket),
            newMessage: this.message
        }
    },
    methods: {
        updateTopic() {
            Swal.fire({
                title: 'editando',
                willOpen: () => {
                    Swal.showLoading();
                },
                willClose: () => {
                    Swal.hideLoading();
                }
            })
            axios.post(`${this.$store.state.req.api}/forum/updateTopic.php`,{
                id: localStorage.getItem('idSession'),
                title: this.title,
                message: this.newMessage
            })
            .then(response => {
                console.log(response);
                if(response.data.success) {
                    Swal.fire({
                        title: 'Topico editado com sucesso',
                        customClass: {
                          popup: 'swal-popup-custom',
                          title: 'swal-title-custom',
                          htmlContainer: 'swal-html-container-custom'
                        },
                        willClose: () => {
                            this.socket.emit('edit-topic',this.id);
                        }
                    })
                    .then(result => {
                        if(result.isConfirmed){
                            this.$emit('closeEditTopic');
                        }
                    })
                }else{
                    Swal.close();
                    console.log(response.data.error)
                }
            })
            .catch(error => {
                Swal.fire({
                    title: 'Operação não realizada',
                    customClass: {
                      popup: 'swal-popup-custom',
                      title: 'swal-title-custom',
                      htmlContainer: 'swal-html-container-custom',
                    }
                })
                console.log(error);
            })
        }
    },
    props: {
        id: Number,
        title: String,
        message: String
    }
}
</script>

<style scoped>
</style>