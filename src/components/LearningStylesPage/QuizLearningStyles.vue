<template>
<div>
<h2>Questionário de Estilo de aprendizagem</h2>
<p>
   Respondendo este quéstionário você descobrirá qual é o seu estilo de aprendizagem, ou seja,
   a forma como você melhor aprende. 
   O objetivo desse teste é te ajudar a descobrir qual métodologia se encaixa melhor para 
   o eu estilo de aprendizagem.
</p><br><br>
<p>
   Cada pergunta tem quatro opções, você deverar dar uma nota para cada opção de acordo com
   o que você mais se idêntifica, sendo 4 a nota máxima(o item pelo qual você mais se 
   identifica) e 1 a nota mínima (o item pelo qual você menos se identifica).
</p><br>
  <span>Atenção: Dois itens de uma mesma pergunta não podem ter notas iguais</span>
</div>

<section>
<h2>1. Enquanto estou estudando gosto de ...</h2>
  <label>
  Lidar com meus sentimentos - Gerenciar e compreender as emoções que surgem durante o processo de aprendizagem<br>
    <input v-model="question.question1[0]" type="range"  min="1" max="4">
    {{ question.question1[0] }}
  </label><br>
  <label>
  Desenvolver idéias<br>
    <input v-model="question.question1[1]" type="range"  min="1" max="4">
    {{ question.question1[1] }}
  </label><br>
  <label>
  Práticar<br>
    <input v-model="question.question1[2]" type="range"  min="1" max="4">
    {{ question.question1[2] }}
  </label><br>
  <label>
  Observar e ouvir<br>
    <input v-model="question.question1[3]" type="range"  min="1" max="4">
    {{ question.question1[3] }}
  </label><br><br>

<h2>2. Costumo ter facilidade de aprender, principalmente quando ... </h2>
  <label>
  Ouço e observo com atenção<br>
    <input v-model="question.question2[0]" type="range"  min="1" max="4">
    {{ question.question2[0] }}
  </label><br>
  <label>
  Utilizo racioncínio lógico<br> 
    <input v-model="question.question2[1]" type="range"  min="1" max="4">
    {{ question.question2[1] }}
  </label><br>
  <label>
  Me baseio em meus palpites e impressões<br>
    <input v-model="question.question2[2]" type="range"  min="1" max="4">
    {{ question.question2[2] }}
  </label><br>
  <label>
  Executando o que aprendi<br>
    <input v-model="question.question2[3]" type="range"  min="1" max="4">
    {{ question.question2[3] }}
  </label><br><br>

<h2>3. Quando estou aprendendo costumo ...</h2>

  <label>
  Buscar explicações para os tópicos estudados<br>
    <input v-model="question.question3[0]" type="range"  min="1" max="4">
    {{ question.question3[0] }}
  </label><br>
  <label>
  Ser responsável a cerca das coisas - disciplinado(a)<br>
    <input v-model="question.question3[1]" type="range"  min="1" max="4">
    {{ question.question3[1] }}
  </label><br>
  <label>
  Ficar quieto e me concentrar<br>
    <input v-model="question.question3[2]" type="range"  min="1" max="4">
    {{ question.question3[2] }}
  </label><br>
  <label>
  Ter sentimentos e reações fortes<br>
    <input v-model="question.question3[3]" type="range"  min="1" max="4">
    {{ question.question3[3] }}
  </label><br><br>

<h2>4. Aprendo ...</h2>

  <label>
  Sentindo (raiva, tristeza, admiração, curiosidade, etc.)<br>
    <input v-model="question.question4[0]" type="range"  min="1" max="4">
    {{ question.question4[0] }}
  </label><br>
  <label>
  Fazendo<br>
    <input v-model="question.question4[1]" type="range"  min="1" max="4">
    {{ question.question4[1] }}
  </label><br>
  <label>
  Observando<br>
    <input v-model="question.question4[2]" type="range"  min="1" max="4">
    {{ question.question4[2] }}
  </label><br>
  <label>
  Pensando<br>
    <input v-model="question.question4[3]" type="range"  min="1" max="4">
    {{ question.question4[3] }}
  </label><br><br>

<h2>5. Enquanto aprendo gosto de ...</h2>

  <label>
  Me abrir a novas experiências<br>
    <input v-model="question.question5[0]" type="range"  min="1" max="4">
    {{ question.question5[0] }}
  </label><br>
  <label>
  Examinar todos os ângulos da questão<br>
    <input v-model="question.question5[1]" type="range"  min="1" max="4">
    {{ question.question5[1] }}
  </label><br>
  <label>
  Analisar as coisas - Desdobrá-las em partes para entendê-las/resolvê-las<br>
    <input v-model="question.question5[2]" type="range"  min="1" max="4">
    {{ question.question5[2] }}
  </label><br>
  <label>
  Testar as coisas (Práticas, métodos, etc.)<br>
    <input v-model="question.question5[3]" type="range"  min="1" max="4"> 
    {{ question.question5[3] }}
  </label><br><br>

<h2>6. Enquanto estudo sou ...</h2>

  <label>
  Alguém que prefere observar<br>
    <input v-model="question.question6[0]" type="range"  min="1" max="4">
    {{ question.question6[0] }}
  </label><br>
  <label>
  Ativo(a) - Utilizo mais de um método de estudo<br>
    <input v-model="question.question6[1]" type="range"  min="1" max="4">
    {{ question.question6[1] }}
  </label><br>
  <label>
  Intuitivo(a) - Entender quais são as suas dificuldades e conseguir identificar o que se encaixa melhor para o seu processo de aprendizagem<br>
    <input v-model="question.question6[2]" type="range"  min="1" max="4">
    {{ question.question6[2] }}
  </label><br>
  <label>
  Lógico(a) - Utilizar a lógica e a razão para entender o tema abordado<br>
    <input v-model="question.question6[3]" type="range"  min="1" max="4">
    {{ question.question6[3] }}
  </label><br><br>

<h2>7. Aprendo melhor através de ...</h2>

  <label>
  Observação<br>
    <input v-model="question.question7[0]" type="range"  min="1" max="4">
    {{ question.question7[0] }}
  </label><br>
  <label>
  Interações pessoais - Adquirir conhecimento por meio de interações com outras pessoas<br>
    <input v-model="question.question7[1]" type="range"  min="1" max="4">
    {{ question.question7[1] }}
  </label><br>
  <label>
  Teorias racionais - Modelos conceituais baseados em princípios lógicos e raciocínio dedutivo<br>
    <input v-model="question.question7[2]" type="range"  min="1" max="4">
    {{ question.question7[2] }}
  </label><br>
  <label>
  Oportunidades para experimentar e práticar<br>
    <input v-model="question.question7[3]" type="range"  min="1" max="4">
    {{ question.question7[3] }}
  </label><br><br>

<h2>8. Enquanto aprendo ...</h2>

  <label>
  Gosto de ver o resultado do meu trabalho<br>
    <input v-model="question.question8[0]" type="range"  min="1" max="4">
    {{ question.question8[0] }}
  </label><br>
  <label>
  Me interesso em ter/conhecer idéias e teorias<br>
    <input v-model="question.question8[1]" type="range"  min="1" max="4">
    {{ question.question8[1] }}
  </label><br>
  <label>
  Penso antes de agir - planejar-se<br>
    <input v-model="question.question8[2]" type="range"  min="1" max="4">
    {{ question.question8[2] }}
  </label><br>
  <label>
  Sinto-me pessoalmente envolvido(a) nos assuntos<br>
    <input v-model="question.question8[3]" type="range"  min="1" max="4">
    {{ question.question8[3] }}
  </label><br><br>

<h2>9. Aprendo melhor quando me apóio em ...</h2>

  <label>
  Minhas observações<br>
    <input v-model="question.question9[0]" type="range"  min="1" max="4">
    {{ question.question9[0] }}
  </label><br>
  <label>
  Minhas impressões<br>
    <input v-model="question.question9[1]" type="range"  min="1" max="4">
    {{ question.question9[1] }}
  </label><br>
  <label>
  Posso experimentar coisas por mim mesmo(a)<br>
    <input v-model="question.question9[2]" type="range"  min="1" max="4">
    {{ question.question9[2] }}
  </label><br>
  <label>
  Me apóio em minhas idéias<br>   
    <input v-model="question.question9[3]" type="range"  min="1" max="4">
    {{ question.question9[3] }}
  </label><br><br>

<h2>10. Quando estou aprendendo costumo ser ...</h2>

  <label>
  Compenetrado(a) - muito atento, concentrado<br>
    <input v-model="question.question10[0]" type="range"  min="1" max="4">
    {{ question.question10[0] }}
  </label><br>
  <label>
  Fléxivel<br>
    <input v-model="question.question10[1]" type="range"  min="1" max="4">    
    {{ question.question10[1] }}
  </label><br>
  <label>
  Responsável<br>
    <input v-model="question.question10[2]" type="range"  min="1" max="4">
    {{ question.question10[2] }}
  </label><br>
  <label>
  Racional<br>
    <input v-model="question.question10[3]" type="range"  min="1" max="4">
    {{ question.question10[3] }}
  </label><br><br>

<h2>11. Enquanto aprendo costumo ...</h2>

  <label>
  Me envolver totalmente<br>
    <input v-model="question.question11[0]" type="range"  min="1" max="4">    
    {{ question.question11[0] }}
  </label><br>
  <label>
  Gostar de observar<br>
    <input v-model="question.question11[1]" type="range"  min="1" max="4">  
    {{ question.question11[1] }}
  </label><br>
  <label>
  Avaliar as coisas<br>
    <input v-model="question.question11[2]" type="range"  min="1" max="4">
    {{ question.question11[2] }}
  </label><br>
  <label>
   Estar ativo(a)<br>
    <input v-model="question.question11[3]" type="range"  min="1" max="4">
    {{ question.question11[3] }}
  </label><br><br>

<h2>12. Aprendo melhor quando ...</h2>

  <label>
  Analiso as idéias<br>
    <input v-model="question.question12[0]" type="range"  min="1" max="4">  
    {{ question.question12[0] }}
  </label><br>
  <label>
  Sou receptivo(a) e mente aberta<br>
    <input v-model="question.question12[1]" type="range"  min="1" max="4">
    {{ question.question12[1] }}
  </label><br>
  <label>
  Sou cuidadoso(a) - Tomar decisões para garantir que a aprendizagem aconteça de forma precisa, sem erros<br>
    <input v-model="question.question12[2]" type="range"  min="1" max="4">
    {{ question.question12[2] }}
  </label><br>
  <label>
  Sou prático(a) - Buscar formas de tornar o aprendizado mais significativo e relevante, e aplico o que está sendo estudado na prática<br> 
    <input v-model="question.question12[3]" type="range"  min="1" max="4">
    {{ question.question12[3] }}
  </label>
  <button @click='result()'>Calcular resultado</button>
</section>
</template>

<script>

export default{
  name: 'QuestionLearningStyles',
  data() {
      return{

        question:{
          question1: [],
          question2: [],
          question3: [],
          question4: [],
          question5: [],
          question6: [],
          question7: [],
          question8: [],
          question9: [],
          question10: [],
          question11: [],
          question12: [],
        }
      }
    },
        methods: {
            result() {
            //Variable to stire response weights
            let EC = 
               parseInt(this.question.question1[0]) 
             + parseInt(this.question.question2[2]) 
             + parseInt(this.question.question3[3]) 
             + parseInt(this.question.question4[0]) 
             + parseInt(this.question.question5[0])
             + parseInt(this.question.question6[2])
             + parseInt(this.question.question7[1])
             + parseInt(this.question.question8[3])
             + parseInt(this.question.question9[1])
             + parseInt(this.question.question10[1])
             + parseInt(this.question.question11[0])
             + parseInt(this.question.question12[1]);
             let CA = 
               parseInt(this.question.question1[1]) 
             + parseInt(this.question.question2[1]) 
             + parseInt(this.question.question3[0]) 
             + parseInt(this.question.question4[3]) 
             + parseInt(this.question.question5[2])
             + parseInt(this.question.question6[3])
             + parseInt(this.question.question7[2])
             + parseInt(this.question.question8[1])
             + parseInt(this.question.question9[3])
             + parseInt(this.question.question10[3])
             + parseInt(this.question.question11[2])
             + parseInt(this.question.question12[0]);
             let OR = 
              parseInt(this.question.question1[3]) 
             + parseInt(this.question.question2[0]) 
             + parseInt(this.question.question3[2]) 
             + parseInt(this.question.question4[2]) 
             + parseInt(this.question.question5[1])
             + parseInt(this.question.question6[0])
             + parseInt(this.question.question7[0])
             + parseInt(this.question.question8[2])
             + parseInt(this.question.question9[0])
             + parseInt(this.question.question10[0])
             + parseInt(this.question.question11[1])
             + parseInt(this.question.question12[2]);
             let EA = 
               parseInt(this.question.question1[2]) 
             + parseInt(this.question.question2[3]) 
             + parseInt(this.question.question3[1]) 
             + parseInt(this.question.question4[1]) 
             + parseInt(this.question.question5[3])
             + parseInt(this.question.question6[1])
             + parseInt(this.question.question7[3])
             + parseInt(this.question.question8[0])
             + parseInt(this.question.question9[2])
             + parseInt(this.question.question10[2])
             + parseInt(this.question.question11[3])
             + parseInt(this.question.question12[3]);

      
              let divergente = (EC + OR);
              let assimilador = (OR + CA);
              let convergente = (CA + EA);
              let acomodador = (EA + EC);
              let resultsum = Math.max(divergente,assimilador,convergente,acomodador)

              if(resultsum == divergente) {
              console.log("estilo:DIVERGENTE")
							}else if(resultsum == assimilador) {
								console.log("estilo:ASSIMILADOR") 
              }else if(resultsum == convergente) {
								console.log("estilo:CONVERGENTE") 
							}else if (resultsum == acomodador) {
								console.log("estilo:ACOMODADOR")
							}

               console.log("EC:",EC,"CA:",CA,"OR:",OR,"EA:",EA)

  
          
            }
          }
        }

</script>
<style>

</style>