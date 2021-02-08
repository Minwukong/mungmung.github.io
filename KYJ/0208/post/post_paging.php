<?php
require_once('config.php');
$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
$list = '';

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$sql1 = "SELECT * from topic";
$result1 = mysqli_query($conn, $sql1);
$row_num = mysqli_num_rows($result1);
$list_num = 10;     //한 페이지에 보여줄 게시물 수
$block_cnt = 3;     //블록당 보여줄 페이지 수

$block_num = ceil($page/$block_cnt);    //현재 페이지 블록 구하기
$block_start = (($block_num - 1) * $block_cnt) + 1;
$block_end = $block_start + $block_cnt - 1;

$total_page = ceil($row_num / $list_num);   //페이징한 페이지 수
if($block_end > $total_page) $block_end = $total_page;
$total_block = ceil($total_page / $block_cnt); //블럭 총 개수
$start_num = ($page-1) * $list_num; //시작번호 (page-1)에서 $list를 곱한다.

$sql2 = "SELECT * FROM topic ORDER BY id LIMIT $start_num, $list_num";
$result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
while ($row2 = mysqli_fetch_array($result2)) {
    if (($row2['img_test'])) {
        $list = $list . "<a class=\"postImg_wrapper\" href=\"php_post.php?id={$row2['id']}\"><img class=\"postImg\" src=\"{$row2['img_test']}\"><div class=\"darkness\"><p>{$row2['title']}</p></div></a>";
    } else {
        $list = $list . "<a class=\"postImg_wrapper\" href=\"php_post.php?id={$row2['id']}\"><img class=\"postImg\" src=\"./designSource/kyj/cat.jpg\"><div class=\"darkness\"><p>{$row2['title']}</p></div></a>";
        // $list = $list."<a class=\"postImg_wrapper\" href=\"index.php?id={$row['id']}\"><img class=\"postImg\" src=\"http://iamnothalim.dothome.co.kr/designSource/kyj/cat.jpg\"></a>";
    }
}        
?>


