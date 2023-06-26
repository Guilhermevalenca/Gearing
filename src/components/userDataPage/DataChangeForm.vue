<template>
    <section v-if="checkingPassword">
        <label v-if="showAlert">
            <AlertPassword @close="closeAlert()" />
        </label>
        <form @submit.prevent="check()">
            <label>Digite sua senha para visualizar seus dados:</label>
            <input type="password" v-model="user.password" placeholder="Digite sua senha">
            <button type="submit">Enviar</button>
        </form>
    </section>
    <section v-if="!checkingPassword">
        <form class="form" @submit.prevent="updateData()">
            <label>
                Email:
            </label>
            <input type="email" v-model="newUserData.email" placeholder="Digite seu email">
            <label>
                Nome de usuário:
            </label>
            <input type="text" v-model="newUserData.username" placeholder="Digite seu novo nome de usuário">
            <label>
                Nova senha:
            </label>
            <input :class="{'form-password' : differentPasswords}" type="password" v-model="newUserData.password" placeholder="Nova senha" minlength="6">
            <label>
                Confirme sua nova senha:
            </label>
            <input :class="{'form-password' : differentPasswords}" type="password" v-model="newUserData.confirmePassword" placeholder="Confirme sua nova senha"> 
            <button type="submit">Alterar dados</button>
        </form>
        <button @click="deleteUser()">Deletar conta</button>
    </section>
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
                email: '',
                username: this.$store.state.user.username,
                password: '',
                confirmePassword: ''
            },
            checkingPassword: true,
            showAlert: false,
            differentPasswords: false,
        }
    },
    methods: {
        check() {
            axios.post('http://localhost:8000/user/userData.php', {
                email: this.$store.state.user.email,
                password: this.user.password
            })
            .then(response => {
                if(response.data.success){
                    this.checkingPassword = false;
                }else{
                    this.showAlert = true;
                    console.log(response.data.error);
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
                    text: 'Seus dados serão alterados, mas não se preocupe, a qualquer momento você poderá altera-los novamente!',
                    showCancelButton: true,
                    confirmButtonText: 'Tenho certeza',
                    cancelButtonText: 'Não tenho certeza',
                    customClass: {
                                popup: 'swal-popup-custom',
                                title: 'swal-title-custom',
                                htmlContainer: 'swal-html-container-custom',
                            }
                })
                .then(result => {
                    if(result.isConfirmed){
                        if(!this.newUserData.password){
                            this.newUserData.password = this.user.password; 
                        }
                        if(!this.newUserData.email){
                            this.newUserData.email = this.$store.state.user.email;
                        }
                        axios.post('http://localhost:8000/user/updateUserData.php',{
                            email: this.newUserData.email,
                            name: this.newUserData.username,
                            password: this.newUserData.password,
                            id: localStorage.getItem('idSession')
                        })
                        .then(response => {
                            if( (response.data).result == "true"){
                                this.$router.push('/menu')
                            }else{
                                Swal.fire({
                                    title:'Erro',
                                    text:'Não foi possível alterar seus dados',
                                    customClass: {
                                                popup: 'swal-popup-custom',
                                                title: 'swal-title-custom',
                                                htmlContainer: 'swal-html-container-custom',
                            }
                                });
                                axios.post('http://localhost:8000/log/registerErro.php',{
                                    erro: (response.data).problem
                                })
                            }
                            this.newUserData.password = ''
                            this.newUserData.confirmePassword = ''
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
                cancelButtonText: 'Não tenho certeza',
                customClass: {
                                popup: 'swal-popup-custom',
                                title: 'swal-title-custom',
                                htmlContainer: 'swal-html-container-custom',
                            }
            })
            .then(result => {
                if(result.isConfirmed){
                    axios.post('http://localhost:8000/user/deleteUser.php',{
                        id: localStorage.getItem('idSession')
                    })
                    .then(response => {
                        if( (response.data).result == "deleted user"){
                            Swal.fire({
                            title:'Usuário deletado',
                            text:'Seu usuário foi deletado com sucesso',
                            customClass: {
                                popup: 'swal-popup-custom',
                                title: 'swal-title-custom',
                                htmlContainer: 'swal-html-container-custom',
                            }
                        });
                            this.$router.push('/')
                            localStorage.removeItem('idSession')
                        }else if( (response.data).result == "user not deleted"){
                            Swal.fire({
                                title:'Usuário não deletado',
                                text:'Por alguma razão inesperada não foi possível deletar seu usuário',
                                customClass: {
                                popup: 'swal-popup-custom',
                                title: 'swal-title-custom',
                                htmlContainer: 'swal-html-container-custom',
                            }
                            });
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
    },
    mounted() {
        Swal.fire({
            title: 'Aviso:',
            text: 'Dados que não forem alterados permaneceram com o mesmo valor',
            customClass: {
                popup: 'swal-popup-custom',
                title: 'swal-title-custom',
                htmlContainer: 'swal-html-container-custom',
            }
        })
    }
}
</script>

<style scoped>
div{
    padding: 2em;
}
label{
    padding: 0em;
}
.form-password{
    color: red;
}
    form{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-flow: column wrap;
        gap: 0em;
    }
    input{
        padding-top: 0.25em;
        text-align: center;
        border-style: solid;
        border-radius: 0.5em;
        border-color: #000;
        height: 1.5em;
        width: 15em;
    }
    input::-webkit-input-placeholder{
        text-align: center;
    }
    input::-moz-placeholder{
        text-align: center;
    }
</style>