<template>
    <header class="header">
        <h1 class="title" v-if="$slots.title">
            <slot name="title" />
        </h1>
        <div class="description" v-if="$slots.description">
            <slot name="description" />
        </div>
        <div class="content" v-if="$slots.content">
            <slot name="content" />
        </div>
    </header>
</template>

<script>
    export default{
        data() {
            return{
                
            }
        }
    }
</script>
<style>
    .header{
        background-color: #000;
        color: #fff;
    }
</style>