extends Node

onready var _ui = $CanvasLayer/UserInterface
onready var _test = $CanvasLayer/Test
onready var _light = $CanvasLayer/Buttons/BtnCertificate/Light2D
onready var _btnCertificate = $CanvasLayer/Buttons/BtnCertificate
onready var _btnSubmit = $CanvasLayer/Buttons/BtnSubmit
onready var _message = $CanvasLayer/Message
onready var _finalSprite = $CanvasLayer/DaHoanThanh

const FRAME_NAME = "KiemTra"

var data = load("res://data/data_frame7.gd").new()
var questions = data.DATA_QUESTION
var correctAnswer = []
var size = questions.size()
var count = 0
var d = 0
var e = 0
var final = Global.final[FRAME_NAME]
var profile = Global.profile[FRAME_NAME]

func _ready():
	randomAnswer()
	createArrayCorrectAnswer()
	_test.setData(questions)
	_ui.currentScene = self
	_ui.visibleBtnNextScene(false)
	_ui.visibleBtnPrevScene(false)
	if final || profile["ChinhXac"]:
		_btnCertificate.visible = true
		_finalSprite.visible = true
		_test._answers.disabledCheckbox(true)
	else:
		_finalSprite.visible = false
		_btnCertificate.visible = false

func _process(delta):
	d += delta * 0.01
	e += delta
	var sin_d = sin(d)
	var sin_e = sin(e)
	var rotation = 360 * sin_d
	var energy = abs(sin_e) + 1
	_light.rotation_degrees = rotation
	_light.energy = energy
	if sin(d) > 0.99 or sin(d) < -0.99:
		d = 0
	showSubmitBtn()

func randomAnswer():
	randomize()
	questions.shuffle()
	for i in questions:
		randomize()
		i["answers"].shuffle()

func createArrayCorrectAnswer():
	for i in size:
		var a = questions[i]["answers"]
		for j in a.size():
			if a[j]["correct"]:
				correctAnswer.append(j)

func showSubmitBtn():
	var choiceAnswer = _test.getChoiceAnswers()
	var dem = 0
	for i in size:
		if choiceAnswer[i] != -1:
			dem += 1
	if dem == size:
		_btnSubmit.visible = true
	else:
		_btnSubmit.visible = false
	dem = 0

func checkSubmit():
	_test._answers.disabledCheckbox(true)
	var choiceAnswer = _test.getChoiceAnswers()
	for i in questions.size():
		if correctAnswer[i] == choiceAnswer[i]:
			count += 1
	if count == size:
		_message.setMessage(self, "closeFinalMessage", """Bạn đã trã lời chính xác tất cả các câu hỏi.
		Nhấn tiếp tục để nhận bằng chứng nhận""")
		_message.show()
		_btnCertificate.visible = true
		_finalSprite.visible = true
		profile["ChinhXac"] = true
		final = true
	else:
		_message.setMessage(self, "closeMessage", """Bạn làm đúng được: """ + str(count) + """/5 câu.
		Nhấn tiếp tục để làm lại.""")
		_message.show()
	count = 0

func closeMessage():
	Load.load_scene(self, "res://scene/frame7/frame7_exercise.tscn")

func closeFinalMessage():
	Load.load_scene(self, "res://scene/frame8/frame8_certificate.tscn")

func _on_BtnSubmit_button_down():
	checkSubmit()

func _on_BtnTake_button_down():
	Load.load_scene(self, "res://scene/frame8/frame8_certificate.tscn")
