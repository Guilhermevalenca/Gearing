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
  Lidar com meus sentimentos - Gerenciar e compreender as emoções que surgem durante o processo de aprendizagem
  </label><br>
  <input :class="{'equal':classEqual[0]}" v-model="question.question1[0]" type="range"  min="1" max="4">
    {{ question.question1[0] }}
    <br>
  <label>
  Desenvolver idéias
  </label><br>
  <input :class="{'equal':classEqual[0]}" v-model="question.question1[1]" type="range"  min="1" max="4">
    {{ question.question1[1] }}
    <br>
  <label>
  Práticar
  </label><br>
  <input :class="{'equal':classEqual[0]}" v-model="question.question1[2]" type="range"  min="1" max="4">
    {{ question.question1[2] }}
    <br>
  <label>
  Observar e ouvir
  </label><br>
  <input :class="{'equal':classEqual[0]}" v-model="question.question1[3]" type="range"  min="1" max="4">
    {{ question.question1[3] }}
  <br><br>

<h2>2. Costumo ter facilidade de aprender, principalmente quando ... </h2>
  <label>
  Ouço e observo com atenção
  </label><br>
  <input :class="{'equal':classEqual[1]}" v-model="question.question2[0]" type="range"  min="1" max="4">
    {{ question.question2[0] }}
    <br>
  <label>
  Utilizo racioncínio lógico
</label><br>
<input :class="{'equal':classEqual[1]}" v-model="question.question2[1]" type="range"  min="1" max="4">
{{ question.question2[1] }}
<br>
  <label>
  Me baseio em meus palpites e impressões
  </label><br>
  <input :class="{'equal':classEqual[1]}" v-model="question.question2[2]" type="range"  min="1" max="4">
    {{ question.question2[2] }}
    <br>
  <label>
  Executando o que aprendi
  </label><br>
  <input :class="{'equal':classEqual[1]}" v-model="question.question2[3]" type="range"  min="1" max="4">
    {{ question.question2[3] }}
  <br><br>

<h2>3. Quando estou aprendendo costumo ...</h2>

  <label>
  Buscar explicações para os tópicos estudados
  </label><br>
  <input :class="{'equal':classEqual[2]}" v-model="question.question3[0]" type="range"  min="1" max="4">
    {{ question.question3[0] }}
    <br>
  <label>
  Ser responsável a cerca das coisas - disciplinado(a)
  </label><br>
  <input :class="{'equal':classEqual[2]}" v-model="question.question3[1]" type="range"  min="1" max="4">
    {{ question.question3[1] }}
    <br>
  <label>
  Ficar quieto e me concentrar
  </label><br>
  <input :class="{'equal':classEqual[2]}" v-model="question.question3[2]" type="range"  min="1" max="4">
    {{ question.question3[2] }}
    <br>
  <label>
  Ter sentimentos e reações fortes
  </label><br>
  <input :class="{'equal':classEqual[2]}" v-model="question.question3[3]" type="range"  min="1" max="4">
    {{ question.question3[3] }}
  <br><br>

<h2>4. Aprendo ...</h2>

  <label>
  Sentindo (raiva, tristeza, admiração, curiosidade, etc.)
  </label><br>
  <input :class="{'equal':classEqual[3]}" v-model="question.question4[0]" type="range"  min="1" max="4">
    {{ question.question4[0] }}
    <br>
  <label>
  Fazendo
  </label><br>
  <input :class="{'equal':classEqual[3]}" v-model="question.question4[1]" type="range"  min="1" max="4">
    {{ question.question4[1] }}
    <br>
  <label>
  Observando
  </label><br>
  <input :class="{'equal':classEqual[3]}" v-model="question.question4[2]" type="range"  min="1" max="4">
    {{ question.question4[2] }}
    <br>
  <label>
  Pensando
  </label><br>
  <input :class="{'equal':classEqual[3]}" v-model="question.question4[3]" type="range"  min="1" max="4">
    {{ question.question4[3] }}
  <br><br>

<h2>5. Enquanto aprendo gosto de ...</h2>

  <label>
  Me abrir a novas experiências
  </label><br>
  <input :class="{'equal':classEqual[4]}" v-model="question.question5[0]" type="range"  min="1" max="4">
    {{ question.question5[0] }}
    <br>
  <label>
  Examinar todos os ângulos da questão
  </label><br>
  <input :class="{'equal':classEqual[4]}" v-model="question.question5[1]" type="range"  min="1" max="4">
    {{ question.question5[1] }}
    <br>
  <label>
  Analisar as coisas - Desdobrá-las em partes para entendê-las/resolvê-las
  </label><br>
  <input :class="{'equal':classEqual[4]}" v-model="question.question5[2]" type="range"  min="1" max="4">
    {{ question.question5[2] }}
    <br>
  <label>
  Testar as coisas (Práticas, métodos, etc.)
  </label><br>
  <input :class="{'equal':classEqual[4]}" v-model="question.question5[3]" type="range"  min="1" max="4"> 
    {{ question.question5[3] }}
  <br><br>

<h2>6. Enquanto estudo sou ...</h2>

  <label>
  Alguém que prefere observar
  </label><br>
  <input :class="{'equal':classEqual[5]}" v-model="question.question6[0]" type="range"  min="1" max="4">
    {{ question.question6[0] }}
    <br>
  <label>
  Ativo(a) - Utilizo mais de um método de estudo
  </label><br>
  <input :class="{'equal':classEqual[5]}" v-model="question.question6[1]" type="range"  min="1" max="4">
    {{ question.question6[1] }}
    <br>
  <label>
  Intuitivo(a) - Entender quais são as suas dificuldades e conseguir identificar o que se encaixa melhor para o seu processo de aprendizagem
  </label><br>
  <input :class="{'equal':classEqual[5]}" v-model="question.question6[2]" type="range"  min="1" max="4">
    {{ question.question6[2] }}
    <br>
  <label>
  Lógico(a) - Utilizar a lógica e a razão para entender o tema abordado
  </label><br>
  <input :class="{'equal':classEqual[5]}" v-model="question.question6[3]" type="range"  min="1" max="4">
    {{ question.question6[3] }}
  <br><br>

<h2>7. Aprendo melhor através de ...</h2>

  <label>
  Observação
  </label><br>
  <input :class="{'equal':classEqual[6]}" v-model="question.question7[0]" type="range"  min="1" max="4">
    {{ question.question7[0] }}
    <br>
  <label>
  Interações pessoais - Adquirir conhecimento por meio de interações com outras pessoas
  </label><br>
  <input :class="{'equal':classEqual[6]}" v-model="question.question7[1]" type="range"  min="1" max="4">
    {{ question.question7[1] }}
    <br>
  <label>
  Teorias racionais - Modelos conceituais baseados em princípios lógicos e raciocínio dedutivo
  </label><br>
  <input :class="{'equal':classEqual[6]}" v-model="question.question7[2]" type="range"  min="1" max="4">
    {{ question.question7[2] }}
    <br>
  <label>
  Oportunidades para experimentar e práticar
  </label><br>
  <input :class="{'equal':classEqual[6]}" v-model="question.question7[3]" type="range"  min="1" max="4">
    {{ question.question7[3] }}
  <br><br>

<h2>8. Enquanto aprendo ...</h2>

  <label>
  Gosto de ver o resultado do meu trabalho<br>
    <input :class="{'equal':classEqual[7]}" v-model="question.question8[0]" type="range"  min="1" max="4">
    {{ question.question8[0] }}
    <br>
  </label><br>
  <label>
  Me interesso em ter/conhecer idéias e teorias
  </label><br>
  <input :class="{'equal':classEqual[7]}" v-model="question.question8[1]" type="range"  min="1" max="4">
    {{ question.question8[1] }}
    <br>
  <label>
  Penso antes de agir - planejar-se
  </label><br>
  <input :class="{'equal':classEqual[7]}" v-model="question.question8[2]" type="range"  min="1" max="4">
    {{ question.question8[2] }}
    <br>
  <label>
  Sinto-me pessoalmente envolvido(a) nos assuntos
  </label><br>
  <input :class="{'equal':classEqual[7]}" v-model="question.question8[3]" type="range"  min="1" max="4">
    {{ question.question8[3] }}
  <br><br>

<h2>9. Aprendo melhor quando me apóio em ...</h2>

  <label>
  Minhas observações
  </label><br>
  <input :class="{'equal':classEqual[8]}" v-model="question.question9[0]" type="range"  min="1" max="4">
    {{ question.question9[0] }}
    <br>
  <label>
  Minhas impressões
  </label><br>
  <input :class="{'equal':classEqual[8]}" v-model="question.question9[1]" type="range"  min="1" max="4">
    {{ question.question9[1] }}
    <br>
  <label>
  Posso experimentar coisas por mim mesmo(a)
  </label><br>
  <input :class="{'equal':classEqual[8]}" v-model="question.question9[2]" type="range"  min="1" max="4">
    {{ question.question9[2] }}
    <br>
  <label>
  Me apóio em minhas idéias
  </label><br>
  <input :class="{'equal':classEqual[8]}" v-model="question.question9[3]" type="range"  min="1" max="4">
    {{ question.question9[3] }}
  <br><br>

<h2>10. Quando estou aprendendo costumo ser ...</h2>

  <label>
  Compenetrado(a) - muito atento, concentrado
</label><br>
  <input :class="{'equal':classEqual[9]}"  v-model="question.question10[0]" type="range"  min="1" max="4">
  {{ question.question10[0] }}
  <br>
<label>
  Fléxivel
</label><br>
  <input :class="{'equal':classEqual[9]}"  v-model="question.question10[1]" type="range"  min="1" max="4">    
  {{ question.question10[1] }}
  <br>
  <label>
  Responsável
</label><br>
  <input :class="{'equal':classEqual[9]}"  v-model="question.question10[2]" type="range"  min="1" max="4">
  {{ question.question10[2] }}
  <br>
  <label>
  Racional
</label><br>
  <input :class="{'equal':classEqual[9]}"  v-model="question.question10[3]" type="range"  min="1" max="4">
  {{ question.question10[3] }}
<br><br>

<h2>11. Enquanto aprendo costumo ...</h2>

  <label>
  Me envolver totalmente
</label><br>
  <input :class="{'equal':classEqual[10]}"  v-model="question.question11[0]" type="range"  min="1" max="4">    
  {{ question.question11[0] }}
  <br>
  <label>
  Gostar de observar
</label><br>
  <input :class="{'equal':classEqual[10]}"  v-model="question.question11[1]" type="range"  min="1" max="4">  
  {{ question.question11[1] }}
  <br>
  <label>
  Avaliar as coisas
</label><br>
  <input :class="{'equal':classEqual[10]}"  v-model="question.question11[2]" type="range"  min="1" max="4">
  {{ question.question11[2] }}
  <br>
  <label>
   Estar ativo(a)
  </label><br>
   <input :class="{'equal':classEqual[10]}"  v-model="question.question11[3]" type="range"  min="1" max="4">
   {{ question.question11[3] }}
<br><br>

<h2>12. Aprendo melhor quando ...</h2>

  <label>
  Analiso as idéias
</label><br>
  <input :class="{'equal':classEqual[11]}"  v-model="question.question12[0]" type="range"  min="1" max="4">  
  {{ question.question12[0] }}
  <br>
  <label>
  Sou receptivo(a) e mente aberta
</label><br>
  <input :class="{'equal':classEqual[11]}"  v-model="question.question12[1]" type="range"  min="1" max="4">
  {{ question.question12[1] }}
  <br>
  <label>
  Sou cuidadoso(a) - Tomar decisões para garantir que a aprendizagem aconteça de forma precisa, sem erros
</label><br>
  <input :class="{'equal':classEqual[11]}"  v-model="question.question12[2]" type="range"  min="1" max="4">
  {{ question.question12[2] }}
  <br>
  <label>
  Sou prático(a) - Buscar formas de tornar o aprendizado mais significativo e relevante, e aplico o que está sendo estudado na prática
</label><br>
<input :class="{'equal':classEqual[11]}"  v-model="question.question12[3]" type="range"  min="1" max="4">
{{ question.question12[3] }}
<br><br>
  <button @click='result()'>Calcular resultado</button>
</section>
</template>

<script>

export default{
  name: 'QuestionLearningStyles',
  data() {
      return{
        classEqual:[false,false,false,false,false,false,false,false,false,false,false,false],
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
                alert("Seu estilo predominante é DIVERGENTE")
							}else if(resultsum == assimilador) {
								alert("Seu estilo predominante é ASSIMILADOR") 
              }else if(resultsum == convergente) {
								alert("Seu estilo predominante é CONVERGENTE") 
							}else if (resultsum == acomodador) {
								alert("Seu estilo predominante é ACOMODADOR")
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
<style scoped>
section{
  margin: 100px;
}
input{
-webkit-appearance: none;
appearance: none;
border-color: black;
border-style: inherit;
border: 1px;
border-radius: 9px;
background-color: aliceblue;

}
input ::-webkit-slider-thumb{
-webkit-appearance: none;
appearance: none;
background-color: black;
}
input ::-moz-range-thumb{
-webkit-appearance: none;
appearance: none;
  background-color:black;
}
.equal{
-webkit-appearance: none;
appearance: none;
background-color:red;
}

</style>