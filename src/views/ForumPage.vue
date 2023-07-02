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

export default{
    data(){
        return{
            createTopic: false,
            viewTopic: true
        }
    },
    components: {CreateTopic, ViewTopics},
    methods: {
        showCreate() {
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
            text: 'Aqui você pode interagir com outros estudantes,trocar experiências,sugerir métodos e discutir sobre vários assuntos.Divirta-se e trate todos com respeito ; ',
            confirmButtonText: 'Vamos lá!',
            customClass: {
                popup: 'swal-popup-custom',
                title: 'swal-title-custom',
                htmlContainer: 'swal-html-container-custom',
            }
        })
    }
}
</script>
