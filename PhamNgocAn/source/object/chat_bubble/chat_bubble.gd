extends Control

onready var _avatar = $Avatar
onready var _label = $Avatar/Label
onready var _audio = $AudioStreamPlayer

const POSITION_LABLE_LEFT = Vector2(-380, 0)
const POSITION_LABEL_RIGHT = Vector2(150, 0)
const PIVOT_LABLE_LEFT = Vector2(380, 62)
const PIVOT_LABLE_RIGHT = Vector2(-15, 62)
const INIT_POSITION_START = Vector2(554, 554)
const INIT_POSITION_END = Vector2(1070, 107)

var isMouseHover = false
var isPress = false
var isSelected = false
var isShowLable = false
var isAudioOn = true
var isVisibleAvatar = false

var mousePosition = Vector2(0, 0)

var data: Array = []

func _ready():
	visible = false
	mousePosition = _avatar.rect_position
	_label.rect_scale = Vector2(0, 0)

func _process(_delta):
	handleDragAndDrop()
	limitScene()
	handlePositionLable()
	handleScaleLabel()

func calPointAvatar():
	return _avatar.rect_size/2 * _avatar.rect_scale

func calSizeAvatar():
	return _avatar.rect_size * _avatar.rect_scale

func handleDragAndDrop():
	if isMouseHover and isPress:
		isSelected = true
		mousePosition = get_global_mouse_position() - calPointAvatar()
	else:
		isSelected = false

	_avatar.rect_position = lerp(_avatar.rect_position, mousePosition, 0.05)

func moveAvatar(pos: Vector2):
	mousePosition = pos

func handleVisibleAvatar():
	visible = isVisibleAvatar

func limitScene():
	var sizeScene = Vector2(1200, 700)
	if _avatar.rect_position.x < 0:
		_avatar.rect_position.x = 0
	
	if _avatar.rect_position.x > sizeScene.x - calSizeAvatar().x:
		_avatar.rect_position.x = sizeScene.x - calSizeAvatar().x
	
	if _avatar.rect_position.y < 0:
		_avatar.rect_position.y = 0
	
	if _avatar.rect_position.y > sizeScene.y - calSizeAvatar().y:
		_avatar.rect_position.y = sizeScene.y - calSizeAvatar().y

func handlePositionLable():
	if _avatar.rect_position.x < 600:
		_avatar.flip_h = false
		_label.rect_position = POSITION_LABEL_RIGHT
		_label.rect_pivot_offset = PIVOT_LABLE_RIGHT
	else:
		_avatar.flip_h = true
		_label.rect_position = POSITION_LABLE_LEFT
		_label.rect_pivot_offset = PIVOT_LABLE_LEFT
	pass

func hanleShowLable():
	_label.visible = isShowLable

func handleScaleLabel():
	if isShowLable:
		_label.rect_scale = lerp(_label.rect_scale, Vector2.ONE, 0.1)
	else:
		_label.rect_scale = lerp(_label.rect_scale, Vector2.ZERO, 0.1)

func _input(event):
	if event is InputEventMouseButton and event.button_index == BUTTON_LEFT:
		if event.pressed:
			isPress = true
		else:
			isPress = false

func showChat():
	visible = true
	if Global.isAudioOn and isAudioOn and _audio.stream:
		_audio.play()
		isAudioOn = false

func showChatById(id: String):
	visible = true
	var index = getIndexById(id) as int
	loadDataChat(index)
	isShowLable = true

func hiddenChat():
	visible = false

func getIndexById(id: String) -> int:
	for i in range(data.size()):
		if data[i].has("id"):
			if data[i]["id"] == id:
				return i
	return -1

# Load dữ liệu từ mảng data để hiển thị
func loadDataChat(index) -> void:
	if data.size() > index and index != -1:
		if data[index]['content']:
			_label.text = data[index]['content']
			_label.visible = true
		else:
			_label.visible = false
#		Load Audio
		loadDataAudioChat(index)

# Load âm thanh
func loadDataAudioChat(index) -> void:
	if Global.isAudioOn and isAudioOn:
		if data.size() > index:
			if data[index]['voice']:
				_audio.stream = load(data[index]['voice'])
				_audio.play()
		isAudioOn = false

func _on_TextureButton_mouse_entered():
	isMouseHover = true

func _on_TextureButton_mouse_exited():
	isMouseHover = false

func _on_Avatar_toggled(_button_pressed):
	isShowLable = !isShowLable
	if not isShowLable:
		_audio.stop()
#		showChat()

func _on_AudioStreamPlayer_finished():
	isAudioOn = true
