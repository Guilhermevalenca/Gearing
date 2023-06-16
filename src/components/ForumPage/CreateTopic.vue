<template>
    <section>
    <form @submit.prevent="createTopic()">
        <div class="info">
            <label class="info-name">
                Nome do topico: <input v-model="name" placeholder="Nome do topico" type="text" required>
            </label>
            <label class="info-description">
                Descrição: <textarea v-model="description" rows="30" cols="100" required></textarea>
            </label>
        </div>
        <div>
            <button>Criar tópico</button>
        </div>
    </form>
    </section>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';

export default{
    data() {
        return {
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
            axios.post('http://localhost:8000/forum/addTopic.php',{
                id: localStorage.getItem('idSession'),
                name: this.name,
                description: this.description
            })
            .then(response => {
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
        
    }
}
</script>

<style scoped>
.info, .info-description, .info-name{
    display: grid;
    justify-content: center;
}
</style>