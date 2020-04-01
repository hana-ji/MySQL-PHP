<?php
$conn = mysqli_connect(
    'localhost',
    'root',
    '123456',
    'opentutorials');

// 글 목록은 모든 항목 가져오기
$sql = "SELECT * FROM topic";
//데이타베이스 서버에 전송하는 api (접속식별자, sql)를 result에 담음
$result = mysqli_query($conn, $sql);
$list = '';
while($row = mysqli_fetch_array($result)) {
    // <li><a href="index.php?id=15">MySQL</a></li> 이런 코드를 프로그래밍 적으로 생성
    $list = $list . "<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>WEB</title>
</head>
<body>
<h1>WEB</h1>
<ol>
<!--   이렇게 해도 <?php echo $list; ?> 랑 똑같은 표현임   -->
    <?=$list?>
</ol>
<a href="create.php">create</a>
<h2>Welcome</h2>
Lorem issum dolor sit amet, consectetur
adipisicing elit
</body>
</html>