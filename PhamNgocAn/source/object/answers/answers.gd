extends VBoxContainer

const ANSWER_LIST = ["A", "B", "C", "D"]


func loadAnswers(data: Array, choice_answer: int):
	for i in get_child_count():
		var s: String = ANSWER_LIST[i] + ". " + data[i]["content"]
		get_child(i).setAnswer(s)

	if choice_answer == -1:
		notCorrect()
	else:
		get_child(choice_answer).setCheckBox(true)	
	
func notCorrect():
	for i in get_child_count():
		get_child(i).setCheckBox(false)

func getChoiceAnswer() -> int:
	for i in get_child_count():
		if get_child(i).getCheckBox():
			return i
	return -1

func disabledCheckbox(value: bool):
	for i in get_child_count():
		get_child(i).disabledCheckbox(value)
