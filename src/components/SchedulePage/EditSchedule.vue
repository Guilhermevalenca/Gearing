<template>

<section>
    <div>
        <h2>Editando cronograma:</h2>
        <h3>{{ currentTitle }}</h3>
    </div>
    <div class="schedule">
        <table>
        <thead>
            <tr>
                <th></th>
                <th>Domingo</th>
                <th>segunda</th>
                <th>terça</th>
                <th>quarta</th>
                <th>quinta</th>
                <th>sexta</th>
                <th>sabado</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(hour, index) in turn" :key="index">
                <td>
                    <div>{{ hour }}</div>
                </td>
                <td class="schedule-subjects" v-for="(subject, row) in subjects[index]" :key="row">
                    <div v-if="subject">
                        <div ref="sortableModifying" v-for="(separated,column) in subject.split(' ')" :key="column">
                            <div @click="moveElements()" v-if="separated">{{ separated }}</div>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
        </table>
    </div>
</section>
</template>

<script>
import axios from 'axios';
import Sortable from 'sortablejs';

export default{
    data() {
        return {
            currentTitle: this.$store.state.schedule.editTitle,
            turn: [],
            subjects: []
        }
    },
    methods: {
        mountedSchedule() {
            axios.post('http://localhost:8000/schedule/searchSchedule.php', {
                id: localStorage.getItem('idSession'),
                title: this.currentTitle
            })
            .then(response => {
                    if(response.data.turn == "morning"){
                        this.turn = ["06:00","07:00","08:00","09:00","10:00","11:00"];
                    }else if(response.data.turn == "afternoon"){
                        this.turn = ["12:00","13:00","14:00","15:00","16:00","17:00"];
                    }else if(response.data.turn == "night"){
                        this.turn = ["18:00","19:00","20:00","21:00","22:00","23:00"];
                    }else if(response.data.turn == "dawn"){
                        this.turn = ["00:00","01:00","02:00","03:00","04:00","05:00"];
                    }
                    
                    for(let i = 0; i < 6; i++){
                        this.subjects[i] = []
                        for(let j = 0; j < 7; j++){
                            this.subjects[i][j] = null
                        }
                    }
                    for(let i in response.data.subject){
                        for(let j in response.data.subject[i]){
                            this.subjects[parseInt(i)][parseInt(j)] = response.data.subject[i][j]
                        }
                    }
            })
        },
        moveElements() {
            this.$refs.sortableModifying.forEach(element => {
                new Sortable(element, {
                    group: 'shared'
                })
            })
        }
    },
    created() {
        this.mountedSchedule()
    }
}
</script>

<style scoped>
.schedule{
    display: grid;
    justify-content: center;
}
.schedule-subjects{
    border-style: solid;
    width: 100px;
}
</style>