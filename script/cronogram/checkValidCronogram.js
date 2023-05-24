//script para verificar se todas as perguntas tiveram ao menos uma resposta
        var form = document.getElementById("form");
        
        form.addEventListener('submit', (event) => {
            event.preventDefault();
           
            var subject = form.elements["materia[]"];
            var days = form.elements["dias[]"];
            var shifts= form.elements["turnos[]"];
            var otherSubjects = document.getElementById("outrasMaterias");

            function test(parameter){
                for (let i = 0; i < parameter.length; i++) {
                    if(parameter[i].checked) {
                        return true;
                    }
                }
            }
           
            if(!test(subject) && otherSubjects.value == null){
                alert("Por favor, escolha uma materia");
            }else if(!test(shifts)){
                alert("Escolha um turno para montar seu cronograma!");
            }else{
                form.submit();
            }
        });