<?php
include 'db.php';

$user_id = $_SESSION['id'];
$id = $_GET['id'];

if (!isset($user_id)) {
    header('Location:login.php');
}

$sql = $conn->prepare('delete from blogs where id=? and user_id=?');
$sql->bind_param('ii', $id, $user_id);
$sql->execute();
header('Location:dashboard.php');
exit();


?>