extends Node

onready var _tutorialBtn = $TopRight/HBoxContainer/Tutorial
onready var _btnDialog = $TopRight/HBoxContainer/BtnDialog
onready var _btnPrevScene = $BottomLeft/BtnPrevScene
onready var _btnNextScene = $BottomRight/BtnNextScene

var _tutorial = null
var _dialog = null
var prevScene: String
var nextScene: String
var currentScene

func _ready():
#	if has_node("%Tutorial"):
#		_tutorial = $"%Tutorial"
#		_tutorialBtn.visible = true
#	else:
#		_tutorialBtn.visible = false

#	if has_node("%Dialog"):
#		_dialog = $"%Dialog"
#		_btnDialog.visible = true
#	else:
#		_btnDialog.visible = false
	pass

func _on_Home_button_up():
	Load.load_scene(currentScene, Global.FRAME_2)

func _on_Tutorial_button_up():
	if _tutorial:
		_tutorial.showTutorial()

func setPrevScene(label_name: String, scene: String):
	_btnPrevScene.setLabelName(label_name)
	self.prevScene = scene

func setNextScene(label_name: String, scene: String):
	_btnNextScene.setLabelName(label_name)
	self.nextScene = scene

func visibleBtnPrevScene(value: bool):
	_btnPrevScene.visible = value

func visibleBtnNextScene(value: bool):
	_btnNextScene.visible = value

func _on_BtnPrevScene_button_up():
	if prevScene:
		Load.load_scene(currentScene, prevScene)

func _on_BtnNextScene_button_up():
	if nextScene:
		Load.load_scene(currentScene, nextScene)

func _on_BtnDialog_button_up():
	if _dialog:
		_dialog.showDialog()
