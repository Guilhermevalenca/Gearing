<template>
<section>
    <h2>O que deseja fazer?</h2>
    <button @click="showCreate()">Criar tópico</button>
    <button @click="showTopics()">Vizualizar tópicos</button>
</section>

<section>
    <div v-if="createTopic">
        <CreateTopic @viewTopics="showTopics()" />
    </div>
    <div v-if="viewTopic">
        <ViewTopics />
    </div>
</section>
</template>
<script>
import CreateTopic from '@/components/ForumPage/CreateTopic.vue';
import ViewTopics from '@/components/ForumPage/ViewCreatedTopics.vue';
import Swal from 'sweetalert2';
import io from 'socket.io-client';

export default{
    data(){
        return{
            socket: io(this.$store.state.req.webSocket),
            createTopic: false,
            viewTopic: true
        }
    },
    components: {CreateTopic, ViewTopics},
    methods: {
        showCreate() {
            if(!this.$store.state.user.auth){
                Swal.fire({
                    title: 'Ação negada',
                    text: "Apenas usuarios cadastrados podem criar um topico",
                    customClass: {
                        popup: 'swal-popup-custom',
                        title: 'swal-title-custom',
                        htmlContainer: 'swal-html-container-custom',
                    }
                })
                return
            }
            if(this.viewTopic){
                this.viewTopic = false
            }this.createTopic = true
        },
        showTopics() {
            if(this.createTopic){
                this.createTopic = false
            }this.viewTopic = true
        }
    },
    created(){
        Swal.fire({
            title: 'Seja bem-Vindo ao Fórum',
            text: 'Aqui você pode interagir com outros estudantes, trocar experiências, sugerir métodos e discutir sobre vários assuntos. Divirta-se e trate todos com respeito;',
            confirmButtonText: 'Vamos lá!',
            customClass: {
                popup: 'swal-popup-custom',
                title: 'swal-title-custom',
                htmlContainer: 'swal-html-container-custom',
            }
        })
        this.socket.on('connect',() => {
            console.log('conectado')
        });
    },
    unmounted() {
        this.socket.on('disconnect',() => {
            console.log('disconectado')
        });
    }
}
</script>
