<?php
session_start();

if (isset($_SESSION['username'])) {
    unset($_SESSION['username']);
    unset($_SESSION['id']);
}
header('location:login.php');
