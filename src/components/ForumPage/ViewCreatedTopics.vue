<template>
    <section>
        <div v-for="(elementos, index) in topics" :key="index">
            <div>
                <a>{{ elementos[1] }}</a>
            </div>
        </div>
        <v-dialog v-model="dialogOpen">
            <v-card>
                <v-bnt>
                    fechar
                </v-bnt>
            </v-card>
        </v-dialog>
    </section>
</template>
<script>
import axios from 'axios'

export default{
    data() {
        return {
            topics: [],
            dialogOpen: false
        }
    },
    methods: {
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