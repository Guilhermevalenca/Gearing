<template>
    <div class="formulario">
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
            login: '',
            senha: ''
        }
    },
    methods: {
        req() {
            axios.post('http://localhost:8000', {
                login: this.login,
                password:  this.senha
            })
            .then(response => {
                let dataJson = response.data;
                console.log(dataJson);
                if(dataJson.usersData){
                    localStorage.setItem('auth-users',dataJson.usersData);
                    console.log(dataJson.usersData);
                }
            })
            .catch(error => {
                console.error(error);
                // Trate o erro caso ocorra
            });
        }
    }
}
</script>