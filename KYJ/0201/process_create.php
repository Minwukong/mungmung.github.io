<?php 
$conn = mysqli_connect(
    "localhost",
    "root",
    "qmffhrcpdls",
    "opentutorials");
$filtered = array(
    'title'=>mysqli_real_escape_string($conn, $_POST['title']),
    'description'=>mysqli_real_escape_string($conn, $_POST['description']),
    'author_id'=>mysqli_real_escape_string($conn, $_POST['author_id'])
);
$sql = "
  INSERT INTO topic
    (title, description, created, author_id)
    VALUES(
        '{$_POST['title']}',
        '{$_POST['description']}',
        NOW(),
        {$filtered['author_id']}
    )    
";
$result = mysqli_query($conn, $sql);

    require_once('./view/html_top.php');
?>
        <div class="show_box">
            <?php
            if($result === false){
                echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.';
                error_log(mysqli_error($conn));
            } else {
                echo '성공했습니다.<br><br> <a href="index.php">돌아가기</a>';
            }
            ?>
        </div>
<?php
    require_once('./view/bottom.php');
?>