<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
    ?>
    <?php if((!isset($_SESSION['id'])) && (!isset($_SESSION['nickname']))){  ?>
    <a href="join.html">회원가입</a><br>
    <a href="login.html">로그인</a><br>
    <?php }else{?>
        <a href="logout.php">로그아웃</a><br>
    <?php } ?>
    
</body>
</html>