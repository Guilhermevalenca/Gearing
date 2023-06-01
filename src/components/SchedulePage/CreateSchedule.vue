<template>
<div>
<form @submit.prevent="savingMaterialsTemporarily()">
    <div>
        <input type="submit" value="prosseguir">
    </div>
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
                <option value="manha">manha</option>
                <option value="tarde">tarde</option>
                <option value="noite">noite</option>
                <option value="madrugada">madrugada</option>
            </select>
        </label>
    </div>
    <div>
        Outras materias:
        <input type="text" v-model="otherMatter" placeholder="nova materia">
        <button @click.prevent="addOtherMatter()">Adicionar materias</button>
    </div>
</form>

<div class="content">
    <div v-if="matters.length == 1">Materia adicionada:</div><div v-if="matters.length > 1">Materias adicionadas:</div>
    <div class="content-list" v-if="this.matters.length != 0">
        <div class="content-list-subjects" v-for="(matter, index) in matters" :key="index">
           <div class="content-list-subjects-individually">
                <tr>
                    <td>{{ matter }}</td> 
                    <td>
                    <button class="content-list-subjects-individually-button-remove" @click.prevent="removeMatters(index)">remover materia</button>
                    </td>
                </tr>
           </div>
        </div>
    </div>
</div>
</div>
</template>
<script>
import Swal from 'sweetalert2'

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
        },
        savingMaterialsTemporarily(){
            if(this.turns){
                if(this.matters.length != 0){
                    this.$store.dispatch('addingTemporaryDataSchedule',{matter: this.matters, turns: this.turns});
                    this.$emit('saveMatters');
                }else{
                    Swal.fire('Nenhuma materia','Não é possivel montar um cronograma sem ter ao menos uma materia adiciona!')
                }
            }else{
                this.fillIn = true
            }
        }
    },
    watch: {
        turns() {
            if(this.turns){
                this.fillIn = false;
            }
        }
    }
}
</script>
<style scoped>
.turns{
    background-color: red;
    color: white;
}
.content{
    display: grid;
    justify-content: center;
}
.content-list{
    display: grid;
    border-style: solid;
    width: 25em;
    justify-content: center;
}
.content-list-subjects-individually{
    display: flex;
}
.content-list-subjects-individually-button-remove{
    width: 9em;
    height: 3em;
}
</style>