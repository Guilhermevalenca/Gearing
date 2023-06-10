<template>

<section>
    <div>i'm forum</div>
</section>
<section>
    <CreateTopic />
    <ViewTopics />
</section>

</template>
<script>
import CreateTopic from '@/components/ForumPage/CreateTopic.vue';
import ViewTopics from '@/components/ForumPage/ViewCreatedTopics.vue';
export default{
    data(){
        return{

        }
    },
    components: {CreateTopic, ViewTopics}
}
</script>