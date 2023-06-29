<template>
    <section v-if="!showComments">
        <div v-for="(elements, index) in topics" :key="index">
            <div class="box">
                <a @click="showTopicComments(elements.title,elements.email,elements.description,elements.name,elements.date)">
                    <div class="topics">
                        <ul>
                            {{ elements.title }} <br>
                            <strong class="info">Criado por </strong>
                            <span class="data">{{ elements.name }}</span>
                        </ul>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <section v-else>
        <Comments :name="viewComments.name" :title="viewComments.title" :email="viewComments.email" :description="viewComments.description" 
        :date="viewComments.date" @closeComments="hideTopicComments()" />
    </section>
</template>
<script>
import Comments from './ViewTopicComments.vue'
import axios from 'axios'
import io from 'socket.io-client';

export default{
    components: { Comments },
    data() {
        return {
            socket: io('http://localhost:3000'),
            topics: [],
            showComments: false,
            viewComments: {
                title: '',
                email: '',
                description: '',
                date: ''
            }
        }
    },
    methods: {
        hideTopicComments() {
            this.showComments = false
        },
        showTopicComments(newTitle,newEmail,newDescription,newName,newDate) {
            this.showComments = true;
            this.viewComments.title = newTitle;
            this.viewComments.email = newEmail;
            this.viewComments.description = newDescription;
            this.viewComments.name = newName;
            this.viewComments.date = newDate;
        },
        updateTopics() {
            axios.get('http://localhost:8000/forum/allTopic.php')
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
    beforeMount() {
        this.updateTopics()
    },
    mounted() {
        this.socket.on('update-topics',() => {
            this.updateTopics();
        })
    }
}
</script>
<style scoped>
.box{
    background-color: #000000;
    border-color: rgba(100, 2, 223, 1); 
    border-style: solid;
    border-radius: 0.8em;
    border-width: 0.1em;
    display:inline-block;
    margin: 0.4em;
    max-width: 20em;
    max-height: 4em;
    min-width: 20em;
    min-height: 4em;
    position: relative;
    text-align: left;
    top: 2em;
}
.data{
font-size: 0.8em;
color: rgba(133, 26, 186, 1);
}
.info{
font-size: 0.8em;
}
</style>