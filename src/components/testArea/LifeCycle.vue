<template>
    <div>
        <h1>Hello World</h1>
        {{ name }}
    </div>
</template>

<script>
export default{
    data() {
        return {
            name: 'Guilherme Valença'
        }
    },
    beforeCreate() {
        console.log('before create');
        console.log('Estado:',this.name);
    },
    created() {
        console.log('created');
        console.log('Estado:',this.name);
        console.log('DOM:',this.$el);
    },
    beforeMount() {
        console.log('before mount');
        console.log('Estado:',this.name);
        console.log('DOM:',this.$el);
    },
    mounted() {
        console.log('mounted');
        console.log('Estado:',this.name);
        console.log('DOM:',this.$el);
    },
    beforeUnmount() {
        console.log('before unmount');
        console.log('Estado:',this.name);
        console.log('DOM:',this.$el);
    },
    unmounted() {
        console.log('unmounted');
        console.log('Estado:',this.name);
        console.log('DOM:',this.$el);
    },
    watch: {

    },
    computed: {

    },
    methods: {

    }
}
</script>