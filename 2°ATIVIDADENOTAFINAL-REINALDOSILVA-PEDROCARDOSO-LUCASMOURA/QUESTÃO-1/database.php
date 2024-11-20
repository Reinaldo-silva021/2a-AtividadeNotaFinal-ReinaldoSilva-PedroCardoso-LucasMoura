<?php 
  $pdo = new PDO('sqlite:livros.db');

  $sql = "CREATE TABLE IF NOT EXISTS livros (
              id INTEGER PRIMARY KEY AUTOINCREMENT,
              titulo TEXT NOT NULL,
              autor TEXT NOT NULL,
              ano INTEGER NOT NULL)";

  $pdo->exec($sql);
?>