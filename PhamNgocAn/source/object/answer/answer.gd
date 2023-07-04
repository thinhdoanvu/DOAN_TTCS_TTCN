extends HBoxContainer

onready var _checkbox = $CheckBox
onready var _label = $Label

func getCheckBox() -> bool:
	return _checkbox.pressed

func setAnswer(value: String):
	_label.text = value

func setCheckBox(value: bool):
	_checkbox.pressed = value

func disabledCheckbox(value: bool):
	_checkbox.disabled = value

func _on_CheckBox_toggled(button_pressed: bool):
	if button_pressed:
		for child in get_parent().get_children():
			if child.name != self.name:
				child.setCheckBox(false)
