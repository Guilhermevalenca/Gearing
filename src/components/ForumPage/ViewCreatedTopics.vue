<template>
    <div>i'm view created topics</div>
</template>
<script>
import axios from 'axios'
export default{
    data() {
        return {
            topics: []
        }
    },
    methods: {
        updateTopics() {
            axios.get('http://localhost:8000/forum/allTopic.php')
        }    
    },
    beforeMount() {
        this.updateTopics()
    }
}
</script>