//script para verificar se todas as perguntas tiveram ao menos uma resposta
        

        var form = document.getElementById("form");

        form.addEventListener('submit', (event) => {
            event.preventDefault();
            var dias form.elements["dias[]"];
            var horarios = form.elements["horario[]"];
            var materias = form.elements["materia[]"];
            //var tempoEstudar = form.elements["tempo[]"];
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
            //}else if(!teste(tempoEstudar)){
              //  alert("Por favor, escolha um horario");
            }elseif(!teste(dias)){
                alert("Você não selecionou nenhum dia!");
            }else{
                form.submit();
            }
        });