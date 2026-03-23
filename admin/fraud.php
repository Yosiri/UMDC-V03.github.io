<?php
require __DIR__ . '/../auth/middleware.php';
require __DIR__ . '/../config/db.php';
requireRole('admin');

$q=$pdo->query("SELECT * FROM fraud_flags WHERE status='open'");
foreach($q as $f){
 echo "Flag: {$f['entity_type']} #{$f['entity_id']} - {$f['reason']}<br>";
}
?>