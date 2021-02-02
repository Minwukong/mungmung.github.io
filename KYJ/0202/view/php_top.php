<?php
    require_once('php_connect_root.php');
    // require_once('php_connect_h.php');

$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
$list = '';
while($row = mysqli_fetch_array($result)){ 
    // $escaped_title = htmlspecialchars($row['title']);
    // $escaped_date = htmlspecialchars($row['created']);
    // $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
    if(($row['img_test'])){
        $list = $list."<a class=\"postImg_wrapper\" href=\"index.php?id={$row['id']}\"><img class=\"postImg\" src=\"{$row['img_test']}\"></a>";
    } else {
        $list = $list."<a class=\"postImg_wrapper\" href=\"index.php?id={$row['id']}\"><img class=\"postImg\" src=\"./designSource/kyj/cat.jpg\"></a>";
        // $list = $list."<a class=\"postImg_wrapper\" href=\"index.php?id={$row['id']}\"><img class=\"postImg\" src=\"http://iamnothalim.dothome.co.kr/designSource/kyj/cat.jpg\"></a>";
    }
}
?>