<template>
  <div>
    <h1>Resposta HTML</h1>
    <div>
      {{ respostaHTML }}
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      respostaHTML: ''
    };
  },
  mounted() {
    axios.get('http://localhost:8000')
      .then( (response) => {
        this.respostaHTML = response.data;
      })
  }
};
</script>
