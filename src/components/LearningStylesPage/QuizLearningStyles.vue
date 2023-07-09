<template>
<div>
  <div class="instructions">
    <h2>Instruções</h2>
<p class="attention">
   Cada pergunta tem quatro opções, você deverar dar uma nota para cada opção de acordo com
   o que você mais se idêntifica, sendo 4 a nota máxima(o item pelo qual você mais se 
   identifica) e 1 a nota mínima (o item pelo qual você menos se identifica).
</p>
  <p class="attention">Atenção: Dois itens de uma mesma pergunta não podem ter notas iguais</p>
</div>
</div>
<section class="test-container">
<h2>1. Enquanto estou estudando gosto de ...</h2>
  <label>
  Lidar com meus sentimentos - Gerenciar e compreender as emoções que surgem durante o processo de aprendizagem
  </label><br>
    <input :class="{'equal':classEqual[0]}" v-model.number="question.question1[0]" type="range"  min="1" max="4">
      <span :class="valueColor">{{ question.question1[0] }}</span>    
<br>
  <label>
  Desenvolver idéias
  </label><br>
    <input :class="{'equal':classEqual[0]}" v-model.number="question.question1[1]" type="range"  min="1" max="4">
      <span :class="valueColor">{{ question.question1[1] }}</span>    
<br>
  <label>
  Práticar
  </label><br>
    <input :class="{'equal':classEqual[0]}" v-model.number="question.question1[2]" type="range"  min="1" max="4">
      <span :class="valueColor">{{ question.question1[2] }}</span>    
<br>
  <label>
  Observar e ouvir
  </label><br>
    <input :class="{'equal':classEqual[0]}" v-model.number="question.question1[3]" type="range"  min="1" max="4">
      <span :class="valueColor">{{ question.question1[3] }}</span>  
<br><br>

<h2>2. Costumo ter facilidade de aprender, principalmente quando ... </h2>
  <label>
  Ouço e observo com atenção
  </label><br>
    <input :class="{'equal':classEqual[1]}" v-model.number="question.question2[0]" type="range"  min="1" max="4">
      <span :class="valueColor">{{ question.question2[0] }}</span>    
<br>
  <label>
  Utilizo racioncínio lógico
</label><br>
  <input :class="{'equal':classEqual[1]}" v-model.number="question.question2[1]" type="range"  min="1" max="4">
  <span :class="valueColor">{{ question.question2[1] }}</span>
<br>
  <label>
  Me baseio em meus palpites e impressões
  </label><br>
  <input :class="{'equal':classEqual[1]}" v-model.number="question.question2[2]" type="range"  min="1" max="4">
    <span :class="valueColor">{{ question.question2[2] }}</span>    
<br>
  <label>
  Executando o que aprendi
  </label><br>
    <input :class="{'equal':classEqual[1]}" v-model.number="question.question2[3]" type="range"  min="1" max="4">
      <span :class="valueColor">{{ question.question2[3] }}</span>  
<br><br>

<h2>3. Quando estou aprendendo costumo ...</h2>

  <label>
  Buscar explicações para os tópicos estudados
  </label><br>
    <input :class="{'equal':classEqual[2]}" v-model.number="question.question3[0]" type="range"  min="1" max="4">
      <span :class="valueColor">{{ question.question3[0] }}</span>    
<br>
  <label>
  Ser responsável a cerca das coisas - disciplinado(a)
  </label><br>
    <input :class="{'equal':classEqual[2]}" v-model.number="question.question3[1]" type="range"  min="1" max="4">
      <span :class="valueColor">{{ question.question3[1] }}</span>    
<br>
  <label>
  Ficar quieto e me concentrar
  </label><br>
    <input :class="{'equal':classEqual[2]}" v-model.number="question.question3[2]" type="range"  min="1" max="4">
      <span :class="valueColor">{{ question.question3[2] }}</span>    
<br>
  <label>
  Ter sentimentos e reações fortes
  </label><br>
    <input :class="{'equal':classEqual[2]}" v-model.number="question.question3[3]" type="range"  min="1" max="4">
      <span :class="valueColor">{{ question.question3[3] }}</span>  
<br><br>

<h2>4. Aprendo ...</h2>

  <label>
  Sentindo (raiva, tristeza, admiração, curiosidade, etc.)
  </label><br>
    <input :class="{'equal':classEqual[3]}" v-model.number="question.question4[0]" type="range"  min="1" max="4">
      <span :class="valueColor">{{ question.question4[0] }}</span>    
<br>
  <label>
  Fazendo
  </label><br>
    <input :class="{'equal':classEqual[3]}" v-model.number="question.question4[1]" type="range"  min="1" max="4">
      <span :class="valueColor">{{ question.question4[1] }}</span>    
<br>
  <label>
  Observando
  </label><br>
    <input :class="{'equal':classEqual[3]}" v-model.number="question.question4[2]" type="range"  min="1" max="4">
      <span :class="valueColor">{{ question.question4[2] }}</span>    
<br>
  <label>
  Pensando
  </label><br>
    <input :class="{'equal':classEqual[3]}" v-model.number="question.question4[3]" type="range"  min="1" max="4">
      <span :class="valueColor">{{ question.question4[3] }}</span>  
<br><br>

<h2>5. Enquanto aprendo gosto de ...</h2>

  <label>
  Me abrir a novas experiências
  </label><br>
    <input :class="{'equal':classEqual[4]}" v-model.number="question.question5[0]" type="range"  min="1" max="4">
      <span :class="valueColor">{{ question.question5[0] }}</span>    
<br>
  <label>
  Examinar todos os ângulos da questão
  </label><br>
    <input :class="{'equal':classEqual[4]}" v-model.number="question.question5[1]" type="range"  min="1" max="4">
      <span :class="valueColor">{{ question.question5[1] }}</span>    
<br>
  <label>
  Analisar as coisas - Desdobrá-las em partes para entendê-las/resolvê-las
  </label><br>
    <input :class="{'equal':classEqual[4]}" v-model.number="question.question5[2]" type="range"  min="1" max="4">
      <span :class="valueColor">{{ question.question5[2] }}</span>    
<br>
  <label>
  Testar as coisas (Práticas, métodos, etc.)
  </label><br>
    <input :class="{'equal':classEqual[4]}" v-model.number="question.question5[3]" type="range"  min="1" max="4"> 
      <span :class="valueColor">{{ question.question5[3] }}</span>  
<br><br>

<h2>6. Enquanto estudo sou ...</h2>

  <label>
  Alguém que prefere observar
  </label><br>
    <input :class="{'equal':classEqual[5]}" v-model.number="question.question6[0]" type="range"  min="1" max="4">
      <span :class="valueColor">{{ question.question6[0] }}</span>    
<br>
  <label>
  Ativo(a) - Utilizo mais de um método de estudo
  </label><br>
    <input :class="{'equal':classEqual[5]}" v-model.number="question.question6[1]" type="range"  min="1" max="4">
      <span :class="valueColor">{{ question.question6[1] }}</span>    
<br>
  <label>
  Intuitivo(a) - Entender quais são as suas dificuldades e conseguir identificar o que se encaixa melhor para o seu processo de aprendizagem
  </label><br>
    <input :class="{'equal':classEqual[5]}" v-model.number="question.question6[2]" type="range"  min="1" max="4">
      <span :class="valueColor">{{ question.question6[2] }}</span>    
<br>
  <label>
  Lógico(a) - Utilizar a lógica e a razão para entender o tema abordado
  </label><br>
    <input :class="{'equal':classEqual[5]}" v-model.number="question.question6[3]" type="range"  min="1" max="4">
      <span :class="valueColor">{{ question.question6[3] }}</span>  
<br><br>

<h2>7. Aprendo melhor através de ...</h2>

  <label>
  Observação
  </label><br>
    <input :class="{'equal':classEqual[6]}" v-model.number="question.question7[0]" type="range"  min="1" max="4">
      <span :class="valueColor">{{ question.question7[0] }}</span>    
<br>
  <label>
  Interações pessoais - Adquirir conhecimento por meio de interações com outras pessoas
  </label><br>
    <input :class="{'equal':classEqual[6]}" v-model.number="question.question7[1]" type="range"  min="1" max="4">
      <span :class="valueColor">{{ question.question7[1] }}</span>    
<br>
  <label>
  Teorias racionais - Modelos conceituais baseados em princípios lógicos e raciocínio dedutivo
  </label><br>
    <input :class="{'equal':classEqual[6]}" v-model.number="question.question7[2]" type="range"  min="1" max="4">
      <span :class="valueColor">{{ question.question7[2] }}</span>    
<br>
  <label>
  Oportunidades para experimentar e práticar
  </label><br>
    <input :class="{'equal':classEqual[6]}" v-model.number="question.question7[3]" type="range"  min="1" max="4">
      <span :class="valueColor">{{ question.question7[3] }}</span>  
<br><br>

<h2>8. Enquanto aprendo ...</h2>

  <label>
  Gosto de ver o resultado do meu trabalho
  </label><br>
    <input :class="{'equal':classEqual[7]}" v-model.number="question.question8[0]" type="range"  min="1" max="4">
      <span :class="valueColor">{{ question.question8[0] }}</span>  
  <br>
  <label>
  Me interesso em ter/conhecer idéias e teorias
  </label><br>
    <input :class="{'equal':classEqual[7]}" v-model.number="question.question8[1]" type="range"  min="1" max="4">
      <span :class="valueColor">{{ question.question8[1] }}</span>    
<br>
  <label>
  Penso antes de agir - planejar-se
  </label><br>
    <input :class="{'equal':classEqual[7]}" v-model.number="question.question8[2]" type="range"  min="1" max="4">
      <span :class="valueColor">{{ question.question8[2] }}</span>    
<br>
  <label>
  Sinto-me pessoalmente envolvido(a) nos assuntos
  </label><br>
    <input :class="{'equal':classEqual[7]}" v-model.number="question.question8[3]" type="range"  min="1" max="4">
      <span :class="valueColor">{{ question.question8[3] }}</span>  
<br><br>

<h2>9. Aprendo melhor quando me apóio em ...</h2>

  <label>
  Minhas observações
  </label><br>
    <input :class="{'equal':classEqual[8]}" v-model.number="question.question9[0]" type="range"  min="1" max="4">
      <span :class="valueColor">{{ question.question9[0] }}</span>    
<br>
  <label>
  Minhas impressões
  </label><br>
    <input :class="{'equal':classEqual[8]}" v-model.number="question.question9[1]" type="range"  min="1" max="4">
      <span :class="valueColor">{{ question.question9[1] }}</span>   
<br>
  <label>
  Posso experimentar coisas por mim mesmo(a)
  </label><br>
    <input :class="{'equal':classEqual[8]}" v-model.number="question.question9[2]" type="range"  min="1" max="4">
      <span :class="valueColor">{{ question.question9[2] }}</span>    
<br>
  <label>
  Me apóio em minhas idéias
  </label><br>
    <input :class="{'equal':classEqual[8]}" v-model.number="question.question9[3]" type="range"  min="1" max="4">
      <span :class="valueColor">{{ question.question9[3] }}</span>  
<br><br>

<h2>10. Quando estou aprendendo costumo ser ...</h2>

  <label>
  Compenetrado(a) - muito atento, concentrado
</label><br>
  <input :class="{'equal':classEqual[9]}"  v-model.number="question.question10[0]" type="range"  min="1" max="4">
    <span :class="valueColor">{{ question.question10[0] }}</span>
  <br>
<label>
  Fléxivel
</label><br>
  <input :class="{'equal':classEqual[9]}"  v-model.number="question.question10[1]" type="range"  min="1" max="4">    
    <span :class="valueColor">{{ question.question10[1] }}</span>
  <br>
  <label>
  Responsável
</label><br>
  <input :class="{'equal':classEqual[9]}"  v-model.number="question.question10[2]" type="range"  min="1" max="4">
    <span :class="valueColor">{{ question.question10[2] }}</span>
  <br>
  <label>
  Racional
</label><br>
  <input :class="{'equal':classEqual[9]}"  v-model.number="question.question10[3]" type="range"  min="1" max="4">
    <span :class="valueColor">{{ question.question10[3] }}</span>
<br><br>

<h2>11. Enquanto aprendo costumo ...</h2>

  <label>
  Me envolver totalmente
</label><br>
  <input :class="{'equal':classEqual[10]}"  v-model.number="question.question11[0]" type="range"  min="1" max="4">    
    <span :class="valueColor">{{ question.question11[0] }}</span>
  <br>
  <label>
  Gostar de observar
</label><br>
  <input :class="{'equal':classEqual[10]}"  v-model.number="question.question11[1]" type="range"  min="1" max="4">  
    <span :class="valueColor">{{ question.question11[1] }}</span>
  <br>
  <label>
  Avaliar as coisas
</label><br>
  <input :class="{'equal':classEqual[10]}"  v-model.number="question.question11[2]" type="range"  min="1" max="4">
    <span :class="valueColor">{{ question.question11[2] }}</span>
  <br>
  <label>
   Estar ativo(a)
  </label><br>
   <input :class="{'equal':classEqual[10]}"  v-model.number="question.question11[3]" type="range"  min="1" max="4">
    <span :class="valueColor">{{ question.question11[3] }}</span>
<br><br>

<h2>12. Aprendo melhor quando ...</h2>

  <label>
  Analiso as idéias
</label><br>
  <input :class="{'equal':classEqual[11]}"  v-model.number="question.question12[0]" type="range"  min="1" max="4">  
    <span :class="valueColor">{{ question.question12[0] }}</span>
  <br>
  <label>
  Sou receptivo(a) e mente aberta
</label><br>
  <input :class="{'equal':classEqual[11]}"  v-model.number="question.question12[1]" type="range"  min="1" max="4">
    <span :class="valueColor">{{ question.question12[1] }}</span>
  <br>
  <label>
  Sou cuidadoso(a) - Tomar decisões para garantir que a aprendizagem aconteça de forma precisa, sem erros
</label><br>
  <input :class="{'equal':classEqual[11]}"  v-model.number="question.question12[2]" type="range"  min="1" max="4">
    <span :class="valueColor">{{ question.question12[2] }}</span>
  <br>
  <label>
  Sou prático(a) - Buscar formas de tornar o aprendizado mais significativo e relevante, e aplico o que está sendo estudado na prática
</label><br>
  <input :class="{'equal':classEqual[11]}"  v-model.number="question.question12[3]" type="range"  min="1" max="4">
    <span :class="valueColor">{{ question.question12[3] }}</span>
<br><br>
      <button @click.prevent='result()'>Calcular resultado</button>
</section>
</template>

<script>
import Swal from 'sweetalert2';


export default{
  name: 'QuestionLearningStyles',
  data() {
      return{
        classEqual:[true,true,true,true,true,true,true,true,true,true,true,true],
        valueColor:'valueColor',
        resultColor: 'resultColor',
        question:{
          question1: [1,1,1,1],
          question2: [1,1,1,1],
          question3: [1,1,1,1],
          question4: [1,1,1,1],
          question5: [1,1,1,1],
          question6: [1,1,1,1],
          question7: [1,1,1,1],
          question8: [1,1,1,1],
          question9: [1,1,1,1],
          question10: [1,1,1,1],
          question11: [1,1,1,1],
          question12: [1,1,1,1],
        }
      }
    },
        methods: {
            result() {
            //Variable to stire response weights
            for(let index of this.classEqual){
              if(index == true){
                Swal.fire ({
                  title: "Atenção",
                  text: "Para calcular o seu resultado é necessário que todas as perguntas estejam respondidas",
                  confirmButtonText: "OK",
                      customClass: {
                      popup: 'swal-popup-custom',
                      title: 'swal-title-custom',
                      htmlContainer: 'swal-html-container-custom',
                      actions:'swal-actions-custom'
                  }
                })
                return
              }
            }
              let EC = 
                this.question.question1[0] 
              + this.question.question2[2] 
              + this.question.question3[3] 
              + this.question.question4[0] 
              + this.question.question5[0]
              + this.question.question6[2]
              + this.question.question7[1]
              + this.question.question8[3]
              + this.question.question9[1]
              + this.question.question10[1]
              + this.question.question11[0]
              + this.question.question12[1];
              let CA = 
                this.question.question1[1] 
              + this.question.question2[1] 
              + this.question.question3[0] 
              + this.question.question4[3] 
              + this.question.question5[2]
              + this.question.question6[3]
              + this.question.question7[2]
              + this.question.question8[1]
              + this.question.question9[3]
              + this.question.question10[3]
              + this.question.question11[2]
              + this.question.question12[0];
              let OR = 
                this.question.question1[3] 
              + this.question.question2[0] 
              + this.question.question3[2] 
              + this.question.question4[2] 
              + this.question.question5[1]
              + this.question.question6[0]
              + this.question.question7[0]
              + this.question.question8[2]
              + this.question.question9[0]
              + this.question.question10[0]
              + this.question.question11[1]
              + this.question.question12[2];
              let EA = 
                this.question.question1[2] 
              + this.question.question2[3] 
              + this.question.question3[1] 
              + this.question.question4[1] 
              + this.question.question5[3]
              + this.question.question6[1]
              + this.question.question7[3]
              + this.question.question8[0]
              + this.question.question9[2]
              + this.question.question10[2]
              + this.question.question11[3]
              + this.question.question12[3];

      
              let divergente = (EC + OR);
              let assimilador = (OR + CA);
              let convergente = (CA + EA);
              let acomodador = (EA + EC);
              let resultsum = Math.max(divergente,assimilador,convergente,acomodador);


              if(resultsum == divergente) {
                Swal.fire ({
                  title: "Seu estilo predominante é Divergente", 
                  html: `<div style="height: 15em; overflow-y: scroll; scroll-behavior: auto; scroll-padding-top: 0;"><p><h3>Pontuação</h3><br>Estilo Acomodador: ${acomodador} pts<br>Estilo Assimilador: ${assimilador} pts<br>Estilo Convergente: ${convergente} pts<br><strong style="color:rgba(100, 2, 223, 1);">Estilo Divergente: ${divergente} pts</strong></p><br><p>Você aprende melhor combinando sensações com observações, ou seja através de atividades práticas seguidas de um retorno. Possui muita sensibilidade artística e conseguem ver as coisas de perspectivas diferentes. Prefere observar ao invés de agir. Suas estratégias para a solução de problemas iniciam coletando informações para em seguida usarem a criatividade e a inventividade para oferecer mais de uma solução possível. A denominação “divergentes” se dá pelo fato de terem bom desempenho em situações que requerem geração de ideias, como grupos de trabalho e brainstorms. Possuem vasto interesse cultural e gostam de pessoas. Preferem trabalhar em grupo, ouvindo sugestões com mente aberta e recebendo feedbacks pessoais. Gostam de autonomia na busca de conhecimento. Esse estilo também é conhecido como REFLEXIVO.</p>`,
                  showConfirmButton: true,
                  showCancelButton: true,
                  allowOutsideClick: false,
                  allowEscapeKey: false,
                  cancelButtonText: "Ver metodologias",
                  customClass: {
                      popup: 'swal-popup-custom',
                      title: 'swal-title-custom',
                      htmlContainer: 'swal-html-container-custom',
                  }
                })
                .then((result) => {
                    if (result.isDismissed) {
                      this.$router.push('/Methodology');
               }
          });
							}else if(resultsum == assimilador) {
                Swal.fire ({
                  title: "Seu estilo predominante é Assimilador", 
                  html:`<div style="height: 15em; overflow-y: scroll; scroll-behavior: auto; scroll-padding-top: 0;"><p><h3>Pontuação</h3><br>Estilo Acomodador: ${acomodador} pts<br><strong style="color:rgba(100, 2, 223, 1);">Estilo Assimilador: ${assimilador} pts</strong><br>Estilo Convergente: ${convergente} pts<br>Estilo Divergente: ${divergente} pts </p><br><p>Você aprende melhor combinando observação e pensamento, por isso suas preferências por palestras, conferências e aulas. Para eles, ideias e conceitos abstratos são mais importantes do que pessoas e pode ser percebido como pouco sociável. Tem facilidade com números e modelos conceituais, preferindo especulações abstratas em detrimento de situações práticas. Compreende as informações de forma ampla e as organizam de forma clara e lógica. Tem propensão para a carreira científica. Gosta de explorar modelos analíticos e de ter tempo para pensar e refletir sobre as coisas. Esse estilo também é conhecido como TEÓRICO.</p>`,
                  showConfirmButton: true,
                  showCancelButton: true,
                  allowOutsideClick: false,
                  allowEscapeKey: false,
                  cancelButtonText: "Ver metodologias",
                  customClass: {
                      popup: 'swal-popup-custom',
                      title: 'swal-title-custom',
                      htmlContainer: 'swal-html-container-custom',
                  }
                })
                .then((result) => {
                    if (result.isDismissed) {
                      this.$router.push('/Methodology');
               }
          });
              }else if(resultsum == convergente) {
                Swal.fire ({
                  title: "Seu estilo predominante é Convergente", 
                  html:`<div style="height: 15em; overflow-y: scroll; scroll-behavior: auto; scroll-padding-top: 0;"><p><h3>Pontuação</h3><br>Estilo Acomodador: ${acomodador} pts <br> Estilo Assimilador: ${assimilador} pts <br> <strong style="color:rgba(100, 2, 223, 1);">Estilo Convergente: ${convergente} pts </strong> <br> Estilo Divergente: ${divergente} pts </p><br><p>Você aprende melhor pensando e realizando. Combina o gosto de colocar “a mão na massa” com aspectos teóricos. Gosta de realizar atividades com indicações sequenciais detalhadas (como aquelas dos manuais de operação de aparelhos), solucionar problemas específicos e testar hipóteses (tentativa e erro). Tem habilidades em encontrar aplicações práticas para ideias e teorias. Pessoas desse estilo possuem poucas habilidades sociais e intrapessoais, preferindo ambientes de aprendizagem mais tranquilos (ex.: gosta de trabalha sozinho realizando tarefas técnicas sem se relacionarem com outras pessoas). Parecem se sair melhor em situações nas quais existe uma única resposta ou solução correta para cada pergunta ou problema. Não tem dificuldades ao experimentar inovações para solucionar problemas práticos. Esse estilo também é conhecido como PRAGMÁTICO.</p>

                      </div>`,
                  showConfirmButton: true,
                  showCancelButton: true,
                  allowOutsideClick: false,
                  cancelButtonText: "Voltar",
                  confirmButtonText: "Ver metodologias",
                  customClass: {
                      popup: 'swal-popup-custom',
                      title: 'swal-title-custom',
                      htmlContainer: 'swal-html-container-custom',
                  }
                })
                .then((result) => {
                    if (result.isConfirmed) {
                      this.$router.push('/Methodology');
               }
          });
							}else if (resultsum == acomodador) {
                Swal.fire ({
                  title: "Seu estilo predominante é Acomodador",
                  html: `<div style="height: 15em; overflow-y: scroll; scroll-behavior: auto; scroll-padding-top: 0;"><p><h3>Pontuação</h3><br><strong style="color:rgba(100, 2, 223, 1);">Estilo Acomodador: ${acomodador} pts</strong><br>Estilo Assimilador: ${assimilador} pts<br>Estilo Convergente: ${convergente} pts<br>Estilo Divergente: ${divergente} pts </p><br><p>Você aprende melhor experimentando e realizando, como, por exemplo, através de atividades práticas, apresentações, role-plays e debates. Combina o gosto de colocar “a mão na massa” com atividades concretas. Tem capacidade de se sobressair e acomodar ou adaptar a circunstâncias imediatas específicas. Utiliza mais a intuição do que a lógica e tem a tendência a se arriscar mais a ousar mais. Costuma utilizar a opinião de outras pessoas ao invés das suas próprias, por isso geralmente faz muitas perguntas. Assume uma abordagem prática e vivencial. É sociável e gosta de trabalhar em equipe. Geralmente exerce um papel importante em situações onde são necessárias ações e iniciativas para a realização de tarefas. Por terem pouca habilidade analítica são impulsivas e as vezes é percebido como impaciente e pressionador. Esse estilo também é conhecido como ATIVISTA.</p>`,
                  showConfirmButton: true,
                  showCancelButton: true,
                  allowOutsideClick: false,
                  allowEscapeKey: false,
                  cancelButtonText: "Ver metodologias",
                  customClass: {
                      popup: 'swal-popup-custom',
                      title: 'swal-title-custom',
                      htmlContainer: 'swal-html-container-custom',
                  }
                })
                .then((result) => {
                    if (result.isDismissed) {
                        this.$router.push('/Methodology');
               }
          });
							}

              console.log("EC:",EC,"CA:",CA,"OR:",OR,"EA:",EA)
            } 
        },
        watch :{
          question :{
            handler(){
              const question = Object.keys(this.question);
              for(let questions of question){

                if(this.question[questions] == this.question.question1){
                  if(this.question[questions][0] == this.question[questions][1] ||this.question[questions][0] == this.question[questions][2] || this.question[questions][0] == this.question[questions][3]){
                    this.classEqual[0] = true
                  }else if(this.question[questions][1] == this.question[questions][2] || this.question[questions][1] == this.question[questions][3]){
                    this.classEqual[0] = true
                  }else if(this.question[questions][2] == this.question[questions][3]){
                    this.classEqual[0] = true
                  }else{
                    this.classEqual[0] = false
                  }
                }
                if(this.question[questions] == this.question.question2){
                  if(this.question[questions][0] == this.question[questions][1] ||this.question[questions][0] == this.question[questions][2] || this.question[questions][0] == this.question[questions][3]){
                    this.classEqual[1] = true
                  }else if(this.question[questions][1] == this.question[questions][2] || this.question[questions][1] == this.question[questions][3]){
                    this.classEqual[1] = true
                  }else if(this.question[questions][2] == this.question[questions][3]){
                    this.classEqual[1] = true
                  }else{
                    this.classEqual[1] = false
                  }
                }
                if(this.question[questions] == this.question.question3){
                  if(this.question[questions][0] == this.question[questions][1] ||this.question[questions][0] == this.question[questions][2] || this.question[questions][0] == this.question[questions][3]){
                    this.classEqual[2] = true
                  }else if(this.question[questions][1] == this.question[questions][2] || this.question[questions][1] == this.question[questions][3]){
                    this.classEqual[2] = true
                  }else if(this.question[questions][2] == this.question[questions][3]){
                    this.classEqual[2] = true
                  }else{
                    this.classEqual[2] = false
                  }
                }
                if(this.question[questions] == this.question.question4){
                  if(this.question[questions][0] == this.question[questions][1] ||this.question[questions][0] == this.question[questions][2] || this.question[questions][0] == this.question[questions][3]){
                    this.classEqual[3] = true
                  }else if(this.question[questions][1] == this.question[questions][2] || this.question[questions][1] == this.question[questions][3]){
                    this.classEqual[3] = true
                  }else if(this.question[questions][2] == this.question[questions][3]){
                    this.classEqual[3] = true
                  }else{
                    this.classEqual[3] = false
                  }
                }
                if(this.question[questions] == this.question.question5){
                  if(this.question[questions][0] == this.question[questions][1] ||this.question[questions][0] == this.question[questions][2] || this.question[questions][0] == this.question[questions][3]){
                    this.classEqual[4] = true
                  }else if(this.question[questions][1] == this.question[questions][2] || this.question[questions][1] == this.question[questions][3]){
                    this.classEqual[4] = true
                  }else if(this.question[questions][2] == this.question[questions][3]){
                    this.classEqual[4] = true
                  }else{
                    this.classEqual[4] = false
                  }
                }
                if(this.question[questions] == this.question.question6){
                  if(this.question[questions][0] == this.question[questions][1] ||this.question[questions][0] == this.question[questions][2] || this.question[questions][0] == this.question[questions][3]){
                    this.classEqual[5] = true
                  }else if(this.question[questions][1] == this.question[questions][2] || this.question[questions][1] == this.question[questions][3]){
                    this.classEqual[5] = true
                  }else if(this.question[questions][2] == this.question[questions][3]){
                    this.classEqual[5] = true
                  }else{
                    this.classEqual[5] = false
                  }
                }
                if(this.question[questions] == this.question.question7){
                  if(this.question[questions][0] == this.question[questions][1] ||this.question[questions][0] == this.question[questions][2] || this.question[questions][0] == this.question[questions][3]){
                    this.classEqual[6] = true
                  }else if(this.question[questions][1] == this.question[questions][2] || this.question[questions][1] == this.question[questions][3]){
                    this.classEqual[6] = true
                  }else if(this.question[questions][2] == this.question[questions][3]){
                    this.classEqual[6] = true
                  }else{
                    this.classEqual[6] = false
                  }
                }
                if(this.question[questions] == this.question.question8){
                  if(this.question[questions][0] == this.question[questions][1] ||this.question[questions][0] == this.question[questions][2] || this.question[questions][0] == this.question[questions][3]){
                    this.classEqual[7] = true
                  }else if(this.question[questions][1] == this.question[questions][2] || this.question[questions][1] == this.question[questions][3]){
                    this.classEqual[7] = true
                  }else if(this.question[questions][2] == this.question[questions][3]){
                    this.classEqual[7] = true
                  }else{
                    this.classEqual[7] = false
                  }
                }
                if(this.question[questions] == this.question.question9){
                  if(this.question[questions][0] == this.question[questions][1] ||this.question[questions][0] == this.question[questions][2] || this.question[questions][0] == this.question[questions][3]){
                    this.classEqual[8] = true
                  }else if(this.question[questions][1] == this.question[questions][2] || this.question[questions][1] == this.question[questions][3]){
                    this.classEqual[8] = true
                  }else if(this.question[questions][2] == this.question[questions][3]){
                    this.classEqual[8] = true
                  }else{
                    this.classEqual[8] = false
                  }
                }
                if(this.question[questions] == this.question.question10){
                  if(this.question[questions][0] == this.question[questions][1] ||this.question[questions][0] == this.question[questions][2] || this.question[questions][0] == this.question[questions][3]){
                    this.classEqual[9] = true
                  }else if(this.question[questions][1] == this.question[questions][2] || this.question[questions][1] == this.question[questions][3]){
                    this.classEqual[9] = true
                  }else if(this.question[questions][2] == this.question[questions][3]){
                    this.classEqual[9] = true
                  }else{
                    this.classEqual[9] = false
                  }
                }
                if(this.question[questions] == this.question.question11){
                  if(this.question[questions][0] == this.question[questions][1] ||this.question[questions][0] == this.question[questions][2] || this.question[questions][0] == this.question[questions][3]){
                    this.classEqual[10] = true
                  }else if(this.question[questions][1] == this.question[questions][2] || this.question[questions][1] == this.question[questions][3]){
                    this.classEqual[10] = true
                  }else if(this.question[questions][2] == this.question[questions][3]){
                    this.classEqual[10] = true
                  }else{
                    this.classEqual[10] = false
                  }
                }
                if(this.question[questions] == this.question.question12){
                  if(this.question[questions][0] == this.question[questions][1] ||this.question[questions][0] == this.question[questions][2] || this.question[questions][0] == this.question[questions][3]){
                    this.classEqual[11] = true
                  }else if(this.question[questions][1] == this.question[questions][2] || this.question[questions][1] == this.question[questions][3]){
                    this.classEqual[11] = true
                  }else if(this.question[questions][2] == this.question[questions][3]){
                    this.classEqual[11] = true
                  }else{
                    this.classEqual[11] = false
                  }
                }
              }
            },
            deep: true
          }
        }
      }

</script>
<style>
.resultColor{
  color:brown;
}
</style>

<style scoped>

.learning-style{
  color: rgba(100, 2, 223, 1);
}
.test-container{
     display: inline-block;
     max-width: 60em;
}
 section{
     margin-top: 4em;
}
 .instructions{
     display: inline-block;
     max-width: 40em;
     margin: 3em;
     font-size: 1.2em;
     border-style:solid;
     border-color: rgba(100, 2, 223, 1);
     border-radius:0.9em;
     border-width: 0.1em;
     background: black;
}
 .attention{
     margin: 1em;
}
 input[type="range"] {
    outline: 0;
    border: none;
    border-radius: 50em;
    width: 14em;
    max-width: 100%;
    margin: 24px 0 16px;
    transition: box-shadow 0.2s ease-in-out;
    overflow: hidden;
    height: 2em;
    -webkit-appearance: none;
}
 input[type="range"]::-webkit-slider-runnable-track {
    width: 50em;
    height: 2em;
    -webkit-appearance: none;
    transition: box-shadow 0.2s ease-in-out;
}
 input[type="range"]::-webkit-slider-thumb {
    width: 2em;
    -webkit-appearance: none;
    height: 2em;
    cursor: ew-resize;
    background: rgba(100, 2, 223, 1);
    box-shadow: -34em 0em 16em 32em rgba(100, 2, 223, 1), inset 0 0 0 2em rgba(100, 2, 223, 1);
    border-radius: 1em;
    transition: box-shadow 0.2s ease-in-out;
    position: relative;
}
 input[type="range"]:active::-webkit-slider-thumb {
    border-radius: 1em;
    background: #fff;
    box-shadow: -34em 0 8em 32em rgba(100, 2, 223, 1), inset 0 0 0 0.3em rgba(100, 2, 223, 1);
}
 .equal{
     -webkit-appearance: none;
     appearance: none;
     background-color:red;
}
 .valueColor{
     height: 1em;
     width: 1em;
     font-size: 20px;
}
 label , .valueColor ,span {
     font-family: "Share Tech Mono", sans-serif;
     color:#E6E6FA;
}
 h2{
     font-size: 24px;
}
 .intro{
     font-size: 20px;
}
 label {
     font-family: "Share Tech Mono", sans-serif;
     font-size: 1.2em;
     margin: 1em;
}
 span{
     color:red;
}
 .swal2-styled.swal2-confirm {
     font-family: 'Prime', sans-serif;
     text-align: center;
     color: #fff;
     font-size: 1em;
     border: solid;
     border-width: 1px;
     border-radius: 0.25em;
     background: initial;
     background-color: transparent;
     position: fixed;
     left: 3em;
}
 .swal2-styled.swal2-cancel {
     font-family: 'Prime', sans-serif;
     text-align: center;
     color: #fff;
     font-size: 1em;
     border: solid;
     border-width: 1px;
     border-radius: 0.25em;
     background: initial;
     background-color: transparent;
     position:fixed;
     left: 10em;
}

</style>