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

<script>
export default{
    data() {
        return {
            matters: this.$store.state.subjects,
            turns: this.$store.state.turns,
            morningShift: ["06:00","07:00","08:00","09:00","10:00","11:00"],
            afternoonShift: ["12:00","13:00","14:00","15:00","16:00","17:00"],
            nightShift: ["18:00","19:00","20:00","21:00","22:00","23:00"],
            dawnShift: ["00:00","01:00","02:00","03:00","04:00","05:00"]
        }
    }
}
</script>

<style scoped>
    .matters{
        display: flex;
    }
</style>