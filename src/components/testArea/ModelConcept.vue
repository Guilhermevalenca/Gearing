<template>
    <div>
        testando Model Concept
    </div>
    <div>
        <h2>testando input:</h2>
    </div>
    <textarea v-model="name" cols="30" rows="5"></textarea><br>
    <label>Sports:</label>
    <select v-model="sports">
        <option value="">Selecione</option>
        <option value="futebol">Futebol</option>
        <option value="basket">basket</option>
        <option value="voleiball">voleiball</option>
    </select>
    <div>
        <label>alternativa:</label><br>
        <input type="radio" v-model="alternativa" value="sim"> sim
        <input type="radio" v-model="alternativa" value="nao"> nao
    </div>
    <div>
        <label>contract</label><br>
        <input type="checkbox" v-model="contract">
        aceitar contrato <br>
        {{ contract }}
    </div>
    <div>
        <label>cores::</label>
        <input type="checkbox" v-model="colors" value="vermelho"> vermelho
        <input type="checkbox" v-model="colors" value="azul"> azul
        <input type="checkbox" v-model="colors" value="preto"> preto
        <input type="checkbox" v-model="colors" value="branco"> branco
    </div>
</template>
<script>
    export default{
        name: 'App',
        data() {
            return{
                name: '',
                respostaServe: '',
                sports: '',
                alternativa: '',
                contract: false,
                colors: []
            }
        }
    }
</script>