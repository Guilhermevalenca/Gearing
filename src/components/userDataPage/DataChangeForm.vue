<template>
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
        <form class="form" @submit.prevent="updateData()">
            <label>
                Nome de usuario:
                <input type="text" v-model="newUserData.username" placeholder="digite seu novo nome de usuario">
            </label>
            <label>
                nova senha:
                <input :class="{'form-password' : differentPasswords}" type="password" v-model="newUserData.password" placeholder="Nova senha" minlength="6" required>
            </label>
            <label>
                Confirme sua nova senha:
                <input :class="{'form-password' : differentPasswords}" type="password" v-model="newUserData.confirmePassword" placeholder="confirme sua nova senha" required> 
            </label>
            <input type="submit" value="alterar dados">
        </form>
        <button @click="deleteUser()">deletar conta</button>
    </div>
</template>

<script>
import axios from 'axios';
import AlertPassword from './AlertPassword.vue'
import Swal from 'sweetalert2';


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
                username: this.$store.state.user.username,
                password: '',
                confirmePassword: ''
            },
            checkingPassword: true,
            showAlert: false,
            differentPasswords: false
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
        },
        updateData() {
            if(this.newUserData.password == this.newUserData.confirmePassword){
                Swal.fire({
                    title: 'Dados prontos para serem alterados',
                    text: 'Seus dados serão alterados, mas não se preocupe que em qualquer momento você poderá alteralos novamente!',
                    showCancelButton: true,
                    confirmButtonText: 'Tenho certeza',
                    cancelButtonText: 'Não tenho certeza'
                })
                .then(result => {
                    if(result.isConfirmed){
                        axios.post('http://localhost:8000/user/updateUserData.php',{
                            email: this.$store.state.user.email,
                            name: this.newUserData.username,
                            password: this.newUserData.password
                        })
                        .then(response => {
                            if( (response.data).result == "true"){
                                this.$router.push('/menu')
                            }else{
                                Swal.fire('erro','Não foi possivel alterar seus dados');
                                axios.post('http://localhost:8000/log/registerErro.php',{
                                    erro: (response.data).problem
                                })
                            }
                        })
                    }
                })
                
            }
        },
        deleteUser() {
            Swal.fire({
                title: 'Tem certeza?',
                text: 'Essa ação apagará todos os seus dados permanentemente',
                showCancelButton: true,
                confirmButtonText: 'Tenho certeza',
                cancelButtonText: 'Não tenho certeza'
            })
            .then(result => {
                if(result.isConfirmed){
                    axios.post('http://localhost:8000/user/deleteUser.php',{
                        email: this.$store.state.user.email,
                        idSession: localStorage.getItem('idSession')
                    })
                    .then(response => {
                        if( (response.data).result == "deleted user"){
                            Swal.fire('Usuario deletado','Seu usuario foi deletado com sucesso');
                            this.$router.push('/')
                            localStorage.removeItem('idSession')
                        }else if( (response.data).result == "user not deleted"){
                            Swal.fire('Usuario nao deletado','Por alguma razão inesperada nao foi possivel deletar seu usuario');
                            axios.post('http://localhost:8000/log/registerErro.php',{
                                erro: (response.data).problem
                            })
                        }
                    })
                }
            })
        }
    },
    watch: {
        newUserData: {
            handler() {
                if(this.newUserData.confirmePassword && (this.newUserData.password != this.newUserData.confirmePassword)){
                    this.differentPasswords = true
                }else{
                    this.differentPasswords = false
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
.form-password{
    color: red;
}
</style>