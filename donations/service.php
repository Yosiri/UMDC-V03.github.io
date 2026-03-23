<?php
require __DIR__ . '/../config/db.php';
$id=$_GET['id'];

$pdo->prepare("UPDATE donations SET status='completed' WHERE donation_id=?")->execute([$id]);
header("Location: success.php?id=$id");
?>