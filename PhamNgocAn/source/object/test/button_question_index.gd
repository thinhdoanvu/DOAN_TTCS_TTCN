extends Button

var isTick = false

func setTheme(value: bool):
	isTick = value
	if isTick:
		self.theme = load("res://reuse/theme/button_question_index.tres")
	else:
		self.theme = load("res://reuse/theme/button_question_index_not_select.tres")

func setIsTick(value: bool):
	isTick = value
	setTheme(isTick)

func getTick():
	return isTick

