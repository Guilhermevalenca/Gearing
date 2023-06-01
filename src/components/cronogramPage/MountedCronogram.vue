<template>
    <div>
        <h1>Montando cronograma</h1>
    </div>
    <div class="matters" v-for="(matter,index) in this.$store.state.subjects" :key="index">
        <label>
            {{ matter }}
        </label>
    </div>
</template>

<style scoped>
    .matters{
        display: flex;
    }
</style>