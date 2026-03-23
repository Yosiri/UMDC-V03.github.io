<?php
require __DIR__ . '/../auth/middleware.php';
require __DIR__ . '/../config/db.php';
requireRole('organization');

$org_id=$_SESSION['user_id'];

$stmt=$pdo->prepare("SELECT SUM(d.amount) FROM donations d JOIN campaigns c ON d.campaign_id=c.campaign_id WHERE c.org_id=? AND d.status='completed'");
$stmt->execute([$org_id]);
$total=$stmt->fetchColumn();

echo "<h1>Organization Dashboard</h1>";
echo "Total Raised: $total";
?>
