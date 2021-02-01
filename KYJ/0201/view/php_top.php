<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  'qmffhrcpdls',
  'opentutorials');

$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
$list = '';
// $date = '';
while($row = mysqli_fetch_array($result)){ 
    $escaped_title = htmlspecialchars($row['title']);
    // $escaped_date = htmlspecialchars($row['created']);
    // $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
    $list = $list."<a class=\"postImg_wrapper\" href=\"index.php?id={$row['id']}\"><img class=\"postImg\" src=\"./designSource/kyj/cat.jpg\"></a>";
    // $date = $date."<li>{$escaped_date}</li>";
}
?>