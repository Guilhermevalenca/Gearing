<template>

<section @mouseover="moveElements()">
    <div>
        <h2>Editando cronograma:</h2>
        <h2>{{ currentTitle }}</h2>
    </div>
    <form @submit.prevent="addNewSubject()">
        <label>Adicione novas materias:</label>
        <input type="text" placeholder="nova materia" v-model="newSubject">
        <button>Adicionar materia</button>
    </form>
    <div class="store">
        <h3>Descarte + novas materias</h3>
        <div class="store-box" ref="newSubjects">
            <ul class="store-box-newSubjects" v-for="(subject, index) in storeNewSubjects" :key="index">
                {{ subject }}
            </ul>
        </div>
    </div>
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
            <tr v-for="(hour, index) in turn" :key="index">
                <td>
                    <div>{{ hour }}</div>
                </td>
                <td ref="row" class="schedule-subjects" v-for="(subject, row) in subjects[index]" :key="row">
                    <div v-if="subject">
                        <div class="schedule-subjects-alocated" v-for="(separated,column) in subject.split(',')" :key="column">
                            <div class="schedule-subjects-alocated-true" v-if="separated">{{ separated }}</div>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
        </table>
    </div>
</section>
<section>
    <div>
        <button @click="updateSchedule()">Alterar cronograma</button>
    </div>
    <div>
        <button @click="() => {this.$store.dispatch('changeSchedule','')}">cancelar</button>
    </div>
</section>
</template>

<script>
import axios from 'axios';
import Sortable from 'sortablejs';
import Swal from 'sweetalert2';

export default{
    data() {
        return {
            currentTitle: this.$store.state.schedule.editTitle,
            turn: [],
            subjects: [],
            actionSortable: true,
            updateSubjects: [],
            newSubject: '',
            storeNewSubjects: []
        }
    },
    methods: {
        addNewSubject() {
            this.storeNewSubjects.push(this.newSubject);
            this.newSubject = '';
            new Sortable(this.$refs.newSubjects, {
                group: 'shared'
            })
        },
        mountedSchedule() {
            axios.post(`${this.$store.state.req.api}/schedule/searchSchedule.php`, {
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
            if(this.actionSortable){
                const sortableElements = document.querySelectorAll('.schedule-subjects-alocated');
                sortableElements.forEach(element => {
                    new Sortable(element, {
                        group: 'shared'
                    })
                });
                const sortableAll = document.querySelectorAll('.schedule-subjects');
                sortableAll.forEach(element => {
                    new Sortable(element, {
                        group: 'shared'
                    })
                });
                new Sortable(this.$refs.newSubjects, {
                    group: 'shared'
                });
                this.actionSortable = false
            }
        },
        updateSchedule() {
            this.updateSubjects = []
            for(let i = 0; i < 6; i++){
                this.updateSubjects[i] = [];
            }
            let i = 0;
            let j = 0;
            this.$refs.row.forEach(element => {
                if(element.textContent){
                    this.updateSubjects[i][j] = ''
                    element.querySelectorAll('.schedule-subjects-alocated-true').forEach(subject => {
                        this.updateSubjects[i][j] += subject.textContent + ","
                    })
                    element.querySelectorAll('.store-box-newSubjects').forEach(subject => {
                        this.updateSubjects[i][j] += subject.textContent + ',';
                    })
                }
                j++
                if(j == 7){
                    i++
                    j = 0;
                }
            })
            Swal.fire({
                title: 'Atualizando cronograma',
                showConfirmButton: false,
                allowOutsideClick: false,
                customClass: {
                    popup: 'swal-popup-custom',
                    title: 'swal-title-custom',
                    htmlContainer: 'swal-html-container-custom',
                },
                willOpen: () => {
                    Swal.showLoading();
                },
                willClose: () => {
                    Swal.hideLoading();
                }
            });
            axios.post(`${this.$store.state.req.api}/schedule/updateSchedule.php`,{
                id: localStorage.getItem('idSession'),
                update: this.updateSubjects,
                title: this.currentTitle
            })
            .then(response => {
                if(response.data.success) {
                    Swal.fire({
                        title: 'Cronograma atualizado com sucesso',
                        customClass: {
                            popup: 'swal-popup-custom',
                            title: 'swal-title-custom',
                            htmlContainer: 'swal-html-container-custom',
                        }
                    })
                    .then(result => {
                        if(result.isConfirmed){
                            this.$emit('viewSchedule')
                        }
                    })
                }else{
                    console.log(response.data.error)
                }
            })
            .catch(error => {
                Swal.fire(error)
            })
            
        }
    },
    created() {
        this.mountedSchedule()
    },
    mounted() {
        
    }
}
</script>

<style scoped>

.store-box{
    display: flex;
    justify-content: center;
    border-style: solid;
}
.store-box-newSubjects{
    margin: 0px;
    padding-top: 0px;
    padding-bottom: 0px;
    padding-left: 5px;
    padding-right: 5px;
}
.schedule{
    display: grid;
    justify-content: center;
}
.schedule-subjects{
    border-style: solid;
    width: 100px;
}
.subjects{
    display: grid;
    justify-content: center;
}
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