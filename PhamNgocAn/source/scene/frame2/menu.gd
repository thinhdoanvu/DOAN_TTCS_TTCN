extends Node

# _dialog ánh xạ tới scene Dialog (Hiển thị chỉ dẫn hoặc thông tin)
onready var _dialog = $CanvasLayer/Dialog
# _animationLogin ánh xạ tới AnimationLogin (chạy animation login)
onready var _animationLogin = $AnimationLogin
# _listBtn ánh xạ tới VBContainer (đối tượng chứa các nút chuyển cảnh)
onready var _listBtn = $Interface/VBoxContainer
# _ui ánh xạ tới scene UserInterface (giao diện người dùng: nút trang chủ, âm thanh,...)
onready var _ui = $CanvasLayer/UserInterface

# ID của Frame 2 ("Menu")
const ID_FRAME = Global.ID_FRAME_2
# Mảng tên của các màn hình
const FRAMES = ["VatLieuHoaChat", "CauTaoKHV", "HoatDongKHV", "ThucHanh", "KiemTra"]

# profile ánh xạ tới biến toàn cục profile (chứa data người dùng)
var profile = Global.profile
# final ánh xạ tới biến toàn cục final (chứa thông tin các bài học đã hoàn thanh)
var final = Global.final
# data ánh xạ tới tệp lệnh có data của dialog thuộc frame 2
var data = load("res://data/data_frame2.gd").new()

func _ready():
	loadUI()
	loadButton()
	loadDialog()
	_animationLogin.play("MENU_START")

func loadUI():
	_ui.currentScene = self
	_ui.visibleBtnPrevScene(false)
	_ui.visibleBtnNextScene(false)

func loadButton():
	for i in profile:
		if i != ID_FRAME:
			checkFinal(i)
	loadOpenButton()
	loadActiveButton()

func loadDialog():
	_dialog.closeDialog()
	_dialog.data = data.DATA_DIALOG

func checkFinal(name: String):
	if data.final[name]:
		return

	for i in profile[name]:
		if profile[name][i] == false:
			return
	data.final[name] = true

func loadOpenButton():
	profile[ID_FRAME][FRAMES[0]] = true
	for i in FRAMES.size() - 1:
		if data.final[FRAMES[i]]:
			profile[ID_FRAME][FRAMES[i+1]] = true

func loadActiveButton():
	for i in _listBtn.get_children():
		i.disabled = not profile[ID_FRAME][i.name]
		i.setTickFinal(final[i.name])

func loadWelcome():
	if not data.profile[ID_FRAME]["GioiThieu"]:
		_dialog.showDialog()
		profile[ID_FRAME]["GioiThieu"] = true
		profile[ID_FRAME]["VatLieuHoaChat"] = true

func _on_AnimationPlayer_animation_finished(anim_name):
	if anim_name == "MENU_START":
		loadWelcome()

func _on_VatLieuHoaChat_button_up():
	Load.load_scene(self, Global.FRAME_3)

func _on_CauTaoKHV_button_up():
	Load.load_scene(self, Global.FRAME_4)

func _on_HoatDongKHV_button_up():
	Load.load_scene(self, Global.FRAME_5)

func _on_ThucHanh_button_up():
	Load.load_scene(self, Global.FRAME_6)

func _on_KiemTra_button_up():
	Load.load_scene(self, Global.FRAME_7)
