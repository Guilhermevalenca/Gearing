<template>
    <section v-if="!showComments">
        <div v-for="(elements, index) in topics" :key="index">
            <div class="box">
                <a @click="showTopicComments(elements.title,elements.email,elements.description,elements.name,elements.date)">
                    <div class="topics">
                        <ul>
                            {{ elements.title }}
                        </ul>
                        <ul>
                            <strong class="info">Criado por </strong>
                            <span class="data">{{ elements.name }}</span> <br>
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

export default{
    components: { Comments },
    data() {
        return {
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
    }
}
</script>
<style scoped>

.box{
    justify-content: center;
    max-width: 30em;
    max-height: 5em;
    padding: 0.25em;
    text-align: justify;
    text-align-last: center;
    border-style: solid;
    border-radius: 0.8em;
    border-width: 0.1em;

}
.topics{
    padding: 1em;
}
.data{
font-size: 0.8em;
color:  rgba(100, 2, 223, 1) ;
}
.info{
font-size: 0.8em;
}
</style>