<template>
<section class="default-page">
    <form class="add-topic" @submit.prevent="createTopic()">
        <div class="info">
            <div class="info-name">
                <label >Título:</label>
                <input v-model="name" placeholder="Título do tópico" type="text" required>
            </div>
            <div class="info-description">
                <label>Descrição:</label>
                <textarea v-model="description" rows="25" cols="110" required></textarea>
            </div>
        </div>
            <button>Criar tópico</button>
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
            name: '',
            description: ''
        }
    },
    methods: {
        createTopic() {
            Swal.fire({
                title: 'Adicionando seu tópico',
                customClass: {
                    popup: 'swal-popup-custom',
                    title: 'swal-title-custom',
                    htmlContainer: 'swal-html-container-custom',
                },
                willOpen: () => {
                    Swal.showLoading();
                },
                willClose: () => {
                    Swal.hideLoading();
                },
                showConfirmButton: false,
                allowOutsideClick: false
            })
            axios.post(`${this.$store.state.req.api}/forum/addTopic.php`,{
                id: localStorage.getItem('idSession'),
                title: this.name,
                description: this.description,
                name: this.$store.state.user.username
            })
            .then(response => {
                console.log(response.data);
                if(response.data.error){
                    Swal.fire({
                        title:'Erro',
                        text: 'Não foi possível adicionar seu tópico',
                        confirmButtonText: 'Tente novamente',
                        showCancelButton: true,
                        customClass: {
                                popup: 'swal-popup-custom',
                                title: 'swal-title-custom',
                                htmlContainer: 'swal-html-container-custom',
                            }
                    })
                    .then(result => {
                        if(result.isConfirmed){
                            this.createTopic()
                        }
                    })
                }else if(response.data.success){
                    this.socket.emit('new-topic',() => {
                        console.log('')
                    });
                    Swal.fire({
                        title: 'Seu tópico foi adicionado com sucesso ao fórum',
                        confirmButtonText: 'vizualizar outros tópicos',
                        customClass: {
                                popup: 'swal-popup-custom',
                                title: 'swal-title-custom',
                                htmlContainer: 'swal-html-container-custom',
                            }
                    })
                    .then(result => {
                        if(result.isConfirmed){
                            this.$emit('viewTopics')
                        }
                    })
                }
            })
        },
        increment() {
            this.row++
        }
    },
    computed: {
        
    },
    mounted() {
        this.socket.on('connect',() => {
            console.log('conectado')
        });
    },
    beforeUnmount() {
        this.socket.on('disconnect',() => {
            console.log('disconectado')
        });
    }
}
</script>

<style scoped>
.default-page{
    z-index: 2;
}
button{
    margin: 0.0em;
    position: relative;
    bottom: 1.4em;
}
.info, .info-description, .info-name{
    padding: 1em;
    display: grid;
    justify-content: center;
}
.add-topic{
    position: relative;
    top:6em;
    display: inline-block;
    max-width: 50em;
    min-width:  50em;
    max-height: 35em;
    min-height: 32em;
    border-style: solid;
    border-radius: 0.8em;
    border-width: 0.1em;
}
</style>