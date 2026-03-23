<?php
require __DIR__ . '/../auth/middleware.php';
require __DIR__ . '/../config/db.php';
requireRole('admin');

$total=$pdo->query("SELECT SUM(amount) FROM donations WHERE status='completed'")->fetchColumn();
$users=$pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
$orgs=$pdo->query("SELECT COUNT(*) FROM organizations")->fetchColumn();

 echo "<h2>Analytics</h2>";
 echo "<p>Total Donations: $total</p>";
 echo "<p>Users: $users</p>";
 echo "<p>Organizations: $orgs</p>";
?>  