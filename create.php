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

$sql = "SELECT * FROM author";
$result = mysqli_query($conn, $sql);
$select_form = '<select name="author_id">';
while ($row = mysqli_fetch_array($result)){
//    행마다 옵션추가됨 / 서버에 보낼때 value값으로 보냄
    $select_form .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
}
// .= select_form의 기존의 값에 이 값(</select>)을 추가한 값을 select_form으로 해라
$select_form .= '</select>';
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
    <form action="process_create.php" method="post">
        <p><input type="text" name="title" placeholder="title"></p>
        <p><textarea name="description" placeholder="description"></textarea></p>
<!--        저자정보 표현하고싶음 => 사용자가 이 글이 어떤 저자가 작성한 글인지 선택할수있-->
        <?=$select_form?>
        <p><input type="submit"></p>
    </form>
</body>
</html>