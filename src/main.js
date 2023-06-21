import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import store from './store';
import '@/assets/css/global.css';
import '@/assets/css/globalSwals.css';
import axios from "axios";
import Swal from 'sweetalert2';

//criado pelo vue:
const app = createApp(App);
app.use(store);
app.use(router);

app.config.globalProperties.$logoutUser = async () => {
    let idSession = localStorage.getItem('idSession');
    Swal.showLoading();
    axios.post('http://localhost:8000/authorizationActions/revokingAuthorizedAccess.php',{
        id: idSession
    })
    .then(response => {
        console.log(response);
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
        axios.post('http://localhost:8000/authorizationActions/checkingAccessAuthorization.php',{
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

app.mount('#app')
