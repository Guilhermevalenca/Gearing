<template>
<h1>Seus dados:</h1>
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
        if(!this.$store.state.user.auth){
            this.$router.push('/')
        }
    }
}
</script>