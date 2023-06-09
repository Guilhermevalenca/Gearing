<template>

<section>
<div class="define-title">
    Adicione um titulo ao seu cronograma
    <input class="define-title-text" v-model="title" type="text" placeholder="digite o titulo aqui">
</div> 
<div>
    <label>
        turnos
        <select v-model="turns">
            <option value="morning">manha</option>
            <option value="afternoon">tarde</option>
            <option value="night">noite</option>
            <option value="dawn">madrugada</option>
        </select>
    </label>
</div>
</section>
<section>
<div>
    <h1>Montando cronograma</h1>
</div>
<div>
    <button @click="addShedule()">salvar cronograma</button>
</div>
</section>

<section class="schedule">
<div>
    Adicionar outras materias:
    <input type="text" v-model="otherMatter" placeholder="nova materia">
    <button @click.prevent="addOtherMatter()">Adicionar materias</button>
</div>
<div class="schedule-matters" ref="sortableSubject">
    <ul @mouseover="giveBackSubject(subject)" ref="subject" class="shedule-matters-subject" v-for="(subject, index) in matters" :key="index">
        {{ subject }}
    </ul>
</div>
</section>

<section class="schedule">
<table v-show="turns">
    <thead>
        <tr>
            <th></th>
            <th>Domingo</th>
            <th>Segunda</th>
            <th>Terça</th>
            <th>Quarta</th>
            <th>Quinta</th>
            <th>Sexta</th>
            <th>Sabado</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="(hour, index) in currentTime" :key="index">
            <td>{{ hour }}</td>
            <td class="shedule-receiving" v-for="(receiving,row) in receivingSubjects[index]" :key="row">
                <div class="shedule-receiving-subjects" ref="sortableReceiving"></div>
            </td>
        </tr>
    </tbody>
</table>
</section>

</template>

<script>
import axios from 'axios';
import Sortable from 'sortablejs';
import Swal from 'sweetalert2';

export default{
    data() {
        return {
            matters: ["matematica","fisica","quimica","biologia","historia","portugues","geografia","filosofia","sociologia","artes","Ingles","espanhol"],
            turns: '',
            title: '',
            otherMatter: '',
            morningShift: ["06:00","07:00","08:00","09:00","10:00","11:00"],
            afternoonShift: ["12:00","13:00","14:00","15:00","16:00","17:00"],
            nightShift: ["18:00","19:00","20:00","21:00","22:00","23:00"],
            dawnShift: ["00:00","01:00","02:00","03:00","04:00","05:00"],
            receivingSubjects: [],
            currentTime: ["06:00","07:00","08:00","09:00","10:00","11:00"]
        }
    },
    mounted() {
        for(let i = 0; i < 6; i++){
            this.receivingSubjects[i] = []
            this.receivingSubjects[i].length = 7
        }
        new Sortable(this.$refs.sortableSubject, {
            group: 'shared'
        });
        const elements = this.$refs.sortableReceiving;
        if(elements){
            elements.forEach(element => {
                new Sortable(element, {
                    group: 'shared'
                })
            })
        }
    },
    methods: {
        addShedule() {
            let i = 0;
            let j = 0;
            
            this.$refs.sortableReceiving.forEach( (element) => {
                if(element.textContent){
                    this.receivingSubjects[i][j] = ''
                    element.querySelectorAll('ul').forEach(subject => {
                        this.receivingSubjects[i][j] += subject.textContent + " "
                    })
                }
                j++
                if(j == 7){
                    i++
                    j = 0;
                }
            })
            Swal.fire({
                title: 'Criando cronograma',
                text: 'porfavor aguarde, dentro de alguns segundos seu cronograma será criado',
                showConfirmButton: false,
                allowOutsideClick: false
            });
            Swal.showLoading();
            axios.post('http://localhost:8000/schedule/addSchedule.php', {
                schedule: this.receivingSubjects,
                title: this.title,
                shift: this.turns,
                id: localStorage.getItem('idSession')
            })
            .then(response => {
                if(response.data.existTitle){
                    Swal.fire('titulo existente','o titulo que voce deseja adicionar ao seu novo cronograma ja estar sendo usado em um dos seus outros cronogramas');
                }else if(response.data.failedCreatedSchedule){
                    Swal.fire('criação falhou','Não foi possivel criar seu cronograma, tente novamente mais tarde');
                }else{
                    this.$store.dispatch('changeSchedule','')
                    if(response.data.addSubjectFailed){
                        Swal.fire('falha ao adicionar materia','uma ou mais materias não foram adicionadas');
                    }
                    if(response.data.success){
                        Swal.fire('cronograma criado','seu cronograma foi criado, boa sorte com seus estudos!!!')
                    }
                }
            })
        },
        giveBackSubject(subject) {
            var check = true
            const checkSubject = (this.$refs.sortableSubject).querySelectorAll('ul')
        
            checkSubject.forEach(element => {
                if(element.textContent == subject){
                    check = false
                }
            })
            if(check){
                this.matters.push(subject)
            }
        },
        addOtherMatter() {
            if(this.otherMatter){
                this.matters.push(this.otherMatter)
            }
            this.otherMatter = ''
        }
    },
    watch: {
        turns: {
            handler() {
                if(this.turns == "morning"){
                    this.currentTime = this.morningShift;
                }else if(this.turns == "afternoon"){
                    this.currentTime = this.afternoonShift;
                }else if(this.turns == "night"){
                    this.currentTime = this.nightShift;
                }else if(this.turns == "dawn"){
                    this.currentTime = this.dawnShift;
                }
                const elements = this.$refs.sortableReceiving;
                if(elements){
                    elements.forEach(element => {
                        new Sortable(element, {
                            group: 'shared'
                        })
                    })
                }
            },
            deep: true
        }
    },
    computed: {
        
    }
}
</script>

<style scoped>
.schedule{
    display: grid;
    justify-content: center;
}
.schedule-matters{
    display: flex;
    justify-content: center;
    width: 50em;
    flex-wrap: wrap;
}
.shedule-matters-subject{
    margin: 0px;
    padding: 1em;
    list-style: none;
}
.shedule-receiving{
    border-style: solid;
    width: 3em;
    height: 1.5em;
}
.shedule-receiving-subjects{
    display: flex;
    justify-content: center;
    width: 100px;
    flex-wrap: wrap;
}
</style>

