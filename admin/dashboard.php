<?
require __DIR__ . '/../auth/middleware.php';
require __DIR__ . '/../config/db.php';
requireRole('admin');

$stats=[
 'users'=>$pdo->query("SELECT COUNT(*) FROM users")->fetchColumn(),
 'orgs'=>$pdo->query("SELECT COUNT(*) FROM organizations")->fetchColumn(),
 'donations'=>$pdo->query("SELECT COUNT(*) FROM donations")->fetchColumn(),
 'campaigns'=>$pdo->query("SELECT COUNT(*) FROM campaigns")->fetchColumn(),
];

echo "<h1>UMDC Admin Dashboard</h1>";
foreach($stats as $k=>$v){ echo "<p>$k : $v</p>"; }
?>