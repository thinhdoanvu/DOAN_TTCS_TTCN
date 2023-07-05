extends Node2D

onready var plugin = $Area2DPlugin
onready var socket = $Area2DSocket
onready var line = $Line2D
onready var posPlugin = $Area2DPlugin/Position2D
onready var posSocket = $Area2DSocket/Position2D
onready var _posStart = $PositionStart
onready var chanPlugin = $Area2DPlugin/ChanPlugin

var selected: bool = false
var initPosition: Vector2 = Vector2(0 , 0)
var isSnap: bool = false
var snapFull: bool = false

func _ready():
	initPosition = plugin.position

func _process(_delta):
	if not snapFull:
		line.set_point_position(0, _posStart.position)
		line.set_point_position(1, plugin.position + posPlugin.position)
		if selected:
			plugin.global_position = lerp(plugin.position + self.position, get_global_mouse_position(), 0.3)
			if plugin.position.x > _posStart.position.x:
				plugin.position.x = _posStart.position.x
	#		plugin.rotation = 0
		else:
			if isSnap == false:
				plugin.position = lerp(plugin.position, initPosition, 0.05)
	#			plugin.rotation = lerp(rotation, initRotation, 0.05)
		
		if isSnap and selected == false:
			plugin.position = socket.global_position + posSocket.position
			Global.isLight = true
			chanPlugin.visible = false
		else:
			Global.isLight = false
			chanPlugin.visible = true
	else:
		line.set_point_position(0, _posStart.position)
		line.set_point_position(1, plugin.position + posPlugin.position)
		plugin.position = socket.global_position + posSocket.position
		Global.isLight = true
		chanPlugin.visible = false

func _on_Area2D_input_event(_viewport, event, _shape_idx):
	if event is InputEventMouseButton and event.button_index == BUTTON_LEFT:
		if event.pressed:
			selected = true
		else:
			selected = false

func _on_Area2DSocket_area_entered(area):
	if area.name == 'Area2DPlugin':
		isSnap = true
		Global.isLight = true

func _on_Area2DSocket_area_exited(area):
	if area.name == 'Area2DPlugin':
		isSnap = false
		Global.isLight = false
