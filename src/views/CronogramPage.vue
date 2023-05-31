<template>
    <div>
        <h1>Hello, i am cronogram</h1>
    </div>
    <div>
        <CreateCronogram />
    </div>
    <div>
        <ViewCronogram />
    </div>
</template>
<script>
import CreateCronogram from '@/components/cronogramPage/CreateCronogram.vue';
import ViewCronogram from '@/components/cronogramPage/ViewCronogram.vue';

export default{
    beforeCreate() {
        this.$authUser();
    },
    components: { CreateCronogram, ViewCronogram }
}
</script>