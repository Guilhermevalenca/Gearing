<template>
<div v-if="!this.$store.state.user.auth" :class="['default-form', { 'showing-forms': actionsForms }]">
    <div>
        <section v-if="showAlert">
            <AlertForm
                :class="['form-alert', { 'form-alert-success': createSuccess }, { 'form-alert-failed': failedLogin }]"
                @close="closeAlert()">{{ messageAlert }}</AlertForm>
        </section>
    </div>
    <div v-if="actionsForms">
        <section v-if="!showForm">
            <button class="x" @click.prevent="() => {actionsForms = false}">X</button>
            <form class="form" @submit.prevent="authUser(loginUser.email,loginUser.password)">
                <div>
                    <label>E-mail:</label>
                    <input type="email" v-model="loginUser.email" maxlength="45" placeholder="Digite seu email">
                </div>
                <div>
                    <label>Senha:</label>
                    <input type="password" v-model="loginUser.password" placeholder="Digite sua senha">
                </div>
                <button type="submit" class="login-button">Login</button>
            </form>
        </section>
        <section v-if="showForm">
            <button class="x" @click.prevent="() => {actionsForms = false}">X</button>
            <form class="form" @submit.prevent="newUser()">
                <div>
                    <label>Usuário:</label>
                    <input class="usuario-input" type="text" v-model="createUser.username" maxlength="20"
                        placeholder="Escolha seu nome de usuario">
                </div>
                <div>
                    <label>E-mail:</label>
                    <input :class="{ 'form-email': emailRegistered }" type="email" v-model="createUser.email"
                        placeholder="Digite seu email">
                </div>
                <div>
                    <label>Senha:</label>
                    <input :class="{ 'form-password': differentPasswords }" type="password" minlength="6"
                        v-model="createUser.password" placeholder="Digite sua senha">
                </div>
                <div>
                    <label>Confirme sua senha:</label>
                    <input :class="{ 'form-password': differentPasswords }" type="password" minlength="6"
                        v-model="createUser.confirmPassword" placeholder="Digite sua senha novamente">
                </div>
                <button type="submit" class="sing-button">Criar conta</button>
            </form>
        </section>
    </div>
    <section v-if="!this.$store.state.user.auth" class="showing-options">
        <div :class="{ 'showing-forms-button': actionsForms }">
            <button class="button-form-open" @click="() => { showForm = !showForm; actionsForms = true }">{{ showForm ?
                "Realizar login" : "Criar uma nova conta" }}</button>
        </div>
        <div>
            <button class="button-form-open" @click="() => { actionsForms = !actionsForms; showForm = true }">{{
                actionsForms ? "Fechar Janela" : "Criar uma nova conta" }}</button>
        </div>
    </section>
</div>
<div v-if="this.$store.state.user.auth" class="showing-options">
    <ul>Bem vindo(a), {{ this.$store.state.user.username }}</ul>
    <ul v-if="adm">
        <button @click="() => {this.$router.push('/adm')}">Aba administrativa</button>
    </ul>
    <ul>
        <button @click="() => { this.$router.push('/userData') }">Alterar dados</button>
        <button @click="this.$logoutUser">Sair da conta</button>
    </ul>
</div>
</template>

<script>
import axios from "axios";
import AlertForm from "./AlertForm.vue";

export default {
    data() {
        return {
            adm: false,
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
        authUser(email,password) {
            axios.post(`${this.$store.state.req.api}/user/authUser.php`, {
                email: email,
                password: password
            })
            .then(response => {
                if (response.data.success) {
                    this.$store.dispatch('changeUser', response.data.user);
                    localStorage.setItem('idSession', response.data.user.id);
                    this.actionsForms = false;
                    this.checkAdm();
                } else {
                    this.showAlert = true;
                    this.messageAlert = "Não foi possível efetivar seu login"
                    this.failedLogin = true;
                    console.log("response:", response);
                }
            })
            .catch(error => {
                console.log("error:", error)
            })
        },
        newUser() {
            if (this.createUser.password == this.createUser.confirmPassword) {

                axios
                    .post(`${this.$store.state.req.api}/user/createUser.php`, {
                        username: this.createUser.username,
                        email: this.createUser.email,
                        password: this.createUser.password
                    })
                    .then(response => {
                        if (response.data.success) {
                            this.showForm = false;
                            this.authUser(this.createUser.email,this.createUser.password);
                        }else if(response.data.error.code == "23000"){
                            this.showAlert = true;
                            this.messageAlert = "Essa conta já está cadastrada"
                            this.emailRegistered = true;
                        }else{
                            this.showAlert = true;
                            this.messageAlert = "Ocorreu um erro não identificado"
                            this.emailRegistered = true;
                        }
                        response.data.success ? '' : console.log(response.data.error.other);
                    })
            }
        },
        closeAlert() {
            this.showAlert = false;
        },
        async checkAdm() {
            axios.post(`${this.$store.state.req.api}/authorizationActions/checkAdm.php`,{
                id: localStorage.getItem('idSession')
            })
            .then(response => {
                if(response.data.success){
                    this.adm = response.data.adm === 1 ? true : false;
                    if(this.$route.path == '/adm' && !this.adm){
                        this.$router.push('/')
                    }
                }
                console.log(response.data.error)
            })
            .catch(error => {
                console.log(error)
            })
        }
    },
    components: {
        AlertForm
    },
    watch: {
        createUser: {
            handler() {
                if (this.createUser.confirmPassword && (this.createUser.password != this.createUser.confirmPassword)) {
                    this.showAlert = true;
                    this.messageAlert = "Senhas diferentes"
                    this.differentPasswords = true;
                } else {
                    this.showAlert = false;
                    this.differentPasswords = false;
                }
                this.emailRegistered = false;
            },
            deep: true
        },
        actionsForms: {
            handler() {
                if (!this.actionsForms) {
                    this.showForm = true;
                }
                if(this.actionsForms == false){
                    this.showAlert = false;
                }
            },
            deep: true
        }
    },
    beforeMount() {
        let idSession = localStorage.getItem('idSession');
        if(idSession){
            this.checkAdm();
        }
    }
}
</script>

<style scoped>
.default-form{
    z-index: 1;
}
.x {
    display: flex;
    justify-content: flex-end;
}
.form {
    display: flex;
    background-image: url('@/assets/css/backgrounds/gearingBackground.jpeg');
    align-items: center;
    justify-content: center;
    width: 25em;
    height: 20em;
    border: #ffffff solid;
    border-radius: 0.7em;
    flex-flow: column wrap;
    gap: 0.5em;
}

.button-form-open {
    margin-top: 2em;
}

.login-button {
    width: 8em;
    height: 2.5em;
}

.sing-button {
    width: 14em;
    height: 2.5em;
}

label {
    color: #fff;
    margin-bottom: 3px;
}

div {
    display: grid;
    justify-content: center;
    text-align: center;
}

.usuario-input {
    color: black;
    border-radius: 5px;
    height: 1.8em;
}

input {
    border-radius: 5px;
    height: 1.8em;
    border: 1px solid;
    width: 25em;
}

input:focus {
  border: 1px solid #ffffff;
  background-color: #a7a7a7;
  width: 25em;
}

input::-webkit-input-placeholder {
    text-align: center;
    color: black;
}

input::-moz-placeholder {
    text-align: center;
    color: black;
}
.form-alert-success {
    background-color: green;
}

.form-alert-failed {
    background-color: red;
}

.form-email,
.form-password {
    color: red;
}

.showing-options {
    position: fixed;
    display: flex;
    right: 1em;
    top: 1em;
    z-index: 1;
}
ul{
    margin: 0px;
    padding: 0px;
}
.showing-forms {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
}</style>
