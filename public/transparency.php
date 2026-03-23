<?php
require __DIR__ . '/../config/db.php';
$q=$pdo->query("SELECT c.title, SUM(d.amount) as total FROM campaigns c JOIN donations d ON c.campaign_id=d.campaign_id WHERE d.status='completed' GROUP BY c.campaign_id");
foreach($q as $row){
    echo "<h3>{$row['title']}</h3>";
    echo "<p>Total Donations: {$row['total']}</p>";
}
?>