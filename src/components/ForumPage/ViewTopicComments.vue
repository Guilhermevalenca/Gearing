<template>
  <div class="session">
    <h1>.Tópico.</h1>
    <section class="session-topic">
      <div class="topic-description-container">      
        <table>
          <thead>
            <tr>
              <th class="title-topic">{{ title }}</th>
              <th>
                <button v-if="this.$store.state.user.auth && email == this.$store.state.user.email" @click="viewEditTopic()">
                  <FA icon="pencil" />
                </button>
              </th>
              <th>
                <button class="add-comment" @click="() => {this.$store.state.user.auth ? showWindow.addComment = true : actionDenied()}">
                  <FA icon="reply"/>
                </button>
              </th>
              <th>
                <button class="session-close" @click="closeComment()">✖</button>
              </th>
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
              <th>
                <button @click="() => {showWindow.EditComment.show = true; showWindow.EditComment.id = dataComments.id}" 
                v-if="dataComments.email == this.$store.state.user.email">Editar comentario</button>
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
      <section class="window-interaction" v-if="showWindow.addComment || showWindow.EditComment.show || showWindow.editTopic">
        <div class="window-content">
          <button class="window-close" @click="closeWindow()">X</button>
          <section v-if="showWindow.addComment">
            <h2>Adicionar comentario</h2>
            <h4>aqui voce adiciona seu comentario sobre o assunto {{ title }}</h4>
            <textarea v-model="newComments" cols="30" rows="10"></textarea><br>
            <button @click="addComment()">Adicionar comentario</button>
          </section>
          <section v-if="showWindow.EditComment.show">
            <EditComment @closeWindow="() => {showWindow.EditComment.show = false; showUpdatedComments()}" :title="title" :id="showWindow.EditComment.id"/>
          </section>
          <section>
            <EditTopic v-if="showWindow.editTopic" :title="title" :message="description"/>
          </section>
        </div>
      </section>
  </div>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';
import EditComment from './EditComment.vue';
import EditTopic from './EditTopic.vue';

export default {
  components: {EditComment, EditTopic},
  data() {
      return {
          newComments: '',
          comments: [],
          showWindow: {
            addComment: false,
            EditComment: {
              show: false,
              id: ''
            },
            editTopic: false
          }
      }
  },
methods: {
  viewEditTopic() {
    this.showWindow.editTopic = true;
  },
  actionDenied() {
    Swal.fire({
      title: 'Ação negada',
      text: 'Apenas usuarios cadastrados tem permissão para interagir com o forum',
      customClass: {
        popup: 'swal-popup-custom',
        title: 'swal-title-custom',
        htmlContainer: 'swal-html-container-custom',
      }
    })
  },
  closeWindow() {
    this.showWindow.addComment = false; 
    this.showWindow.EditComment.show = false;
    this.showWindow.editTopic = false;
  },
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
        this.showUpdatedComments()
        this.newComments = '';
        this.showWindow.addComment = false;
      }else{
        console.log(response);
      }
    })
    .catch(error => {
      console.log(error)
    })
  },
  showUpdatedComments() {
    Swal.fire({
      title: 'carregando comentarios',
      showConfirmButton: false,
      willOpen: () => {
        Swal.showLoading();
      },
      willClose: () => {
        Swal.hideLoading();
      },
      customClass: {
        popup: 'swal-popup-custom',
        title: 'swal-title-custom',
        htmlContainer: 'swal-html-container-custom',
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
  }
},
created() {
  this.showUpdatedComments()
},
props: {
  title: String,
  email: String,
  description: String,
  name: String,
  date: String
}
};
</script>

<style scoped>
.add-comment{
position:absolute;
left: 40em;
top: 2em;
margin:0em;
}
.session-close{
position:absolute;
left: 50em;
top: 2em;
margin:0em;
border-radius: 100%;
}
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
.window-close{
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
padding: 2em;
border-style: solid;
border-radius: 0.6em;
border-width: 0.1em;
border-color:  rgba(100, 2, 223, 1) ;
}
.session-topic{
display: inline-block;
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
