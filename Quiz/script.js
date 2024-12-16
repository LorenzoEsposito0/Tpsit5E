let timer;
let timeLeft = 180; // 5 minutes in seconds

function startTest() {
    document.getElementById('homepage').style.display = 'none';
    document.getElementById('open-questions').style.display = 'block';
    document.getElementById('timer').style.display = 'block';
    startTimer();
}

function goToClosedQuestions() {
    document.getElementById('open-questions').style.display = 'none';
    document.getElementById('closed-questions').style.display = 'block';
}

function finishTest() {
    document.getElementById('closed-questions').style.display = 'none';
    document.getElementById('timer').style.display = 'none';
    alert('Thank you! Your answers have been saved.');
    saveResults();
}

function startTimer() {
    timer = setInterval(() => {
        if (timeLeft <= 0) {
            clearInterval(timer);
            finishTest();
        } else {
            timeLeft--;
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            document.getElementById('timer').innerText = `Time Left: ${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
        }
    }, 1000);
}

function saveResults() {
    const openAnswers = document.querySelectorAll('#open-question-list textarea');
    const closedAnswers = document.querySelectorAll('#closed-question-list input:checked');

    let results = 'Open Questions:\n';
    openAnswers.forEach((answer, index) => {
        results += `${index + 1}. ${answer.value}\n`;
    });

    results += '\nClosed Questions:\n';
    closedAnswers.forEach((answer, index) => {
        results += `${index + 1}. ${answer.name}: ${answer.value}\n`;
    });

    const blob = new Blob([results], { type: 'text/plain' });
    const link = document.createElement('a');
    link.href = URL.createObjectURL(blob);
    link.download = 'test_results.txt';
    link.click();
}
