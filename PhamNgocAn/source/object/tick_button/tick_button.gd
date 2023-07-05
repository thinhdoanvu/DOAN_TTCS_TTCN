extends "res://object/button/button_v2.gd"

onready var posEnd = $Position2D

export var isDrawLine: bool = false
export var colorPick: Color = Color.red

var isTick: bool = false setget setIsTick, getIsTick
var isTrueView: bool = false setget setIsTrueView, getIsTrueView
var isHover: bool = false
var posStart: Vector2 = Vector2.ZERO

const RADIUS: float = 23.5

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

func _draw():
	if isDrawLine:
		posStart = posEnd.position.normalized() * RADIUS
		draw_line(Vector2(23.5,23.5) + posStart, posEnd.position, colorPick, 2)

func loadTickTexture():
	if isTrueView:
		self.texture_normal = load("res://asset/sprite2D/UI/tick.png")

func _on_Tick_button_up():
	isTick = false

func _on_Tick_button_down():
	isTick = true
#	isTrueView = true
#	loadTickTexture()

func _on_Tick_mouse_entered():
	isHover = true
	hover_audio_play()
	modulate = Color("fcf200")


func _on_Tick_mouse_exited():
	isHover = false
	modulate = Color("ffffff")


func _on_Tick_toggled(button_pressed:bool):
	if button_pressed:
		for child in get_parent().get_children():
			if child.name != self.name:
				child.pressed = false
