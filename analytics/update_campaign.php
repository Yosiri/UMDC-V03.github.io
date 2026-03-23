<?php
require __DIR__ . '/../config/db.php';

function updateCampaignAmount($campaign_id){
    global $pdo;

    $total=$pdo->prepare("SELECT SUM(amount) FROM donations WHERE campaign_id=? AND status='completed'");
    $total->execute([$campaign_id]);
    $sum=$total->fetchColumn();

    $pdo->prepare("UPDATE campaigns SET current_amount=? WHERE campaign_id=?")
        ->execute([$sum,$campaign_id]);
}
?>
