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
        echo "<p style='color: green; font-size: 20px;'>Autenticação liberada!</p>";
    } else {
        echo "<p style='color: red; font-size: 20px;'>Token inválido ou expirado</p>";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="style.css">
    <title>Página de Autenticação</title>
	
</head>
<body>
    <div class="container">
		<h2>Escaneie o Qr Code:</h2>
		<form method="post" class="center">
			<div class="input-group">
				<img src="<?php echo $g->getUrl('autenticacao-2fatores', 'autenticacao-2fatores.azurewebsites.net', $secret)?>" class="center">
				<label for="token">Informe o token de autenticação recebido pelo Google Authenticator:</label>
				<input type="text" name="token" required>
			</div>
			<button type="submit" class="btn">Autenticar</button>
		</form>
	</div>
</body>
</html>
