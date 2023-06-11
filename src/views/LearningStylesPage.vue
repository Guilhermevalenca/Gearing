<template>
    <div> ai </div>
    <QuizLearningStyles/>
</template>

<script>

import QuizLearningStyles from '@/components/LearningStylesPage/QuizLearningStyles.vue';

export default{
    name: 'LearningStylesPage',
    components:{
     QuizLearningStyles,
    },
    beforeCreate(){
        this.$authUser()
    }
}
</script>