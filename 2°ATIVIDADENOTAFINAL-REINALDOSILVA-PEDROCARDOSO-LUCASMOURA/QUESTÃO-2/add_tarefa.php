<?php 
  require 'database.php';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descricao = $_POST['descricao'];
    $vencimento = $_POST['vencimento'];

    $stmt = $pdo->prepare("INSERT INTO tarefas (descricao, vencimento) VALUES (:descricao, :vencimento)");
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':vencimento', $vencimento);
    if ($stmt->execute()) {
      header('location: index.php');
      exit;
    } else {
      echo "Erro ao adicionar tarefa!";
    }
  }
?>
