<template>
<section>
    <h2>Bem vindo ao forum</h2>
    <button @click="showCreate()">criar topico</button>
    <button @click="showTopics()">vizualizar topicos</button>
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
export default{
    data(){
        return{
            createTopic: false,
            viewTopic: false
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
    }
}
</script>