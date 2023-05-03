fetch('/src/cabecalhoOptionMenu.php')
    .then(response => response.text())
    .then(data => {
        document.getElementById('cabecalho').innerHTML = data;
    });
const buttonOption = document.getElementById('expandir');
const option = document.getElementById('cabecalho');
const tamanhoTela = window.innerWidth;
buttonOption.addEventListener('click', (event) => {
    
    if(option.style.display !== 'none'){
        option.style.display = 'none';
    }else{
        if(tamanhoTela <= 640){
            option.style.display = 'grid';
        }else{
            option.style.display = 'flex';
        }
    }
})