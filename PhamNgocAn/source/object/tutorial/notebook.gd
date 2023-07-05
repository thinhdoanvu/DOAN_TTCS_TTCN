extends Control

onready var _leftTexture = $Notebook/HBoxContainer/LeftPaper/LeftTexture
onready var _leftTitle = $Notebook/HBoxContainer/LeftPaper/LeftTitle
onready var _leftSub = $Notebook/HBoxContainer/LeftPaper/LeftSub
onready var _leftContent = $Notebook/HBoxContainer/LeftPaper/LeftContent
onready var _rightTexture = $Notebook/HBoxContainer/RightPaper/RightTexture
onready var _rightTitle = $Notebook/HBoxContainer/RightPaper/RightTitle
onready var _rightSub = $Notebook/HBoxContainer/RightPaper/RightSub
onready var _rightContent = $Notebook/HBoxContainer/RightPaper/RightContent

onready var _lablePageLeft = $Notebook/LabelPageLeft
onready var _lablePageRight = $Notebook/LabelPageRight

onready var _btnNext = $Notebook/BtnNext
onready var _btnPrev = $Notebook/BtnPrev

var data: Array = []
var index: int = 0 setget setIndex, getIndex

# get/set
func setIndex(new_value) -> void:
	if data.size():
		index = new_value

func getIndex() -> int:
	return index

func _ready():
	self.visible = false
	loadBtnPrev()

func showTutorial():
	self.visible = true
	loadLabelLeft()
	loadLabelRight()

func loadLabelLeft():
	if index < data.size():
		if data[index]["image"]:
			_leftTexture.texture = load(data[index]["image"])
			_leftTexture.visible = true
		else:
			_leftTexture.visible = false

		if data[index]["title"]:
			_leftTitle.text = data[index]["title"]
			_leftTitle.visible = true
		else:
			_leftTitle.visible = false

		if data[index]["sub"]:
			_leftSub.text = data[index]["sub"]
			_leftSub.visible = true
		else:
			_leftSub.visible = false
		
		if data[index]["content"]:
			_leftContent.text = data[index]["content"]
			_leftContent.visible = true
		else:
			_leftContent.visible = false

		_lablePageLeft.text = str(index + 1)

func loadLabelRight():
	if index + 1 < data.size():
		if data[index + 1]["image"]:
			_rightTexture.texture = load(data[index + 1]["image"])
			_rightTexture.visible = true
		else:
			_rightTexture.visible = false

		if data[index + 1]["title"]:
			_rightTitle.text = data[index + 1]["title"]
			_rightTitle.visible = true
		else:
			_rightTitle.visible = false

		if data[index + 1]["sub"]:
			_rightSub.text = data[index + 1]["sub"]
			_rightSub.visible = true
		else:
			_rightSub.visible = false
		
		if data[index + 1]["content"]:
			_rightContent.text = data[index + 1]["content"]
			_rightContent.visible = true
		else:
			_rightContent.visible = false

		_lablePageRight.text = str(index + 2)
		_btnNext.visible = true
	else:
		_rightTexture.visible = false
		_rightTitle.visible = false
		_rightSub.visible = false
		_rightContent.visible = false
		_lablePageRight.text = ""
		_btnNext.visible = false

func next():
	if index + 2 < data.size():
		index += 2
		loadText()

func prev():
	if index - 2 >= 0:
		index -= 2
		loadText()

func loadBtnNext():
	if index == data.size() - 2:
		_btnNext.visible = false
	else:
		_btnNext.visible = true

func loadBtnPrev():
	if index == 0:
		_btnPrev.visible = false
	else:
		_btnPrev.visible = true
	
func loadText():
	loadBtnNext()
	loadBtnPrev()
	loadLabelLeft()
	loadLabelRight()

func _on_BtnNext_button_down():
	next()

func _on_BtnPrev_button_down():
	prev()

func _on_BtnClose_button_down():
	self.visible = false
