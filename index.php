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
$delete_link = '';
$author= '';
if(isset($_GET['id'])){
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
//    author_id의 값과 id의 값이 같다는게 중요 포인트
    $sql = "SELECT * FROM topic LEFT JOIN author ON topic.author_id = author.id WHERE topic.id={$filtered_id}";
    $result = mysqli_query($conn, $sql);
//    echo mysqli_error($conn); 에러확인
    $row = mysqli_fetch_array($result);
//    print_r($row); $row에 어떤 값이 들어오는지 보기 (name 필요햐서 확인후 적음)
    $article['title'] = htmlspecialchars($row['title']);
    $article['description'] = htmlspecialchars($row['description']);
    $article['name'] = htmlspecialchars($row['name']);

   $update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';
   $delete_link = '
     <form action="process_delete.php" method="post" >
        <input type="hidden" name="id" value="'.$_GET['id'].'">
        <input type="submit" value="delete">
     </form>
   ';
   $author = "<p>by {$article['name']}</p>";
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
<?=$update_link?>
<!--클릭하면 바로 삭제되-->
<?=$delete_link?>
<h2><?=$article['title']?></h2>
<?=$article['description']?>
<?=$author?>
</body>
</html>