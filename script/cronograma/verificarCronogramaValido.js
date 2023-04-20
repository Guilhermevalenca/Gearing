//script para verificar se todas as perguntas tiveram ao menos uma resposta

        var form = document.getElementById("form");
        
        form.addEventListener('submit', (event) => {
            event.preventDefault();
           
            var horarios = form.elements["horario[]"];
            var materias = form.elements["materia[]"];
             var dias = form.elements["dias[]"];
             var tempoMateria = form.elements["tempomateria[]"];

            function teste(parametro){
                for (let i = 0; i < parametro.length; i++) {
                    if(parametro[i].checked) {
                        return true;
                    }
                }
            }
            function teste2(tempomateria){
                if(tempomateria <= 0){
                    alert ("Voce precisa estudar irmão!");
                }
            }
            if(!teste(horarios)){
                alert("Por favor, escolha uma disponibilidade");
            }else if(!teste(materias)){
                alert("Por favor, escolha uma materia");
            }else if(!teste(dias)){
                alert("Você não selecionou nenhum dia!");
            }else if(!teste(tempoMateria)){
                alert("tempo para cada materia nao escolhido");
            }
            else{
                form.submit();
            }
        });