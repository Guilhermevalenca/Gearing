<template>
  <TheHeader 
    v-if="showHeader"
  />
  <div 
    v-if="accessLevel === 'admin'"
  >
      Admin
  </div>
  <div v-else-if="accessLevel === 'marketing'">Marketing</div>
  <div v-else>User</div>
  <img 
    alt="Vue logo" 
    src="./assets/logo.png"
  >
  <HelloWorld msg="Welcome to Your Vue.js App"/>
</template>
<script>
import HelloWorld from './components/HelloWorld.vue'
import TheHeader from './components/TheHeader.vue'

export default {
  name: 'App',
  components: {
    HelloWorld,
    TheHeader
  },
  data() {
    return{
      showHeader: true,
      accessLevel: 'admin'
    }
  }
}
</script>

