<template>
<div>
<section>
    <label> 
        <input v-model="matters" type="checkbox" value="matematica">
        Matematica
    </label>
    <label>
        <input v-model="matters" type="checkbox" value="fisica">
        Fisica
    </label>
    <label>
        <input v-model="matters" type="checkbox" value="quimica">
        Quimica
    </label>
    <label>
        <input v-model="matters" type="checkbox" value="biologia">
        Biologia
    </label>
    <label>
        <input v-model="matters" type="checkbox" value="historia">
        Historia
    </label>
    <label> 
        <input v-model="matters" type="checkbox" value="portugues">
        Portugues
    </label>
    <label> 
        <input v-model="matters" type="checkbox" value="geografia">
        Geografia
    </label>
    <label> 
        <input v-model="matters" type="checkbox" value="filosofia">
        Filosofia
    </label>
    <label> 
        <input v-model="matters" type="checkbox" value="sociologia">
        Sociologia
    </label>
    <label> 
        <input v-model="matters" type="checkbox" value="artes">
        Artes
    </label>
    <label> 
        <input v-model="matters" type="checkbox" value="Ingles">
        Ingles
    </label>
    <label> 
        <input v-model="matters" type="checkbox" value="espanhol">
        Espanhol
    </label>
    <div>
        <label>
            turnos
            <select v-model="turns" :class="{'turns' : fillIn}">
                <option value="morning">manha</option>
                <option value="afternoon">tarde</option>
                <option value="night">noite</option>
                <option value="dawn">madrugada</option>
            </select>
        </label>
    </div>
    <div>
        Outras materias:
        <input type="text" v-model="otherMatter" placeholder="nova materia">
        <button @click.prevent="addOtherMatter()">Adicionar materias</button>
    </div>
</section>

</div>
</template>
<script>

export default{
    components: {} ,
    data() {
        return {
            matters: [],
            otherMatter: '',
            turns: '',
            fillIn: false
        }
    },
    methods: {
        addOtherMatter() {
            if(this.otherMatter){
                this.matters.push(this.otherMatter)
            }
            this.otherMatter = ''
        },
        removeMatters(index) {
            this.matters.splice(index,1)
        }
    },
    watch: {
        matters: {
            handler() {
                this.$store.dispatch('addingTemporaryDataSchedule',{matter: this.matters, turns: this.turns})
            },
            deep: true
        },
        turns: {
            handler() {
                this.$store.dispatch('addingTemporaryDataSchedule',{matter: this.matters, turns: this.turns})
            },
            deep: true
        }
    }
}
</script>
<style scoped>

</style>