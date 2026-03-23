<?php
require __DIR__ . '/../config/db.php';
$id=$_GET['id'];

$receipt='UMDC-'.time().'-'.$id;

$pdo->prepare("INSERT INTO receipts (donation_id,receipt_number) VALUES (?,?)")
    ->execute([$id,$receipt]);

$pdo->prepare("INSERT INTO ledgers (donation_id,public_hash) VALUES (?,SHA2(?,256))")
    ->execute([$id,$receipt]);

?>