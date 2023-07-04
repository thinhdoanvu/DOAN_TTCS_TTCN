extends Control

# Hiển thị nền đen hay không?
export (bool) var isViewBackgroundBlack = true
# Hiển thị nút xóa trên dialog
export(bool) var is_show_btn_close = true

export(bool) var is_loop = false
export(bool) var is_show_btn_index = false
# Hiển thị TimeSlider
export var isShowTimeSlider = true

# Load các node trong scene
onready var _labelTitle = $"%LabelTitle"
onready var _labelSub = $"%LabelSub"
onready var _labelContent = $"%LabelContent"
onready var _audio = $AudioStreamPlayer
onready var _btnClose = $"%BtnClose"
onready var _btnNext = $"%BtnNext"
onready var _btnPrev = $"%BtnPrev"
onready var _btnReplay = $"%BtnReplay"
onready var _textureRectView = $"%TextureRectView"
onready var _backgroundBlack = $BackgroundBlack
onready var _backgroundDialogView := $"%BackgroundDialogView"
onready var _timeSlider := $"%TimeSlider"

# ghi nhớ vị trí hiện tại của biến
var index: int = 0 setget setIndex, getIndex
# Kích hoạt tín hiệu âm thanh
var isAudioOn: bool = false
# Mảng dữ liệu
var data: Array = []
# Cho phép kéo thả timeline
var isDragSlider = true
# Bật tắt timeline
var isEditable = true

var current: Object = null
var methodClose = ""

# get/set
func setIndex(new_value) -> void:
	if data.size():
		index = new_value

func getIndex() -> int:
	return index

# Xử lý
func _ready():
	# self.visible = false
	if _btnClose:
		_btnClose.visible = is_show_btn_close

func _process(_delta):
	loadDialog()
	loadAudio()
	loadTimeline()
	autoVisibleNextButton()
	autoVisiblePrevButton()

func setIndexByName(id: String):
	for i in range(data.size()):
		if data[i].has("id"):
			if data[i]["id"] == id:
				index = i

func getTitleDialog(id: String):
	for i in range(data.size()):
		if data[i].has("id"):
			if data[i]["id"] == id:
				return data[i]["title"]
	return ""

func isEnd() -> bool:
	return (index == data.size() - 1)

func isStart() -> bool:
	return (index == 0)

# Đến phần tử tiếp theo
func next():
	isAudioOn = true
	index += 1
	if index >= data.size():
		index = data.size() - 1

# Lùi lại một phần tử
func prev():
	isAudioOn = true
	index -= 1
	if index < 0:
		index = 0

func loop():
	isAudioOn = true
	index += 1
	if index >= data.size():
		index = 0

func loop_prev():
	isAudioOn = true
	index -= 1
	if index < 0:
		index = data.size() - 1

# Hiển thị hộp thoại
func showDialog():
	self.visible = true
	self.isAudioOn = true

# Load dữ liệu từ mảng data để hiển thị
func loadDialog() -> void:
	if data.size() > index:
		if data[index]['image']:
			_textureRectView.texture = load(data[index]['image'])
			_textureRectView.visible = true
		else:
			_textureRectView.visible = false

		if data[index]['title']:
			_labelTitle.text = data[index]['title']
			_labelTitle.visible = true
		else:
			_labelTitle.visible = false

		if data[index]['sub']:
			_labelSub.text = data[index]['sub']
			_labelSub.visible = true
		else:
			_labelSub.visible = false

		if data[index]['content']:
			_labelContent.text = data[index]['content']
			_labelContent.visible = true
		else:
			_labelContent.visible = false

# Load âm thanh
func loadAudio() -> void:
	if Global.isAudioOn and isAudioOn:
		if data.size() > index:
			if data[index]['voice']:
				_audio.stream = load(data[index]['voice'])
				_audio.play()
			else:
				_audio.stream = null
		isAudioOn = false

func loadTimeline() -> void:
	if not _timeSlider:
		return
	_timeSlider.editable = isEditable
	if _audio.stream != null && isShowTimeSlider && Global.isAudioOn:
		_timeSlider.visible = true
		if isDragSlider:
			_timeSlider.value = _audio.get_playback_position() * 100 / _audio.stream.get_length()
	else:
		_timeSlider.visible = false

func loadTimeSlider(value: bool):
	isShowTimeSlider = value

func loadEditable(value: bool):
	isEditable = value

func loadBtnClose(value: bool):
	_btnClose.visible = value

func loadBtnPrev(value: bool):
	_btnPrev.visible = value

func loadBtnNext(value: bool):
	_btnNext.visible = value

func loadBtnReplay(value: bool):
	_btnReplay.visible = value

func loadBackgroundBlack(value: bool):
	_backgroundBlack.visible = value
	isViewBackgroundBlack = value

# Bắt sự kiện khi nhấn nút tắt
func closeDialog():
	self.visible = false
	_audio.stop()
	if current != null and current.has_method(methodClose):
		current.call(methodClose)


func autoVisiblePrevButton():
	if is_show_btn_index:
		if not is_loop and isStart():
			_btnPrev.visible = false
		else:
			_btnPrev.visible = true

func autoVisibleNextButton():
	if is_show_btn_index:
		if not is_loop and isEnd():
			_btnNext.visible = false
		else:
			_btnNext.visible = true
