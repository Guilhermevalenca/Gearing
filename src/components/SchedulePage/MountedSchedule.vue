<template>
<div>
    <h1>Montando cronograma</h1>
    <button>salvar cronograma</button>
</div>

<div class="schedule">

<div class="schedule-matters" ref="sortableSubject">
    <ul v-for="(subject, index) in matters" :key="index">
        {{ subject }}
    </ul>
</div>

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
            <th>Sabado</th>
        </tr>
    </thead>
    <tbody>
        <div ref="sortableReceiving">
        <tr v-for="(hour, index) in turns" :key="index">
            <td>{{ hour }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </div>
    </tbody>
</table>
</div>

</template>

<script>
import Sortable from 'sortablejs';

export default{
    data() {
        return {
            matters: [],
            //turns: this.$store.state.turns,
            turns: [],
            morningShift: ["06:00","07:00","08:00","09:00","10:00","11:00"],
            afternoonShift: ["12:00","13:00","14:00","15:00","16:00","17:00"],
            nightShift: ["18:00","19:00","20:00","21:00","22:00","23:00"],
            dawnShift: ["00:00","01:00","02:00","03:00","04:00","05:00"],
            receivingSubjects: []
        }
    },
    mounted() {
        new Sortable(this.$refs.sortableSubject, {
            group: 'shared',
            onEnd: this.handleSortEnd
        });
        this.turns.forEach((element, index) => {
            new Sortable(this.$refs[`sortableReceiving${index}`], {
                group: 'shared',
                onEnd: this.handleSortEnd,
            });
        });
        this.receivingSubjects.length = 7;
    },
    methods: {
        handleSortEnd(event) {
          const { oldIndex, newIndex, from, to } = event;
            
          // Verifica se o item foi movido de uma div para outra
            if (from !== to) {
                const movedItem = from === this.$refs.sortableSubject ? this.matters : this.receivingSubjects;
                const targetItems = to === this.$refs.sortableSubject ? this.matters : this.receivingSubjects;
                const item = movedItem.splice(oldIndex, 1)[0];
                targetItems.splice(newIndex, 0, item);
            }
        }
    },
    watch: {
        $store: {
            handler() {
                if(this.$store.state.subjects || this.$store.state.turns){
                    this.matters = this.$store.state.subjects
                    this.turns = this.$store.state.turns
                }
            },
            deep: true
        },
        turns: {
            handler() {
                if(this.turns == "morning"){
                    this.turns = this.morningShift;
                }else if(this.turns == "afternoon"){
                    this.turns = this.afternoonShift;
                }else if(this.turns == "night"){
                    this.turns = this.nightShift;
                }else if(this.turns == "dawn"){
                    this.turns = this.dawnShift;
                }
            },
            deep: true
        }
    }
}
</script>

<style scoped>
.schedule-matters{
    display: flex;
}
.schedule-matters{
    justify-content: center;
}
</style>