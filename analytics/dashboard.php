<?php
require __DIR__ . '/../auth/middleware.php';
require __DIR__ . '/../config/db.php';
requireRole('admin');

$totalDonations=$pdo->query("SELECT SUM(amount) FROM donations WHERE status='completed'")->fetchColumn();
$totalUsers=$pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
$totalCampaigns=$pdo->query("SELECT COUNT(*) FROM campaigns WHERE status='active'")->fetchColumn();

$topCampaigns=$pdo->query("SELECT c.title, SUM(d.amount) as total FROM campaigns c JOIN donations d ON c.campaign_id=d.campaign_id WHERE d.status='completed' GROUP BY c.campaign_id ORDER BY total DESC LIMIT 5");

echo "<h1>UMDC Analytics Dashboard</h1>";
echo "<p>Total Donations: {$totalDonations}</p>";
echo "<p>Total Users: {$totalUsers}</p>";
echo "<p>Active Campaigns: {$totalCampaigns}</p>";

echo "<h3>Top Campaigns</h3>";
foreach($topCampaigns as $c){
    echo "<p>{$c['title']} - {$c['total']}</p>";
}
?>