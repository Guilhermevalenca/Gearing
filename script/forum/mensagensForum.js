let recarregar;
    function atualizar(){
        recarregar = setInterval(() => {
            location.reload();
        }, 5000);
    }
    atualizar();