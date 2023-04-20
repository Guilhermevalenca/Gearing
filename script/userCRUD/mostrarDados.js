const form = document.getElementById("formulario");
const editar = document.getElementById("editar");

form.addEventListener('submit', (event) => {
    event.preventDefault();
    if(editar.name == "emailNovo"){
        $indice = 2;
    }else if(editar.name == "userNovo"){
        $indice = 0;
    }

    const validandoRecurso = new XMLHttpRequest();
    validandoRecurso.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                if(this.responseText == "Realize o alert") {
                    alert('email ou usuario ja existente, tente novamente!');
                } else {
                    alert("ola, voce editou suas informações");
                }
            }
        }
        const dados = new FormData();
        dados.append('edicao',editar.value);
        dados.append('indice',$indice);
        test.open('POST','/php/userCRUD/verificarExistDado.php', true);
        test.send(dados);
});
