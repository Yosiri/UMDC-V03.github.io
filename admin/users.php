<?php
require __DIR__ . '/../auth/middleware.php';
require __DIR__ . '/../config/db.php';
requireRole('admin');

$q=$pdo->query("SELECT user_id,email,status FROM users");
foreach($q as $u){
 echo "{$u['email']} ({$u['status']}) - <a href='?ban={$u['user_id']}'>Ban</a><br>";
}

if(isset($_GET['ban'])){
 $pdo->prepare("UPDATE users SET status='banned' WHERE user_id=?")->execute([$_GET['ban']]);
}
?>