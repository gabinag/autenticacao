<?php
if(isset($_POST['enviar'])){
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
			echo "Deu certo porraaaaaaaaaa!!! bisnaga wins";
		}
				
	}	
}
?>
