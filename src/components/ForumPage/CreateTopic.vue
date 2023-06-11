<template>
    <section>
        <div>i'm create topic</div>
    </section>
    <section>
        <div class="info">
            <label class="info-name">
                Nome do topico: <input v-model="name" type="text">
            </label>
            <label class="info-description">
                Descrição: <textarea v-model="description" rows="3" cols="20">DESCREVA AQUI</textarea>
            </label>
            <button @click="createTopic()">Criar topico</button>
        </div>
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
                title: 'adicionando seu topico',
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
                        text: 'Não foi possivel adicionar seu topico',
                        confirmButtonText: 'tente novamente',
                        showCancelButton: true
                    })
                    .then(result => {
                        if(result.isConfirmed){
                            this.createTopic()
                        }
                    })
                }else if(response.data.success){
                    Swal.fire({
                        title: 'Seu topico foi adicionado com sucesso ao forum',
                        confirmButtonText: 'vizualizar outros topicos'
                    })
                    .then(result => {
                        if(result.isConfirmed){
                            this.$emit('viewTopics')
                        }
                    })
                }
            })
        }
    }
}
</script>

<style scoped>
.info, .info-description, .info-name{
    display: grid;
    justify-content: center;
}
</style>