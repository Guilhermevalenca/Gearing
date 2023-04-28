fetch('/src/cabecalhoOptionMenu.php')
    .then(response => response.text())
    .then(data => {
        document.getElementById('cabecalho').innerHTML = data;
    })