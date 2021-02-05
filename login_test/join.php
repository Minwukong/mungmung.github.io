<?php
    header("Content-Type:text/html; charset=UTF-8");
    $conn = new mysqli("localhost","iamnothalim","blockchain1!","iamnothalim");
    mysqli_query($conn,'SET NAMES utf8');
    $id = $_POST['id'];
    $nickname = $_POST['nickname'];
    $password = $_POST['password'];
    $sql = "insert into member(id,nickname,password) values('$id','$nickname','$password')";
    $res = $conn->query($sql);
    echo "<script>location.href='login.html';</script>";
?>