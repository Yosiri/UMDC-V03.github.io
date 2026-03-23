<?php
require __DIR__ . '/../auth/middleware.php';
require __DIR__ . '/../config/db.php';
requireRole('user');

$user_id=$_SESSION['user_id'];

$stmt=$pdo->prepare("SELECT SUM(amount) FROM donations WHERE user_id=? AND status='completed'");
$stmt->execute([$user_id]);
$total=$stmt->fetchColumn();

echo "<h1>User Dashboard</h1>";
echo "Total Donated: $total";
?>
