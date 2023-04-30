let materiaExtra = document.getElementById("outrasMaterias");
let labelInput = document.getElementById('gerarInputs');
let deleteInput = document.getElementById('apagarNovaMateria');

deleteInput.addEventListener('click', (event) => {
    event.preventDefault();
    form.disabled = true;
});
materiaExtra.addEventListener('click', (event) => {
    event.preventDefault();
    form.disabled = true;
});

function novoInput(){
    var newInput = document.createElement('input');
    newInput.type = "text";
    newInput.placeholder = "Digite aqui a matéria";
    newInput.name = "materia[]";
    newInput.required = true;
    var br = document.createElement('br');
    labelInput.appendChild(br);
    labelInput.appendChild(newInput);
}

function deletarInput(){
    let ultimoInput = labelInput.children[labelInput.children.length -1];
    if(ultimoInput != deleteInput){
        labelInput.removeChild(ultimoInput);
    }
}
