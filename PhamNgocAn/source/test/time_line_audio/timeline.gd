extends Control


onready var timeLine = $Timeline
onready var audio = $AudioStreamPlayer
onready var playBtn = $Play
onready var stopBtn = $Stop

var isDrag = false
var isFocus = false
var isPlay = true

func _ready():
	
	pass

func _process(_delta):
	if isPlay:
		timeLine.value = audio.get_playback_position() * 100 / audio.stream.get_length()
	pass

func _on_Play_button_up():
	audio.play()
	pass


func _on_Stop_button_up():
	audio.stop()
	pass


func _on_Pause_button_up():
	audio.stream_paused = not audio.stream_paused
	pass

func _on_Timeline_drag_started():
	isPlay = false

func _on_Timeline_drag_ended(value_changed):
	if value_changed:
		audio.play(timeLine.value * audio.stream.get_length() / 100)
	isPlay = true


func _on_Timeline_focus_exited():
	print("iok")
	pass # Replace with function body.
