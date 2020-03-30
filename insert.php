<?php
//    $mysqli = mysqli_connect("example.com", "user", "password", "database");
//    $res = mysqli_query($mysqli, "SELECT 'Please, do not use ' AS _msg FROM DUAL");
//    $row = mysqli_fetch_assoc($res);
//    echo $row['_msg'];

//host: 데이타베이스 서버 주소/ php와 데이터베이스가 같은 컴퓨터에 있어서 localhost or 127.0.0.1 하 됨
// 이 한줄의 코드로 mysql 모니터를 이용해서 최초접속했던 것과 똑같은 것 역할을 php를 통해 프로그래밍적으로 함
$conn = mysqli_connect("localhost", "root", "123456", "opentutorials");
// 첫번째 자리에 conn(링크), ""에 sql문을 주면, php가 클라이언트가 되서 데이터 서버에 어떤 sql문을 실행시킬 수 있다.
mysqli_query($conn,"
    INSERT INTO topic
    (title, description, created)
    VALUE(
    'MySQL',
    'MySQL is ...',
    NOW()
    )
");
?>