<template>
    <div>
        <h1>Hello, i am cronogram</h1>
    </div>
    <div v-if="cronogramStates.currentStates == 1">
        <CreateCronogram @saveMatters="nextStage()" />
    </div>
    <div v-if="cronogramStates.currentStates == 2">
        <MountedCronogram />
    </div>
    <div v-if="cronogramStates.currentStates == 3">
        <ViewCronogram />
    </div>
</template>
<script>
import CreateCronogram from '@/components/SchedulePage/CreateSchedule.vue';
import MountedCronogram from '@/components/SchedulePage/MountedSchedule.vue';
import ViewCronogram from '@/components/SchedulePage/ViewSchedule.vue';
import Swal from 'sweetalert2';

export default{
    beforeCreate() {
        this.$authUser();
    },
    components: { CreateCronogram, ViewCronogram, MountedCronogram },
    data() {
        return {
            cronogramStates: {
                stages: [1,2,3], //the attribute stage exists to remember the stages
                currentStates: 1
            }
        }
    },
    methods: {
        nextStage() {
            Swal.fire({
                title: 'Proximo etada!!!',
                text: 'Vamos para proxima etapa, a etapa de montagem do cronograma, nesta etapa não é possivel adicionar novas materias e nem alterar o turno',
                showCancelButton: true,
                confirmButtonText: 'OK',
                cancelButtonText: 'cancelar'
            })
            .then(response => {
                if(response.isConfirmed){
                    this.cronogramStates.currentStates++
                }
            })
        }
    }
    
}
</script>