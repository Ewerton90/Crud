<!DOCTYPE html>
<html>
	<head>
		<title>Cadastro</title>
		<link rel="stylesheet" href="Css/bootstrap.css"/>
		<link rel="stylesheet" href="Css/button.css">
		<script src="Js/jquery.js"></script>
		<script src="script.js"></script>
	</head>
	<?php
		$conexao = new mysqli ("localhost", "root", "vertrigo", "escola");
		
		if(isset($_GET["id"])){
			//Editar
			
			$id = $_GET["id"];
			
			$dados = $conexao->query("SELECT * FROM cadastro WHERE id = " .$id);
			$linha = $dados->fetch_assoc();
			
			$nome = $linha["nome"];
			$nascimento = $linha["nascimento"];
			$anocurso = $linha["anocurso"];
			$materia = $linha["materia"];
			
		}else {
			//Novo
			$id = 0;
			$nome = "";
			$nascimento = "";
			$anocurso = "";
			$materia = "";
		}
	?>
	<body>
		<div class="container">
		<h1>Cadastro</h1>
		<form class="row" action="Cadastro.php" method="POST"> 
			<div class="col-2 form-group">
				<label for="nome">Nome:</label>
				<input type="text" id="nome" name="nome" value="<?=$nome;?>" class="form-control"/>
			</div>
			
			<div class="col-2 form-group">
				<label for="nascimento">Data de Nascimento:</label>
				<input type="date" id="nascimento" name="nascimento" value="<?=$nascimento;?>" class="form-control"/>
			</div>
			
			<div class="col-3 form-group">
				<label for="anocurso">AnoCurso:</label>
				<input type="text" id="anocurso" name="anocurso" value="<?=$anocurso;?>" class="form-control"/>
			</div>
	
			<div class="col-2 form-group">
				<label for="materia">Matéria:</label>
				<input type="text" id="materia" name="materia" value="<?=$materia;?>" class="form-control"/>
			</div>
			
			<div class="col-3 form-group">
				<input type="hidden" id="id" name="id" value="<?=$id;?>" class="form-control"/>
				<button type="reset" class="btn btn-success bottom">Limpar</button>
				<button type="submit" class="btn btn-primary bottom" onclick="return validar();">Salvar</button>
				<a href="index.php" class="btn btn-dark bottom" class="form-control" >Novo</a>
			</div>
		</form>
			<br/>
			
			<h1>Listagem</h1>
			
			<input type="text" id="buscar" name="buscar" class="form-control" placeholder="buscar"
			onkeyup="buscar($(this).val());"/>
			
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Matéria</th>
						<th>Editar</th>
						<th>Excluir</th>
					</tr>
				</thead>
				<tbody>
					<?php
					
						$tabela = $conexao->query("SELECT * FROM cadastro");
						
						while($linha = $tabela->fetch_assoc()){
					?>
					
						<tr>
							<td class="buscar"><?=$linha["nome"];?></td>
							<td class="buscar"><?=$linha["materia"];?></td>
							<td><a href="index.php?id=<?=$linha["id"];?>" class="btn btn-warning">Editar</a></td>
							<td><a href="excluir.php?id=<?=$linha["id"];?>" class="btn btn-danger" onclick="return confirm('Tem Certeza?');">Excluir</a></td>
						</tr>
					<?php
						
						}
						mysqli_close($conexao);
					?>
				</tbody>
			</table>
			
			<script>
				function buscar(texto){
					
					$("table tbody tr").each(function(){
						
						var mostrar = false;
						
						$(this).find("td.buscar").each(function() {
							if($(this).html().toLowerCase().includes(texto.toLowerCase()))
							{
								mostrar = true;
							}	
						});
						
						if(mostrar) $(this).show();
						else $(this).hide();
						
					});
					
				}
			</script>
			
		</div>
	</body>
</html>