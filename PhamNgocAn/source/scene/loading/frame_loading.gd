extends Node

onready var _animation = $AnimationPlayer

func _ready():
	_animation.play("LOAD")
