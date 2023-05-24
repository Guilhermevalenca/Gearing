<template>
<div>
    <form v-if="showForm" @submit.prevent="authUser()">
        <label>
            E-mail:
            <input type="email" v-model="loginUser.email" placeholder="E-mail">
        </label>
        <label>
            Senha:
            <input type="password" v-model="loginUser.password" placeholder="Senha">
        </label>
            <button>entrar</button>
    </form>
    <form v-if="!showForm" @submit.prevent="newUser()">
        <label>
            Usuario:
            <input type="text" v-model="createUser.username" placeholder="digite seu nome de usuario">
        </label>
        <label>
            E-mail:
            <input type="email" v-model="createUser.email" placeholder="digite seu email">
        </label>
        <label>
            Senha:
            <input type="password" v-model="createUser.password" placeholder="digite sua senha">
        </label>
        <label>
            Confirme sua senha:
            <input type="password" v-model="createUser.confirmPassword" placeholder="digite sua senha novamente">
        </label>
        <label v-if="alert">
            <AlertForm @close="closeAlert()"> 
                {{ messageAlert }}
            </AlertForm>
        </label>
        <button>criar conta</button>
    </form>
    <button @click="() => showForm = !showForm">{{ showForm ? 'criar uma nova conta' : 'entra em uma conta existente' }}</button>
</div>
</template>

<script>

import axios from "axios";
import AlertForm from "./AlertForm.vue";

export default{
    data() {
        return {
            loginUser: {
                email: "",
                password: ""
            },
            createUser: {
                username: "",
                email: "",
                password: "",
                confirmPassword: ""
            },
            showForm: true,
            alert: false,
            messageAlert: ''
        };
    },
    methods: {
        authUser() {
            axios.post("http://localhost:8000/user/authUser.php", {
                email: this.loginUser.email,
                password: this.loginUser.password
            })
                .then(response => {
                if(response.data){
                    this.$router.push('/menu')
                }
            });
        },
        newUser() {
            axios.post("htpp://localhost:8080/user/createUser.php", {});
        },
        closeAlert() {
            this.alert = false;
        }
    },
    components: { 
        AlertForm 
    },
    watch: {
        createUser: {
            handler() {
                if( this.createUser.confirmPassword && (this.createUser.password != this.createUser.confirmPassword) ){
                    this.alert = true;
                    this.messageAlert = "Senhas diferentes"
                }else{
                    this.alert = false;
                }
            },
            deep: true
        }
    }
}
</script>

<style scoped>
    label{
        display: grid;
        justify-content: center;
        text-align: center;
    }
    input{
        width: 25em;
    }
</style>