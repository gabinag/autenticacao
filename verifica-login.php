<?php

$email = $_POST['email'];
$senha = $_POST['senha'];

// Verificar o e-mail e a senha
if ($email == 'teste@teste.com' && $senha == '1234') {
	header('Location: autenticar.php');
	exit;
} else {
  // Se as credenciais estiverem incorretas, exibir a mensagem de erro
  echo "<p style='color: red; font-size: 20px;'>Erro! Senha e/ou e-mail incorreto</p>";
}
?>



