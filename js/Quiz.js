const quizData = [
    {
        question: "Which of the following best describes the purpose of conditioning in basketball?",
        a: "To improve shooting accuracy",
        b: "To develop teamwork skills",
        c: " To increase muscular strength",
        d: "To enhance endurance and stamina",
        correct: "d",
    },
    {
        question: "Which of the following is an example of aerobic exercise commonly used in basketball conditioning?",
        a: "Weightlifting",
        b: "Sprinting",
        c: "Jumping rope",
        d: " Plyometric exercises",
        correct: "c",
    },
    {
        question: "What is the primary energy system utilized during short bursts of high-intensity activity in basketball, such as sprinting or jumping?",
        a: "Anaerobic lactic",
        b: "Anaerobic alactic",
        c: "Aerobic",
        d: "Glycolytic",
        correct: "b",
    },
    {
        question: "Which of the following training methods is most effective for improving cardiovascular fitness in basketball players?",
        a: "High-intensity interval training (HIIT)",
        b: "Static stretching",
        c: "Resistance training",
        d: "Plyometric training",
        correct: "a",
    },
];
const quiz = document.getElementById('quiz')
const answerEls = document.querySelectorAll('.answer')
const questionEl = document.getElementById('question')
const a_text = document.getElementById('a_text')
const b_text = document.getElementById('b_text')
const c_text = document.getElementById('c_text')
const d_text = document.getElementById('d_text')
const submitBtn = document.getElementById('submit')
let currentQuiz = 0
let score = 0
loadQuiz()
function loadQuiz() {
    deselectAnswers()
    const currentQuizData = quizData[currentQuiz]
    questionEl.innerText = currentQuizData.question
    a_text.innerText = currentQuizData.a
    b_text.innerText = currentQuizData.b
    c_text.innerText = currentQuizData.c
    d_text.innerText = currentQuizData.d
}
function deselectAnswers() {
    answerEls.forEach(answerEl => answerEl.checked = false)
}
function getSelected() {
    let answer
    answerEls.forEach(answerEl => {
        if (answerEl.checked) {
            answer = answerEl.id
        }
    })
    return answer
}
submitBtn.addEventListener('click', () => {
    const answer = getSelected()
    if (answer) {
        if (answer === quizData[currentQuiz].correct) {
            score++
        }
        currentQuiz++
        if (currentQuiz < quizData.length) {
            loadQuiz()
        } else {
            quiz.innerHTML = `
          <h2>You answered ${score}/${quizData.length} questions correctly</h2>
          <button2 onclick="location.reload()">Reload</button2>
          `

        }
    }
})