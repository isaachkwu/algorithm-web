function generateQuiz(questions, quizContainer, resultsContainer, submitButton){
	function showQuestions(questions, quizContainer){
    var output = [];
	  var answers;
	  for(var i=0; i<questions.length; i++){
		answers = [];
		for(letter in questions[i].answers){
			answers.push(
				'<label>'
					+ '<input type="radio" name="question'+i+'" value="'+letter+'">'
					+ letter + ': '
					+ questions[i].answers[letter]
				+ '</label><br>'
			);
		}
		output.push(
			'<div class="question">' + questions[i].question + '</div>'
			+ '<div class="answers">' + answers.join('') + '</div>'
		);
	}
	quizContainer.innerHTML = output.join('');
}

function showResults(questions, quizContainer, resultsContainer){
    var answerContainers = quizContainer.querySelectorAll('.answers');
	var userAnswer = '';
	var numCorrect = 0;
	for(var i=0; i<questions.length; i++){
		userAnswer = (answerContainers[i].querySelector('input[name=question'+i+']:checked')||{}).value;
		if(userAnswer===questions[i].correctAnswer){
			numCorrect++;
			answerContainers[i].style.color = 'green';
		}
		else{
			answerContainers[i].style.color = 'red';
		}
	}
  if(numCorrect == questions.length){
  	resultsContainer.innerHTML = numCorrect + ' out of ' + questions.length + ', GOOD JOB!';
  }else if(numCorrect >= questions.length/2){
    	resultsContainer.innerHTML = numCorrect + ' out of ' + questions.length + ', Not bad!';
  }else{
	resultsContainer.innerHTML = numCorrect + ' out of ' + questions.length + ', Try to learn again!';
  }
  var realmark = numCorrect+"";
	mark=document.getElementById("mark");
	mark.setAttribute("value",realmark);
}
	showQuestions(questions, quizContainer);
	submitButton.onclick = function(){
		showResults(questions, quizContainer, resultsContainer);
	}

}
