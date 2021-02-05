<?php
    header("Content-Type:text/html; charset=UTF-8");
    $conn = new mysqli("localhost","iamnothalim","blockchain1!","iamnothalim");
    mysqli_query($conn,'SET NAMES utf8');
    $id = $_POST['id'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $sql = "insert into member(id,name,password) values('$id','$name','$password')";
    $res = $conn->query($sql);
    echo "<script>location.href='register2.html';</script>";
?>