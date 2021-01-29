<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  'qmffhrcpdls',
  'opentutorials');
// $sql = "SELECT * FROM topic WHERE id = 1";
// $result = mysqli_query($conn, $sql);
// // var_dump($result->num_rows); // topic 행 개수
// $row = mysqli_fetch_array($result); //첫번째 행만 보여줌
// // print_r($row); echo $row[0]; 
// echo '<h1>'.$row['title'].'</h1>';
// echo $row['description'];

echo "<h1>single row</h1>";
$sql = "SELECT * FROM topic WHERE id = 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
echo '<h2>'.$row['title'].'</h2>';
echo $row['description'];

echo "<h1>multi row</h1>";
$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result)){
  echo '<h2>'.$row['title'].'</h2>';
  echo $row['description'];
}