<template>
    <QuizLearningStyles/>
</template>

<script>

import QuizLearningStyles from '@/components/LearningStylesPage/QuizLearningStyles.vue';
import Swal from 'sweetalert2';

export default{
    name: 'LearningStylesPage',
    components:{
     QuizLearningStyles,
    },
       created(){
        Swal.fire({
            title: 'Quiz estilos de aprendizagem',
            text: 'Respondendo a este quéstionário você descobrirá qual é o seu estilo de aprendizagem, ou seja,a forma como você melhor aprende. O objetivo desse teste é te ajudar a descobrir qual métodologia se encaixa melhor para o seu estilo de aprendizagem.',
            confirmButtonText: 'Vamos lá!',
                customClass: {
                      popup: 'swal-popup-custom',
                      title: 'swal-title-custom',
                      htmlContainer: 'swal-html-container-custom',
                  }
        })
    },
}
</script>