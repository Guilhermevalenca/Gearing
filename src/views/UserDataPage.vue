<template>
    <div>
        <DataChangeForm />
    </div>
</template>

<script>
import DataChangeForm from '@/components/userDataPage/DataChangeForm.vue'

export default{
    data() {
        return{

        }
    },
    components: {
        DataChangeForm
    },
    beforeCreate() {
        this.$authUser()
    }
}
</script>