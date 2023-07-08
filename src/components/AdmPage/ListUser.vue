<template>
<section class="all-users">
    <div class="all-users-adms">
        <h2 class="all-users-titles">administradores</h2>
        <table>
            <thead>
                <tr>
                    <th>Nome:</th>
                    <th>Email:</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(adms,  index) in allUsers.adms" :key="index">
                    <td>{{ adms.user_name }}</td>
                    <td>{{ adms.user_email }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="all-users-others">
        <h2 class="all-users-titles">Outros usuarios</h2>
        <table>
            <thead>
                <tr>
                    <th>Nome:</th>
                    <th>Email:</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(others, index) in allUsers.others" :key="index">
                    <td>{{ others.user_name }}</td>
                    <td>{{ others.user_email }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
</template>

<script>
import axios from 'axios'
import Swal from 'sweetalert2'

export default{
    data(){
        return{
            allUsers: {
                adms: [],
                others: []
            }
        }
    },
    methods: {
        usersAdms() {
            axios.post(`${this.$store.state.req.api}/adm/ListAllUsers.php`,{
                id: localStorage.getItem('idSession')
            })
            .then(response => {
                if(response.data.success){
                    this.allUsers.adms = response.data.users.adms
                    this.allUsers.others = response.data.users.others
                }else{
                    Swal.fire({
                        title: 'Error',
                        text: 'Aconteceu um error inesperado ao tentar listar os usuarios',
                        customClass: {
                            popup: 'swal-popup-custom',
                            title: 'swal-title-custom',
                            htmlContainer: 'swal-html-container-custom',
                        },
                        confirmButtonText: 'tentar novamente',
                        showCancelButton: true
                    })
                    .then(result => {
                        if(result.isConfirmed){
                            this.usersAdms();
                        }
                    })
                }
            })
        }
    },
    mounted() {
        this.usersAdms()
    }
}
</script>

<style scoped>
.all-users{
    display: flex;
    justify-content: center;
}
.all-users-adms, .all-users-others{
    border-style: solid;
    border-width: 0.2em;
    padding: 0.5em;
    margin: 2em;
}
.all-users-titles{
    margin: 0;
    padding: 2em;
}
</style>