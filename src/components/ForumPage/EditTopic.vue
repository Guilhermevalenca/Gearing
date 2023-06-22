<template>
    <section>
        <div>
            <strong>title</strong>
        </div>
        <button @click="close()">X</button>
    </section>
    <section>
        <form @submit.prevent="updateTopic()">
            <div>
                <label>Descrição:</label>
                <textarea v-model="newMessage" cols="30" rows="10"></textarea>
            </div>
            <button>Editar</button>
        </form>
    </section>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';

export default{
    data() {
        return {
            newMessage: this.message
        }
    },
    methods: {
        close() {
            this.$emit('closeEdit');
        },
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
            axios.post('http://localhost:8000/forum/updateTopic.php',{
                id: localStorage.getItem('idSession'),
                title: this.title,
                message: this.newMessage
            })
            .then(response => {
                if(response.data.success) {
                    Swal.fire({
                        title: 'Topico editado com sucesso'
                    })
                    .then(result => {
                        if(result.isConfirmed){
                            this.$emit('closeEdit');
                        }
                    })
                }else{
                    Swal.close();
                    console.log(response.data.error)
                }
            })
            .then(error => {
                Swal.fire({
                    title: 'Operação não realizada'
                })
                console.log(error);
            })
        }
    },
    props: {
        title: String,
        message: String
    }
}
</script>