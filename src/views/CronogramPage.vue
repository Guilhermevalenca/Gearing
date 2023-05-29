<template>
    <div>
        <h1>Hello, i am cronogram</h1>
    </div>
</template>
<script>
export default{
    beforeCreate() {
        this.$authUser();
    }
}
</script>