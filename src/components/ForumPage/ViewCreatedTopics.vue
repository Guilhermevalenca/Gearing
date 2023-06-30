<template>
    <section v-if="!showComments">
        <div class="box" v-for="(elements, index) in topics" :key="index">
            <div class="box-topics">
                <a @click="showTopicComments(elements.title,elements.email,elements.description,elements.name,elements.date,elements.id)">
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
        <Comments :name="viewComments.name" :title="viewComments.title" :email="viewComments.email" :description="viewComments.description" 
        :date="viewComments.date" :id="viewComments.id" @closeComments="hideTopicComments()" />
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
                date: '',
                id: ''
            }
        }
    },
    methods: {
        hideTopicComments() {
            this.showComments = false
        },
        showTopicComments(newTitle,newEmail,newDescription,newName,newDate,newId) {
            this.showComments = true;
            this.viewComments.title = newTitle;
            this.viewComments.email = newEmail;
            this.viewComments.description = newDescription;
            this.viewComments.name = newName;
            this.viewComments.date = newDate;
            this.viewComments.id = newId;
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
