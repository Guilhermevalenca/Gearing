<template>
    <div class="session">
      <button @click="() => {showAddComment = true}">adicionar comentario</button>
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
        </section>
        <section class="window-interaction" v-if="showAddComment">
          <div class="window-content">
            <button class="window-close" @click="() => {showAddComment = false}">X</button>
            <h2>Adicionar comentario</h2>
            <h4>aqui voce adiciona seu comentario sobre o assunto {{ title }}</h4>
            <textarea v-model="newComments" cols="30" rows="10"></textarea><br>
            <button @click="addComment()">Adicionar comentario</button>        
          </div>
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
            comments: [],
            showAddComment: false
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
          this.showAddComment = false;
        }else{
          console.log(response);
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
.window-interaction {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: flex;
  align-items: center;
  justify-content: center;
}
.window-content {
  background-image: url("@/assets/css/backgrounds/gearingBackground.jpeg");
  padding: 20px;
}
.window-close, .session-close{
  position: relative;
  left: 15em;
  width: 2.5em;
}
</style>
  