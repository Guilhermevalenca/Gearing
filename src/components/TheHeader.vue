<template>
    <div>
        <h1 :class="{ 'title': true, 'title-home': isHome }">Meu titulo</h1>

        <p :class="['text']">testando paragrafo</p>

        <img src="https://via.placeholder.com/150" v-bind:alt="imgAll">

        <div 
            v-for="(obj, index) in todo"
            v-bind:key="obj.id"
        >
        <img v-if="obj.photo" v-bind:src="obj.photo" alt="" class="imagemGoogle"><br>
        {{ index }} - {{ obj.name }}
        </div>

    </div>
</template>

<script>
    export default{
        name: 'App',
        data() {
            return{
                imgAll: 'foto de Guilherme',
                isHome: true,
                pClass: 'text',
                classVar: 'title',
                todo: [
                    {
                        'id': 1,
                        'name': 'Guilherme',
                        'surName': 'Valença',
                        'photo': 'https://assets.b9.com.br/wp-content/uploads/2018/02/Google-Imagens.png'
                    },
                    {
                        'id': 2,
                        'name': 'Claudiane',
                        'surName': 'Valença'
                    }
                ]
            }
        }
    }
</script>
<style>
    .imagemGoogle{
        width: 90px;
    }
    .title{
        color:blue;
    }
    .title-home{
        font-size: 40px;
        color: red;
    }
    .text{
        color: blueviolet;
        font-size: 20px;
    }
</style>