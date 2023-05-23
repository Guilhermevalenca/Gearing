<template>
    <div>
        login:
        <input type="text" v-model="login"><br>
        senha:
        <input type="text" v-model="senha"><br>
        <button @click="req()">enviar dados</button>
    </div>
    <div>
        <h1>Suas informações: {{ resposta.name }}</h1>
    </div>
</template>

<script>
import axios from 'axios';

export default{
    data() {
        return {
            resposta: '',
            login: '',
            senha: ''
        }
    },
    methods: {
        req() {
            axios.post('http://localhost:8000', {
                login: `${this.login}`,
                senha:  `${this.senha}`
            })
            .then(response => {
                this.resposta = response.data;
                console.log(this.resposta)
            })
            .catch(error => {
                console.error(error);
                // Trate o erro caso ocorra
            });
        }
    }
}
</script>