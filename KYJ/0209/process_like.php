<?php

//include 'initializeDB.php'; //$mysqli 변수 포함

// $conn = new mysqli("localhost","iamnothalim","blockchain1!","iamnothalim");
// mysqli_query($conn,'SET NAMES utf8');

// $id = $_SESSION['id']; // 사용자의 id 세션 가져오기
require_once('config.php');
$article_id = $_POST['articleId']; // 게시글 아이디
$service_code = $_GET['getLikedByCode']; 
// echo $service_code;

if(!empty($article_id)) {
    $sql1 = "SELECT * from service_like WHERE service_code = 'phpex-$article_id' AND author_id = '$userId'";
    $res1 = mysqli_num_rows($conn->query($sql1)); // sql 의 행 갯수를 가져옴 

    if($res1 == 0) {
        // 좋아요 기록이 없는 경우 -> 좋아요 등록
        $sql2 = "INSERT into service_like VALUES(0, 'phpex-$article_id', '$userId', 1, sysdate())";
        $res2 = $conn->query($sql2);

        // 게시판 테이블 업데이트
        $sql3 = "UPDATE topic SET like_count = like_count + 1 WHERE id = $article_id";
        $res3 = $conn->query($sql3);
        if(isset($_SESSION['id'])){
            echo $res2 && $res3 ? "like" : "failed";
        }else{
            // echo '로그인 회원만 가능합니다.';
            echo "<script>alert(\"이렇게 띄우면 되자나\");</script>";
        }
    } else {
        // 이미 좋아요를 누른 경우 -> 좋아요 취소
        $sql2 = "DELETE from service_like WHERE service_code = 'phpex-$article_id' AND author_id = '$userId'";
        $res2 = $conn->query($sql2);
        
        // 게시판 테이블 업데이트
        $sql3 = "UPDATE topic SET like_count = like_count - 1 WHERE id = $article_id";
        $res3 = $conn->query($sql3);
        if(isset($_SESSION['id'])){
            echo $res2 && $res3 ? "unlike" : "failed";
        }else{
            // echo '로그인 회원만 가능합니다.';
            echo "<script>alert(\"이렇게 띄우면 되자나\");</script>";
        }
    }
} else if(!empty($service_code)) {
    $sql1 = "SELECT * from service_like WHERE service_code = 'phpex-$service_code' AND author_id = '$userId'";
    $res1 = mysqli_num_rows($conn->query($sql1)); // sql 의 행 갯수를 가져옴 
    
    if(isset($_SESSION['id'])){
        echo $res1 != 0 ? "liked" : "unliked";
    }else{
        // echo '로그인 회원만 가능합니다.';
        echo "<script>alert(\"이렇게 띄우면 되자나\");</script>";
    }
    
}

?>