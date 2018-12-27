<?php
require './Database/db.php';
if (isset ($_POST['FirstName'])  && isset($_POST['LastName']) && isset($_POST['Age'])) {
  $FirstName = $_POST['FirstName'];
  $LastName = $_POST['LastName'];
  $Age = $_POST['Age'];
  $query = 'INSERT INTO Users(FirstName, LastName, Age) VALUES("'.$FirstName.'", "'.$LastName.'", "'.$Age.'")';
  $stmt = $connection->prepare($query);
  $message = '';
  if ($stmt->execute([':FirstNAme' => $FirstName, ':LastName' => $LastName, ':Age' => $Age])) {
    header('Location: index.php');
  }else{
    $message = 'Errore creazione utente';
  }
}
?>
<?php require './templates/header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Aggiungi utente</h2>
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
          <input type="text" name="FirstName" id="FirstName" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="LastName">Cognome</label>
          <input type="LastName" name="LastName" id="LastName" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="Age">Et&aacute</label>
            <input type="Age" name="Age" id="Age" class="form-control" required>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Aggiungi</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require './templates/footer.php'; ?>
