<template>
    <div class="session">
      <button @click="() => {showAddComment = true}">adicionar comentario</button>
      <button class="session-close" @click="closeComment()">X</button>
      <h1>.Tópico.</h1>
      <section class="session-topic">
          <div class="topic-description-container">      
          <table>
            <thead>
              <tr>
                <th class="title-topic">{{ title }}</th>
              </tr>
              <tr>
                <th class="nickname">
                  <strong class="username">Criado por </strong>
                  <span class="data">{{ name }}</span> <br>
                  <strong class="date">Em </strong>
                  <span class="data">{{ date }}</span>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ description }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        </section>
        <h1>.Respostas.</h1>
        <section class="session-comment">
          <div class="comment-box-container">
          <table class="comment-box" v-for="(dataComments, index) in comments" :key="index">
            <thead>
              <tr>
                <th>
                  <strong class="username">Resposta de </strong>
                  <span class="data">{{ dataComments.by }}</span> <br>
                  <strong class="date">Em </strong>
                  <span class="data">{{ dataComments.date }}</span>
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
        </div>
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
    name: String,
    date: Date
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
.session-comment{
  display: inline-block;
  position:relative;
  text-align: justify;
}
h1{
  font-size: 1.2em;
}
tbody{
  text-align: center;
  background-color: black;
}
th{
  padding-left: 1em;
}
td{
  max-width: 40em;
  text-align: center;
  padding: 1em;
  border-style: solid;
  border-radius: 0.6em;
  border-width: 0.1em;
  border-color:  rgba(100, 2, 223, 1) ;
}
.session-topic{
  position:relative;
  align-content: center;
  padding-top: 1em;
  padding-bottom: 2em;
}
.topic-description-container table{
 background-color: black;
 border-style: solid;
 border-color: rgba(100, 2, 223, 1) ;
 border-width: 0.1em;
 border-radius: 0.8em;
 min-width: 50em; 
 min-height: 5em;
 max-width: 50em;
 max-height: none; 
 word-wrap: break-word;
 word-break: keep-all;
}

.comment-box-container table{
background-color: black;
 border-style: solid;
 border-color: rgba(100, 2, 223, 1) ;
 border-width: 0.1em;
 border-radius: 0.8em;
 min-width: 50em; 
 min-height: 5em;
 max-width: 50em;
 max-height: none; 
 word-wrap: break-word;
 word-break: keep-all;
}
.data{
  font-size: 0.8em;
  color:  rgba(100, 2, 223, 1) ;
}
.username, .date{
  font-size: 0.8em;
}
.title-topic{
  font-size: 1.2em;
}
</style>
  