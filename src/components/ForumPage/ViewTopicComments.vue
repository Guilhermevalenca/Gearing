<template>
  <div class="window-interaction">
    <div class="window-interaction-content">
        <div>
          <h1>{{ title }}</h1>
          <p>by: {{ creatorName }}</p>
        </div>
        <div>
          <ul v-for="(user,index) in comments" :key="index">
            <th>{{ user.name }}:</th>
            <td>{{ user.comment }}</td>
          </ul>
        </div>
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
                comment: 'ta aqui su aresposta'
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
    axios.post('http://localhost:8000/forum/chatTopic.php', {
      id: localStorage('idSession'),
       
    })
    .then(response => {
      console.log(response);
    })
  },
  props: {
    title: '',
    email: ''
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
  