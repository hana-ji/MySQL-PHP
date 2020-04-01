<?php
// 데이터베이스 접속
$conn = mysqli_connect(
    'localhost',
    'root',
    '123456',
    'opentutorials');

// 정수로 전환하는 php의 API (settype으로 type 바꿀있음)
settype($_POST['id'], 'integer');
$filtered = array(
    'id' => mysqli_real_escape_string($conn, $_POST['id']),
    'title'=>mysqli_real_escape_string($conn, $_POST['title']),
    'description'=>mysqli_real_escape_string($conn, $_POST['description'])
);

$sql = "

    UPDATE topic
        SET
            title = '{$filtered['title']}',
            description = '{$filtered["description"]}'
        WHERE 
            id = {$filtered['id']}
";
//접속 된 데이터베이스 서버로 sql문 전송
//첫 번째 자리엔 데이터베이스 접속 정보를 담고있는 변수를 적어야함
$result = mysqli_query($conn, $sql);
if($result === false){
    echo '저장하는 과정에서 문제가 생겼습니다.';
} else {
    echo  '저장에 성공했습니다. <a href="index.php">돌아가기</a>';
}
?>