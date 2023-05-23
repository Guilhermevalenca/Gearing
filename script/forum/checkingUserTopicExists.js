const form = document.getElementById("form");

form.addEventListener('submit', (event) => {
	event.preventDefault();
	const verificar = new XMLHttpRequest();
	verificar.onreadystatechange = function() {
		if(this.readyState === 4 && this.status === 200){
			if(this.responseText == "prossiga"){
				form.submit();
			}else if(this.responseText == "naoProssiga"){
				alert("Cada usuario so pode criar um unico topico!!!");
			}
		}
	}
	verificar.open('GET','/php/forum/checkIfTopicExists.php',true);
	verificar.send();
})