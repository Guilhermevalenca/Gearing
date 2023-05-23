<template>
    <div>
        usuarios
        <button @click="login()">exibir get</button>
        <h1>Get: {{ $route.query.get }} </h1>
    </div>
</template>
 
<script>
    export default{
        data() {
            return{
                testar: true
            }
        },
        methods: {
            login() {
                if(this.testar){
                    this.$router.push(`/usuarios/:${this.$route.params.id}?get=90`);
                }else{
                    alert('você nao esta logado!!!')
                }
            }
        }
    }
</script>