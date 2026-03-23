<?php
require __DIR__ . '/../auth/middleware.php';
require __DIR__ . '/../config/db.php';
requireRole('admin');

$q=$pdo->query("SELECT donation_id,donation_type,status FROM donations");
foreach($q as $d){
 echo "Donation #{$d['donation_id']} - {$d['donation_type']} - {$d['status']}<br>";
}
?>