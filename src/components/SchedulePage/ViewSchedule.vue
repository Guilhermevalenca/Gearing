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
                <th>Segunda</th>
                <th>Terça</th>
                <th>Quarta</th>
                <th>Quinta</th>
                <th>Sexta</th>
                <th>Sábado</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(hour, index) in turns" :key="index">
                <td>
                    <div>{{ hour }}</div>
                </td>
                <td class="schedule-subjects" v-for="(subject, row) in subjects[index]" :key="row">
                    <div v-if="subject">
                        <div v-for="(separated,column) in subject.split(',')" :key="column">
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
            <button @click="editSchedule()">Editar cronograma</button>
        </div>
        <div>
            <button @click="deleteSchedule()">Deletar cronograma</button>
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
        deleteSchedule() {
            
            Swal.fire({
                title: 'Deletando cronograma',
                showConfirmButton: false,
                allowOutsideClick: false,
                customClass: {
                    popup: 'swal-popup-custom',
                    title: 'swal-title-custom',
                    htmlContainer: 'swal-html-container-custom',
                }
            })
            Swal.showLoading();
            axios.post('http://localhost:8000/schedule/deleteSchedule.php', {
                id: localStorage.getItem('idSession'),
                title: this.currentTitle
            })
            .then(response => {
                Swal.hideLoading();
                if(response.data.result){
                    this.subjects = [];
                    this.currentTitle = '';
                    this.turns = ''
                    Swal.fire({
                    title:'Deletado',
                    text:'Seu cronograma foi deletado com sucesso',
                    customClass: {
                                popup: 'swal-popup-custom',
                                title: 'swal-title-custom',
                                htmlContainer: 'swal-html-container-custom',
                            }})
                    .then(result =>{
                        if(result.isConfirmed){
                            this.searchSchedules();
                        }
                    })
                }else{
                    Swal.fire({
                    title:'Erro',
                    text:'Não foi possível deletar seu cronograma, tente novamente!',
                    customClass: {
                                popup: 'swal-popup-custom',
                                title: 'swal-title-custom',
                                htmlContainer: 'swal-html-container-custom',
                            }
                });
                }
            })
        },
        editSchedule() {
            this.$store.dispatch('changeSchedule',this.currentTitle);     
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
table {
  font-family: "Share Tech Mono", sans-serif;
  font-size: 0.90em;
  color:blueviolet;
  background-color: #000000;
}

th,
td {
  background: -webkit-linear-gradient(
    90deg,
    rgba(188, 251, 255, 1) 47%,
    rgba(24, 237, 242, 1) 100%
  );
  font-weight: bold;
  background-clip: text;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  border-style: solid;
  border-width: 0.1em;
  width: 9em;
  height: 1.5em;
}
</style>