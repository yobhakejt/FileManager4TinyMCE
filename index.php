<!DOCTYPE html>
<html>
<head>
    <title>문제 풀기</title>
    <script>
        function generateProblem() {
            var num1 = Math.floor(Math.random() * 10) + 1; // 1부터 10까지의 랜덤한 숫자 생성
            var num2 = Math.floor(Math.random() * 10) + 1;

            var operatorIndex = Math.floor(Math.random() * 3); // 0, 1, 2 중에 하나의 랜덤한 숫자 생성
            var operator;
            var answer;

            if (operatorIndex === 0) {
                operator = '+';
                answer = num1 + num2;
            } else if (operatorIndex === 1) {
                operator = '×';
                answer = num1 * num2;
            } else {
                operator = '÷';
                answer = num1 / num2;
            }

            document.getElementById('problem').textContent = num1 + ' ' + operator + ' ' + num2 + ' =';
            document.getElementById('answer').value = ''; // 답 입력 박스 초기화
            document.getElementById('answer').focus(); // 답 입력 박스에 포커스 설정

            return answer;
        }

        function checkAnswer(correctAnswer) {
            var userAnswer = parseInt(document.getElementById('answer').value);
            
            if (userAnswer === correctAnswer) {
                alert('정답입니다!');
                generateProblem();
            } else {
                alert('오답입니다. 다시 시도해주세요.');
                // 이 부분에 IP 밴 처리하는 로직을 추가해야 합니다.
            }
        }
    </script>
</head>
<body onload="generateProblem();">
    <h1>문제 풀기</h1>
    <div id="problem"></div>
    <input type="number" id="answer">
    <button onclick="checkAnswer()">입력</button>
</body>
</html>
