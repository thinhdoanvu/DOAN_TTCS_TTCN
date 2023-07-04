extends Node2D

export (int, "normal", "click", "please_click_normal","please_click") var mode: int = 0 setget setMode

onready var _spriteHand = $SpriteHand
onready var _timer = $Timer

const TEXTURE_HAND_CURSOR = "res://asset/sprite2D/UI/handCursor.png"
const TEXTURE_HAND_CURSOR_TICK = "res://asset/sprite2D/UI/handCursorTick.png"

var state: bool = true
var length = 50 setget setLength

func _ready():
	_timer.wait_time = 0.5
	_timer.autostart = true

func _process(_delta):
	if mode == 2:
		if state:
			_spriteHand.position.y = lerp(0, length, 0.2)
		else:
			_spriteHand.position.y = lerp(length, 0, 0.2)

func setMode(value: int):
	mode = value

func setWaitTime(value: float):
	_timer.wait_time = value

func setLength(value: float):
	length = value

func _on_Timer_timeout():
	state = !state
	match mode:
		0:
			_spriteHand.texture = load(TEXTURE_HAND_CURSOR)
		1:
			_spriteHand.texture = load(TEXTURE_HAND_CURSOR_TICK)
		2:
			_spriteHand.texture = load(TEXTURE_HAND_CURSOR)
		3:
			if state:
				_spriteHand.texture = load(TEXTURE_HAND_CURSOR)
			else:
				_spriteHand.texture = load(TEXTURE_HAND_CURSOR_TICK)
