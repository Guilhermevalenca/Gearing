<template>
    <section>
        <div v-for="(elementos, index) in topics" :key="index">
            <div>
                <a @click="showTopicComments(elementos[1])">{{ elementos[1] }}</a>
            </div>
        </div>
        <div>
            <Comments @closeComments="hideTopicComments()" v-if="showComments" />
        </div>
    </section>
</template>
<script>
import Comments from './ViewTopicComments.vue'
import axios from 'axios'

export default{
    components: {Comments},
    data() {
        return {
            topics: [],
            showComments: false,
            checkTopic: null
        }
    },
    methods: {
        hideTopicComments() {
            this.showComments = false
        },
        showTopicComments(topic) {
            this.showComments = true;
            this.checkTopic = topic
        },
        updateTopics() {
            axios.get('http://localhost:8000/forum/allTopic.php')
            .then(response => {
                if(response.data){
                    this.topics = response.data
                    this.topics = this.topics.reverse();
                }
            })
        }
    },
    beforeMount() {
        this.updateTopics()
    }
}
</script>
<style scoped>

</style>