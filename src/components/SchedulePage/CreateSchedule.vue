<template>

<section>
<div class="define-title">
    Adicione um título ao seu cronograma
    <input :class="['define-title-text',{'select-title' : this.checks.title}]" v-model="title" type="text" placeholder="digite o titulo aqui" required>
</div> 
<div>
    <label>
        turnos
        <select :class="{'select-turn' : this.checks.turn}" v-model="turns">
            <option value="morning">Manhã</option>
            <option value="afternoon">Tarde</option>
            <option value="night">Noite</option>
            <option value="dawn">Madrugada</option>
        </select>
    </label>
</div>
</section>
<section>
<div>
    <h1>Montando cronograma</h1>
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

<section v-show="turns" class="schedule">
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
        <tr v-for="(hour, index) in currentTime" :key="index">
            <td>{{ hour }}</td>
            <td class="shedule-receiving" v-for="(receiving,row) in receivingSubjects[index]" :key="row">
                <div class="shedule-receiving-subjects" ref="sortableReceiving"></div>
            </td>
        </tr>
    </tbody>
</table>
<div>
    <button @click="addShedule()">Salvar cronograma</button>
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
            matters: ["Matemática","Física","Química","Biologia","História","Português","Geografia","Filosofia","Sociologia","Artes","Inglês","Espanhol"],
            turns: '',
            title: '',
            otherMatter: '',
            morningShift: ["06:00","07:00","08:00","09:00","10:00","11:00"],
            afternoonShift: ["12:00","13:00","14:00","15:00","16:00","17:00"],
            nightShift: ["18:00","19:00","20:00","21:00","22:00","23:00"],
            dawnShift: ["00:00","01:00","02:00","03:00","04:00","05:00"],
            receivingSubjects: [],
            currentTime: ["06:00","07:00","08:00","09:00","10:00","11:00"],
            checks: {
                title: false,
                turn: false
            }
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
            if(!this.$store.state.user.auth){
                Swal.fire({
                    title: 'Ação negada',
                    text: 'Apenas usuarios cadastrados no sistema tem permissão para criar cronograma',
                    customClass: {
                        popup: 'swal-popup-custom',
                        title: 'swal-title-custom',
                        htmlContainer: 'swal-html-container-custom',
                    }
                })
                return
            }
            if(!this.title || !this.turns){
                this.checks.title = () => {return !this.title}
                this.checks.turn = () => {return !this.turns}
                return
            }
            let i = 0;
            let j = 0;
            
            let check = true;

            this.$refs.sortableReceiving.forEach( (element) => {
                if(element.textContent){
                    this.receivingSubjects[i][j] = ''
                    element.querySelectorAll('ul').forEach(subject => {
                        this.receivingSubjects[i][j] += subject.textContent + ","
                        if(subject.textContent){
                            check = false;
                        }
                    })
                }
                j++
                if(j == 7){
                    i++
                    j = 0;
                }
            })
            
            if(check){
                Swal.fire({
                    title: 'Atenção',
                    text: 'Você deve adicionar pelo menos uma matéria ao seu cronograma',
                    customClass: {
                        popup: 'swal-popup-custom',
                        title: 'swal-title-custom',
                        htmlContainer: 'swal-html-container-custom',
                    }
                })
                return
            }

            Swal.fire({
                title: 'Criando cronograma',
                text: 'Aguarde, dentro de alguns segundos seu cronograma será criado',
                showConfirmButton: false,
                allowOutsideClick: false,
                customClass: {
                    popup: 'swal-popup-custom',
                    title: 'swal-title-custom',
                    htmlContainer: 'swal-html-container-custom',
                }
                
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
                    Swal.fire({
                        title:'Título existente',
                        text:'O título que você deseja adicionar ao seu novo cronograma já está sendo usado em um dos seus outros cronogramas',
                        customClass: {
                                popup: 'swal-popup-custom',
                                title: 'swal-title-custom',
                                htmlContainer: 'swal-html-container-custom',
                            }
                    });

                }else if(response.data.failedCreatedSchedule){
                    Swal.fire({
                        title:'Falha ao criar cronograma',
                        text:'Não foi possível criar seu cronograma, tente novamente mais tarde',
                        customClass: {
                                popup: 'swal-popup-custom',
                                title: 'swal-title-custom',
                                htmlContainer: 'swal-html-container-custom',
                            }
                    });
                }else{
                    this.$emit('quitCreatingSchedule');
                    if(response.data.addSubjectFailed){
                        console.log(response.data.addSubjectFailed);
                        Swal.fire({
                            title:'Falha ao adicionar matéria',
                            text:'Uma ou mais materias não foram adicionadas',
                            customClass: {
                                popup: 'swal-popup-custom',
                                title: 'swal-title-custom',
                                htmlContainer: 'swal-html-container-custom',
                            }
                                 })
                        .then(result => {
                            if(result.isConfirmed){
                                Swal.fire({
                                title:'Cronograma criado com sucesso',
                                text:'Seu cronograma foi criado, boa sorte com seus estudos!',
                                customClass: {
                                    popup: 'swal-popup-custom',
                                    title: 'swal-title-custom',
                                    htmlContainer: 'swal-html-container-custom',
                            }
                            })        
                            }
                        })
                    }else if(response.data.success){
                        Swal.fire({
                        title:'Cronograma criado com sucesso',
                        text:'Seu cronograma foi criado, boa sorte com seus estudos!',
                                customClass: {
                                popup: 'swal-popup-custom',
                                title: 'swal-title-custom',
                                htmlContainer: 'swal-html-container-custom',
                            }
                    })
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
                this.checks.turn = false
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
        },
        title: {
            handler() {
                this.checks.title = false;
            },
            deep: true
        }
    },
    computed: {
        
    }
}
</script>

<style scoped>
label{
    color: rgba(188, 251, 255, 1);
}
.select-turn,.select-title{
    background-color: red;
}
.schedule{
    display: grid;
    justify-content: center;
    margin:1em;
}
.schedule-matters{
    display: flex;
    justify-content: center;
    width: 50em;
    flex-wrap: wrap;
    border-style: solid;
    border-width: 0.1em;
    border-radius: 0.8em;
    border-color: blueviolet;
    gap:0.1em;
    margin: 5em;
   background-color: #000000;
   color:   rgba(188, 251, 255, 1);
   font-weight: bold;
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
.schedule-subjects{
    border-style: solid;
    width: 100px;
}
.schedule{
    display: grid;
    justify-content: center;
}
.addNewMatters{
    margin:1em;
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

