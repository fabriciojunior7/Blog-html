<meta name="viewport" content="width=device-width, user-scalable=1.0">
<title>BLOG ENVIADOR</title>
<center>

<?php

	$host = "localhost";
	$user = "root";
	$password = "";
	$database = "";

	$conexao = mysqli_connect($host, $user, $password, $database);
	mysqli_query($conexao, "SET NAMES 'utf8'");
	if(mysqli_errno($conexao)){
		echo "Erro de conexao...";
		echo mysqli_connect_error();
	}

	date_default_timezone_set("America/Bahia");
	$hora = date("H:i");
	$data = date("l - d.m.Y");
	$calendario = "$hora<br>$data";

	$titulo = $_POST["titulo"];
	$temas = $_POST["temas"];
	$conteudo = $_POST["conteudo"];
	$senha = $_POST["password"];

	if($senha == "" and $conteudo != ""){
		if($titulo == ""){
			$titulo = "Pensamento";
		}
		if($temas == ""){
			$temas = "#Aleatório";
		}

		$consulta = "INSERT INTO blog (titulo, temas, conteudo, data) VALUES ('$titulo', '$temas', '$conteudo', '$calendario')";

		$pesquisa = mysqli_query($conexao, $consulta);
		mysqli_close($conexao);

		echo "<h1 style='color:green;'>Sucesso!</h1>";
		header("refresh:2;url=index.php");
		exit;
	}

	else{
		echo "<h1 style='color:red;'>Erro!</h1>";
		header("refresh:2;url=insert7.php");
		exit;
	}

?>
</center>