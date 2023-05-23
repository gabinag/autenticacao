<?php

$email = $_POST['email'];
$senha = $_POST['senha'];

// Verificar o e-mail e a senha
if ($email == 'teste@teste.com' && $senha == '1234') {
    if(!empty($_POST['g-recaptcha-response'])){
		$url = "https://www.google.com/recaptcha/api/siteverify";
		$secret = "6LdjQzAmAAAAANtpfL1UDc8MjDN09-6_VSLwFY2b";
		$response = $_POST['g-recaptcha-response'];
		$variaveis = "secret=".$secret."&response=".$response; 

		$ch = curl_init($url);
		curl_setopt( $ch, CURLOPT_POST, 1);
		curl_setopt( $ch, CURLOPT_POSTFIELDS, $variaveis);
		curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt( $ch, CURLOPT_HEADER, 0);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
		curl_exec($ch);
		$resposta = curl_exec($ch);
		$resultado = json_decode($resposta);
		
      if ($resultado->success == 1){
        header('Location: autenticar.php');
        exit;
      }
    }	
} else {
  // Se as credenciais estiverem incorretas, exibir a mensagem de erro
  echo "<p style='color: red; font-size: 20px;'>Erro! Senha e/ou e-mail incorreto</p>";
}
?>



