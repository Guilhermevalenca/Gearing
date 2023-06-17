<template>
    <section>
        <div v-for="(elementos, index) in topics" :key="index">
            <div>
                <a @click="showTopicComments(elementos[1])">{{ elementos[1] }}</a>
                <Comments title="{{elementos[1]}}" email="" @closeComments="hideTopicComments()" v-if="showComments" />
            </div>
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
                    console.log(this.topics)
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