<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  'qmffhrcpdls',
  'opentutorials');
$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
mysqli_fetch_array()
var_dump($result->num_rows);