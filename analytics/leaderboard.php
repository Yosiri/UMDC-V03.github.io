<?php
require __DIR__ . '/../config/db.php';

$q=$pdo->query("SELECT u.first_name, SUM(d.amount) as total FROM users u JOIN donations d ON u.user_id=d.user_id WHERE d.status='completed' GROUP BY u.user_id ORDER BY total DESC LIMIT 5");

echo "<h2>Top Donors</h2>";
foreach($q as $row){
    echo "{$row['first_name']} - {$row['total']}<br>";
}
?>
