<template>
    <section class="list">
      <div>
        <button @click="() => {methodology.testespraticos = !methodology.testespraticos}">Testes Práticos</button>
        <p v-if="methodology.testespraticos">Os testes práticos nada mais são do que a resolução de exercícios, simulados e provas antigas.<br>
        Este é um dos métodos de estudo mais eficientes, pois força seu cérebro a pensar bastante nas informações previamente estudadas para responder cada uma das perguntas. Além disso, faz com que você consiga medir seu nível de conhecimento atual.</p>

      </div>

      <div>
        <button @click="() => {methodology.pensamentosdifusos = !methodology.pensamentosdifusos}">Pensamentos Difusos</button>
        <p v-if="methodology.pensamentosdifusos">O modo difuso, é quando os pensamentos do cérebro podem fluir livremente, criando conexões variadas.<br>
        Ele aparece nos momentos de relaxamento, quando você está jogando, vendo um filme ou fazendo um passeio.<br>
        Investir no pensamento difuso como método de estudo é ideal para as situações em que já leu e releu um material, mas ainda não conseguiu compreendê-lo completamente.<br> 
        O melhor a fazer nesse caso é se distrair, pois será mais fácil para o cérebro processar as informações novas.</p>

      </div>

      <div>
        <button @click="() => {methodology.intercalacaodematerias = !methodology.intercalacaodematerias}">Intercalação de Máterias</button>
        <p v-if="methodology.intercalacaodematerias">O estudo intercalado funciona como o nome sugere, ou seja, alternando as disciplinas que você estuda.<br> 
        Assim, em vez de passar quatro horas apenas aprendendo matemática, por exemplo, você divide esse tempo: 2h para biologia e 2h para matemática.<br>
        Isso ajuda o cérebro a não se cansar, nem entrar no piloto automático, além de evitar a procrastinação.<br>
        Outra grande vantagem é que fica possível otimizar seu tempo de estudo ao longo da semana.</p> 

      </div>

      <div>
        <button @click="() => {methodology.resumosefichamentos = !methodology.resumosefichamentos}">Resumos e Fichamentos</button>
        <p v-if="methodology.resumosefichamentos">Resumo= é um dos métodos de estudo mais populares entre os alunos.<br>
        Ele consiste, basicamente, em apresentar um conteúdo superficialmente, porém mantendo todas as suas ideias principais.<br>
        Fichamentos= reproduzem todo o conteúdo que você acabou de estudar, não apenas as partes principais.<br>
        Todavia, essa “reprodução” precisa ser feita com as suas próprias palavras.<br>
        Então, nada de copiar trechos do livro ou da apostila.<br> 
        (Outro ponto importante é que o fichamento não é feito em forma de texto corrido. Os blocos de texto devem ser separados por ideias, seguindo a mesma ordem lógica do material original.)</p>

      </div>

      <div>
        <button @click="() => {methodology.releitura = !methodology.releitura}">Releitura</button>
        <p v-if="methodology.releitura">A prática da releitura é uma forma interessante de memorizar os conhecimentos vistos, pois ela possibilita que o estudante retorne ao conteúdo com um novo olhar e, possivelmente, com novas ideias em mente.<br> 
        Assim, ela pode ser muito mais eficaz do que simplesmente grifar ou sublinhar certas partes de um texto.</p>

      </div>

      <div>
        <button @click="() => {methodology.descritiva = !methodology.descritiva}">Descritiva</button>
        <p v-if="methodology.descritiva">É uma abordagem observacional que se concentra na coleta de dados sobre o que está acontecendo, sem tentar explicar ou interpretar o porquê.<br>
        Essa metodologia é frequentemente usada em estudos de campo, pesquisas de mercado, pesquisas de opinião pública e em outras áreas em que o objetivo é descrever ou compreender o comportamento humano ou social, a estrutura de uma organização ou um fenômeno natural.</p>

      </div>

      <div>
        <button @click="() => {methodology.exploratoria = !methodology.exploratoria}">Exploratória</button>
        <p v-if="methodology.exploratoria">A metodologia exploratória é um tipo de metodologia de pesquisa que visa explorar um fenômeno pouco conhecido, pouco estudado ou pouco compreendido, a fim de gerar novas ideias, hipóteses e possibilidades de pesquisa.<br> 
        A metodologia exploratória pode ser usada em diferentes áreas do conhecimento, como ciências sociais, ciências naturais, engenharia e tecnologia, entre outras.<br> 
        lá geralmente envolve a coleta de dados primários e secundários, como revisão bibliográfica, observação, entrevistas, grupos focais e questionários, e pode ser qualitativa, quantitativa ou uma combinação de ambas.</p>

      </div>

      <div>
        <button @click="() => {methodology.transversal = !methodology.transversal}">Transversal</button>
        <p v-if="methodology.transversal">A transversal é um tipo de metodologia de pesquisa que envolve a coleta de dados em um único momento no tempo, com o objetivo de descrever uma situação, um fenômeno ou um grupo populacional em um determinado momento.<br> 
        Em resumo, a metodologia transversal envolve a coleta de dados em um único momento no tempo, com o objetivo de descrever uma situação, um fenômeno ou um grupo populacional em um determinado momento.<br>
        Ela é amplamente utilizada em estudos descritivos e pesquisas de opinião.</p>
      </div>
      
      <div>
        <button @click="() => {methodology.quantitativa = !methodology.quantitativa}">Quantitativa</button>
        <p v-if="methodology.quantitativa">A Metodologia Quantitativa é uma abordagem de pesquisa que utiliza técnicas estatísticas e matemáticas para coletar e analisar dados numéricos com o objetivo de descrever, explicar ou prever fenômenos sociais, psicológicos ou físicos.<br> 
        É amplamente utilizada em áreas como a economia, a medicina, a psicologia, a sociologia e outras ciências.<br> 
        Em resumo, a Metodologia Quantitativa é uma abordagem de pesquisa que utiliza técnicas estatísticas e matemáticas para coletar e analisar dados numéricos com o objetivo de descrever, explicar ou prever fenômenos sociais, psicológicos ou físicos.<br> 
        Ela se concentra em coletar dados quantificáveis através de técnicas padronizadas e altamente estruturadas e é amplamente utilizada em áreas das ciências exatas e sociais.</p>

      </div>

      <div>
        <button @click="() => {methodology.qualitativa = !methodology.qualitativa}">Qualitativa</button>
        <p v-if="methodology.qualitativa">A Metodologia Qualitativa é uma abordagem de pesquisa que se concentra na compreensão e interpretação dos fenômenos sociais, culturais e psicológicos, utilizando dados não numéricos.<br> 
        Ela é amplamente utilizada em áreas das ciências sociais e humanas, como antropologia, sociologia, psicologia e estudos culturais.<br> 
        Ao contrário da Metodologia Quantitativa, que se concentra na medição e análise de dados numéricos, a Metodologia Qualitativa busca explorar a complexidade e a riqueza dos dados qualitativos, como entrevistas, observações e documentos, para identificar padrões, tendências e significados subjacentes aos fenômenos estudados.<br>
        Em resumo, a Metodologia Qualitativa é uma abordagem de pesquisa que busca entender a complexidade e a riqueza dos fenômenos sociais, culturais e psicológicos, utilizando dados não numéricos e técnicas de análise qualitativa.</p>

      </div>

      <div>
        <button @click="() => {methodology.pomodoro = !methodology.pomodoro}">Pomodoro</button>
        <p v-if="methodology.pomodoro">O Método Pomodoro é um método de gerenciamento de tempo baseado em períodos de 25 minutos (pomodoros) de estudo ou trabalho focado, interrompidos por intervalos de 5 minutos. <br> 
        Após quatro intervalos de estudo consecutivos, são geralmente feitos intervalos mais longos, que podem variar de 15 a 30 minutos.</p>
     
      </div>

      <div>
        <button @click="alert(`Consiste em criar resumos cheios de símbolos, cores, setas e frases de efeito com o objetivo de organizar o conteúdo e facilitar associações entre as informações destacadas. <br>
        Esse material é muito indicado para pessoas que têm facilidade de aprender de forma visual.`) ">Mapa Mental</button>
        <p v-if="methodology.mapamental"></p>

      </div>

      <div>
        <button @click="alert(`A metodologia construtivista entende que a principal função da sala de aula é estimular o aprendizado dos estudantes e incentivar a participação ativa dos mesmos, seja por meio de intervenções ou exposição de suas respectivas opiniões sobre determinado tema.`)">Construtivista</button>
        <p v-if="methodology.contrutivista"></p>

      </div>

      <div>
        <button @click="alert(`Para a pedagogia logosófica, educar é “fazer experimentar”. Os alunos aprendem quando vivenciam aquilo que estão estudando, quando o conhecimento se volta em ação.`)">Logosófica</button>
        <p v-if="methodology.logosofica"></p>

      </div>

      <div>
        <button @click="alert(`O método de estudo intercalado propõe a distribuição dos conteúdos a serem estudados num mesmo período de tempo. Pode também ser chamado de método de rotação de matérias. Portanto, a técnica é usada por estudantes que se ocupam de muitas matérias ou assuntos de estudo e querem otimizar o tempo dedicado ao aprendizado.`) ">Estudo Intercalado</button>
        <p v-if="methodology.intercalado"></p>
      
      </div>

      <div>
        <button @click="alert(`Este método entende que a pessoa se desenvolve com influências socioculturais, pois o homem é formado também pelo meio em que ele está inserido. Essa teoria coloca que o contato que o indivíduo tem com o meio e com seus iguais é mediado por um conhecimento e/ou experiência assimilado anteriormente e que toda troca e relacionamento gera uma aprendizagem.`) ">Sócio Interacionista</button>
        <p v-if="methodology.interacionista"></p>

      </div>

      <div>
        <button @click="alert(`A autoaprendizagem é uma estratégia pedagógica voltada ao desenvolvimento das habilidades cognitivas dos alunos para que eles possam “aprender a aprender” com autonomia, plenamente conscientes dos procedimentos que estão empregando, sem se limitar às condições impostas pelo ambiente educacional.`)">Auto Aprendizagem</button>
        <p v-if="methodology.autoaprendizagem"></p>

      </div>

      <div>
        <button @click="alert(`Nessa metodologia, o aluno possui autonomia para cursar mais temáticas ao mesmo tempo, fazendo que ele experimente a interdisciplinaridade.`)">Aprendizagem Aberta</button>
        <p v-if="methodology.aprendizagemaberta"></p>

      </div>

      <div>
        <button @click="alert(`Baseia-se em um processo de ensino-aprendizagem lúdico e inclusivo, onde os alunos têm a oportunidade de aprender por meio de experiências individuais ou de pares. Além disso, o método tem um foco claro nas manifestações artísticas.`)">Waldorf</button>
        <p v-if="methodology.waldorf"></p>

      </div>

      <div>
        <button @click="alert(`Visa desenvolver práticas pedagógicas que possibilitem aos alunos colocar a “mão na massa” resolvendo adversidades, ampliando o seu conhecimento através de projetos, criando e testando soluções reais.`)">Experimentação</button>
        <p v-if="methodology.experimentacao"></p>

      </div>
    </section>

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
      }
    }
  },
  methods: {
    alert(message) {
        Swal.fire({
            title: message
        })
    }
  }
}
</script>

<style scoped>

button {
    width: 14em;
}

.list{
    display:flex;
    flex-flow: row wrap;
    gap: 5em;
    
}

</style>