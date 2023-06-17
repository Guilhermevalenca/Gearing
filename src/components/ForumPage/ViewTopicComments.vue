<template>
  <div class="window-interaction">
    <div class="window-interaction-content">
        <section>
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
        <section>
          <table>
            <thead>
              <tr>By:</tr>
              <td>Nome da pessoa</td>
            </thead>
            <tbody>
              <tr>
                <td>Comentario</td>
              </tr>
            </tbody>
          </table>
          <textarea cols="30" rows="10"></textarea>
        </section>
    </div>
    <button class="window-interaction-close" @click="closeWindowsInteraction()">X</button>
  </div>             
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            creatorName: '',
            comments: [
              {
                name: 'Guilherme',
                comment: 'nao entendi sua pergunta, mas...'
              },
              {
                name: 'Claudiane',
                comment: 'ta aqui sua resposta'
              }
            ]
        }
    },
  methods: {
        closeWindowsInteraction() {
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

.window-interaction-content {
    background-image: url("@/assets/css/backgrounds/gearingBackground.jpeg");
    background-size: 100%;
    padding: 20px;
}

.window-interaction-close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 18px;
    border: none;
    background: transparent;
    cursor: pointer;
}
</style>
  