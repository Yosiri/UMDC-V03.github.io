<?php
require __DIR__ . '/../auth/middleware.php';
require __DIR__ . '/../config/db.php';
requireRole('admin');

require __DIR__ . '/metrics.php';
$metrics = getPlatformMetrics($pdo);

echo "<h1>Admin Analytics</h1>";
echo "Users: {$metrics['total_users']}<br>";
echo "Organizations: {$metrics['total_orgs']}<br>";
echo "Active Campaigns: {$metrics['active_campaigns']}<br>";
echo "Total Donations: {$metrics['total_donations']}<br>";
?>
