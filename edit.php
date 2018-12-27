<?php
require './Database/db.php';
$id = $_GET['id'];
$query = 'SELECT * FROM Users WHERE id='.$id.'';
$stmt = $connection->prepare($query);
$stmt->execute([':id' => $id ]);
$person = $stmt->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['FirstName'])  && isset($_POST['LastName']) ) {
  $FirstName = $_POST['FirstName'];
  $LastName = $_POST['LastName'];
  $query = 'UPDATE Users SET FirstName="'.$FirstName.'", LastName="'.$LastName.'" WHERE id='.$id.'';
  $stmt = $connection->prepare($query);
  if ($stmt->execute([':FirstName' => $FirstName, ':LastName' => $LastName, ':id' => $id])) {
    header('Location: /');
}
}

 ?>
<?php require './templates/header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Modifica utente</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="FirstName">Nome</label>
          <input value="<?= $_GET['FirstName']; ?>" type="text" name="FirstName" id="FirstName" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="LastName">Cognome</label>
            <input value="<?= $_GET['LastName']; ?>" type="text" name="LastName" id="LastName" class="form-control" required>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Salva</button>
          <button type="action" class="btn btn-outline-danger" onClick="window.history.go(-1); return false;">Annulla</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require './templates/footer.php'; ?>
