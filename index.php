<?php

// 랜덤으로 숫자 2개 선택
$num1 = rand(1, 10);
$num2 = rand(1, 10);

// 랜덤으로 연산자 선택 (+, *, / 중에서)
$operator = rand(1, 3);
if ($operator == 1) {
  // 더하기 문제
  $question = "$num1 + $num2";
  $answer = $num1 + $num2;
} elseif ($operator == 2) {
  // 곱하기 문제
  $question = "$num1 * $num2";
  $answer = $num1 * $num2;
} else {
  // 나누기 문제 (나머지가 없는 경우에만)
  $num1 = $num1 * $num2; // num1을 num2의 배수로 만들어주기
  $question = "$num1 ÷ $num2";
  $answer = $num1 / $num2;
}

// 문제 출력 후 답 입력 요청
echo "문제: $question\n";
$guess = readline("답: ");

// 정답인 경우 새로운 문제 생성
while ($guess == $answer) {
  $num1 = rand(1, 10);
  $num2 = rand(1, 10);
  $operator = rand(1, 3);
  if ($operator == 1) {
    $question = "$num1 + $num2";
    $answer = $num1 + $num2;
  } elseif ($operator == 2) {
    $question = "$num1 * $num2";
    $answer = $num1 * $num2;
  } else {
    $num1 = $num1 * $num2;
    $question = "$num1 ÷ $num2";
    $answer = $num1 / $num2;
  }
  echo "정답입니다! 새로운 문제를 내겠습니다.\n";
  echo "문제: $question\n";
  $guess = readline("답: ");
}

echo "틀렸습니다. 정답은 $answer입니다.\n";
