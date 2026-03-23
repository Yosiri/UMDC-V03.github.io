<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function requireRole($role){
    if(!isset($_SESSION['role']) || $_SESSION['role'] !== $role){
        header("Location: /public/login.html");
        exit;
    }
}
?>