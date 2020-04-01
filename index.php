<?php
$conn = mysqli_connect(
    'localhost',
    'root',
    '123456',
    'opentutorials');

$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
$list = '';
while($row = mysqli_fetch_array($result)) {
    $escaped_title = htmlspecialchars($row['title']);
    $list = $list . "<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
}

//기본 값
$article = array(
    'title'=>'Welcome',
    'description'=>'Hello, web'
);
$update_link = '';
if(isset($_GET['id'])){
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM topic WHERE id={$filtered_id}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $article['title'] = htmlspecialchars($row['title']);
    $article['description'] = htmlspecialchars($row['description']);

//  update_link 변수에 아이디 값이 있다면 얘를 보여줌
   $update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>WEB</title>
</head>
<body>
<h1><a href="index.php">WEB</a></h1>
<ol>
    <?=$list?>
</ol>
<a href="create.php">create</a>
<!--누굴 업데이트할것인가 정해줘야함(파라미터형식)-->
<?=$update_link?>
<h2><?=$article['title']?></h2>
<?=$article['description']?>
</body>
</html>