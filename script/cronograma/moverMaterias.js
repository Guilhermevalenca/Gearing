const origemMateria = document.getElementById('origemMateria');
const destinoMateria = document.querySelectorAll('.destinoMateria');
new Sortable(origemMateria, {
    group: 'shared',
    animation: 150
})
destinoMateria.forEach(destino => {
    new Sortable(destino, {
        group: 'shared',
        animation: 150
    })
})
const form = document.getElementById('form');
const table = document.getElementById('table');
form.addEventListener('submit', (event) => {
    let linha = 0;
    let coluna = 0;
    destinoMateria.forEach(divUnica =>{
        const diaSemana = divUnica.querySelectorAll('.diaSemana');
        const horario = divUnica.querySelectorAll('.horario');
        
        diaSemana.forEach(dia => {
            if(dia){
                dia.value = coluna;
                console.log(dia.value)
            }
        })
        horario.forEach(hora => {
            if(hora){
                hora.value = linha;
                console.log(hora.value)
            }
        })
        coluna++;
        if(coluna == 7){
            coluna = 0;
            linha++;
        }
    })
    $verificacao = confirm('tem certeza que fez todas as alterações necessarias? Por hora nosso site nao suporta edições de cronograma no momento. Clique em "ok" para continuar');
    if($verificacao == true){
        form.submit();
    }else{
        event.preventDefault();
    }
})