<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>WEB</title>
</head>
<body>
    <h1>WEB</h1>
    <ol>
        <li>HTML</li>
    </ol>
<!-- action: 사용자가 submit버튼을 눌렀을 때 이동하는 곳 -->
    <form action="process_create.php" method="post">
        <p><input type="text" name="title" placeholder="title"></p>
        <p><textarea name="description" placeholder="description"></textarea></p>
        <p><input type="submit"></p>
    </form>

</body>
</html>