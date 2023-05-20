<template>
    <div>
        <button @click="click()">click</button>
    </div>
    <div>
        <h2>verificados:</h2>
        <div v-for="users in compileTodo"
            :key="users.id"
        >
            {{ users.name }}
        </div>
        <div>
            <h2>nao verificados:</h2>
            <div v-for="users in unCompileTodo" :key="users.id">
                {{ users.name }}
            </div>
        </div>
        <div>
            <h2>verificação de analise (ou analisando/verificando):</h2>
            <div v-for="users in todo" :key="users.id">
                <input type="checkbox" v-model="users.checked"> {{ users.name }}
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        data() {
            return {
                user: {
                    first_name: 'Guilherme',
                    last_name: 'Valença'
                },
                todo: [
                    {
                        'id': 1,
                        'name': 'Guilherme',
                        'surName': 'Valença',
                        'checked': false
                    },
                    {
                        'id': 2,
                        'name': 'Claudiane',
                        'surName': 'Rodrigues',
                        'checked': true
                    }
                ]
            }
        },
        computed: {
           fullName() {
                return `${this.user.first_name} ${this.user.last_name}`
            },
            compileTodo() {
                return this.todo.filter(todo => todo.checked)
            },
            unCompileTodo() {
                return this.todo.filter(todo => !todo.checked)
            }
        },
        methods: {
            click() {
                console.log(this.user)
            }
        }
    }
</script>