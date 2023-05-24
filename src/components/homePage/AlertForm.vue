<template>
    <div>
        <slot />
        <button @click="closeAlert()"> X </button>
    </div>
</template>

<script>
    export default{
        data() {
            return {

            }
        },
        methods: {
            closeAlert() {
                this.$emit('close');
            }
        }
    }
</script>

<style scoped>
    div{
        padding: 5px;
        border-radius: 6px;
        color: white;
        background-color: red;
        display: flex;
        justify-content: space-between;
        width: 20em;
    }
</style>