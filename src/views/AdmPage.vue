<template>
    <div>
        <h1>Aba administrativar em produção</h1>
    </div>
    <div>
        <button @click="() => {showListUser = !showListUser}">
            {{ showListUser ? 'Ocultar todos os usuarios' : 'mostrar todos os usuarios'}}
        </button>
    </div>
    <div>
        <section v-if="showListUser">
            <h1>Listand usuarios:</h1>
            <ListUser />
        </section>
        <section>
            <h1>forms para adicionar um novo administrados</h1>
        </section>
        <section>
            <h1>forms para emitir um alert para todos os usuarios</h1>
        </section>
    </div>
</template>

<script>
import ListUser from '@/components/AdmPage/ListUser.vue'
import axios from 'axios'

export default{
    components: {ListUser},
    data(){
        return{
            showListUser: false
        }
    },
    beforeCreate() {
        let idSession = localStorage.getItem('idSession');
        if(idSession){
            axios.post(`${this.$store.state.req.api}/authorizationActions/checkAdm.php`,{
                id: idSession
            })
            .then(response => {
                if(!response.data.success){
                    console.log(response.data.error)
                    this.$router.push('/')
                }
            })
            .catch(error => {
                console.log(error)
                this.$router.push('/')
            })
        }else{
            this.$router.push('/')
        }
    }
}
</script>