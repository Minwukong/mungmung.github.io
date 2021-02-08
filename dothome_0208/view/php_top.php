<?php
$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
$list = '';
while ($row = mysqli_fetch_array($result)) {
    if (($row['img_test'])) {
        $list = $list . "<a class=\"postImg_wrapper\" href=\"php_post.php?id={$row['id']}\"><img class=\"postImg\" src=\"{$row['img_test']}\"><div class=\"darkness\"><p>{$row['title']}</p></div></a>";
    } else {
        $list = $list . "<a class=\"postImg_wrapper\" href=\"php_post.php?id={$row['id']}\"><img class=\"postImg\" src=\"./designSource/kyj/cat.jpg\"><div class=\"darkness\"><p>{$row['title']}</p></div></a>";
        // $list = $list."<a class=\"postImg_wrapper\" href=\"index.php?id={$row['id']}\"><img class=\"postImg\" src=\"http://iamnothalim.dothome.co.kr/designSource/kyj/cat.jpg\"></a>";
    }
}
