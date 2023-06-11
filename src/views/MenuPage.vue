<template>
  <h1>Destaques:</h1>
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
  },
  methods: {
      
  }
}
</script>
