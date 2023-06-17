<template>
    <div class="session">
      <button class="session-close" @click="closeComment()">X</button>
        <section class="session-topic">
          <h4>Topico e descrição</h4>
          <table>
            <thead>
              <tr>
                <th>{{ title }}</th>
              </tr>
              <tr>
                <th>By:</th>
                <td>{{ email }}</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ description }}</td>
              </tr>
            </tbody>
          </table>
        </section>
        <section class="session-comment">
          <h4>Sessão de comentarios</h4>
          <table v-for="(dataComments, index) in comments" :key="index">
            <thead>
              <tr>
                <th>By:</th>
                <td>{{ dataComments.by }}</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ dataComments.comment }}</td>
              </tr>
            </tbody>
          </table>
          <h4>Adicionar comentario</h4>
          <textarea v-model="newComments" cols="30" rows="10"></textarea><br>
          <button>Adicionar comentario</button>
        </section>
    </div>            
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            newComments: '',
            comments: [
              {
                by: 'Guilherme',
                comment: 'nao entendi sua pergunta, mas...'
              },
              {
                by: 'Claudiane',
                comment: 'ta aqui sua resposta'
              }
            ]
        }
    },
  methods: {
        closeComment() {
            this.$emit("closeComments")
        }
  },
  created() {
    axios.get('http://localhost:8000/forum/chatTopic.php')
    .then(response => {
      console.log(response);
    })
    .catch (error => {
      console.log(error)
    })
  },
  props: {
    title: String,
    email: String,
    description: String
  }
};
</script>
  
<style scoped>
</style>
  