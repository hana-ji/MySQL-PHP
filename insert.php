<?php
//    $mysqli = mysqli_connect("example.com", "user", "password", "database");
//    $res = mysqli_query($mysqli, "SELECT 'Please, do not use ' AS _msg FROM DUAL");
//    $row = mysqli_fetch_assoc($res);
//    echo $row['_msg'];

$conn = mysqli_connect("localhost", "root", "123456", "opentutorials");
// sql문을 변수에 담음
$sql = "
    INSERT INTO topic
    (title, description, created)
    VALUE(
    'MySQL',
    'MySQL is ...',
    NOW()
    )
";
//이렇게 변수 선언으로 ehco $sql 하면 오류 났을때 화면에 보여주고 그 오류난 코드를 sql모니터에 복붙하면 오류코드 번호랑 내용 알 수 있음.
// 오류해결 검색 : how to get error in php mysqli
// 첫번째 자리에 conn(링크), ""에 sql문을 주면, php가 클라이언트가 되서 데이터 서버에 어떤 sql문을 실행시킬 수 있다.
// mysqli_query 는 실패했을 때 return 값이 false가 됨. qurey의 return값의 특성을 이용하면 어떤 명령 실행했을 때 실패했는지 성공했는지 알수있다.
$result = mysqli_query($conn, $sql);
if($result === false){
//이렇게 적으면 어떤 에러가 있는지 데이터서버가 알려준 정보를 php 서버가 출력(실제는 x)
    echo mysqli_error($conn);
}
?>