<template>
  <img src="./assets/logo.png">
  <TheHeader 
    v-show="showHeader"
  />
  <ModelConcept v-if="false"/>
  <TestEvent v-if="false" />
  <ComputedProperties v-if="false" />
  <TestWatch />
  <HelloWorld v-if="false" />
</template>
<script>
import HelloWorld from './components/HelloWorld.vue'
import TheHeader from './components/TheHeader.vue'
import ModelConcept from './components/ModelConcept.vue'
import TestEvent from './components/TestEvent.vue'
import ComputedProperties from './components/ComputedProperties.vue'
import TestWatch from './components/TestWatch.vue'

export default {
  name: 'App',
  components: {
    HelloWorld,
    TheHeader,
    ModelConcept,
    TestEvent,
    ComputedProperties,
    TestWatch
},
  data() {
    return{
      showHeader: false,
      accessLevel: 'admin'
    }
  }
}
</script>

