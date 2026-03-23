<?php
require __DIR__ . '/../Auth/Middleware.php';
require __DIR__ . '/../Config/db.php';
requireRole('admin');

$id = $_GET['id'] ?? 0;

if(isset($_POST['approve'])){
    $pdo->prepare("UPDATE campaigns SET status='approved' WHERE campaign_id=?")->execute([$id]);
    $pdo->prepare("UPDATE approvals SET status='approved', admin_id=? WHERE entity_id=? AND entity_type='campaign'")->execute([$_SESSION['user_id'], $id]);
    header("Location: approvals.php");
    exit;
}

if(isset($_POST['reject'])){
    $pdo->prepare("UPDATE campaigns SET status='rejected' WHERE campaign_id=?")->execute([$id]);
    $pdo->prepare("UPDATE approvals SET status='rejected', admin_id=? WHERE entity_id=? AND entity_type='campaign'")->execute([$_SESSION['user_id'], $id]);
    header("Location: approvals.php");
    exit;
}
?>

<form method="POST">
    <button name="approve">Approve</button>
    <button name="reject">Reject</button>
</form>