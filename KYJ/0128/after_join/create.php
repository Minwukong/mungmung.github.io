<?php 
$conn = mysqli_connect(
    'localhost',
    'root',
    'qmffhrcpdls',
    'opentutorials');

$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
$list = '';
while($row = mysqli_fetch_array($result)){
    // $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
    $escaped_title = htmlspecialchars($row['title']);
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
}

// $article = array(
//     'title'=>'Welcome',
//     'description'=>'Hello, web'
// );
$sql = "SELECT * FROM author";
$result = mysqli_query($conn, $sql);
$select_form = '<select name="author_id">';
while($row = mysqli_fetch_array($result)){
    $select_form .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
}
$select_form .= '</select>';

// if(isset($_GET['id'])){
//     $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
//     $sql = "SELECT * FROM topic WHERE id={$filtered_id}";
//     $result = mysqli_query($conn, $sql);
//     $row = mysqli_fetch_array($result);
//     $article['title'] = $row['title'];
//     $article['description'] = $row['description'];
// }

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB</title>
</head>
<body>
    <h1><a href="index.php">WEB</a></h1>
    <ol>
        <?=$list?>
    </ol>
    <form action="process_create.php" method="POST">
        <p><input type="text" name="title" placeholder="title"></p>
        <p><textarea name="description" placeholder="description"></textarea></p>
        <?=$select_form?>
        <p><input type="submit"></p>
    </form>
</body>
</html>