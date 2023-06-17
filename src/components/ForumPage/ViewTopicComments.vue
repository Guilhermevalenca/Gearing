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
                <th>
                  <strong>By:</strong>
                  <span>{{ name }}</span>
                </th>
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
                <th>
                  <strong>By:</strong>
                  <span>{{ dataComments.by }}</span>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <span>{{ dataComments.comment }}</span>
                </td>
              </tr>
            </tbody>
          </table>
          <h4>Adicionar comentario</h4>
          <textarea v-model="newComments" cols="30" rows="10"></textarea><br>
          <button @click="addComment()">Adicionar comentario</button>
        </section>
    </div>            
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';

export default {
    data() {
        return {
            newComments: '',
            comments: []
        }
    },
  methods: {
    closeComment() {
        this.$emit("closeComments")
    },
    addComment() {
      axios.post('http://localhost:8000/forum/addCommentChat.php',{
        id: localStorage.getItem('idSession'),
        message: this.newComments,
        name: this.$store.state.user.username,
        title: this.title
      })
      .then(response => {
        if(response.data.success){
          this.comments.push({
            by: this.$store.state.user.username,
            comment: this.newComments
          })
          this.newComments = '';
        }
      })
      .catch(error => {
        console.log(error)
      })
    }    
  },
  created() {
    Swal.fire({
      title: 'carregando comentarios',
      willOpen: () => {
        Swal.showLoading();
      },
      willClose: () => {
        Swal.hideLoading();
      }
    })
    axios.post('http://localhost:8000/forum/chatTopic.php',{
      id: localStorage.getItem('idsession'),
      searchByTitle: this.title,
      searchByEmail: this.email
    })
    .then(response => {
      if(response.data.success){
        Swal.close();
        this.comments = response.data.comments
      }else{
        Swal.fire({
          title: 'error'
        });
        console.log(response.data.error);
      }
    })
    .catch (error => {
      console.log(error)
    })
  },
  props: {
    title: String,
    email: String,
    description: String,
    name: String
  }
};
</script>
  
<style scoped>
</style>
  