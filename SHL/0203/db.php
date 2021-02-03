<?php
header("Content-Type:text/html; charset=UTF-8");
$conn = new mysqli("localhost","iamnothalim","blockchain1!","iamnothalim");
mysqli_query($conn,'SET NAMES utf8');
function mq($sql){
    global $conn;
    return $conn->query($sql);
}
?>