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
    $list = $list . "<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
}

//기본 값
$article = array(
    'title'=>'Welcome',
    'description'=>'Hello, web'
);
if(isset($_GET['id'])){
    // 아이디 값만 따오기
    $sql = "SELECT * FROM topic WHERE id={$_GET['id']}";
    $result = mysqli_query($conn, $sql);
    // 서버에 전달한 값을 배열화 근데 반복문 안쓸거임
    $row = mysqli_fetch_array($result);
    // id값이 존재하면 덮어씌움
    $article['title'] = $row['title'];
    $article['description'] = $row['description'];
}
//print_r($article); 잘나오는지 확인
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
    <!--   이렇게 해도 <?php echo $list; ?> 랑 똑같은 표현임   -->
    <?=$list?>
</ol>
<!-- action: 사용자가 submit버튼을 눌렀을 때 이동하는 곳 -->
    <form action="process_create.php" method="post">
        <p><input type="text" name="title" placeholder="title"></p>
        <p><textarea name="description" placeholder="description"></textarea></p>
        <p><input type="submit"></p>
    </form>

</body>
</html>