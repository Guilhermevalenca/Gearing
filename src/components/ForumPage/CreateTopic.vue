<template>
    <section>
        <div>i'm create topic</div>
    </section>
    <section>
        <div class="info">
            <label class="info-name">
                Nome do topico: <input v-model="name" type="text">
            </label>
            <label class="info-description">
                Descrição: <textarea v-model="description" rows="3" cols="20" maxlength="9999">DESCREVA AQUI</textarea>
            </label>
        </div>
    </section>
</template>

<script>
import Swal from 'sweetalert2';

export default{
    data() {
        return {
            name: '',
            description: ''
        }
    },
    watch: {
        description: {
            handler(){
                if(this.description.length === 9999){
                    Swal.fire('limite de caracteres atingido')
                }
            },
            deep: true
        }
    }
}
</script>

<style scoped>
.info, .info-description, .info-name{
    display: grid;
    justify-content: center;
}
</style>