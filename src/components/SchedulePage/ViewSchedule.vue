<template>

<section>
    <div>
        <button @click="mountedSchedule(title)" v-for="(title,index) in titles" :key="index">{{ title }}</button>
    </div>
</section>

<section v-if="turns">
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
            <tr v-for="(hour, index) in turns" :key="index">
                <td>
                    <div>{{ hour }}</div>
                </td>
                <td class="schedule-subjects" v-for="(subject, row) in subjects[index]" :key="row">
                    <div v-if="subject">
                        <div v-for="(separated,column) in subject.split(' ')" :key="column">
                            <div v-if="separated">{{ separated }}</div>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
        </table>
    </div>
    <div>
        <div>
            <button>Editar cronograma</button>
        </div>
        <div>
            <button @click="deleteSchedule(currentTitle)">Deletar cronograma</button>
        </div>
    </div>
</section>

</template>
<script>
import axios from 'axios';
import Swal from 'sweetalert2';

export default{
    data() {
        return{
            subjects: [],
            turns: '',
            titles: [],
            currentTitle: ''
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
                    this.currentTitle = title;
                }
            })
            .catch(response => {
                console.error(response)
            })
        },
        deleteSchedule(title) {
            axios.post('http://localhost:8000/schedule/deleteSchedule.php', {
                id: localStorage.getItem('idSession'),
                title: title
            })
            .then(response => {
                if(response.data.result){
                    Swal.fire('deletado','Seu cronograma foi deletado com sucesso')
                    .then(result =>{
                        if(result.isConfirmed){
                            this.searchSchedules();
                            this.subjects = [];
                            this.currentTitle = '';
                            this.turns = ''
                        }
                    })
                }else{
                    Swal.fire('erro','não foi possivel deletar seu cronograma, tente novamente!!!');
                }
            })
        }
    },
    beforeMount() {
        this.searchSchedules()
    }
}
</script>

<style scoped>
.schedule-subjects{
    border-style: solid;
    width: 100px;
}
.schedule{
    display: grid;
    justify-content: center;
}
</style>