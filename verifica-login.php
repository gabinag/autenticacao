<?php

$email = $_POST['email'];
$senha = $_POST['senha'];

// Verificar o e-mail e a senha
if ($email == 'teste@teste.com' && $senha == '1234') {
  // Se as credenciais estiverem corretas, redirecionar para a página de sucesso
  header('Location: gera-qrcode.php');
  exit;
} else {
  // Se as credenciais estiverem incorretas, exibir a mensagem de erro
  echo "<script>alert('Erro! E-mail e/ou senha incorretos.');</script>";
}
?>



