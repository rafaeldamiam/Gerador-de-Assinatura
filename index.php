<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<title>Gerador de Assinatura</title>
	<link rel="icon" type="image/x-icon" href="imgs/favicon.png">
</head>
<body>

<h1>Gerador de Assinatura</h1>

<?php
//VERIFICA SE A VARIAVEL AUXILIAR ESTA SETADA
if (!isset($aux)) {
	$img = "imgs/example.fw.png";
}else{
	$img = "imgs/assinatura.png";
}
echo "<img src='$img' alt='Assinatura'><br><br>";
?>

	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<!-- NOME DO FUNCIONARIO -->
		<label for="name">Nome:</label>
		<input type="text" id="name" name="name"><br>
		<!-- CARGO -->
		<label for="role">Cargo:</label>
		<input type="text" id="role" name="role"><br>
		<!-- Setor -->
		<label for="sector">Setor:</lable>
		<input list="sectors" name="sector" id="sector">
		<datalist id="sectors">
			<option value="Centro de Processamento de Dados">
			<option value="Financeiro">
			<option value="Compras">
			<option value="Exportação">
			<option value="Contabilidade">
		</datalist><br>
		<!-- EMAIL -->
		<label for="email">E-mail:</label>
		<input type="email" id="email" name="email"><br>
		<!-- RAMAL -->
		<label for="branch">Ramal:</label>
		<input type="number" id="branch" name="branch"><br>
		<!-- ENVIAR -->
		<input type="submit" value="Criar"><br>
	</form>
</body>
</html>

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
	        echo "$name<br>"; 
	        echo "$role<br>"; 
	        echo "$sector<br>";
	        echo "$email<br>";
	        echo "$branch<br>";
//-----------------------------------------------------------------------------------------------------\\
	    	$aux = 0;
			//Backgroud Image
			$img = imagecreatefrompng('imgs/empty.png');
			//Text Color
			$txtColor = imagecolorallocate($img, 85, 102, 66);
			//Text Font
			$fontPath = "arial.ttf";




			// ESCREVE NOME
			imagestring($img, 5, 133, 14, $name, $txtColor);
			// ESCREVE CARGO
			imagestring($img, 4, 133, 30, $role, $txtColor);
			// ESCREVE SETOR
			imagestring($img, 4, 133, 44, $sector, $txtColor);
			// ESCREVE EMAIL
			imagestring($img, 4, 133, 58, $email, $txtColor);
			// ESCREVE RAMAL
			imagestring($img, 4, 306, 74, $branch, $txtColor);

			//imagefttext($img, size, angle, x, y, color, fontfile, text) 
			//imagettftext($img, 4, 0, 0, 0, $txtColor, $fontPath, "TEXTO");

			// header("Content-type: image/png");
			// imagepng($img);
			imagepng($img, "imgs/assinatura.png");
			imagedestroy($img);

			header("Location: imgs/assinatura.png");



	    }

	}
?>
