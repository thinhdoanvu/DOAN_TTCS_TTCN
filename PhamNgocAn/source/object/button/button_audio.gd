extends "res://object/button/button_v2.gd"

onready var _labelName = $LabelName

export(String) var label_name = ""

func _ready():
	_labelName.text = label_name
	_labelName.visible = false
	modulate.a = 0.7

func setLabelName(value: String):
	_labelName.text = value
	pass

func _on_Button_v2_mouse_exited():
	_labelName.visible = false
	hover_exited()

func _on_Button_v2_mouse_entered():
	_labelName.visible = true
	hover_entered()
