<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=1.0">
		<link rel="stylesheet" type="text/css" href="index-estilo.css">

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

			$consulta = "SELECT id FROM blog";
			$pesquisa = mysqli_query($conexao, $consulta);
			$voltas = 0;
			while($saida = mysqli_fetch_array($pesquisa)){
				$voltas++;
			}

			echo "<title>BLOG - $voltas</title>";

		?>

	</head>

	<body>
		<br><br><br>

		<div id="planoFundo"><img src="imagens/planofundo1.jpg"></div>

		<?php

			$consulta = "SELECT * FROM blog ORDER BY id DESC";
			$pesquisa = mysqli_query($conexao, $consulta);

			echo "<center><div id='blog'>";

			while($saida = mysqli_fetch_array($pesquisa)){
				$titulo = $saida['titulo'];
				$temas = $saida['temas'];
				$conteudo = $saida['conteudo'];
				$data = $saida['data'];

				echo "<p class='titulo'>$titulo</p>";
				echo "<p class='temas'>$temas</p>";
				echo "<p class='conteudo'>$conteudo</p>";
				echo "<p class='data'>$data</p>";

			}

			echo "</div></center>";

			mysqli_close($conexao);

		?>

		</div></center>

		<br><br><br>
	</body>
</html>