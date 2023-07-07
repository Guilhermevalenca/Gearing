<template>
<section>
    <div>
        <h2>Bem-vindo(a) à página de cronogramas</h2>
        <p class="explanatory">Aqui você poderá visualizar seus cronogramas ou criar novos cronogramas.</p>
    </div>

    <div class="options">
        <button @click="showCreateSchedule()">Criar cronograma</button>
        <button @click="showViewSchedule()">Vizualizar cronogramas criados</button>
    </div>
</section>
<section>
    <div>
        <div v-if="createSchedule">
            <CreateSchedule @viewShedules="showViewSchedule()" />
        </div>
        <div v-if="viewSchedule">
            <ViewSchedule />
        </div>
        <div v-if="showEditSchedule">
            <EditSchedule @viewSchedule="showViewSchedule()" />
        </div>
    </div>
</section>
</template>
<script>
import CreateSchedule from '@/components/SchedulePage/CreateSchedule.vue';
import ViewSchedule from '@/components/SchedulePage/ViewSchedule.vue';
import EditSchedule from '@/components/SchedulePage/EditSchedule.vue';
import Swal from 'sweetalert2';

export default{
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
            if(!this.$store.state.user.auth){
                Swal.fire({
                    title: 'Ação negada',
                    text: 'Apenas usuarios cadastrados no sistema tem permissão para criar cronograma',
                    customClass: {
                        popup: 'swal-popup-custom',
                        title: 'swal-title-custom',
                        htmlContainer: 'swal-html-container-custom',
                    }
                })
                return
            }
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
.explanatory{
    text-align: center;
}
</style>