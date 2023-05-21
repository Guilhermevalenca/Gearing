<template>
    <div>
        <input type="text" v-model="name">
        {{ name }}
    </div>
    <br><br><br>
    <div>
        <select v-model="pageCount">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
        </select>
    </div>
    <div>
        <h2>Operações matematicas:</h2>
        <input type="number" v-model="number1" placeholder="Primeiro numero">
        <input type="number" v-model="number2" placeholder="Segundo numero">
        <div v-if="number1 && number2">
            <h2>Soma:</h2>
            <p v-show="number2 != 0">{{ number1 + number2 }}</p>
            <h2>subtração:</h2>
            <p v-show="number2 != 0">{{ number1 - number2 }}</p>
            <h2>Multiplicação:</h2>
            <p v-show="number2 != 0">{{ number1 * number2 }}</p>
            <h2>Divisão:</h2>
            <p v-show="number2 != 0">{{ number1 / number2 }}</p>
        </div>
    </div><br><br><br>
    <div>
        <input type="text" v-model="user.first_name" placeholder="Primeiro nome">
        <input type="text" v-model="user.last_name" placeholder="Ultimo nome"><br><br>
        {{ user.first_name }} {{ user.last_name }}
    </div>
</template>
<script>
    export default{
        name: 'App',
        data() {
            return {
                name: '',
                pageCount: 5,
                number1: null,
                number2: null,
                user: {
                    first_name: 'Guilherme',
                    last_name: 'Valença'
                }
            }
        },
        watch: {
            name(newValue, oldValue) {
                    this.askGetServer(newValue,oldValue);
            },
            pageCount() {
                this.changePage();
            },
            user: {
                handler() {
                    console.log('changed user')
                },
                deep: true
            }
        },
        computed: {

        },
        methods: {
            askGetServer(newValue,oldValue) {
                alert(`nome antigo:${oldValue}, nome novo:${newValue}`);
            },
            changePage() {
                console.log('realizando ajax');
            }
        }
    }
</script>