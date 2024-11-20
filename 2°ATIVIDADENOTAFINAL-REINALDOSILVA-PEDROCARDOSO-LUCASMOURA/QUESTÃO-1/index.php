<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livraria</title>
    <style>

      body{
          text-align: center;
          background: radial-gradient(ellipse, #00ff55, #00fca8);
          font-family: Arial, sans-serif;
      }

      h1{
          font-size: 350%;
          color: rgb(255, 255, 255);
      }

      h2{
          font-family: serif ;
          font-size: 350%;
          color: rgb(255, 255, 255);
      }

      table{
          margin: auto;
          border-collapse: collapse;
      }

      th, td {
          padding: 10px;
          background-color: white;
          border: 1px solid;
      }

      input{
          background-color: rgb(255, 255, 255);
          width: 200px;
          height: 20px;
      }

      button{
          background-color: rgb(130, 63, 255);
          cursor: pointer;
      }

      input, button {
          padding: 10px 15px;
          border-radius: 8px;
          border: 2px solid;
      }  

    </style>
  </head>
  
  <body>
    <h1>Livraria</h1>
    <form action="add_book.php" method="POST">
      <input type="text" name="titulo" placeholder="Título" required>
      <input type="text" name="autor" placeholder="Autor" required>
      <input type="number" name="ano" placeholder="Ano de Publicação" required>
      <button type="submit">Adicionar Livro</button>
    </form>

    <h2>Livros adicionados</h2>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Titulo</th>
          <th>Autor</th>
          <th>Ano de Publicação</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php
          require 'database.php';

          $stmt = $pdo->prepare("SELECT * FROM livros");
          $stmt->execute();
          $livros = $stmt->fetchAll(PDO::FETCH_ASSOC);

          foreach ($livros as $livro) {
            echo "<tr>";
            echo "<td>" . $livro['id'] . "</td>";
            echo "<td>" . $livro['titulo'] . "</td>";
            echo "<td>" . $livro['autor'] . "</td>";
            echo "<td>" . $livro['ano'] . "</td>";
            echo "<td>
                    <form action='delete_book.php' method='POST'>
                      <input type='hidden' name='id' value='" . $livro['id'] . "'>
                      <button type='submit'>Excluir</button>
                    </form>
                  </td>";  
            echo "</tr>";  
          }
        ?>
      </tbody>
    </table>
  </body>
</html>
