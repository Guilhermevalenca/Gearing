fetch('/src/headerOptionMenu.php')
    .then(response => response.text())
    .then(data => {
        document.getElementById('cabecalho').innerHTML = data;
    });

