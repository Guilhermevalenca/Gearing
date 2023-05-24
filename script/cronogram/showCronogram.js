function mostrarMaterias(){
    const materias = document.querySelectorAll('.materias');
    const recebendo = document.querySelectorAll('.recebendoMaterias');
    materias.forEach(materia => {
        const horario = materia.querySelector('.horario');
        const diaSemana = materia.querySelector('.dia');
        let i = 0;
        let j = 0;
        recebendo.forEach( (valor) => {
            if(horario.value == i && diaSemana.value == j){
                valor.appendChild(materia);
            }
            j++;
            if(j == 7){
                j = 0;
                i++;
            }
        })
    })
}
const buttons = document.querySelectorAll('.mostrarCronograma');
const montarTabela = document.querySelector('.cronograma');
buttons.forEach( (button,indice) => {
    button.addEventListener('click', () => {
        fetch(`./settingUpCronogram.php?id=${indice}`)
        .then(response => response.text())
        .then(data => {
            montarTabela.innerHTML = data;
            mostrarMaterias();
        
        })
    })
})