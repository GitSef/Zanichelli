<?php
require './Database/db.php';
$id = $_GET['id'];
$query = 'DELETE FROM Users WHERE id="'.$id.'"';
$stmt = $connection->prepare($query);
if ($stmt->execute([':id' => $id])) {
  header("Location: /");
}
?>
