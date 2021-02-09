<?php
require_once('inner_config.php');

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
    echo "<script>alert('댓글이 삭제되었습니다.');</script>";
    echo "<script>location.href='/php_post.php?id=".$filtered['post_num']."';</script>";
}
?>