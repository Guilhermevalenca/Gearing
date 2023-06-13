<template>
  <div class="window-interaction">
    <div class="window-interaction-content">
        <h3>Comentários</h3>
        <!-- Conteúdo dos comentários -->
        <p>So adicionando textos aleatorios</p>
    </div>
    <button class="window-interaction-close" @click="closeWindowsInteraction()">X</button>
  </div>
</template>

<script>
export default {
    data() {
        return {
            
        };
    },
  methods: {
        closeWindowsInteraction() {
            this.$emit("closeComments")
        }
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
    background-color: #fff;
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
  