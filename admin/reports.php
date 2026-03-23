<?php
require __DIR__ . '/../auth/middleware.php';
require __DIR__ . '/../config/db.php';
requireRole('admin');

echo "<h2>Governance Reports</h2>";
?>