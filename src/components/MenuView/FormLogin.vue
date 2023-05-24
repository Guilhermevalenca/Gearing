<template>
<div class="formulario">
    <form @submit.prevent="authUser()">
        <label>
            E-mail:
            <input type="email" v-model="login" placeholder="E-mail">
        </label>
        <label>
            Senha:
            <input type="password" v-model="password" placeholder="Senha">
        </label>
        <label>
            <input type="submit">
        </label>
    </form>
</div>
</template>

<script>
import axios from "axios";
    export default{
        data() {
            return{
                login: '',
                password: ''
            }
        },
        methods: {
            authUser() {
                axios.post('http://localhost:8000/user/authUser.php', {
                    login: this.login,
                    password: this.password
                })
                .then(response => {
                    console.log(response.data);
                })
            }
        }
    }
</script>