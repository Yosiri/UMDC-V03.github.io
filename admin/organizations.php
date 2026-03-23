<?php
require __DIR__ . '/../auth/middleware.php';
require __DIR__ . '/../config/db.php';
requireRole('admin');

$q=$pdo->query("SELECT org_id,org_name,verified FROM organizations");
foreach($q as $o){
 echo "{$o['org_name']} - Verified: {$o['verified']} <a href='?verify={$o['org_id']}'>Verify</a><br>";
}

if(isset($_GET['verify'])){
 $pdo->prepare("UPDATE organizations SET verified=1 WHERE org_id=?")->execute([$_GET['verify']]);
}
?>