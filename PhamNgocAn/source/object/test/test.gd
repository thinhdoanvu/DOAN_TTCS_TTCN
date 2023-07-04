extends Control

onready var _question = $Paper/Content/Question
onready var _answers = $Paper/Content/Answers
onready var _listTickQuestion = $BtnQuestions/VBoxContainer/HBoxContainer2/HBoxContainer

var data: Array
var index: int = -1
var size: int = 0
var choiceAnswer = []

func _process(_delta):
	loadChoiceCorrect()
	loadTickQuestions()

func setData(value: Array):
	self.data = value
	initQuestion()

func getChoiceAnswers() -> Array:
	return choiceAnswer

func nextQuestion():
	if index < size - 1:
		index += 1
		loadQuestion()

func prevQuestion():
	if index > 0:
		index -= 1
		loadQuestion()

func setQuestion(value: int):
	if value < size and value >=0:
		index = value
		loadQuestion()

func initQuestion():
	if data.size():
		index = 0
		size = data.size()
		createArrayCorrectAnswer()
		loadQuestion()

func loadQuestion():
	if size:
		_question.text = "Câu hỏi " + str(index + 1) + ": " + data[index]["question"]
		_answers.loadAnswers(data[index]["answers"], choiceAnswer[index])

func loadChoiceCorrect():
	choiceAnswer[index] = _answers.getChoiceAnswer()

func createArrayCorrectAnswer():
	choiceAnswer.resize(size)
	choiceAnswer.fill(-1)

func loadTickQuestions():
	for i in choiceAnswer.size():
		if choiceAnswer[i] != -1:
			_listTickQuestion.get_child(i).setTheme(true)
		else:
			_listTickQuestion.get_child(i).setTheme(false)

func _on_Button_button_down():
	index = 0
	loadQuestion()

func _on_Button2_button_down():
	index = 1
	loadQuestion()

func _on_Button3_button_down():
	index = 2
	loadQuestion()

func _on_Button4_button_down():
	index = 3
	loadQuestion()

func _on_Button5_button_down():
	index = 4
	loadQuestion()

func _on_Button6_button_down():
	prevQuestion()

func _on_Button7_button_down():
	nextQuestion()
