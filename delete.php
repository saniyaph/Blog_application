<?php
include 'db.php';

$user_id = $_SESSION['id'];
$id = $_GET['id'];

$sql = $conn->prepare('delete from blogs where id=? and user_id=?');
$sql->bind_param('ii', $id, $user_id);
$sql->execute();
header('Location:dashboard.php');
exit();


?>