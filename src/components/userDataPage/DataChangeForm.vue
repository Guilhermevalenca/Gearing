<template>
    <h1>Seus dados:</h1>
    <div v-if="checkingPassword">
        <label v-if="showAlert">
            <AlertPassword @close="closeAlert()" />
        </label>
        <form @submit.prevent="check()">
            <label>Digite sua senha para visualizar seus dados:
                <input type="password" v-model="user.password" placeholder="Digite sua senha">
            </label>
            <input type="submit">
        </form>
    </div>
    <div v-if="!checkingPassword">
            <label>
                E-mail:
                {{ $store.state.user.email }}
            </label>
        <form @submit.prevent="">
            <label>
                Nome de usuario:
                <input type="text" v-model="newUserData.username" placeholder="digite seu novo nome de usuario">
            </label>
            <label>
                nova senha:
                <input type="password" v-model="newUserData.password" placeholder="Nova senha">
            </label>
            <label>
                Confirme sua nova senha:
                <input type="password" v-model="newUserData.confirmePassword" placeholder="confirme sua nova senha"> 
            </label>
            <input type="submit" value="alterar dados">
        </form>
    </div>
</template>

<script>
import axios from 'axios';
import AlertPassword from './AlertPassword.vue'

export default{
    components: {
        AlertPassword
    },
    data() {
        return{
            user: {
                password: ''
            },
            newUserData: {
                username: '',
                password: '',
                confirmePassword: ''
            },
            checkingPassword: true,
            showAlert: false
        }
    },
    methods: {
        check() {
            axios.post('http://localhost:8000/user/userData.php', {
                email: this.$store.state.user.email
            })
            .then(response => {
                if(response.data.password == this.user.password){
                    this.checkingPassword = false;
                }else{
                    this.showAlert = true;
                }
            })
        },
        closeAlert() {
            this.showAlert = false;
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
</style>