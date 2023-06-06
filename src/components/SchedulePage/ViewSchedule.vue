<template>
    <section>
        <div>
            <button @click="mountedSchedule(title)" v-for="(title,index) in titles" :key="index">{{ title }}</button>
        </div>
    </section>
    <section v-if="titles.length !== 0">
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
                <tr v-for="(hour, index) in turns" :key="index">
                    <td>
                        <div>{{ hour }}</div>
                    </td>
                    <td class="subjects" v-for="(subject, row) in subjects[index]" :key="row">
                        <div v-if="subject">
                            <div v-for="(separated,column) in subject.split(' ')" :key="column">
                                <div v-if="separated">{{ separated }}</div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
</template>
<script>
import axios from 'axios';

export default{
    data() {
        return{
            subjects: [],
            turns: '',
            titles: []
        }
    },
    methods: {
        searchSchedules() {
            axios.post('http://localhost:8000/schedule/searchTitlesSchedules.php', {
                id: localStorage.getItem('idSession')
            })
            .then(response => {
                if(response.data){
                    this.titles = response.data.title;
                }
            })
        },
        mountedSchedule(title) {
            axios.post('http://localhost:8000/schedule/searchSchedule.php',{
                id: localStorage.getItem('idSession'),
                title: title
            })
            .then(response => {
                if(response.data){
                    if(response.data.turn == "morning"){
                        this.turns = ["06:00","07:00","08:00","09:00","10:00","11:00"];
                    }else if(response.data.turn == "afternoon"){
                        this.turns = ["12:00","13:00","14:00","15:00","16:00","17:00"];
                    }else if(response.data.turn == "night"){
                        this.turns = ["18:00","19:00","20:00","21:00","22:00","23:00"];
                    }else if(response.data.turn == "dawn"){
                        this.turns = ["00:00","01:00","02:00","03:00","04:00","05:00"];
                    }
                    this.subjects = response.data.subject
                }
            })
            .catch(response => {
                console.error(response)
            })
        }
    },
    beforeMount() {
        this.searchSchedules()
    }
}
</script>

<style scoped>
.subjects{
    border-style: solid;
    width: 100px;
}
</style>