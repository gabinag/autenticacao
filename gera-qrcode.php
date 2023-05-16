<?php

include_once('vendor/sonata-project/google-authenticator/src/FixedBitNotation.php');
include_once('vendor/sonata-project/google-authenticator/src/GoogleAuthenticatorInterface.php');
include_once('vendor/sonata-project/google-authenticator/src/GoogleAuthenticator.php');
include_once('vendor/sonata-project/google-authenticator/src/GoogleQrUrl.php');

$g = new \Google\Authenticator\GoogleAuthenticator();

//criar uma chave secret
$secret = 'JBSWY3DPEHPK3PXP';

if (isset($_POST['botao'])) {
    header("Location: autenticar.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Auth</title>
</head>
<body>
    <h1>Escaneie o QrCode gerado:</h1>
    <img src="<?php echo $g->getUrl('autenticacao-2fatores', 'autenticacao-2fatores.azurewebsites.net', $secret)?>">
    <form method="post" action="autenticar.php">
		<input type="submit" name="botao" value="Ir para página">
	</form>

</body>
</html>