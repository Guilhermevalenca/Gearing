//script para verificar se todas as perguntas tiveram ao menos uma resposta

        var form = document.getElementById("form");
        
        form.addEventListener('submit', (event) => {
            event.preventDefault();
           
            var materias = form.elements["materia[]"];
            var dias = form.elements["dias[]"];
            var turnos= form.elements["turnos[]"];
            var outraMateria = document.getElementById("outrasMaterias");

            function teste(parametro){
                for (let i = 0; i < parametro.length; i++) {
                    if(parametro[i].checked) {
                        return true;
                    }
                }
            }
           
            if(!teste(materias) && outraMateria.value != null){
                alert("Por favor, escolha uma materia");
            }else if(!teste(dias)){
                alert("Você não selecionou nenhum dia!"); 
            }else if(!teste(turnos)){
                alert("Escolha um turno para montar seu cronograma!");
            }else{
                form.submit();
            }
        });