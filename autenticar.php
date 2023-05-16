<?php

include_once('vendor/sonata-project/google-authenticator/src/FixedBitNotation.php');
include_once('vendor/sonata-project/google-authenticator/src/GoogleAuthenticatorInterface.php');
include_once('vendor/sonata-project/google-authenticator/src/GoogleAuthenticator.php');
include_once('vendor/sonata-project/google-authenticator/src/GoogleQrUrl.php');

$g = new \Google\Authenticator\GoogleAuthenticator();

//criar uma chave secret
$secret = 'JBSWY3DPEHPK3PXP';

//validar o token submetido
if(isset($_POST['token'])) {
    $token = $_POST['token'];
    if($g->checkCode($secret, $token)){
        echo "<p style='color: green;'>Autenticação liberada!</p>";
    } else {
        echo "<p style='color: red;'>Token inválido ou expirado</p>";
    }
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Página de Envio de Código</title>
	<style>
		body {
			background-color: #f2f2f2;
			font-family: Arial, sans-serif;
		}

		.container {
			margin: auto;
			margin-top: 100px;
			width: 300px;
			padding: 20px;
			background-color: #fff;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
			border-radius: 5px;
		}

		.input-group {
			margin-bottom: 10px;
		}

		.input-group label {
			display: block;
			margin-bottom: 5px;
			color: #555;
		}

		.input-group input {
			width: 92%;
			padding: 10px;
			border-radius: 3px;
			border: 1px solid #ccc;
		}

		.btn {
			display: block;
			background-color: #4CAF50;
			color: #fff;
			padding: 10px;
			border: none;
			border-radius: 3px;
			cursor: pointer;
			width: 100%;
            font-size: 18px;
		}

		.btn:hover {
			background-color: #3e8e41;
		}
	</style>
</head>
<body>
    <div class="container">
		<h2>Enviar Código</h2>
		<form method="post">
			<div class="input-group">
				<label for="token">Informe o token de autenticação recebido pelo Google Authenticator:</label>
				<input type="text" name="token" required>
			</div>
			<button type="submit" class="btn">Autenticar</button>
		</form>
	</div>
</body>
</html>
