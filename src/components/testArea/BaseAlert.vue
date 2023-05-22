<template>
    <div :class="baseClass">
        <slot />
        <button @click="onClick()">
            X
        </button>
    </div>
</template>
<script>
export default {
    props: {
        variant: {
            type: String,
            default: ''
        }
    },
    computed: {
        baseClass() {
            return [
                'alert', this.variant ? `alert-${this.variant}` : ''
            ]
        }
    },
    methods: {
        onClick() {
            this.$emit('close');
            console.log('click')
        }
    }
  }
  </script>
<style scoped>
.alert {
    display: flex;
    justify-content: space-between;
    padding: 5px;
    border-radius: 6px;
    color: red;
    width: 350px;
}
.alert-success {
    background-color: red;
    color: white;
}
</style>