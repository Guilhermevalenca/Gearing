<template>
    <section v-if="!showComments">
        <div v-for="(elements, index) in topics" :key="index">
            <div>
                <a @click="showTopicComments(elements.title,elements.email,elements.description,elements.name,elements.date)">
                    {{ elements.title }}
                </a>
            </div>
        </div>
    </section>
    <section v-else>
        <Comments :name="comments.name" :title="comments.title" :email="comments.email" :description="comments.description" 
        :date="comments.date" @closeComments="hideTopicComments()" />
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
            comments: {
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
            this.comments.title = newTitle;
            this.comments.email = newEmail;
            this.comments.description = newDescription;
            this.comments.name = newName;
            this.comments.date = newDate;
        },
        updateTopics() {
            axios.get('http://localhost:8000/forum/allTopic.php')
            .then(response => {
                if(response.data){
                    this.topics = response.data.topic
                    console.log(this.topics);
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