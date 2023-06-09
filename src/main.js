import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import store from './store';
import axios from "axios";
import Swal from 'sweetalert2';

//criado pelo vue:
const app = createApp(App);
app.use(store);
app.use(router);

//checks if the user is authenticated, if not he is redirected to the home page
app.config.globalProperties.$authUser = async () => {
    
    let idSession = localStorage.getItem('idSession');
    if(!idSession){
        router.push('/');
    }else{
        Swal.showLoading();
        axios.post('http://localhost:8000/authorizationActions/checkingAccessAuthorization.php',{
            id: idSession
        })
        .then(response => {
            if(response.data){
                store.dispatch('changeUser',response.data);
            }else{
                router.push('/')
            }
        })
        .catch(() => {
            router.push('/')
        })
        .finally( () => {
            Swal.close();
        })
    }
}
app.config.globalProperties.$logoutUser = async () => {
    let idSession = localStorage.getItem('idSession');
    if(idSession){
        Swal.showLoading();
        axios.post('http://localhost:8000/authorizationActions/revokingAuthorizedAccess.php',{
            id: idSession
        })
        .then(response => {
            if(!response.data){
                localStorage.removeItem('idSession');
                router.push('/')
            }
        })
        .catch(() => {
            router.push('/')
        })
        .finally( () => {
            Swal.close();
        })
    }
}
//checks if the user is authenticated and sends it to the menu
app.config.globalProperties.$checkAuthentication = async () => {
    let idSession = localStorage.getItem('idSession');
    if(idSession){
        Swal.showLoading();
        axios.post('http://localhost:8000/authorizationActions/checkingAccessAuthorization.php',{
            id: idSession
        })
        .then(response => {
            if(response.data){
                store.dispatch('changeUser',response.data);
                router.push('/menu');
            }
        })
        .catch(() => {
            router.push('/')
        })
        .finally( () => {
            Swal.close();
        })
    }
}

app.mount('#app')