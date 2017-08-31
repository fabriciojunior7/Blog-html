<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=1.0">
		<title>BLOG EDITOR</title>

		<?php

			$host = "localhost";
			$user = "root";
			$password = "";
			$database = "u525042514_ranks";

			$conexao = mysqli_connect($host, $user, $password, $database);
			mysqli_query($conexao, "SET NAMES 'utf8'");
			if(mysqli_errno($conexao)){
				echo "Erro de conexao...";
				echo mysqli_connect_error();
			}

		?>

	</head>

	<body>
		<center><br><br><br>

		<?php

			$id = $_POST['id'];
			$password = $_POST['password'];
			$titulo = $_POST['titulo'];
			$temas = $_POST['temas'];
			$conteudo = $_POST['conteudo'];
			$calendario = $_POST['calendario'];

			echo "<h1 style='color:gray;'>===== Editor =====</h1>";

			if($id == "" and $password == ""){

				$consulta = "SELECT * FROM blog ORDER BY id DESC";
				$pesquisa = mysqli_query($conexao, $consulta);

				while($saida = mysqli_fetch_array($pesquisa)){
					$titulo = $saida['titulo'];
					$id = $saida['id'];
					$temas = $saida['temas'];
					$conteudo = $saida['conteudo'];
					$calendario = $saida['data'];

					echo "<form action='editor7.php' method='post'>";
					echo "<input type='hidden' name='id' value='$id'>";
					echo "<input type='hidden' name='temas' value='$temas'>";
					echo "<input type='hidden' name='conteudo' value='$conteudo'>";
					echo "<input type='hidden' name='calendario' value='$calendario'>";
					echo "<input type='submit' name='titulo' value='$titulo'>";
					echo "</form>";

				}

				mysqli_close($conexao);
				exit;
			}

			else if($id != "" and $password == ""){

				$consulta = "SELECT * FROM blog WHERE id=$id";
				$pesquisa = mysqli_query($conexao, $consulta);

				echo "<form action='editor7.php' method='post'>
				Titulo: <input type='text' name='titulo' autofocus style='width: 90%; text-align: center;' value='$titulo'><br><br>
				Temas: <input type='text' name='temas' style='width: 90%; text-align: center;' value='$temas'><br><br>
				Conteudo: <textarea style='width: 90%; height: 300px; text-align: center;' name='conteudo' >$conteudo</textarea><br><br>
				Data: <input type='text' name='calendario' value='$calendario'><br><br>
				Senha: <input type='password' name='password'><br><br>
				<input type='hidden' name='id' value='$id'>
				<input type='submit' value='Enviar'><br><br>
				</form>";
				exit;
			}

			else if($id != "" and $password == ""){

				if($titulo == ""){
				$titulo = "Pensamento";
				}
				if($temas == ""){
				$temas = "#Aleatório";
				}

				$consulta = "UPDATE blog SET titulo='$titulo', temas='$temas', conteudo='$conteudo', data='$calendario' WHERE id=$id";
				$pesquisa = mysqli_query($conexao, $consulta);
				echo "<h1 style='color:green;'>Sucesso!</h1>";
				header("refresh:2;url=index.php");
				exit;
			}

			else{
				echo "<h1 style='color:red;'>Erro!</h1>";
				header("refresh:2;url=editor7.php");
				exit;
			}

		?>

		<br><br><br></center>
	</body>


</html>