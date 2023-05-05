fetch('/src/cabecalhoOptionMenu.php')
    .then(response => response.text())
    .then(data => {
        document.getElementById('cabecalho').innerHTML = data;
    });
const divOption = document.getElementById('expandir');
const option = document.getElementById('cabecalho');
const tamanhoTela = window.innerWidth;
if(tamanhoTela <= 640){
    let newButtonOption = document.createElement('button');
    newButtonOption.style = "display:grid";
    for(let i = 0; i < 3; i++){
        let newButton = document.createElement('button');
        newButtonOption.appendChild(newButton);
    }
    divOption.appendChild(newButtonOption);
    newButtonOption.addEventListener('click', (event) => {
    
        if(option.style.display !== 'none'){
            option.style.display = 'none';
        }else{
            option.style.display = 'grid';
        }
    })    
}
