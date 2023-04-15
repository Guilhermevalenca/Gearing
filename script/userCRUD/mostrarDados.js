const form = document.getElementById("formulario");
const editar = document.getElementById("editar");
        
form.addEventListener('submit', (event) => {
    event.preventDefault();
    const validandoRecurso = new XMLHttpRequest();
    validandoRecurso.onreadystatechange = () => {
        if(this.readyState === 4 && this.status === 200){
            if(this.ResponseText == "Realize o alert"){
                alert("A informação que voce quer editar ela ja esta sendo utilizada em outra conta");
            }else{
                form.submit();
            }
        }
    }
    const enviarDados = new FormData();
    enviarDados.append('edicao',editar.value);
    if(editar.name == "emailNovo"){
        enviarDados.append('indice',2);
    }else if(editar.name == "userNovo"){
        enviarDados.append('indice',0);
    }
    validandoRecurso.open("POST",'/php/userCRUD/verificarExistDado.php',true);
    validandoRecurso.send(enviarDados);
});
