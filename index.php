<?php
// 문제 생성 함수
function generateProblem() {
    $operators = array('+', '*', '/'); // 사용할 연산자들

    $operator = $operators[array_rand($operators)]; // 연산자 랜덤 선택

    // 덧셈 문제 생성
    if ($operator == '+') {
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        $result = $num1 + $num2;
    }

    // 곱셈 문제 생성
    if ($operator == '*') {
        $num1 = rand(1, 10);
        $num2 = rand(1, 10);
        $result = $num1 * $num2;
    }

    // 나눗셈 문제 생성
    if ($operator == '/') {
        $result = rand(1, 10);
        $num2 = rand(1, 10);
        $num1 = $result * $num2;
    }

    $problem = $num1 . ' ' . $operator . ' ' . $num2; // 문제 문자열 생성
    return array('problem' => $problem, 'result' => $result); // 문제와 정답을 배열로 반환
}

// 세션을 통해 현재 문제 정보 유지
session_start();
if (!isset($_SESSION['problem'])) {
    $_SESSION['problem'] = generateProblem(); // 처음 문제 생성
}

// POST 요청 처리
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userAnswer = $_POST['answer']; // 사용자가 입력한 답

    // 정답 확인
    if ($userAnswer == $_SESSION['problem']['result']) {
        $_SESSION['problem'] = generateProblem(); // 다음 문제 생성
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>문제 풀기</title>
</head>
<body>
    <h1>문제 풀기</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="answer">답:</label>
        <input type="text" id="answer" name="answer">
        <button type="submit">입력</button>
    </form>

    <h2>문제: <?php echo $_SESSION['problem']['problem']; ?></h2>
</body>
</html>
