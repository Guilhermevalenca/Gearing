import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import store from './store';
import axios from "axios";

//criado pelo vue:
const app = createApp(App);
app.use(store);
app.use(router);

app.config.globalProperties.$authUser = async () => {
    let idSession = localStorage.getItem('idSession');
    if(!idSession){
        router.push('/');
    }else{
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
    }
}
app.config.globalProperties.$logoutUser = async () => {
    let idSession = localStorage.getItem('idSession');
    if(idSession){
        axios.post('http://localhost:8000/authorizationActions/revokingAuthorizedAccess.php',{
            id: idSession
        })
        .then(response => {
            if(!response.data){
                localStorage.removeItem('idSession');
                router.push('/')
            }
        })
    }
}
app.config.globalProperties.$checkAuthentication = async () => {
    let idSession = localStorage.getItem('idSession');
    if(idSession){
        axios.post('http://localhost:8000/authorizationActions/checkingAccessAuthorization.php',{
            id: idSession
        })
        .then(response => {
            if(response.data){
                store.dispatch('changeUser',response.data);
                router.push('/menu');
            }
        })
    }
}

app.mount('#app')