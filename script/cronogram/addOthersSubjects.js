
let extraSubject = document.getElementById("outrasMaterias");
let labelInput = document.querySelector('.novosInput');
let deleteInput = document.getElementById("apagarNovaMateria");

deleteInput.addEventListener("click", (event) => {
  event.preventDefault();
  form.disabled = true;
});

extraSubject.addEventListener('click', (event) => {
    event.preventDefault();
    form.disabled = true;
});

function novoInput() {
  var newInput = document.createElement("input");
  newInput.type = "text";
  newInput.placeholder = "Digite aqui a matéria";
  newInput.name = "materia[]";
  newInput.required = true;
  var br = document.createElement("br");
  labelInput.appendChild(br);
  labelInput.appendChild(newInput);
}

function deletarInput(){
    let lastInput = labelInput.children[labelInput.children.length -1];
    if(lastInput != deleteInput){
        labelInput.removeChild(lastInput);
    }
}