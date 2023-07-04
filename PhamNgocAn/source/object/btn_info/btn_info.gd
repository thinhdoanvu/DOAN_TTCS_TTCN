extends "res://object/button/button_v2.gd"

onready var _alert = $"%Alert"

var isTick: bool = false setget setIsTick, getIsTick
var isTrueView: bool = false setget setIsTrueView, getIsTrueView
var isHover: bool = false

var current = null
var method: String = ""

func setIsTick(new_value: bool):
	isTick = new_value

func getIsTick() -> bool:
	return isTick

func setIsTrueView(new_value: bool) -> void:
	isTrueView = new_value
	loadTickTexture()

func getIsTrueView() -> bool:
	return isTrueView

func _ready():
	modulate = Color("ffffff")
	loadTickTexture()

func loadTickTexture():
	if isTrueView:
		self.texture_normal = load("res://asset/sprite2D/UI/tick.png")

func _on_Tick_button_up():
	action()
	isTick = false

func _on_Tick_button_down():
	isTick = true

func _on_Tick_mouse_entered():
	isHover = true
	hover_audio_play()
	modulate = Color("fcf200")

func _on_Tick_mouse_exited():
	isHover = false
	modulate = Color("ffffff")

func action():
	if current and current.has_method(method):
		current.call(method)
