<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Random Math Quiz</title>
</head>
<body>
    <h1>Random Math Quiz</h1>

    <?php
    // 함수: 2개의 숫자 중에서 랜덤으로 하나를 선택합니다.
    function getRandomNumber() {
        return rand(0, 10);
    }

    // 함수: 덧셈 문제를 랜덤 생성합니다.
    function createAdditionProblem() {
        $num1 = getRandomNumber();
        $num2 = getRandomNumber();
        $problem = "$num1 + $num2 =";
        $answer = $num1 + $num2;
        return array("problem" => $problem, "answer" => $answer);
    }

    // 함수: 곱셈 문제를 랜덤 생성합니다.
    function createMultiplicationProblem() {
        $num1 = getRandomNumber();
        $num2 = getRandomNumber();
        $problem = "$num1 x $num2 =";
        $answer = $num1 * $num2;
        return array("problem" => $problem, "answer" => $answer);
    }

    // 함수: 나눗셈 문제를 랜덤 생성합니다.
    function createDivisionProblem() {
        $num1 = getRandomNumber() + 1; // 분자는 0이 아닌 숫자로 설정합니다.
        $num2 = getRandomNumber() + 1; // 분모는 0이 아닌 숫자로 설정합니다.
        $dividend = $num1 * $num2;
        $problem = "$dividend ÷ $num1 =";
        $answer = $num2;
        return array("problem" => $problem, "answer" => $answer);
    }

    // 함수: 랜덤으로 문제를 생성합니다.
    function createRandomProblem() {
        $randomNumber = rand(0, 2); // 0, 1, 2 중에서 하나를 랜덤 선택합니다.
        switch ($randomNumber) {
            case 0:
                return createAdditionProblem();
            case 1:
                return createMultiplicationProblem();
            case 2:
                return createDivisionProblem();
        }
    }

    // 변수: 현재 문제와 정답을 저장합니다.
    $problem = "";
    $answer = "";

    // POST request를 처리합니다.
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // 현재 문제의 정답과 사용자의 답을 비교합니다.
        $problem = $_POST['problem'];
        $answer = $_POST['answer'];
        if ($answer == $_POST['correctAnswer']) {
            echo "<p style='color: green;'>맞았습니다! 다른 문제를 풀어보세요.</p>";
        } else {
            echo "<p style='color: red;'>틀렸습니다. 다시 시도해주세요.</p>";
        }
    }

    // 새로운 문제를 생성하고, 화면에 출력합니다.
    $newProblem = createRandomProblem();
    $problem = $newProblem['problem'];
    $answer = $newProblem['answer'];
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <p><label><?php echo $problem; ?></label> <input type="number" name="answer" required></p>
        <input type="hidden" name="problem" value="<?php echo $problem; ?>">
        <input type="hidden" name="correctAnswer" value="<?php echo $answer; ?>">
        <p><button type="submit">입력</button></p>
    </form>
</body>
</html>
