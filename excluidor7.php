<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=1.0">
		<title>BLOG EXCLUIDOR</title>

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

			echo "<h1 style='color:gray;'>===== Excluidor =====</h1>";

			if($id == "" and $password == ""){

				$consulta = "SELECT * FROM blog ORDER BY id DESC";
				$pesquisa = mysqli_query($conexao, $consulta);

				while($saida = mysqli_fetch_array($pesquisa)){
					$titulo = $saida['titulo'];
					$id = $saida['id'];

					echo "<form action='excluidor7.php' method='post'>";
					echo "<input type='hidden' name='id' value='$id'>";
					echo "<input type='submit' name='titulo' value='$titulo'>";
					echo "</form>";

				}

				mysqli_close($conexao);
				exit;
			}

			else if($id != "" and $password == ""){
				echo "<form action='excluidor7.php' method='post'>";
				echo "<input type='hidden' name='id' value='$id'>";
				echo "Senha<br><input type='password' name='password'><br><br>";
				echo "<input type='submit' name='titulo' value='Excluir'>";
				echo "</form>";
				exit;
			}

			else if($id != "" and $password == ""){

				$consulta = "DELETE FROM blog WHERE id=$id";
				$pesquisa = mysqli_query($conexao, $consulta);
				echo "<h1 style='color:green;'>Sucesso!</h1>";
				header("refresh:2;url=index.php");
				exit;
			}

			else{
				echo "<h1 style='color:red;'>Erro!</h1>";
				header("refresh:2;url=excluidor7.php");
				exit;
			}

		?>

		<br><br><br></center>
	</body>


</html>