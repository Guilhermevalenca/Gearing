<template>
  <div class="logo-container">
   <img src="./assets/css/backgrounds/newLogo.gif" class="logo">
      <h1 class="gearing">Gearing</h1>
      </div>
<header class="navbar">
  <nav class="navigation-option">
    <router-link to="/">Página Inicial</router-link>
    <RouterLink to="/learningStyles">Estilos de Aprendizagem</RouterLink>
    <RouterLink to="/methodology">Metodologias</RouterLink>
    <RouterLink to="/schedule">Cronograma</RouterLink>
    <RouterLink to="/forum">Fórum</RouterLink>
    <div class="animation start-home"></div>
  </nav>
</header>
<main>
  <section>
    <AccessForm />
  </section>
  <section>
    <router-view />
  </section>
</main>
<footer>
  <h1>&copy; Rodapé ainda em produção</h1>
</footer>
</template>

<script>
import AccessForm from './components/App/AccessForm.vue';
import axios from 'axios';
import Swal from 'sweetalert2';

export default{
  name: 'App',
  components: {AccessForm},
  data() {
    return {
      actionAuthUser: this.$route.path
    }
  },
  methods: {
    establishingConnection() {
      axios.get(this.$store.state.req.api)
      .then(response => {
        if(response.data === "OK"){
          Swal.close();
        }
      })
      .catch( () => {
        Swal.fire({
          title: 'Não foi possível conectar-se ao servidor',
          text: 'Algumas das nossas funcionalidades estarão indisponiveis',
          showConfirmButton: true,
          customClass: {
            popup: 'swal-popup-custom',
            title: 'swal-title-custom',
            htmlContainer: 'swal-html-container-custom',
          } 
        })
      })
    }
  },
  beforeMount() {
    this.establishingConnection();
  },
  beforeCreate() {
    this.$checkAuthentication();
  }
}
</script>

<style scoped>
@import url('https://fonts.cdnfonts.com/css/yielding-timber');
.navbar {
  display: flex;
}

.gearing{
  font-family: 'Yielding Timber',sans-serif; 
  font-style: italic;
  width: 4.5em;
  font-size: 3em;
  margin-left:0em;
  background: -webkit-linear-gradient(
    318deg,
    rgba(133, 26, 186, 1) 18%,
    rgb(133, 26, 186, 1) 46%,
    rgba(100, 2, 223, 1) 81%
  );
  background-clip: text;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
.logo-container{
display:flex;
flex-direction: row;
justify-content: center;
align-items:baseline;
padding: 0.1em;
}
.logo {
  width: 2.6em;
  margin:0em;
}
nav{
  border-style: solid;
  border-color: rgba(100, 2, 223, 1);
  border-width: 1px;
  margin: 0px auto 0;
  position: relative;
  width: 800px;
  height: 30px;
  background-color: black;
  border-radius: 8px;
  font-size: 0;
}
nav a {
  line-height: 30px;
  height: 100%;
  font-size: 12px;
  display: inline-block;
  position:relative;
  z-index: 1;
  text-decoration: none;
  text-transform: uppercase;
  text-align: center;
  color: aliceblue;
  font-weight: bold;
  cursor: pointer;
}
nav .animation {
	position: absolute;
	height: 100%;
	top: 0;
	z-index: 0;
	transition: all .5s ease 0s;
	border-radius: 8px;
}
a:nth-child(1) {
	width: 140px;
}
a:nth-child(2) {
	width: 190px;
}
a:nth-child(3) {
	width: 100px;
}
a:nth-child(4) {
	width: 100px;
}
a:nth-child(5) {
	width: 113.3px;
}
a:nth-child(6){
  width: 140px;
}
nav .start-paginaInicial, a:nth-child(1):hover~.animation {
	width: 210px;
	left: 0px;
  background: -webkit-linear-gradient(
    318deg,
    rgba(133, 26, 186, 1) 18%,
    rgb(133, 26, 186, 1) 46%,
    rgba(100, 2, 223, 1) 81%
  );
}
nav .start-learningStyles, a:nth-child(2):hover~.animation {
	width: 190px;
	left: 215px;
  background: -webkit-linear-gradient(
    318deg,
    rgba(133, 26, 186, 1) 18%,
    rgb(133, 26, 186, 1) 46%,
    rgba(100, 2, 223, 1) 81%
  );
}
nav .start-methodology, a:nth-child(3):hover~.animation {
	width: 120px;
	left:  395px;
  background: -webkit-linear-gradient(
    318deg,
    rgba(133, 26, 186, 1) 18%,
    rgb(133, 26, 186, 1) 46%,
    rgba(100, 2, 223, 1) 81%
  );
}
nav .start-schedule, a:nth-child(4):hover~.animation {
	width: 100px;
	left: 505px;
  background: -webkit-linear-gradient(
    318deg,
    rgba(133, 26, 186, 1) 18%,
    rgb(133, 26, 186, 1) 46%,
    rgba(100, 2, 223, 1) 81%
  );
}
nav .start-forum, a:nth-child(5):hover~.animation {
	width: 170px;
	left: 630px;
  background: -webkit-linear-gradient(
    318deg,
    rgba(133, 26, 186, 1) 18%,
    rgb(133, 26, 186, 1) 46%,
    rgba(100, 2, 223, 1) 81%
  );
  
}

</style>
