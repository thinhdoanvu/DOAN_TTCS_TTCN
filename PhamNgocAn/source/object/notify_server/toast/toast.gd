extends Control
enum TypeEnum {SUCCESS, INFO, WARNING, DANGER}
export(TypeEnum) var type = TypeEnum.SUCCESS

const MAX_VALUE_SILDER = 100
const STEP_SILDER = 0.1
const TYPE_DEFAULT = "SUCCESS"
const STR_NOTIFY = "This is a notification"

onready var _icon = $Toast/VBoxContainer/HBoxContainer/Icon
onready var _label = $Toast/VBoxContainer/HBoxContainer/Label
onready var _timer = $Toast/Timer
onready var _timeSlider = $Toast/VBoxContainer/HSlider
onready var _toastPanel = $Toast

var configs = [
	{
		"icon": "res://asset/sprite2D/UI/success_icon_toast.png",
		"bg_color": "eaf7ee",
		"border_color": "b6e8c2",
		"color_grabber_area": "3fbd61",
		"color_grabber_area_highlight": "3fbd61",
		"color_slider": "b6e8c2"
	},
	{
		"icon": "res://asset/sprite2D/UI/info_icon_toast.png",
		"bg_color": "e6effa",
		"border_color": "bed3eb",
		"color_grabber_area": "006de3",
		"color_grabber_area_highlight": "006de3",
		"color_slider": "bed3eb"
	},
	{
		"icon": "res://asset/sprite2D/UI/warning_icon_toast.png",
		"bg_color": "fef7ea",
		"border_color": "f0ddc1",
		"color_grabber_area": "ee9500",
		"color_grabber_area_highlight": "ee9500",
		"color_slider": "f0ddc1"
	},
	{
		"icon": "res://asset/sprite2D/UI/danger_icon_toast.png",
		"bg_color": "fcede9",
		"border_color": "ead4d0",
		"color_grabber_area": "ed4f2c",
		"color_grabber_area_highlight": "ed4f2c",
		"color_slider": "ead4d0"
	},
]

func _ready():
	_timeSlider.value = MAX_VALUE_SILDER
	_timeSlider.step = STEP_SILDER

func loadToast(config):
	_timeSlider.theme = load("res://reuse/theme/toast/toast_time_slider.tres").duplicate(true)
	var styleBoxFlat = _toastPanel.get("custom_styles/panel/StyleBoxFlat")
	var slider = _timeSlider.theme.get("HSlider/styles/slider")
	var grabberArea = _timeSlider.theme.get("HSlider/styles/grabber_area")
	var grabberAreaHighlight = _timeSlider.theme.get("HSlider/styles/grabber_area_highlight")

	if config["icon"]:
		_icon.texture = load(config["icon"])

	if slider != null:
		if config["bg_color"]:
			styleBoxFlat.bg_color = Color(config["bg_color"])

		if config["border_color"]:
			styleBoxFlat.border_color = Color(config["border_color"])

	if config["color_grabber_area"] and grabberArea != null:
		grabberArea.color = Color(config["color_grabber_area"])

	if config["color_grabber_area_highlight"] and grabberAreaHighlight != null:
		grabberAreaHighlight = Color(config["color_grabber_area_highlight"])

	if config["color_slider"] and slider != null:
		slider.color = Color(config["color_slider"])

func _process(_delta):
	_timeSlider.value = _timer.time_left * MAX_VALUE_SILDER / _timer.wait_time

func _on_CloseButton_button_up():
	self.queue_free()

func setContent(content: String = STR_NOTIFY) -> void:
	_label.text = content

func createToast(type_toast: String = TYPE_DEFAULT, content: String = STR_NOTIFY) -> void:
	setContent(content)
	loadToast(configs[TypeEnum[type_toast]])

func _on_Timer_timeout():
	self.queue_free()
