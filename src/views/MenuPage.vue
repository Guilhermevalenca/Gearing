<template>
  <h1>Destaques:</h1>
  <div>
    {{ this.$store.state.user }}
  </div>
  <button @click="personAlert">alerta personalizado</button>
</template>

<script>
import Swal from 'sweetalert2'
export default{
  data() {
    return{
      
    }
  },
  beforeCreate() {
    this.$authUser();
  },
  methods: {
      personAlert() {
        Swal.fire({
        title: 'Sua mae diz:',
        text: 'Va lava prato seu poha do karalho',
        icon: 'Perigooo',
        showCancelButton: true,
        confirmButtonText: 'Estou indo',
        cancelButtonText: 'Não quero'  
      }).then((result) => {
        if (result.isConfirmed) {
          // Executar a ação de exclusão
          this.confirm()
        }
        if(result.isDismissed){
          this.deny()
        }
      })
    },
    confirm() {
      Swal.fire('Ja foi?','seu misera!!!')
    },
    deny(){
      Swal.fire('Oia','preguiçoso de merda!')
    }
  }
}
</script>
