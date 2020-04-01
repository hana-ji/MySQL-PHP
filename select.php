<?php
$conn = mysqli_connect(
    'localhost',
    'root',
    '123456',
    'opentutorials');
echo "<h1>single row</h1>";
$sql = "SELECT * FROM topic WHERE id = 15";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
echo '<h2>'.$row['title'].'</h2>';
echo  $row['description'];

echo "<h1>multi row</h1>";
$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
// mysqli_fetch_array 실행할 때 마다 result가 가르키는 쿼리문($sql)의 결과를 하나씩 배열로 리턴함
while ($row = mysqli_fetch_array($result)) {
    echo '<h2>' . $row['title'] . '</h2>';
    echo $row['description'];
}
// 담긴 데이터가 끝났는데 뭘 나타낼까 !?
//$row = mysqli_fetch_array($result);
//var_dump($row);
// null 줌
// = mysqli_fetch_array 실행할 때 마다 한 행씩 줌, 결과값이 없으면 null을 줌
// php는 null을 false로 취급함.