<?php
require_once("../view/php_connect_root.php");
// require_once("../view/php_connect_h.php");

session_start();
$userName = '';
if(isset($_SESSION['name'])){
    $userName = $_SESSION['name'];
}

settype($_POST['id'], 'integer');
$filtered = array(
  'id'=>mysqli_real_escape_string($conn, $_POST['post_num'])
);

$sql = "
    INSERT INTO comments
        (post_num, name, contents, created)
    VALUES(
        '{$filtered['id']}',
        '$userName',
        '{$_POST['content']}',
        NOW()
    )
";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
if($result === false){
    echo 'db 저장에 문제가 생겼습니다. 관리자에게 문의해주세요.';
    error_log(mysqli_error($conn));
} else {
    // echo 'db 저장에 성공했습니다.';
    echo "<script>location.href='/index.php?id=".$filtered['id']."';</script>";
}
// $msg .= '<br><br> <a href="../index.php?id='.$filtered['id'].'">돌아가기</a><br><br>';

?>