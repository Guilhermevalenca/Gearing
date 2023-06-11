<template>
<section>
    <div>
        <h2>Bem-vindo(a) à página de cronogramas</h2>
        <p>Aqui você poderá visualizar seus cronogramas ou criar novos cronogramas.</p>
    </div>

    <div class="options">
        <button @click="showCreateSchedule()">criar cronograma</button>
        <button @click="showViewSchedule()">vizualizar cronogramas criados</button>
    </div>
</section>
<section>
    <div>
        <div v-if="createSchedule">
            <CreateSchedule @quitCreatingSchedule="showViewSchedule()" />
        </div>
        <div v-if="viewSchedule">
            <ViewSchedule />
        </div>
        <div v-if="showEditSchedule">
            <EditSchedule />
        </div>
    </div>
</section>
</template>
<script>
import CreateSchedule from '@/components/SchedulePage/CreateSchedule.vue';
import ViewSchedule from '@/components/SchedulePage/ViewSchedule.vue';
import EditSchedule from '@/components/SchedulePage/EditSchedule.vue';

export default{
    beforeCreate() {
        this.$authUser();
    },
    components: { CreateSchedule, ViewSchedule, EditSchedule },
    data() {
        return {
            createSchedule: false,
            viewSchedule: true,
            showEditSchedule: false
        }
    },
    methods: {
        showCreateSchedule() {
            if(this.viewSchedule){
                this.viewSchedule = false;
            }
            this.createSchedule = true;
            this.$store.dispatch('changeSchedule','')
        },
        showViewSchedule() {
            if(this.createSchedule){
                this.createSchedule = false;
            }
            this.viewSchedule = true;
            this.$store.dispatch('changeSchedule','')
        }
    },
    watch: {
        $store: {
            handler() {
                if(this.$store.state.schedule.editTitle){
                    this.showEditSchedule = true;
                    this.viewSchedule = false;
                }else{
                    this.showEditSchedule = false;
                    this.createSchedule = false;
                    this.viewSchedule = true;
                }
            },
            deep:true
        }
    },
    computed: {

    }
}
</script>

<style scoped>
.options{
    margin: 2em;
}
</style>