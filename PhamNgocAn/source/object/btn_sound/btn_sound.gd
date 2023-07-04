extends "res://object/button/button_v2.gd"

onready var _labelName = $LabelName

func _ready():
	_labelName.visible = false
	modulate = Color("ffffff")
	self.toggle_mode = true
	loadSpriteSound()

func loadSpriteSound():
	if Global.isAudioOn:
		self.texture_normal = load("res://asset/sprite2D/UI/sound_on.png")
	else:
		self.texture_normal = load("res://asset/sprite2D/UI/sound_off.png")

func _on_Sound_toggled(_value):
	Global.isAudioOn = not Global.isAudioOn
	AudioServer.set_bus_mute(0, not Global.isAudioOn)
	loadSpriteSound()

func _on_Sound_mouse_entered():
	hover_audio_play()
	modulate = Color("fcf200")
	_labelName.visible = true
	
func _on_Sound_mouse_exited():
	modulate = Color("ffffff")
	_labelName.visible = false
