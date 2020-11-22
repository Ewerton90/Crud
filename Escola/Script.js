function validar(){
	
	var nome = document.getElementById("nome").value;
	
	if(nome == ""){
		alert("Nome é Obrigatório");
		return false;
	}
	
	var nascimento = document.getElementById("nascimento").value;
	
	if(nascimnto == ""){
		alert("Data de nascimento é Obrigatório");
		return false;
	}
	
	var anocurso = document.getElementById("anocurso").value;
	
	if(anocurso == ""){
		alert("Ano Curso é Obrigatório");
		return false;
	}
	
	var materia = document.getElementById("materia").value;
	
	if(materia == ""){
		alert("Materia é Obrigaório");
		return false;
	}
		return true;
}