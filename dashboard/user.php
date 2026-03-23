<?php
require __DIR__ . '/../Auth/Middleware.php';
requireRole('user');
echo "USER DASHBOARD";
?>