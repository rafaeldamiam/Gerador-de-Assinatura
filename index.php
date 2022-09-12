<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<title>Gerador de Assinatura</title>
	<link rel="icon" type="image/x-icon" href="imgs/favicon.png">
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</head>
<body>

	<div class=" card text-white bg-success mb-3 rounded-0">
		<div class="container card bg-light mb-3">
			<div class="row">
				<h1 class="text-center text-dark">Gerador de Assinatura</h1>
			</div>

			<?php
			// Seleciona a assinatura exemplo
			$sig = "imgs/example.fw.png";

			?>

			<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
				<div class="row">
					<div class="col-6">
						<!-- NOME DO FUNCIONARIO -->
						<label class="text-dark" for="name">Nome:</label>
						<input type="text" id="name" name="name">
					</div>
					<div class="col-6">
						<!-- CARGO -->
						<label class="text-dark" for="role">Cargo:</label>
						<input type="text" id="role" name="role">
					</div>
				</div>
				<div class="row">
					<div class="col-5">
						<!-- Setor -->
						<label class="text-dark" for="sector">Setor:</lable>
						<input list="sectors" name="sector" id="sector">
						<datalist id="sectors">
							<option value="Centro de Processamento de Dados"></option>
							<option value="Financeiro"></option>
							<option value="Compras"></option>
							<option value="Exportação"></option>
							<option value="Contabilidade"></option>
						</datalist>
					</div>
					<div class="col-5">
						<!-- EMAIL -->
						<label class="text-dark" for="email">E-mail:</label>
						<input type="email" id="email" name="email">
					</div>
					<div class="col-2">	
						<!-- RAMAL -->
						<label class="text-dark" for="branch">Ramal:</label>
						<input type="number" id="branch" name="branch">
					</div>
				<div class="row">
					<div class="col-12">
						<!-- ENVIAR -->
						<input type="button" class="btn btn-success" type="submit" value="Criar">
					</div>
				</div>
			</form>
		</div>


		<?php

		//Dump and Die - Mostre e Morra
		function dd($data){
			echo '<pre>';
			die(var_dump($data));
			echo '</pre>';
		}

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		    // Coleta os dados que vem pelo input
		    $name = $_POST['name'];
		    $role = $_POST['role'];
		    $sector = $_POST['sector'];
		    $email = $_POST['email'];
		    $branch = $_POST['branch'];
		    if (empty($name) || empty($role) || empty($sector) || empty($email) || empty($branch)) {
		        echo "<script> alert('Preencha todos os campos'); </script> ";
		    } else {
		        // Cria imagem editavel apartir da imagem empty
				$img = imagecreatefrompng('imgs/empty.png');
				// Seleciona a cor do texto
				$txtColor = imagecolorallocate($img, 85, 102, 66);
				//imagettftext(image, size, angle, x, y, color, fontfile, text)
				// ESCREVE NOME
				imagettftext($img, 14, 0, 133, 25, $txtColor, "arialRegular.ttf", $name);
				// ESCREVE CARGO
				imagettftext($img, 11, 0, 133, 41, $txtColor, "arialRegular.ttf", $role);
				// ESCREVE SETOR
				imagettftext($img, 11, 0, 133, 56, $txtColor, "arialRegular.ttf", $sector);
				// ESCREVE EMAIL
				imagettftext($img, 11, 0, 133, 71, $txtColor, "arialRegular.ttf", $email);
				// ESCREVE RAMAL
				imagettftext($img, 11, 0, 330, 88, $txtColor, "arialRegular.ttf", $branch);
				// Exporta a imagem pra png
				imagepng($img, "imgs/assinatura.png");
				// Destroi a imagem editavel criada
				imagedestroy($img);
				//Seleciona a assinatura real
				$sig = "imgs/assinatura.png";
		    }
		}
		//Exibe a assinatura no HTML
		echo "<img class='rounded mx-auto d-block' src='$sig' alt='Assinatura'><br><br>";
		?>

	</div>	
</body>
</html>

