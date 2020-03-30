<?php
$conn = mysqli_connect(
    'localhost',
    'root',
    '123456',
    'opentutorials');

// 저장된 데이터를 출력
// SELECT문에서의 가장 위험한 요소 1. 모든 데이터 가져오면 큰일 남 = LIMIT 로 수 제한해야함 ex) $sql = "SELECT * FROM topic LIMIT 1000";
$sql = "SELECT * FROM topic WHERE id = 19";
// 쿼리 생성 완료 데이터 서버에 전송해야함
$result = mysqli_query($conn, $sql);
//가져온 데이터를 php에서 활용 할 수 있어야함 = php 데이터타입으로 전환해야함
//mysqli_fetch_array(result값을 받음)
// ㄴ print_r(mysqli_fetch_array($result));
//print_r 해서 봤더니 1. 배열이 리턴 2. 첫번째 행만을 보여줌 3. 값들이 두번씩 반복(1.자릿수,2.column명) 선택적으로 가져올 수 있음
$row = mysqli_fetch_array($result);
print_r($row);
// 자릿수나 column명으로 데이터를 가져올 수 있음 column명으로 가져오면 '연관배열' 자릿수로 가져오면 그냥 '배열'
echo '<h1>'.$row['title'].'</h1>';
echo  $row['description'];
?>