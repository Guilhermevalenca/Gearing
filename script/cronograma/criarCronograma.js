<<<<<<< HEAD
//script para verificar se todas as perguntas tiveram ao menos uma resposta
        

=======
 //script para verificar se todas as perguntas tiveram ao menos uma resposta
>>>>>>> refs/remotes/origin/main
        var form = document.getElementById("form");

        form.addEventListener('submit', (event) => {
            event.preventDefault();
<<<<<<< HEAD
            var dias form.elements["dias[]"];
            var horarios = form.elements["horario[]"];
            var materias = form.elements["materia[]"];
            //var tempoEstudar = form.elements["tempo[]"];
=======
            var horarios = form.elements["horario[]"];
            var materias = form.elements["materia[]"];
            var tempoEstudar = form.elements["tempo[]"];
>>>>>>> refs/remotes/origin/main
            function teste(parametro){
                for (let i = 0; i < parametro.length; i++) {
                    if(parametro[i].checked) {
                        return true;
                    }
                }
            }
            if(!teste(horarios)){
                alert("Por favor, escolha uma disponibilidade");
            }else if(!teste(materias)){
                alert("Por favor, escolha uma materia");
<<<<<<< HEAD
            //}else if(!teste(tempoEstudar)){
              //  alert("Por favor, escolha um horario");
            }elseif(!teste(dias)){
                alert("Você não selecionou nenhum dia!");
=======
            }else if(!teste(tempoEstudar)){
                alert("Por favor, escolha um horario");
>>>>>>> refs/remotes/origin/main
            }else{
                form.submit();
            }
        });