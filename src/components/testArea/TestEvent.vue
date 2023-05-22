<template>
    <h2>events teste</h2>
    <form action="http://google.com" 
        @submit.prevent="onSubmit()"
    >
        <input v-model="senha" type="text" >
        <input v-model="confirme" @keyup="erroMensagem()" type="text">
        <button type="submit">enviar</button><br>
    </form>
    <div><p v-show="mensagem" class="mensagemErro">senhas diferentes</p></div>
    <div @mouseover="mouseEventOn()" @mouseout="mouseEventOff()">
        passe o mouse
    </div>
</template>
<script>
    export default{
        name: 'App',
        data() {
            return{
                senha: '',
                confirme: '',
                mensagem: false
            }
        },
        methods: {
            onClick() {
                console.log('click');
            },
            mouseEventOn() {
                console.log('mouse em cima da div')
            },
            mouseEventOff() {
                console.log('mouse saiu da div')
            },
            onSubmit() {
                console.log('submit')
            },
            erroMensagem() {
                if(this.senha != this.confirme){
                    this.mensagem = true
                }else{
                    this.mensagem = false
                }
            }
        }
    }
</script>
<style>
    .mensagemErro{
        color: red;
    }
</style>