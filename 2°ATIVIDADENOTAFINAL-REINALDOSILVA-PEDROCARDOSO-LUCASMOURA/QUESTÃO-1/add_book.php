<?php 
  require 'database.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $titulo = $_POST['titulo'];
      $autor = $_POST['autor'];
      $ano = $_POST['ano'];

      $stmt = $pdo->prepare("INSERT INTO livros (titulo, autor, ano) VALUES (:titulo, :autor, :ano)");
      $stmt->bindParam(':titulo', $titulo);
      $stmt->bindParam(':autor', $autor);
      $stmt->bindParam(':ano', $ano);
      if ($stmt->execute()) {
        header('location: index.php');
        exit;
        } else {
        echo "Erro ao adicionar livro";
        }
      }
?>