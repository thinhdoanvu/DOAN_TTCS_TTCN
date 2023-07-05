extends Control

onready var _message := $Panel
onready var _lable := $Panel/VBoxContainer/VBoxContainer2/Label2
onready var _btnClose = $Panel/VBoxContainer/VBoxContainer/HBoxContainer/Button
onready var _background = $Background

var current = null
var method = ""

func _ready():
	_background.visible = false

func setMessage(obj = null, txtMethod: String = "", txtContent: String = ""):
	_lable.text = txtContent
	method = txtMethod
	current = obj

func visibleBtnClose(value: bool):
	_btnClose.visible = value

func show():
	setVisibleMesseage(true)

func close():
	setVisibleMesseage(false)

func setVisibleMesseage(value: bool):
	_background.visible = value
	var _tween := create_tween().set_trans(Tween.TRANS_BACK).set_ease(Tween.EASE_OUT)
	if value:
		return _tween.tween_property(_message, "rect_position", Vector2(400, 250), 0.5)
	else:
		return _tween.tween_property(_message, "rect_position", Vector2(400, 750), 0.5)

func execution():
	if current:
		if current.has_method(method):
			current.call(method)

func _on_Button_button_down():
	close()

func _on_Button2_button_down():
	execution()
