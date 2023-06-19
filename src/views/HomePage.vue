<template>
  <div>
    <AccessForm />
  </div>
  <div>
    <QuizLearningStyles />
  </div>
</template>

<script>
import AccessForm from '@/components/homePage/AccessForm.vue';
import QuizLearningStyles from '@/components/LearningStylesPage/QuizLearningStyles.vue';

export default {
  components: {AccessForm, QuizLearningStyles},
  data() {
    return{
      showForm: true,
      testandoEssaPoha: ''
    }
  }
}
</script>
