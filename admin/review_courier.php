<?php
require __DIR__ . '/../auth/middleware.php';
require __DIR__ . '/../config/db.php';
requireRole('admin');

$id=$_GET['id'];

if(isset($_POST['approve'])){
 $pdo->prepare("UPDATE deliveries SET status='approved', approved_by=? WHERE delivery_id=?")
     ->execute([$_SESSION['user_id'],$id]);
}
if(isset($_POST['reject'])){
 $pdo->prepare("UPDATE deliveries SET status='cancelled', approved_by=? WHERE delivery_id=?")
     ->execute([$_SESSION['user_id'],$id]);
}
?>
<form method="POST">
<button name="approve">Approve</button>
<button name="reject">Reject</button>
</form>