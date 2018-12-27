<?php
require './Database/db.php';
$sql = 'SELECT * FROM Users';
$statement = $connection->prepare($sql);
$statement->execute();
$users = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require './templates/header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <a href="create.php?id=<?= $user->id ?>" class="btn btn-outline-success">Aggiungi</a>
    </div>
    <div class="card-body">
      <table class="table borderless">
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Cognome</th>
          <th>Et&aacute</th>
        </tr>
        <?php foreach($users as $user): ?>
          <tr>
            <td><?= $user->id; ?></td>
            <td><?= $user->FirstName; ?></td>
            <td><?= $user->LastName; ?></td>
            <td><?= $user->Age; ?></td>
            <td bgcolor="white">
              <a href="edit.php?id=<?= $user->id ?>&FirstName=<?= $user->FirstName ?>&LastName=<?= $user->LastName ?>" class="btn btn-info">Modifica</a>
              <a href="delete.php?id=<?= $user->id ?>" class="btn btn-outline-danger">Elimina</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>

    </div>
  </div>
</div>
<?php require './templates/footer.php'; ?>
