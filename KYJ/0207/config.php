<?php
// require_once('./view/php_connect_root.php');
require_once('./view/php_connect_h.php');

session_start();
$userId = '';
if(isset($_SESSION['id'])){
    $userId = $_SESSION['id'];
}
$userName = '';
if(isset($_SESSION['name'])){
    $userName = $_SESSION['name'];
}
?>