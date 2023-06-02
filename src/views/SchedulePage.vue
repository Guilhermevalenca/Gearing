<template>
    <div>
        <h1>Hello, i am cronogram</h1>
    </div>

    <div>
        <button @click="showCreateSchedule()">criar cronograma</button>
        <button @click="showViewSchedule()">vizualizar cronogramas criados</button>
    </div>

    <div>
        <div v-if="createSchedule">
            <CreateSchedule @saveMatters="nextStage()" />
        </div>
        <div v-if="createSchedule">
            <MountedSchedule />
        </div>
        <div v-if="viewSchedule">
            <ViewSchedule />
        </div>
    </div>
</template>
<script>
import CreateSchedule from '@/components/SchedulePage/CreateSchedule.vue';
import MountedSchedule from '@/components/SchedulePage/MountedSchedule.vue';
import ViewSchedule from '@/components/SchedulePage/ViewSchedule.vue';

export default{
    beforeCreate() {
        this.$authUser();
    },
    components: { CreateSchedule, ViewSchedule, MountedSchedule },
    data() {
        return {
            createSchedule: false,
            viewSchedule: false
        }
    },
    methods: {
        showCreateSchedule() {
            if(this.viewSchedule){
                this.viewSchedule = false;
            }this.createSchedule = !this.createSchedule;
        },
        showViewSchedule() {
            if(this.createSchedule){
                this.createSchedule = false;
            }this.viewSchedule = !this.viewSchedule;
        }
    }
    
}
</script>