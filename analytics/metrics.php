<?php
require __DIR__ . '/../config/db.php';

function getPlatformMetrics($pdo){
    return [
        'total_users' => $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn(),
        'total_orgs' => $pdo->query("SELECT COUNT(*) FROM organizations")->fetchColumn(),
        'active_campaigns' => $pdo->query("SELECT COUNT(*) FROM campaigns WHERE status='active'")->fetchColumn(),
        'total_donations' => $pdo->query("SELECT SUM(amount) FROM donations WHERE status='completed'")->fetchColumn()
    ];
}
?>
