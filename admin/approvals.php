<?php
require __DIR__ . '/../auth/middleware.php';
require __DIR__ . '/../config/db.php';
requireRole('admin');

$q=$pdo->query("SELECT * FROM approvals WHERE status='pending'");
foreach($q as $a){
 echo "{$a['entity_type']} #{$a['entity_id']} - <a href='review_{$a['entity_type']}.php?id={$a['entity_id']}'>Review</a><br>";
}
?>