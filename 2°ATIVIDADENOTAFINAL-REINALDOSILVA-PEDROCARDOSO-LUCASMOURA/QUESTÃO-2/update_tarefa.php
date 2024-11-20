<?php 
  require 'database.php';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $stmt = $pdo->prepare("UPDATE tarefas SET concluida = 1 WHERE id = :id");
    $stmt->bindParam(':id', $id);
    if ($stmt->execute()) {
      header('location: index.php');
      exit;
    } else {
      echo "Erro ao concluir a tarefa";
    }
  }
?>