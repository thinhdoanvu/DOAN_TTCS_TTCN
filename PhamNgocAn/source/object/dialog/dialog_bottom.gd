extends "res://object/dialog/dialog.gd"

func _ready():
	._ready()
	_btnNext.visible = is_show_btn_index
	_btnPrev.visible = is_show_btn_index
	_backgroundBlack.visible = isViewBackgroundBlack

func _process(_delta):
	._process(_delta)

func loadDialog() -> void:
	.loadDialog()
	if data.size() > index:
		if data[index]['image']:
			_textureRectView.texture = load(data[index]['image'])

func _on_BtnClose_button_up():
	closeDialog()

func _on_BtnNext_button_up():
	if is_loop:
		self.loop()
	else:
		self.next()

func _on_BtnReplay_button_up():
	isAudioOn = true

func _on_BtnPrev_button_up():
	if is_loop:
		self.loop_prev()
	else:
		self.prev()

func visibleDialog(value: bool):
	isAudioOn = value
	var tween := create_tween().set_trans(Tween.TRANS_QUINT).set_ease(Tween.EASE_IN_OUT)
	if value:
		return tween.tween_property(_backgroundDialogView, "rect_position", Vector2(323, 436), 0.5)
	else:
		return tween.tween_property(_backgroundDialogView, "rect_position", Vector2(323, 750), 0.5)


func _on_TimeSlider_drag_started():
	isDragSlider = false


func _on_TimeSlider_drag_ended(value_changed):
	if value_changed:
		_audio.play(_timeSlider.value * _audio.stream.get_length() / 100)
	isDragSlider = true
