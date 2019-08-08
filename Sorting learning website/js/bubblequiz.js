var myQuestions = [
  {
    question: "Each pair of elements in the bubble sort comparision must ________________________.",
    answers: {
      a: "randomly choosen",
      b: "have a different values",
      c: "adjacent to each other."
    },
    correctAnswer: "c"
  },
  {
    question: "Which elements can be placed in the sorted position in the first loop of a accending bubble sort?",
    answers: {
      a: "second element",
      b: "middle element",
      c: "first or last element"
    },
    correctAnswer: "c"
  },
  {
    question: "How many swaps can be made in a 5 elements array at most?",
    answers: {
      a: "24",
      b: "38",
      c: "60",
      d:"120"
    },
    correctAnswer: "a"
  }
];
var quizContainer = document.getElementById('quiz');
var resultsContainer = document.getElementById('results');
var submitButton = document.getElementById('submit');
generateQuiz(myQuestions, quizContainer, resultsContainer, submitButton);
