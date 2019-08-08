var myQuestions = [
  {
    question: "what element is in the sorted place in the first loop?",
    answers: {
      a: "first or last element",
      b: "middle element",
      c: "second last element."
    },
    correctAnswer: "a"
  },
  {
    question: "Which one of the following is incorrect?",
    answers: {
      a: "Compared to buuble sort, selection sort is faster",
      b: "Compared to buuble sort, selection sort requires more swap",
      c: "Compared to buuble sort, selection sort requires less memory space"
    },
    correctAnswer: "b"
  },
  {
    question: "How many swaps can be made in a 5 elements array at most?",
    answers: {
      a: "5",
      b: "10",
      c: "24",
      d:"32"
    },
    correctAnswer: "a"
  }
];
var quizContainer = document.getElementById('quiz');
var resultsContainer = document.getElementById('results');
var submitButton = document.getElementById('submit');
generateQuiz(myQuestions, quizContainer, resultsContainer, submitButton);
