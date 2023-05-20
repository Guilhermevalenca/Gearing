<template>
  <TheHeader 
    v-show="showHeader"
  />
  <ModelConcept v-if="false"/>
  <TestEvent v-if="false" />
  <ComputedProperties />
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
import ModelConcept from './components/ModelConcept.vue'
import TestEvent from './components/TestEvent.vue'
import ComputedProperties from './components/ComputedProperties.vue'

export default {
  name: 'App',
  components: {
    HelloWorld,
    TheHeader,
    ModelConcept,
    TestEvent,
    ComputedProperties
},
  data() {
    return{
      showHeader: false,
      accessLevel: 'admin'
    }
  }
}
</script>

