<?php
session_start();

// 배경 생성 함수
function generateBackground() {
    $colors = array('red', 'blue', 'green', 'yellow', 'orange');
    $randIndex = array_rand($colors);
    return $colors[$randIndex];
}

// 문제 생성 함수
function generateQuestion() {
    $num1 = rand(1, 10);
    $num2 = rand(1, 10);
    $operators = array('+', '*', '/');
    $randIndex = array_rand($operators);
    $operator = $operators[$randIndex];

    switch ($operator) {
        case '+':
            $answer = $num1 + $num2;
            break;
        case '*':
            $answer = $num1 * $num2;
            break;
        case '/':
            $answer = $num1 / $num2;
            break;
    }

    // 문제와 정답을 세션에 저장
    $_SESSION['question'] = $num1 . ' ' . $operator . ' ' . $num2;
    $_SESSION['answer'] = $answer;
}

// 이전 문제 결과 확인
if (isset($_POST['answer'])) {
    if ($_POST['answer'] == $_SESSION['answer']) {
        echo "정답입니다!";
    } else {
        echo "답이 일치하지 않습니다.";
    }
    echo "<br>";
}

// 문제 생성
generateQuestion();

// 배경 생성
$background = generateBackground();
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: <?php echo $background; ?>;
        }
    </style>
</head>
<body>
    <h1>문제를 풀어주세요</h1>
    <form method="POST" action="">
        <label for="answer">답:</label>
        <input type="text" id="answer" name="answer" required>
        <button type="submit">입력</button>
    </form>
</body>
</html>
