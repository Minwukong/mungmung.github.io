<?php
    header("Content-Type:text/html; charset=UTF-8");
    session_start();
    $session = session_destroy();
    if($session){
        header('Location:./main.php');
        //echo"<script>location.href='/main.php';</script>";
    }
?>