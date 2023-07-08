<template>
<section v-if="!showComments">
    <div class="box" v-for="(elements, index) in topics" :key="index">
        <div class="box-topics">
            <a @click="showTopicComments(elements.id)">
                <div>
                    <ul class="box-topics-title">
                        <p>{{ elements.title }}</p>
                        <p>
                            <strong class="info">Criado por </strong>
                            <span class="data">{{ elements.name }}</span>
                        </p>
                        <p>
                            <strong class="info">Em: </strong>
                            <span class="data">{{ elements.date }}</span>
                        </p>
                    </ul>
                </div>
            </a>
        </div>
    </div>
</section>
<section v-else>
    <Comments :socket="socket" :id="viewComments.id" @closeComments="hideTopicComments()" />
</section>
</template>
<script>
import Comments from './ViewTopicComments.vue'
import axios from 'axios'

export default{
    components: { Comments },
    props: {
        socket: Object
    },
    data() {
        return {
            topics: [],
            showComments: false,
            viewComments: {
                id: ''
            }
        }
    },
    methods: {
        hideTopicComments() {
            this.showComments = false
        },
        showTopicComments(newId) {
            this.showComments = true;
            this.viewComments.id = newId;
        },
        updateTopics() {
            axios.get(`${this.$store.state.req.api}/forum/allTopic.php`)
            .then(response => {
                if(response.data){
                    this.topics = response.data.topic
                    console.log(response.data.topic);
                    this.topics = this.topics.reverse();
                    console.log(this.topics)
                }
            })
        }
    },
    created() {
        
    },
    beforeMount() {
        this.updateTopics()
    },
    mounted() {
        this.socket.on('update-topics',() => {
            this.updateTopics();
        })
    },
}
</script>
<style scoped>
.box{
    display: flex;
    justify-content: center;
}
.box-topics{
    background-color: #000000;
    border-color: rgba(100, 2, 223, 1); 
    border-style: solid;
    border-radius: 0.8em;
    border-width: 0.1em;
    margin: 0.4em;
    max-width: 50em;
    min-width: 50em;
    position: relative;
    top: 2em;
}
.box-topics-title{
    text-align: end;
    padding: 1.2em;
    margin: 0em;
    font-size: 0.9em;
    text-align:left;
}
.data{
    color: rgba(133, 26, 186, 1);
}
</style>
