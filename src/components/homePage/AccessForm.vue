<template>
<div>
        <label v-if="showAlert">
            <AlertForm :class="{'form-alert-success' : createSuccess, 'form-alert-failed': failedLogin}" @close="closeAlert()"> 
                {{ messageAlert }}
            </AlertForm>
        </label>
    <form class="form" v-if="showForm" @submit.prevent="authUser()">
        <label>
            E-mail:
            <input type="email" v-model="loginUser.email" maxlength="45" placeholder="E-mail">
        </label>
        <label>
            Senha:
            <input type="password" v-model="loginUser.password" placeholder="Senha"> 
        </label>
            <button>entrar</button>
    </form>
    <form class="form" v-if="!showForm" @submit.prevent="newUser()">
        <label>
            Usuario:
            <input type="text" v-model="createUser.username" maxlength="20" placeholder="digite seu nome de usuario">
        </label>
        <label>
            E-mail:
            <input :class="{'form-email' : emailRegistered}" type="email" v-model="createUser.email" placeholder="digite seu email">
        </label>
        <label>
            Senha:
            <input :class="{'form-password' : differentPasswords}" type="password" minlength="6" v-model="createUser.password" placeholder="digite sua senha">
        </label>
        <label>
            Confirme sua senha:
            <input :class="{'form-password' : differentPasswords}" type="password" minlength="6" v-model="createUser.confirmPassword" placeholder="digite sua senha novamente">
        </label>
        <button>criar conta</button>
    </form>
    <button @click="() => {showForm = !showForm; showAlert = false }">{{ showForm ? 'criar uma nova conta' : 'entra em uma conta existente' }}</button>
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
                if(response.data.id){
                    this.$store.dispatch('changeUser',response.data);
                    localStorage.setItem('idSession',(response.data).id);
                    this.$router.push('/menu')
                }else{
                    this.showAlert = true;
                    this.messageAlert = "Não foi possivel efetivar seu login"
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
                        this.showForm = true;
                        this.messageAlert = "Sua conta foi criada com sucesso"
                        this.showAlert = true;
                        this.createSuccess = true;
                    }else{
                        this.showAlert = true;
                        this.messageAlert = "Essa conta ja estar cadastrada"
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
        display: grid;
        justify-content: center;
        text-align: center;
    }
    input{
        width: 25em;
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