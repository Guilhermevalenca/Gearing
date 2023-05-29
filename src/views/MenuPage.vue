<template>
  <div>
    {{ this.$store.state.user }}
  </div>
</template>

<script>
export default{
  data() {
    return{
      
    }
  },
  beforeCreate() {
    this.$authUser();
  }
}
</script>