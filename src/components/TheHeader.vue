<template>
    <div>

        <img src="https://via.placeholder.com/150" v-bind:alt="imgAll">

        <div 
            v-for="(obj, index) in todo"
            v-bind:key="obj.id"
        >
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
                todo: [
                    {
                        'id': 1,
                        'name': 'Guilherme',
                        'surName': 'Valença'
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