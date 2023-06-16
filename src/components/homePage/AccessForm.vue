<template>
 <div class='box' >
<section>
<div v-if="showAlert">
    <AlertForm :class="{'form-alert-success' : createSuccess, 'form-alert-failed': failedLogin}" @close="closeAlert()"> 
        {{ messageAlert }}
    </AlertForm>
</div>
</section>

<div v-if="actionsForms">

<section v-if="!showForm">
<form class="form" @submit.prevent="authUser()">
    <label>
        E-mail:
        <input type="email" v-model="loginUser.email" maxlength="45" placeholder="Digite seu email">
    </label>
    <label>
        Senha:
        <input type="password" v-model="loginUser.password" placeholder="Digite sua senha"> 
    </label>
        <button>Login</button>
</form>
</section>
<section v-if="showForm">
<form class="form" @submit.prevent="newUser()">
    <label>
        Usuário:
        <input type="text" v-model="createUser.username" maxlength="20" placeholder="Escolha seu nome de usuario">
    </label>
    <label>
        E-mail:
        <input :class="{'form-email' : emailRegistered}" type="email" v-model="createUser.email" placeholder="Digite seu email">
    </label>
    <label>
        Senha:
        <input :class="{'form-password' : differentPasswords}" type="password" minlength="6" v-model="createUser.password" placeholder="Digite sua senha">
    </label>
    <label>
        Confirme sua senha:
        <input :class="{'form-password' : differentPasswords}" type="password" minlength="6" v-model="createUser.confirmPassword" placeholder="Digite sua senha novamente">
    </label>
    <button>Criar conta</button>
</form>
</section>

</div>

<section>
    <div>
        <button @click="() => {showForm = !showForm; actionsForms = true}">{{ showForm ? "Fazer login" : "Criar uma nova conta" }}</button>
    </div>
    <div v-if="!actionsForms">
        <button @click="() => {actionsForms = true;}">Criar uma nova conta</button>
    </div>
</section>
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
            showAlert: false,
            actionsForms: false,
            messageAlert: '',
            emailRegistered: false,
            differentPasswords: false,
            createSuccess: false,
            failedLogin: false
        };
    },
    methods: {
        authUser() {
            axios.post("http://localhost:8000/user/authUser.php", {
                email: this.loginUser.email,
                password: this.loginUser.password
            })
                .then(response => {
                if(response.data.id && response.data.email){
                    this.$store.dispatch('changeUser',response.data);
                    localStorage.setItem('idSession',response.data.id);
                    this.$router.push('/menu')
                }else{
                    this.showAlert = true;
                    this.messageAlert = "Não foi possível efetivar seu login"
                    this.failedLogin = true;
                }
            });
        },
        newUser() {
            if(this.createUser.password == this.createUser.confirmPassword){

                axios
                .post("http://localhost:8000/user/createUser.php", {
                    username: this.createUser.username,
                    email: this.createUser.email,
                    password: this.createUser.password
                })
                .then(response => {
                    if(response.data){
                        this.showForm = false;
                        this.createSuccess = true;
                        this.messageAlert = "Sua conta foi criada com sucesso"
                        this.showAlert = true;
                        this.failedLogin = false;
                    }else{
                        this.showAlert = true;
                        this.messageAlert = "Essa conta já está cadastrada"
                        this.emailRegistered = true;

                    }
                })
            }
        },
        closeAlert() {
            this.showAlert = false;
        }
    },
    components: { 
        AlertForm 
    },
    watch: {
        createUser: {
            handler() {
                if( this.createUser.confirmPassword && (this.createUser.password != this.createUser.confirmPassword) ){
                    this.showAlert = true;
                    this.messageAlert = "Senhas diferentes"
                    this.differentPasswords = true;
                }else{
                    this.showAlert = false;
                    this.differentPasswords = false;
                }
                this.emailRegistered = false;
            },
            deep: true
        }
    }
}
</script>

<style scoped>
    label{
    color:#fff;   
    }
    label, div{
        display: grid;
        justify-content: center;
        text-align: center;
    }
    input{
        border-style: solid;
        border-radius: 8px;
        border-color: #000;
        height: 1.5em;
        width: 25em;
    }
    input::-webkit-input-placeholder{
        text-align: center;
    }
    input::-moz-placeholder{
        text-align: center;
    }
    .form-alert-success{
        background-color: green;
    }
    .form-alert-failed{
        background-color: red;
    }
    .form-email, .form-password{
        color: red;
    }
</style>