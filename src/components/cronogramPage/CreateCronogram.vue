<template>
<div>
<form @submit.prevent="">
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
        Outras materias:
        <input type="text" v-model="otherMatter" placeholder="nova materia">
        <button @click.prevent="addOtherMatter()">Adicionar materias</button>
    </div>
    <input type="submit">
</form>
<div>
    Materias adicionadas:
    <div class="list" v-if="this.matters.length != 0">
        <div class="list-subjects" v-for="(matter, index) in matters" :key="index">
           <div class="list-subjects-individually">
                <p>{{ matter }}</p><button>remover</button>
           </div>
        </div>
    </div>
</div>
</div>
</template>
<script>

export default{
    components: {} ,
    data() {
        return {
            matters: [],
            otherMatter: ''
        }
    },
    methods: {
        addOtherMatter() {
            this.matters.push(this.otherMatter),
            this.otherMatter = ''
        }
    }
}
</script>
<style scoped>
.list{
    display: grid;
    border-style: solid;
    width: 25%;
    justify-content: center;
}
.list-subjects-individually{
    display: flex;
    justify-content: center;
}
</style>