<template>
    <section>
      <button @click="() => {methods.pomodoro = !methods.pomodoro}">Pomodoro</button>
      <div v-if="methods.pomodoro">
        O Método Pomodoro é um método de gerenciamento de tempo baseado em períodos de 25 minutos (pomodoros) de estudo ou trabalho focado, interrompidos por intervalos de 5 minutos. Após quatro intervalos de estudo consecutivos, são geralmente feitos intervalos mais longos, que podem variar de 15 a 30 minutos.
      </div>
      <button @click="() => {methods.mapamental = !methods.mapamental}">Mapa Mental</button>
      <div v-if="methods.mapamental">
        Consiste em criar resumos cheios de símbolos, cores, setas e frases de efeito com o objetivo de organizar o conteúdo e facilitar associações entre as informações destacadas. Esse material é muito indicado para pessoas que têm facilidade de aprender de forma visual.
      </div>
      <button @click="() => {methods.construtivista = !methods.construtivista}">Construtivista</button>
      <div v-if="methods.contrutivista">
        A metodologia construtivista entende que a principal função da sala de aula é estimular o aprendizado dos estudantes e incentivar a participação ativa dos mesmos - seja por meio de intervenções ou exposição de suas respectivas opiniões sobre determinado tema.
      </div>
      <button @click="() => {methods.logosofica = !methods.logosofica}">Logosófica</button>
      <div v-if="methods.logosofica">Para a pedagogia logosófica, educar é “fazer experimentar”. Os alunos aprendem quando vivenciam aquilo que estão estudando, quando o conhecimento se volta em ação.
      </div>
      <button @click="() => {methods.intercalado = !methods.intercalado}">Estudo Intercalado</button>
      <div v-if="methods.intercalado">
        O método de estudo intercalado propõe a distribuição dos conteúdos a serem estudados num mesmo período de tempo. Pode também ser chamado de método de rotação de matérias. Portanto, a técnica é usada por estudantes que se ocupam de muitas matérias ou assuntos de estudo e querem otimizar o tempo dedicado ao aprendizado
      </div>
      <button @click="() => {methods.interacionista = !methods.interacionista}">Sócio Interacionista</button>
      <div v-if="methods.interacionista">
        Este método entende que a pessoa se desenvolve com influências socioculturais, pois o homem é formado também pelo meio em que ele está inserido. Essa teoria coloca que o contato que o indivíduo tem com o meio e com seus iguais é mediado por um conhecimento e/ou experiência assimilado anteriormente e que toda troca e relacionamento gera uma aprendizagem.
      </div>
      <button @click="() => {methods.autoaprendizagem = !methods.autoaprendizagem}">Auto Aprendizagem</button>
      <div v-if="methods.autoaprendizagem">
        A autoaprendizagem é uma estratégia pedagógica voltada ao desenvolvimento das habilidades cognitivas dos alunos para que eles possam “aprender a aprender” com autonomia, plenamente conscientes dos procedimentos que estão empregando, sem se limitar às condições impostas pelo ambiente educacional.
      </div>
      <button @click="() => {methods.aprendizagemaberta = !methods.aprendizagemaberta}">Aprendizagem Aberta</button>
      <div v-if="methods.aprendizagemaberta">
        Nessa metodologia, o aluno possui autonomia para cursar mais temáticas ao mesmo tempo, fazendo que ele experimente a interdisciplinaridade.
      </div>
      <button @click="() => {methods.waldorf = !methods.waldorf}">Waldorf</button>
      <div v-if="methods.waldorf">
        Baseia-se em um processo de ensino-aprendizagem lúdico e inclusivo, onde os alunos têm a oportunidade de aprender por meio de experiências individuais ou de pares. Além disso, o método tem um foco claro nas manifestações artísticas.
      </div>
      <button @click="() => {methods.experimentação = !methods.experimentação}">Experimentação</button>
      <div v-if="methods.experimentação">
        Visa desenvolver práticas pedagógicas que possibilitem aos alunos colocar a “mão na massa” resolvendo adversidades, ampliando o seu conhecimento através de projetos, criando e testando soluções reais.
      </div>
    </section>
  </template>
  
  <script>
  export default {
    data() {
      return {
        methods: {
            mapamental: false,
            construtivista: false,
            pomodoro: false,
            logosofica: false,
            intercalado: false,
            interacionista: false,
            autoaprendizagem: false,
            aprendizagemaberta: false,
            waldorf: false,
            experimentação: false,
        }
      }
    }
  }
  </script>
  