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
<h2>1. Enquanto estou estudando gosto de:</h2>
  <label>
  Lidar com meus sentimentos - Gerenciar e compreender as emoções que surgem durante o processo de aprendizagem
    <input v-model="question.question1" type="range" value="1" min="1" max="4">
    {{ value }}
  </label>
  <label>
  Desenvolver idéias
    <input v-model="question.question1" type="range" value="1" min="1" max="4">
    {{ value }}
  </label>
  <label>
  Práticar
    <input v-model="question.question1" type="range" value="1" min="1" max="4">
    {{ value }}
  </label>
  <label>
  Observar e ouvir
    <input v-model="question.question1" type="range" value="1" min="1" max="4">
    {{ value }}
  </label><br><br>

<h2>2. Costumo ter facilidade de aprender, principalmente quando: </h2>
  <label>
  Ouço e observo com atenção
    <input v-model="question.question2" type="range" value="1" min="1" max="4">
    {{ value }}
  </label>
  <label>
  Utilizo racioncínio lógico 
    <input v-model="question.question2" type="range" value="1" min="1" max="4">
    {{ value }}
  </label>
  <label>
  Me baseio em meus palpites e impressões
    <input v-model="question.question2" type="range" value="1" min="1" max="4">
    {{ value }}
  </label>
  <label>
  Executando o que aprendi
    <input v-model="question.question2" type="range" value="1" min="1" max="4">
    {{ value }}
  </label><br><br>

<h2>3. Quando estou aprendeno costumo:</h2>

  <label>
  Buscar explicações para os tópicos estudados
    <input v-model="question.question3" type="range" value="1" min="1" max="4">
    {{ value }}
  </label>
  <label>
  Ser responsável a cerca das coisas - disciplinado(a)
    <input v-model="question.question3" type="range" value="1" min="1" max="4">
    {{ value }}
  </label>
  <label>
  Ficar quieto e me concentrar
    <input v-model="question.question3" type="range" value="1" min="1" max="4">
    {{ value }}
  </label>
  <label>
  Ter sentimentos e reações fortes
    <input v-model="question.question3" type="range" value="1" min="1" max="4">
    {{ value }}
  </label><br><br>

<h2>4. Aprendo:</h2>

  <label>
  Sentindo (raiva, tristeza, admiração, curiosidade, etc.)
    <input v-model="question.question4" type="range" value="1" min="1" max="4">
    {{ value }}
  </label>
  <label>
  Fazendo
    <input v-model="question.question4" type="range" value="1" min="1" max="4">
    {{ value }}
  </label>
  <label>
  Observando
    <input v-model="question.question4" type="range" value="1" min="1" max="4">
    {{ value }}
  </label>
  <label>
  Pensando
    <input v-model="question.question4" type="range" value="1" min="1" max="4">
    {{ value }}
  </label><br><br>

<h2>5. Enquanto aprendo gosto de:</h2>

  <label>
  Me abrir a novas experiências
    <input v-model="question.question5" type="range" value="1" min="1" max="4">
    {{ value }}
  </label>
  <label>
  Examinar todos os ângulos da questão
    <input v-model="question.question5" type="range" value="1" min="1" max="4">
    {{ value }}
  </label>
  <label>
  Analisar as coisas - Desdobrá-las em partes para entendê-las/resolvê-las
    <input v-model="question.question5" type="range" value="1" min="1" max="4">
    {{ value }}
  </label>
  <label>
  Testar as coisas (Práticas, métodos, etc.)
    <input v-model="question.question5" type="range" value="1" min="1" max="4"> 
    {{ value }}
  </label><br><br>

<h2>6. Enquanto estudo sou:</h2>

  <label>
  Alguém que prefere observar
    <input v-model="question.question6" type="range" value="1" min="1" max="4">
    {{ value }}
  </label>
  <label>
  Ativo(a) - Utilizo mais de um método de estudo
    <input v-model="question.question6" type="range" value="1" min="1" max="4">
    {{ value }}
  </label>
  <label>
  Intuitivo(a) - Entender quais são as suas dificuldades e conseguir identificar o que se encaixa melhor para o seu processo de aprendizagem
    <input v-model="question.question6" type="range" value="1" min="1" max="4">
    {{ value }}
  </label>
  <label>
  Lógico(a) - Utilizar a lógica e a razão para entender o tema abordado
    <input v-model="question.question6" type="range" value="1" min="1" max="4">
    {{ value }}
  </label><br><br>

<h2>7. Aprendo melhor através de:</h2>

  <label>
  Observação
    <input v-model="question.question7" type="range" value="1" min="1" max="4">
    {{ value }}
  </label>
  <label>
  Interações pessoais - Adquirir conhecimento por meio de interações com outras pessoas
    <input v-model="question.question7" type="range" value="1" min="1" max="4">
    {{ value }}
  </label>
  <label>
  Teorias racionais - Modelos conceituais baseados em princípios lógicos e raciocínio dedutivo
    <input v-model="question.question7" type="range" value="1" min="1" max="4">
    {{ value }}
  </label>  
  <label>
  Oportunidades para experimentar e práticar
    <input v-model="question.question7" type="range" value="1" min="1" max="4">
    {{ value }}
  </label><br><br>

<h2>8. Enquanto aprendo:</h2>

  <label>
  Gosto de ver o resultado do meu trabalho
    <input v-model="question.question8" type="range" value="1" min="1" max="4">
    {{ value }}
  </label>
  <label>
  Me interesso em ter/conhecer idéias e teorias
    <input v-model="question.question8" type="range" value="1" min="1" max="4">
    {{ value }}
  </label>
  <label>
  Penso antes de agir - planejar-se
    <input v-model="question.question8" type="range" value="1" min="1" max="4">
    {{ value }}
  </label>
  <label>
  Sinto-me pessoalmente envolvido(a) nos assuntos
    <input v-model="question.question8" type="range" value="1" min="1" max="4">
    {{ value }}
  </label><br><br>

<h2>9. Aprendo melhor quando me apóio em:</h2>

  <label>
  Minhas observações
    <input v-model="question.question9" type="range" value="1" min="1" max="4">
    {{ value }}
  </label>
  <label>
  Minhas impressões
    <input v-model="question.question9" type="range" value="1" min="1" max="4">
    {{ value }}
  </label>
  <label>
  Posso experimentar coisas por mim mesmo(a)
    <input v-model="question.question9" type="range" value="1" min="1" max="4">
    {{ value }}
  </label>
  <label>
  Me apóio em minhas idéias   
    <input v-model="question.question9" type="range" value="1" min="1" max="4">
    {{ value }}
  </label><br><br>

<h2>10. Quando estou aprendendo costumo ser:</h2>

  <label>
  Compenetrado(a) - muito atento, concentrado
    <input v-model="question.question10" type="range" value="1" min="1" max="4">
    {{ value }}
  </label>
  <label>
  Fléxivel
    <input v-model="question.question10" type="range" value="1" min="1" max="4">    
    {{ value }}
  </label>
  <label>
  Responsável
    <input v-model="question.question10" type="range" value="1" min="1" max="4">
    {{ value }}
  </label>
  <label>
  Racional
    <input v-model="question.question10" type="range" value="1" min="1" max="4">
    {{ value }}
  </label><br><br>

<h2>11. Enquanto aprendo costumo:</h2>

  <label>
  Me envolver totalmente
    <input v-model="question.question11" type="range" value="1" min="1" max="4">    
    {{ value }}
  </label>
  <label>
  Gostar de observar
    <input v-model="question.question11" type="range" value="1" min="1" max="4">  
    {{ value }}
  </label>
  <label>
  Avaliar as coisas
    <input v-model="question.question11" type="range" value="1" min="1" max="4">
    {{ value }}
  </label>
  <label>
   Estar ativo(a)
    <input v-model="question.question11" type="range" value="1" min="1" max="4">
    {{ value }}
  </label><br><br>

<h2>12. Aprendo melhor quando:</h2>

  <label>
  Analiso as idéias 
    <input v-model="question.question12" type="range" value="1" min="1" max="4">  
    {{ value }}
  </label>
  <label>
  Sou receptivo(a) e mente aberta
    <input v-model="question.question12" type="range" value="1" min="1" max="4">
    {{ value }}
  </label>
  <label>
  Sou cuidadoso(a) - Tomar decisões para garantir que a aprendizagem aconteça de forma precisa, sem erros
    <input v-model="question.question12" type="range" value="1" min="1" max="4">
    {{ value }}
  </label>
  <label>
  Sou prático(a) - Buscar formas de tornar o aprendizado mais significativo e relevante, e aplico o que está sendo estudado na prática 
    <input v-model="question.question12" type="range" value="1" min="1" max="4">
    {{ value }}
  </label>
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
        },
        methods:{
          calculateResult(){
            //Variable to stire response weights
            let EC = 0;
            let CA = 0;
            let OR = 0;
            let EA = 0;
            //combination arrays
            let respostasEC = [];
            let respostasCA = [];
            let respostasOR = [];
            let respostasEA = [];

          this.question.forEach((question,index) => {
            console.log(question,index)
            });
            console.log(EA,CA,EC,OR,respostasCA,respostasEA,respostasEC,respostasOR)
            }
          }
        }


      }
    }

</script>
<style>

</style>