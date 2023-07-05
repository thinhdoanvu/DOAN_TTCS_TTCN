extends Spatial

onready var Nap = $Box

const rotationClose = Vector3(0, 0, 179)
const rotationOpen = Vector3(0 , 0, 120)

var isOpen: bool = false

func _ready():
	Nap.rotation_degrees = rotationClose

func _process(delta):
	if isOpen:
		Nap.rotation_degrees = lerp(Nap.rotation_degrees, rotationOpen, 10 * delta)
	else:
		Nap.rotation_degrees = lerp(Nap.rotation_degrees, rotationClose, 10 * delta)
