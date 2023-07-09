<template>
<div class="session">
  <h1>.Tópico.</h1>
  <section class="session-topic">
    <div class="topic-description-container">      
      <table>
        <thead>
              <div class="topic-control"> 
              <button class="edit-topic-description" v-if="this.$store.state.user.auth && this.topic.email == this.$store.state.user.email" @click="viewEditTopic()">
                <FA icon="pencil" /> Editar
              </button>
              <button class="delete-topic" @click="deleteTopic()" v-if="this.$store.state.user.auth && this.topic.email == this.$store.state.user.email">
                <FA icon="trash"/> Apagar
              </button>
              <button class="add-reply" @click="() => {this.$store.state.user.auth ? showWindow.addComment = true : actionDenied()}">
                <FA icon="reply"/> Responder
              </button>
              <button class="session-close" @click="closeComment()">✖</button>
              </div>
              <tr>
            <th class="title-topic">{{ topic.title }}</th>
          </tr>
          <tr>
            <th>
              <strong class="topic-author">Criado por </strong>
              <span class="topic-info">{{ topic.name }}</span> <br>
              <strong class="topic-author">Em </strong>
              <span class="topic-info">{{ topic.date }}</span>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="description-topic">{{ topic.description }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    </section>
    <h1>.Respostas.</h1>
    <section class="session-reply">
      <div class="reply-box-container">
      <table class="comment-box" v-for="(dataComments, index) in comments" :key="index">
        <thead>
          <div class="reply-control">
          <button class="edit-reply" @click="() => {showWindow.EditComment.show = true; showWindow.EditComment.id = dataComments.id}" 
          v-if="dataComments.email === this.$store.state.user.email">
          <FA icon="pencil" /> Editar</button>
          <button class="delete-reply" @click="deleteComment(dataComments.id)" v-if="dataComments.email === this.$store.state.user.email">
            <FA icon="trash" /> Apagar
          </button>
          </div>
          <tr>
            <th class="reply-info">
              <strong class="reply-author">Resposta de </strong>
              <span class="topic-info">{{ dataComments.by }}</span> <br>
              <strong class="reply-author">Em </strong>
              <span class="topic-info">{{ dataComments.date }}</span>
            </th>  
          </tr>
        </thead>  
        <tbody>
          <tr>
            <td class="comments-data-description">
              <span>{{ dataComments.comment }}</span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    </section>
    <section class="window-interaction" v-if="showWindow.addComment || showWindow.EditComment.show || showWindow.editTopic">
      <div class="window-content">
        <button class="window-close" @click="closeWindow()">✖</button>
        <section v-if="showWindow.addComment">
          <h2>Adicionar respostas</h2>
          <h4>Aqui você adiciona sua resposta para o tópico {{ title }}</h4>
          <textarea v-model="newComments" cols="110" rows="25"></textarea><br>
          <button @click="addComment()">Adicionar resposta</button>
        </section>
        <section v-if="showWindow.EditComment.show">
          <EditComment :socket="socket" @closeWindow="() => {closeWindow()}" :idTopic="id" :id="showWindow.EditComment.id" :title="this.topic.title"/>
        </section>
        <section>
          <EditTopic :socket="socket" @closeEditTopic="() => {closeWindow()}" v-if="showWindow.editTopic" :title="this.topic.title" :message="this.topic.description" :id="this.id"/>
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
          topic: {
            title: '',
            name: '',
            date: '',
            description: '',
            email: ''
          },
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
  dataTopic() {
    axios.post(`${this.$store.state.req.api}/forum/dataTopic.php`,{
      idTopic: this.id
    })
    .then(response => {
      console.log(response)
      if(response.data.success){
        this.topic = response.data.dataTopic
        this.showUpdatedComments()
      }else{
        Swal.fire({
          title: 'Não é possivel vizualizar este tópico'
        })
        console.log(response.data.error)
        this.closeComment()
      }
    })
  },
  viewEditTopic() {
    this.showWindow.editTopic = true;
  },
  actionDenied() {
    Swal.fire({
      title: 'Ação negada',
      text: 'Apenas usuários cadastrados tem permissão para interagir com o fórum',
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
    axios.post(`${this.$store.state.req.api}/forum/addCommentChat.php`,{
      id: localStorage.getItem('idSession'),
      message: this.newComments,
      name: this.$store.state.user.username,
      title: this.topic.title
    })
    .then(response => {
      if(response.data.success){
        this.socket.emit('view-comment', this.id);
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
      title: 'Carregando comentários',
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
    axios.post(`${this.$store.state.req.api}/forum/chatTopic.php`,{
      id: localStorage.getItem('idsession'),
      searchByTitle: this.topic.title
    })
    .then(response => {
      if(response.data.success){
        Swal.close();
        this.comments = response.data.comments;
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
  deleteTopic() {
    axios.post(`${this.$store.state.req.api}/forum/deleteTopic.php`,{
      idTopic: this.id,
      id: localStorage.getItem('idSession')
    })
    .then(response => {
      if(response.data.success){
        Swal.fire({
          title: 'topico deletado com sucesso',
          customClass: {
            popup: 'swal-popup-custom',
            title: 'swal-title-custom',
            htmlContainer: 'swal-html-container-custom',
          }
        })
        .then(() => {
          this.$emit("closeComments")
        })
      }else{
        Swal.fire({
          title: 'Error',
          text: 'Não foi possivel apagar este topico',
          customClass: {
            popup: 'swal-popup-custom',
            title: 'swal-title-custom',
            htmlContainer: 'swal-html-container-custom',
          }
        })
        console.log(response.data.error)
      }
    })
    .catch(error => {
      console.log(error)
    })
  },
  deleteComment(idComment) {
    axios.post(`${this.$store.state.req.api}/forum/deleteComment.php`,{
      idComment: idComment,
      id: localStorage.getItem('idSession')
    })
    .then(response => {
      if(response.data.success){
        Swal.fire({
          title: 'Resposta deletada com sucesso',
          customClass: {
            popup: 'swal-popup-custom',
            title: 'swal-title-custom',
            htmlContainer: 'swal-html-container-custom',
          }
        })
        .then(() => {
          this.showUpdatedComments();
        })
      }else{
        Swal.fire({
          title: 'Error',
          text: 'Não foi possivel apagar esta resposta',
          customClass: {
            popup: 'swal-popup-custom',
            title: 'swal-title-custom',
            htmlContainer: 'swal-html-container-custom',
          }
        })
        console.log(response.data.error)
      }
    })
    .catch(error => {
      console.log(error)
    })
  }
},
created() {
  this.dataTopic();
},
mounted() {
  this.socket.on('update-comment',(id) => {
    if(id == this.id){
      this.showUpdatedComments();
    }
  })
  this.socket.on('update-topic',(id) => {
    if(id == this.id){
      this.dataTopic();
    }
  })
},
props: {
  id: Number,
  socket: Object
}
};
</script>

<style scoped>

.session{
  margin-top: 4em;
  margin-bottom: 6em;
}
.topic-control{
  padding: 0.6em;
  top: 1em;
  display:flex;
  flex-flow:row-reverse;
  flex-direction: row;
  justify-content: flex-end;
  align-content:flex-end;
  gap:0.4em;
}
.reply-control{
  padding: 0.6em;
  top: 1em;
  display:flex;
  flex-flow:row-reverse;
  flex-direction: row;
  justify-content: flex-end;
  align-content:flex-end;
  gap:0.4em;
}
.session-close{
  border-radius:100%;
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
  z-index: 1;
}
.window-content {
  background-color:black;
  border-style: solid;
  border-radius: 0.6em;
  border-width: 0.1em;
  border-color:  rgba(100, 2, 223, 1) ;
  padding: 20px;
}
.window-close{
  margin: 0em;
  border-radius: 100%;
  position: relative;
  left: 28em;
}
.session-reply{
  display: inline-block;
  position:relative;
  align-content: center;
  text-align: justify;
}
h1{
  font-size: 1.2em;
}
td{
  margin: 0em;
  min-width: 50em; 
  max-width: 50em;
  min-height: 5em;
  max-height: none;
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
  min-width: 50em; 
  max-width: 50em;
  min-height: 5em;
  max-height: none;
  background-color: black;
  border-style: solid;
  border-color: rgba(100, 2, 223, 1) ;
  border-width: 0.1em;
  border-radius: 0.8em;
  word-wrap: break-word;
  word-break: keep-all;
  white-space: pre-wrap;
}

.reply-box-container table{
  min-width: 50em; 
  max-width: 50em;
  min-height: 5em;
  max-height: none;
  background-color: black;
  border-style: solid;
  border-color: rgba(100, 2, 223, 1);
  border-width: 0.1em;
  border-radius: 0.8em;
  word-wrap: break-word;
  word-break: keep-all;
  white-space: pre-wrap;
}
.reply-info{
  position: relative;
  left: 1em;
}
.topic-info{
  font-size: 0.8em;
  color: rgba(133, 26, 186, 1);
}
.topic-author,.reply-author,.date{
  font-size: 0.8em;
}
.title-topic{
  font-size: 1.2em;
}
.description-topic, .comments-data-description{
  text-align: left;
}
</style>
