<?php 
  require 'database.php';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $stmt = $pdo->prepare("DELETE FROM livros WHERE id = :id");
    $stmt->bindParam(':id', $id);
    if ($stmt->execute()) {
      header('location: index.php');
      exit;
    } else {
      echo "Erro ao remover livro";
    }
  }
?>