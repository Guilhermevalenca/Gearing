import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import store from './store';
import '@/assets/css/global.css';
import '@/assets/css/globalSwals.css';
import axios from "axios";
import Swal from 'sweetalert2';
import { library } from '@fortawesome/fontawesome-svg-core';
import { faPencil,faTrash,faReply } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

library.add(faPencil,faTrash,faReply);
//criado pelo vue:
const app = createApp(App);
app.component("FA",FontAwesomeIcon)
app.use(store);
app.use(router);

app.config.globalProperties.$logoutUser = async () => {
    let idSession = localStorage.getItem('idSession');
    Swal.showLoading();
    axios.post(`${store.state.req.api}/authorizationActions/revokingAuthorizedAccess.php`,{
        id: idSession
    })
    .then(response => {
        if(response.data.success){
            localStorage.removeItem('idSession');
            store.dispatch('changeUser',{
                username: '',
                email: '',
                auth: ''
            });
        }
    })
    .catch(error => {
        console.log(error)
    })
    .finally( () => {
        Swal.close();
    })
}
//checks if the user is authenticated and sends it to the menu
app.config.globalProperties.$checkAuthentication = async () => {
    let idSession = localStorage.getItem('idSession');
    
    if(idSession){
        Swal.showLoading();
        axios.post(`${store.state.req.api}/authorizationActions/checkingAccessAuthorization.php`,{
            id: idSession
        })
        .then(response => {
            if(response.data.success){
                store.dispatch('changeUser',response.data.user);
            }else if(response.data == "NOT AUTH"){
                localStorage.removeItem('idSession');
            }else{
                console.log(response.data.error);
            }
        })
        .catch(error => {
            console.log(error)
        })
        .finally( () => {
            Swal.close();
        })
    }
}

app.config.globalProperties.$checkAdm = async function() {
    axios.post(`${store.state.req.api}/authorizationActions/checkAdm.php`,{
        id: localStorage.getItem('idSession')
    })
    .then(response =>{
        console.log('check:', response)
        if(response.data.success){
            return response.data.adm === 1 ? true : false;
        }
    })
    .catch(error => {
        console.log(error)
        return false
    })
}

app.mount('#app')
