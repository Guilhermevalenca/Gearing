//adicionando todas as informações da tag em variaveis
const form = document.getElementById('formulario');
const user = document.getElementById('user');
const email = document.getElementById('email');
const senha = document.getElementById('senha');
const confirme = document.getElementById('confirme');
const buttonVoltar = document.getElementById('voltar');

buttonVoltar.addEventListener('click', (event) => {
    event.preventDefault();
    form.disabled = true;
})
//tratando as informações antes de enviar o formulario:
form.addEventListener('submit', (event) => {
    event.preventDefault();

 function verificaCaracteresEspeciais(inputStr) {
        const regex = /[!@#$%^&*(),.?":{}|<>]/;
        return regex.test(inputStr);
 }
      if(!verificaCaracteresEspeciais(senha.value)){
        alert('Sua senha deve conter caracteres especiais');
      }else if(senha.value !== confirme.value) {
        alert('As senhas não correspondem');
    }else{
        //req http:
        const test = new XMLHttpRequest();
        test.onreadystatechange = function() {
            //verificando se os dados foram processados corretamente:
            if (this.readyState === 4 && this.status === 200) {
                if(this.responseText == 'jaCadastrado') {
                    alert('Este email ou usuario já está registrado.');
                } else {
                    form.submit();
                }
            }
            }
            //enviando dados via metodo post para verificar a existencia de um usuario ja existente.
            const dados = new FormData();
            dados.append('email',email.value);
            dados.append('user',user.value);
            test.open('POST','/php/userCRUD/verificarEmailUser.php', true);
            test.send(dados);
            }
        
});