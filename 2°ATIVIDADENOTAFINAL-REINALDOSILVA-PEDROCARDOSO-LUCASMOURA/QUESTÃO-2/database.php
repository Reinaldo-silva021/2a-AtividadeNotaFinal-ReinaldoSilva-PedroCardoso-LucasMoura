<?php 
  $pdo = new PDO('sqlite:tarefas.db');

  $sql = "CREATE TABLE IF NOT EXISTS tarefas (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            descricao TEXT NOT NULL,
            vencimento TEXT NOT NULL,
            concluida INTEGER DEFAULT 0)";

  $pdo->exec($sql);
?>