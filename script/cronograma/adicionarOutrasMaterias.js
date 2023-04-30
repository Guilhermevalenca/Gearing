let materiaExtra = document.getElementById("outrasMaterias");
let labelInput = document.getElementById('gerarInputs');
let adicionarMateria = document.getElementById('adicionarMateria');


materiaExtra.addEventListener('click', (event) => {
    event.preventDefault();
    form.disabled = true;
});

function novoInput(){
    let newInput = document.createElement('input');
    newInput.type = "text";
    newInput.placeholder = "Digite aqui a matéria";
    newInput.name = "materia[]";
    newInput.required = true;
    labelInput.appendChild(newInput);
}