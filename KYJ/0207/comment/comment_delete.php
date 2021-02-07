<?php
// require_once("../view/php_connect_root.php");
require_once("../view/php_connect_h.php");
session_start();

settype($_POST['comment_num'], 'integer');
$filtered = array(
    'post_num'=>mysqli_real_escape_string($conn, $_POST['post_num']),
    'comment_num'=>mysqli_real_escape_string($conn, $_POST['comment_num'])
);

$sql = "
    DELETE FROM comments
        WHERE id = {$filtered['comment_num']}
";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
if($result === false){
    echo 'db 저장에 문제가 생겼습니다. 관리자에게 문의해주세요.';
    error_log(mysqli_error($conn));
} else {
    // echo 'db 저장에 성공했습니다.';
    echo "<script>location.href='/php_post.php?id=".$filtered['post_num']."';</script>";
}
?>