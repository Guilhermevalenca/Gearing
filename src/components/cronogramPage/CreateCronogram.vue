<template>
<div>
<form @submit.prevent="">
    <label> 
        <input v-model="matter" type="checkbox" value="matematica">
        Matematica
    </label>
    <label>
        <input v-model="matter" type="checkbox" value="fisica">
        Fisica
    </label>
    <label>
        <input v-model="matter" type="checkbox" value="quimica">
        Quimica
    </label>
    <label>
        <input v-model="matter" type="checkbox" value="biologia">
        Biologia
    </label>
    <label>
        <input v-model="matter" type="checkbox" value="historia">
        Historia
    </label>
    <label> 
        <input v-model="matter" type="checkbox" value="portugues">
        Portugues
    </label>
    <label> 
        <input v-model="matter" type="checkbox" value="geografia">
        Geografia
    </label>
    <label> 
        <input v-model="matter" type="checkbox" value="filosofia">
        Filosofia
    </label>
    <label> 
        <input v-model="matter" type="checkbox" value="sociologia">
        Sociologia
    </label>
    <label> 
        <input v-model="matter" type="checkbox" value="artes">
        Artes
    </label>
    <label> 
        <input v-model="matter" type="checkbox" value="Ingles">
        Ingles
    </label>
    <label> 
        <input v-model="matter" type="checkbox" value="espanhol">
        Espanhol
    </label>
    <div>
        <button @click.prevent="addOtherMatters()">adicionar materia</button>
        <button @click.prevent="removeOtherMatters()">remover materia</button>
    </div>
    <div v-for="otherMatter in otherMatters" :key="otherMatter">
        
    </div>
    <input type="submit">
</form>
    {{ matter }} 
</div>
</template>
<script>

export default{
    components: {} ,
    data() {
        return {
            matter: [],
            otherMatters: []
        }
    },
    methods: {
        addOtherMatters() {
            this.otherMatters.push({});
        },
        removeOtherMatters() {
            
        }
    }
}
</script>