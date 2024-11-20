<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas</title>
    <style>

      *{
          margin: 0;
          padding: 0;
          box-sizing: border-box;
      }

      body{
          background-image: linear-gradient(to left, #22ebc9, #2d82f1);
          font-family: Arial, sans-serif;
          text-align: center;
      }

      h1{
          background-color: rgb(0, 217, 255);
      }

      table{
          margin: 20px auto;
          padding: 0%;
          width: 650px;
          background-color: rgb(255, 255, 255);
          border: 2px solid;
          border-collapse: collapse;
      }

      form{
         padding: 8px;
      }

      button{
          background-color: lavender;
          cursor: pointer;
      }

      th, td {
          border: 1px solid lavender;
          padding: 10px;
      }

      input, button {
          padding: 10px 15px;
          border-radius: 8px;
          border: 2px solid;
      }

      .botoes {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
      }

      .botoes form {
        margin: 0;
      }

    </style>
  </head>
  <body>
    <h1>Lista de Tarefas</h1>

    <form action="add_tarefa.php" method="POST">
      <input type="text" name="descricao" placeholder="Descrição da tarefa" required>
      <input type="date" name="vencimento" required>
      <button type="submit">Adicionar Tarefa</button>
    </form>

    <h2>Tarefas não concluídas</h2>
    <table>
      <thead>
        <tr>
          <th>Descrição</th>
          <th>Vencimento</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php
          require 'database.php';

          $stmt = $pdo->query('SELECT * FROM tarefas WHERE concluida = 0');
          $tarefas = $stmt->fetchAll(PDO::FETCH_ASSOC);

          foreach ($tarefas as $tarefa) {
            $vencimento = date('d/m/Y', strtotime($tarefa['vencimento']));
            echo "<tr>";
            echo "<td>" . $tarefa['descricao'] . "</td>";
            echo "<td>" . $vencimento . "</td>";
            echo "<td>
                    <div class='botoes'>
                      <form action='update_tarefa.php' method='POST'>
                        <input type='hidden' name='id' value='" . $tarefa['id'] . "'>
                        <button type='submit'>Concluir</button>
                      </form>
                      <form action='delete_tarefa.php' method='POST'>
                        <input type='hidden' name='id' value='". $tarefa['id'] . "'>
                        <button type='submit'>Excluir</button>
                      </form>
                    </div>  
                  </td>";
            echo "</tr>";
          }
        ?>
      </tbody>
    </table>

    <h2>Tarefas concluídas</h2>
    <table>
      <thead>
        <tr>
          <th>Descrição</th>
          <th>Vencimento</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php
          require 'database.php';

          $stmt = $pdo->query('SELECT * FROM tarefas WHERE concluida = 1');
          $tarefas = $stmt->fetchAll(PDO::FETCH_ASSOC);

          foreach ($tarefas as $tarefa) {
            echo "<tr>";
            echo "<td>" . $tarefa['descricao'] . "</td>";
            echo "<td>" . $tarefa['vencimento'] . "</td>";
            echo "<td>
                    <form action='delete_tarefa.php' method='POST'>
                      <input type='hidden' name='id' value='". $tarefa['id'] . "'>
                      <button type='submit'>Excluir</button>
                    </form>";
            echo "</tr>";
          }
        ?>
      </tbody>
    </table>

  </body>
</html>