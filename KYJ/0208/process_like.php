<?php

//include 'initializeDB.php'; //$mysqli 변수 포함

$conn = new mysqli("localhost","iamnothalim","blockchain1!","iamnothalim");
mysqli_query($conn,'SET NAMES utf8');

$id = $_SESSION['id']; // 사용자의 id 세션 가져오기
$article_id = $_POST['articleId']; // 게시글 아이디
$service_code = $_GET['getLikedByCode']; 
// echo $service_code;

if(!empty($article_id)) {
    $sql1 = "SELECT * from service_like WHERE service_code = 'phpex-$article_id' AND liked_ip = '$ip'";
    $res1 = mysqli_num_rows($mysqli->query($sql1)); // sql 의 행 갯수를 가져옴 

    if($res1 == 0) {
        // 좋아요 기록이 없는 경우 -> 좋아요 등록
        $sql2 = "INSERT into service_like VALUES(0, 'phpex-$article_id', '$ip', 1, sysdate())";
        $res2 = $mysqli->query($sql2);

        // 게시판 테이블 업데이트
        $sql3 = "UPDATE messages SET like_count = like_count + 1 WHERE seq = $article_id";
        $res3 = $mysqli->query($sql3);
        echo $res2 && $res3 ? "like" : "failed";
    } else {
        // 이미 좋아요를 누른 경우 -> 좋아요 취소
        $sql2 = "DELETE from service_like WHERE service_code = 'phpex-$article_id' AND liked_ip = '$ip'";
        $res2 = $mysqli->query($sql2);
        
        // 게시판 테이블 업데이트
        $sql3 = "UPDATE messages SET like_count = like_count - 1 WHERE seq = $article_id";
        $res3 = $mysqli->query($sql3);
        echo $res2 && $res3 ? "unlike" : "failed";
    }
} else if(!empty($service_code)) {
    $sql1 = "SELECT * from service_like WHERE service_code = 'phpex-$service_code' AND liked_ip = '$ip'";
    $res1 = mysqli_num_rows($mysqli->query($sql1)); // sql 의 행 갯수를 가져옴 
    
    echo $res1 != 0 ? "liked" : "unliked";

}

?>