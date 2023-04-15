const form = document.getElementById('form');
        const login = document.getElementById('login');
        const senha = document.getElementById('senha');

        form.addEventListener('submit', (event) => {
            event.preventDefault();
            const teste = new XMLHttpRequest();
            teste.onreadystatechange = function () {
                if(this.readyState === 4 && this.status === 200){
                    if(this.responseText == 'tudoErrado'){
                        alert('você errou sua senha ou seu email!');
                    }else{
                        form.submit();
                    }
                }
            }
            const dados = new FormData();
            dados.append('login',login.value);
            dados.append('senha',senha.value);
            teste.open('POST','/php/userCRUD/verificarExistenciaUser.php',true);
            teste.send(dados);
        });