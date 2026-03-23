<?php
require __DIR__ . '/../Auth/Middleware.php';
requireRole('admin');
echo "ADMIN DASHBOARD";
?>