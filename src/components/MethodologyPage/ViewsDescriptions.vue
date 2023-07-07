<template>
  <section class="list">
    <div>
      <button class="learn-more" @click="alert(`Os testes práticos nada mais são do que a resolução de exercícios, simulados e provas antigas.
        Este é um dos métodos de estudo mais eficientes, pois força seu cérebro a pensar bastante nas informações previamente estudadas para responder cada uma das perguntas.
        Além disso, faz com que você consiga medir seu nível de conhecimento atual.`)">Testes Práticos</button>
      <p v-if="methodology.testespraticos"></p>

    </div>

    <div>
      <button class="learn-more"
        @click="alert(`O modo difuso, é quando os pensamentos do cérebro podem fluir livremente, criando conexões variadas.
        Ele aparece nos momentos de relaxamento, quando você está jogando, vendo um filme ou fazendo um passeio.
        Investir no pensamento difuso como método de estudo é ideal para as situações em que já leu e releu um material, mas ainda não conseguiu compreendê-lo completamente.
        O melhor a fazer nesse caso é se distrair, pois será mais fácil para o cérebro processar as informações novas.`)">Pensamentos
        Difusos</button>
      <p v-if="methodology.pensamentosdifusos"></p>

    </div>

    <div>
      <button class="learn-more" @click="alert(`O estudo intercalado funciona como o nome sugere, ou seja, alternando as disciplinas que você estuda. 
        Assim, em vez de passar quatro horas apenas aprendendo matemática, por exemplo, você divide esse tempo: 2h para biologia e 2h para matemática
        Isso ajuda o cérebro a não se cansar, nem entrar no piloto automático, além de evitar a procrastinação.
        Outra grande vantagem é que fica possível otimizar seu tempo de estudo ao longo da semana.`)">Intercalação de
        Máterias</button>
      <p v-if="methodology.intercalacaodematerias"></p>

    </div>

    <div>
      <button class="learn-more"
        @click="alert(`Resumo= é um dos métodos de estudo mais populares entre os alunos.
        Ele consiste, basicamente, em apresentar um conteúdo superficialmente, porém mantendo todas as suas ideias principais.
        Fichamentos= reproduzem todo o conteúdo que você acabou de estudar, não apenas as partes principais.
        Todavia, essa “reprodução” precisa ser feita com as suas próprias palavras.
        Então, nada de copiar trechos do livro ou da apostila.
        (Outro ponto importante é que o fichamento não é feito em forma de texto corrido. Os blocos de texto devem ser separados por ideias, seguindo a mesma ordem lógica do material original.)`)">Resumos
        e Fichamentos</button>
      <p v-if="methodology.resumosefichamentos"></p>

    </div>

    <div>
      <button class="learn-more"
        @click="alert(`A prática da releitura é uma forma interessante de memorizar os conhecimentos vistos, pois ela possibilita que o estudante retorne ao conteúdo com um novo olhar e, possivelmente, com novas ideias em mente. 
        Assim, ela pode ser muito mais eficaz do que simplesmente grifar ou sublinhar certas partes de um texto.`)">Releitura</button>
      <p v-if="methodology.releitura"></p>

    </div>

    <div>
      <button class="learn-more"
        @click="alert(`É uma abordagem observacional que se concentra na coleta de dados sobre o que está acontecendo, sem tentar explicar ou interpretar o porquê.
        Essa metodologia é frequentemente usada em estudos de campo, pesquisas de mercado, pesquisas de opinião pública e em outras áreas em que o objetivo é descrever ou compreender o comportamento humano ou social, a estrutura de uma organização ou um fenômeno natural.`)">Descritiva</button>
      <p v-if="methodology.descritiva"></p>

    </div>

    <div>
      <button class="learn-more"
        @click="alert(`A metodologia exploratória é um tipo de metodologia de pesquisa que visa explorar um fenômeno pouco conhecido, pouco estudado ou pouco compreendido, a fim de gerar novas ideias, hipóteses e possibilidades de pesquisa.
        A metodologia exploratória pode ser usada em diferentes áreas do conhecimento, como ciências sociais, ciências naturais, engenharia e tecnologia, entre outras.
        lá geralmente envolve a coleta de dados primários e secundários, como revisão bibliográfica, observação, entrevistas, grupos focais e questionários, e pode ser qualitativa, quantitativa ou uma combinação de ambas.`)">Exploratória</button>
      <p v-if="methodology.exploratoria"></p>

    </div>

    <div> 
      <button class="learn-more" @click="alert(`A transversal é um tipo de metodologia de pesquisa que envolve a coleta de dados em um único momento no tempo, com o objetivo de descrever uma situação, um fenômeno ou um grupo populacional em um determinado momento.
        Em resumo, a metodologia transversal envolve a coleta de dados em um único momento no tempo, com o objetivo de descrever uma situação, um fenômeno ou um grupo populacional em um determinado momento.
        Ela é amplamente utilizada em estudos descritivos e pesquisas de opinião.`)">Transversal</button>
      <p v-if="methodology.transversal"></p>
    </div>

    <div>
      <button class="learn-more"
        @click="alert(`A Metodologia Quantitativa é uma abordagem de pesquisa que utiliza técnicas estatísticas e matemáticas para coletar e analisar dados numéricos com o objetivo de descrever, explicar ou prever fenômenos sociais, psicológicos ou físicos.
        É amplamente utilizada em áreas como a economia, a medicina, a psicologia, a sociologia e outras ciências.
        Em resumo, a Metodologia Quantitativa é uma abordagem de pesquisa que utiliza técnicas estatísticas e matemáticas para coletar e analisar dados numéricos com o objetivo de descrever, explicar ou prever fenômenos sociais, psicológicos ou físicos.
        Ela se concentra em coletar dados quantificáveis através de técnicas padronizadas e altamente estruturadas e é amplamente utilizada em áreas das ciências exatas e sociais.`)">Quantitativa</button>
      <p v-if="methodology.quantitativa"></p>

    </div>

    <div>
      <button class="learn-more"
        @click="alert(`A Metodologia Qualitativa é uma abordagem de pesquisa que se concentra na compreensão e interpretação dos fenômenos sociais, culturais e psicológicos, utilizando dados não numéricos.
        Ela é amplamente utilizada em áreas das ciências sociais e humanas, como antropologia, sociologia, psicologia e estudos culturais.
        Ao contrário da Metodologia Quantitativa, que se concentra na medição e análise de dados numéricos, a Metodologia Qualitativa busca explorar a complexidade e a riqueza dos dados qualitativos, como entrevistas, observações e documentos, para identificar padrões, tendências e significados subjacentes aos fenômenos estudados.
        Em resumo, a Metodologia Qualitativa é uma abordagem de pesquisa que busca entender a complexidade e a riqueza dos fenômenos sociais, culturais e psicológicos, utilizando dados não numéricos e técnicas de análise qualitativa.`)">Qualitativa</button>
      <p v-if="methodology.qualitativa"></p>

    </div>

    <div>
      <button class="learn-more"
        @click="alert(`O Método Pomodoro é um método de gerenciamento de tempo baseado em períodos de 25 minutos (pomodoros) de estudo ou trabalho focado, interrompidos por intervalos de 5 minutos. 
        Após quatro intervalos de estudo consecutivos, são geralmente feitos intervalos mais longos, que podem variar de 15 a 30 minutos`)">Pomodoro</button>
      <p v-if="methodology.pomodoro"></p>

    </div>

    <div>
      <button class="learn-more" @click="alert(`Consiste em criar resumos cheios de símbolos, cores, setas e frases de efeito com o objetivo de organizar o conteúdo e facilitar associações entre as informações destacadas. 
        Esse material é muito indicado para pessoas que têm facilidade de aprender de forma visual.`)">Mapa
        Mental</button>
      <p v-if="methodology.mapamental"></p>

    </div>

    <div>

      <button class="learn-more"
        @click="alert(`A metodologia construtivista entende que a principal função da sala de aula é estimular o aprendizado dos estudantes e incentivar a participação ativa dos mesmos, seja por meio de intervenções ou exposição de suas respectivas opiniões sobre determinado tema.`)">Construtivista</button>
      <p v-if="methodology.contrutivista"></p>

    </div>

    <div>
      <button class="learn-more"
        @click="alert(`Para a pedagogia logosófica, educar é “fazer experimentar”. Os alunos aprendem quando vivenciam aquilo que estão estudando, quando o conhecimento se volta em ação.`)">Logosófica</button>
      <p v-if="methodology.logosofica"></p>

    </div>

    <div>
      <button class="learn-more"
        @click="alert(`O método de estudo intercalado propõe a distribuição dos conteúdos a serem estudados num mesmo período de tempo. Pode também ser chamado de método de rotação de matérias. Portanto, a técnica é usada por estudantes que se ocupam de muitas matérias ou assuntos de estudo e querem otimizar o tempo dedicado ao aprendizado.`)">Estudo
        Intercalado</button>
      <p v-if="methodology.intercalado"></p>

    </div>

    <div>
      <button class="learn-more"
        @click="alert(`Este método entende que a pessoa se desenvolve com influências socioculturais, pois o homem é formado também pelo meio em que ele está inserido. Essa teoria coloca que o contato que o indivíduo tem com o meio e com seus iguais é mediado por um conhecimento e/ou experiência assimilado anteriormente e que toda troca e relacionamento gera uma aprendizagem.`)">Sócio
        Interacionista</button>
      <p v-if="methodology.interacionista"></p>

    </div>

    <div>
      <button class="learn-more"
        @click="alert(`A autoaprendizagem é uma estratégia pedagógica voltada ao desenvolvimento das habilidades cognitivas dos alunos para que eles possam “aprender a aprender” com autonomia, plenamente conscientes dos procedimentos que estão empregando, sem se limitar às condições impostas pelo ambiente educacional.`)">Auto
        Aprendizagem</button>
      <p v-if="methodology.autoaprendizagem"></p>

    </div>

    <div>
      <button class="learn-more"
        @click="alert(`Nessa metodologia, o aluno possui autonomia para cursar mais temáticas ao mesmo tempo, fazendo que ele experimente a interdisciplinaridade.`)">Aprendizagem
        Aberta</button>
      <p v-if="methodology.aprendizagemaberta"></p>

    </div>

    <div>
      <button class="learn-more"
        @click="alert(`Baseia-se em um processo de ensino-aprendizagem lúdico e inclusivo, onde os alunos têm a oportunidade de aprender por meio de experiências individuais ou de pares. Além disso, o método tem um foco claro nas manifestações artísticas.`)">Waldorf</button>
      <p v-if="methodology.waldorf"></p>

    </div>

    <div>
      <button class="learn-more"
        @click="alert(`Visa desenvolver práticas pedagógicas que possibilitem aos alunos colocar a “mão na massa” resolvendo adversidades, ampliando o seu conhecimento através de projetos, criando e testando soluções reais.`)">Experimentação</button>
      <p v-if="methodology.experimentacao"></p>

    </div>
  </section>
  <footer>
    <h1>Links usados:</h1>
    <span>
      Estacio:
    </span>
    <a href="https://blog.estacio.br/aluno-estacio/metodos-de-estudo/" target="_blank" rel="noopener">clique aqui</a><br>
    <span>
      Cuboup:
    </span>
    <a href="https://cuboup.com/conteudo/metodologia/" target="_blank" rel="noopener">clique aqui</a>
  </footer>
</template>

<script>
import Swal from 'sweetalert2';
//import { faHandSparkles } from '@fortawesome/free-solid-svg-icons';

export default {
  data() {
    return {
      methodology: {
        testespraticos: false,
        pensamentosdifusos: false,
        intercalacaodematerias: false,
        resumosefichamentos: false,
        releitura: false,
        descritiva: false,
        exploratoria: false,
        transversal: false,
        quantitativa: false,
        qualitativa: false,
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
        link: false,
      }
    }
  },
  methods: {
    alert(message) {
      Swal.fire({
        text: message,
        customClass: {
          popup: 'swal-popup-custom',
          title: 'swal-title-custom',
          htmlContainer: 'swal-html-container-custom',
        }
      })
    }
  }
}

</script>

<style scoped>

button {
  width: 12em;
  height: 5em;
}

button {
  position: relative;
  display: inline-block;
  cursor: pointer;
  outline: none;
  border: 0;
  vertical-align: middle;
  text-decoration: none;
  text-align: center;
  font-size: inherit;
  font-family: inherit;
}
button.learn-more {
  font-weight: 600;
  color: #ffffff;
  text-transform: uppercase;
  padding: 1.25em 2em;
  border-radius: 0.75em;
  transform-style: preserve-3d;
  transition: transform 150ms cubic-bezier(0, 0, 0.58, 1), background 150ms cubic-bezier(0, 0, 0.58, 1);
}
button.learn-more::before {
  position: absolute;
  content: "";
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: #462d68;
  border-radius: inherit;
  transform: translate3d(0, 0.52em, -1em);
  transition: transform 150ms cubic-bezier(0, 0, 0.58, 1), box-shadow 150ms cubic-bezier(0, 0, 0.58, 1);
}
button.learn-more:hover {
  transform: translate(0, 0.25em);
}
button.learn-more:hover::before {
  box-shadow: 0 0 0 2px #ffffff, 0 0.5em 0 0 #300929;
  transform: translate3d(0, 0.5em, -1em);
}
button.learn-more:active {
  transform: translate(0em, 0.75em);
}
button.learn-more:active::before {
  box-shadow: 0 0 0 2px #ffffff, 0 0 #ffe3e2;
  transform: translate3d(0, 0, -1em);
}

.list {
  position: relative;
  left: 6em;
  display: flex;
  flex-flow: row wrap;
  gap: 3.8em;
}</style>