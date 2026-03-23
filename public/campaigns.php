<?php
require __DIR__ . '/../Config/db.php';

$q = $pdo->query("SELECT * FROM campaigns WHERE status='approved' OR status='active'");
foreach($q as $c){
    echo "<h3>{$c['title']}</h3>";
    echo "<p>{$c['description']}</p>";
    echo "<p>Goal: {$c['target_amount']} | Raised: {$c['current_amount']}</p>";
}
?>