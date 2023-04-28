let materiaExtra = document.getElementById("outrasMaterias");
let labelInput = document.getElementById('gerarInputs');
let adicionarMateria = document.getElementById('adicionarMateria');

function novoInput(){
    let newInput = document.createElement('input');
    newInput.type = "text";
    newInput.placeholder = "Digite aqui a matéria";
    newInput.name = "materia[]";
    labelInput.appendChild(newInput);
}