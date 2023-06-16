<template>
  <div class="window-interaction">
    <div class="window-interaction-content">
        <h3>Comentários</h3>
        <!-- Conteúdo dos comentários -->
        <p>So adicionando textos aleatorios</p>
        <p>testando novos textos</p>
        <input type="text" placeholder="seu comentario">

    </div>
    <button class="window-interaction-close" @click="closeWindowsInteraction()">X</button>
  </div>             
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            
        };
    },
  methods: {
        closeWindowsInteraction() {
            this.$emit("closeComments")
        }
  },
  created() {
    axios.post('http://localhost:8000/')
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
  