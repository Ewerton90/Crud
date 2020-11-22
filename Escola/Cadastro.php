<?php

	$id = $_POST["id"];
	$nome = $_POST["nome"];
	$nascimento = $_POST["nascimento"];
	$anocurso = $_POST["anocurso"];
	$materia = $_POST["materia"];

	$conexao = new mysqli ("localhost", "root", "vertrigo", "escola");
	
	if($id == 0){
		
		$sql = $conexao->prepare("INSERT INTO cadastro (nome, nascimento, anocurso, materia) VALUES (?,?,?,?)");
		
		$sql->bind_param("ssss", $nome, $nascimento, $anocurso, $materia);
		
	} else {
			
		$sql = $conexao->prepare("UPDATE cadastro SET nome = ?, nascimento = ?, anocurso = ?, materia = ? WHERE id = ?");
			
		$sql->bind_param("ssssi", $nome, $nascimento, $anocurso, $materia, $id);
	}
	$sql->execute();
	
	mysqli_close($conexao);
	
	header("location: index.php");
?>