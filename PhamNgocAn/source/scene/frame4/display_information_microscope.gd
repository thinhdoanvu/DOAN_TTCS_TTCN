extends Node

onready var _dialog = $CanvasLayer/Dialog
onready var _ticks = $ContaiterButtonTick
onready var _khvMarks = $Item/KinhHienViMarks
onready var _alert = $CanvasLayer/Alert
onready var _ui = $CanvasLayer/UserInterface
onready var _animation = $AnimationPlayer
onready var _notify = $"%NotifyServer"
onready var _handCursor = $CanvasLayer/HandCursor

enum StateEnum {
	KIEM_TRA_BAN_DAU,
	GIOI_THIEU,
	TIM_HIEU_CAU_TAO_KHV,
	KET_THUC,
	HOAN_THANH
}

var state = StateEnum.KIEM_TRA_BAN_DAU

var idFrame = Global.ID_FRAME_4

var data = load("res://data/data_frame4.gd").new()

var profile = Global.profile[idFrame]
var final = Global.final[idFrame]

var indexTickNow: int = 0
var markNameActive: String = ""

func _ready():
	loadDialog()
	loadTicks()
	loadUI()
	loadHandCursor()

func _process(_delta):
	match state:
		StateEnum.KIEM_TRA_BAN_DAU:
			if final == false:
				if profile["GioiThieu"] == false:
					state = StateEnum.GIOI_THIEU
				else:
					state = StateEnum.TIM_HIEU_CAU_TAO_KHV
			else:
				state = StateEnum.HOAN_THANH

		StateEnum.GIOI_THIEU:
			callPlayAnimationByName("GioiThieu")

		StateEnum.TIM_HIEU_CAU_TAO_KHV:
			for i in _ticks.get_children():
				if i.isHover:
					showAlert(i.name)
				if i.getIsTick():
					loadMarkActive(i.name)
					if profile[i.name]:
						callDialogByName(i.name)
					else:
						_animation.stop()
						callPlayAnimationByName(i.name)

		StateEnum.KET_THUC:
			callPlayAnimationByName("KetThuc")
		StateEnum.HOAN_THANH:
			_ui.visibleBtnNextScene(true)
			_ui.visibleBtnPrevScene(true)

			for i in _ticks.get_children():
				if i.isHover:
					showAlert(i.name)
				if i.getIsTick():
					showDialog(i.name)
					loadMarkActive(i.name)

func loadUI():
	_ui.currentScene = self
	_ui.setPrevScene(Global.NAME_FRAME_3, Global.FRAME_3)
	_ui.setNextScene(Global.NAME_FRAME_5, Global.FRAME_5)
	if not final:
		_ui.visibleBtnNextScene(false)
		_ui.visibleBtnPrevScene(false)

func loadTicks():
	for i in _ticks.get_children():
		i.setIsTrueView(profile[i.name])
		i.loadTickTexture()

func loadDialog():
	_dialog.current = self
	_dialog.methodClose = "actionCloseDialog"
	_dialog.visible = false
	_dialog.data = data.DATA_DIALOG
	_dialog.loadEditable(false)

	if profile["GioiThieu"] == true:
		_dialog.loadBackgroundBlack(false)
	else:
		_dialog.loadBackgroundBlack(true)

func loadHandCursor():
	_handCursor.visible = false
	pass

func actionCloseDialog():
	_handCursor.visible = false
	_animation.stop()
	pass

func actionFinalAnimation():
	match state:
		StateEnum.TIM_HIEU_CAU_TAO_KHV:
			_animation.stop()
			checkFinal()
			if final:
				state = StateEnum.KET_THUC

		StateEnum.HOAN_THANH, StateEnum.KET_THUC:
			_notify.fire("SUCCESS", "Chúc mừng bạn đã hoàn thành bài học này")
	pass

func checkFinal():
	for i in profile:
		if profile[i] == false:
			return
	final = true

func showDialog(name: String) -> void:
	_dialog.setIndexByName(name)
	_dialog.showDialog()
	if profile.has(name):
		if name == "GioiThieu":
			_dialog.loadBtnClose(false)
			_dialog.loadBtnReplay(false)
		else:
			_dialog.loadBtnReplay(profile[name])
			_dialog.loadEditable(profile[name])

func showAlert(id: String):
	_alert.setText(_dialog.getTitleDialog(id))
	_alert.showAlert()

func loadMarkActive(name: String):
	for i in _khvMarks.get_children():
		if i.name == name:
			i.visible = true
		else:
			i.visible = false

func handleTickView(name: String):
	for i in _ticks.get_children():
		if i.name == name:
			i.setIsTrueView(true)
			return

#	Các hàm đổ thông tin vào dialog tương ứng
func gioiThieu():
	_dialog.loadBackgroundBlack(true)
	self.showDialog("GioiThieu")

func banMangVatMau():
	self.showDialog("BanMangVatMau")

func chanKinh():
	self.showDialog("ChanKinh")

func nguonSang():
	self.showDialog("NguonSang")

func mamVatKinh():
	self.showDialog("MamVatKinh")

func ocSoCap():
	self.showDialog("OcSoCap")

func ocViCap():
	self.showDialog("OcViCap")

func ocChinhDoSang():
	self.showDialog("OcChinhDoSang")

func ocDiChuyenTieuXa():
	self.showDialog("OcDiChuyenTieuXa")

func thanKinh():
	self.showDialog("ThanKinh")

func thiKinh():
	self.showDialog("ThiKinh")

func tieuXa():
	self.showDialog("TieuXa")

func tuQuang():
	self.showDialog("TuQuang")

func vatKinh():
	self.showDialog("VatKinh")

func ketThuc():
	_dialog.loadBackgroundBlack(true)
	self.showDialog("KetThuc")

#	Gọi dialog ứng với các nút tick
func callDialogByName(name: String):
	match name:
		"BanMangVatMau":
			banMangVatMau()
		"ChanKinh":
			chanKinh()
		"NguonSang":
			nguonSang()
		"MamVatKinh":
			mamVatKinh()
		"OcSoCap":
			ocSoCap()
		"OcViCap":
			ocViCap()
		"OcChinhDoSang":
			ocChinhDoSang()
		"OcDiChuyenTieuXa":
			ocDiChuyenTieuXa()
		"ThanKinh":
			thanKinh()
		"ThiKinh":
			thiKinh()
		"TieuXa":
			tieuXa()
		"TuQuang":
			tuQuang()
		"VatKinh":
			vatKinh()
	pass

#	Gọi các animation bằng tên
func callPlayAnimationByName(anim_name: String):
	match anim_name:
		"GioiThieu":
			_animation.play("GIOI_THIEU")
		"BanMangVatMau":
			_animation.play("BAN_MANG_VAT_MAU")
		"ChanKinh":
			_animation.play("CHAN_KINH")
		"NguonSang":
			_animation.play("NGUON_SANG")
		"MamVatKinh":
			_animation.play("MAM_VAT_KINH")
		"OcSoCap":
			_animation.play("OC_SO_CAP")
		"OcViCap":
			_animation.play("OC_VI_CAP")
		"OcChinhDoSang":
			_animation.play("OC_CHINH_DO_SANG")
		"OcDiChuyenTieuXa":
			_animation.play("OC_DI_CHUYEN_TIEU_XA")
		"ThanKinh":
			_animation.play("THAN_KINH")
		"ThiKinh":
			_animation.play("THI_KINH")
		"TieuXa":
			_animation.play("TIEU_XA")
		"TuQuang":
			_animation.play("TU_QUANG")
		"VatKinh":
			_animation.play("VAT_KINH")
		"KetThuc":
			_animation.play("KET_THUC")
	pass

func _on_AnimationPlayer_animation_finished(anim_name):
	var name: String = convertNameAnimationToString(anim_name)
	match anim_name:
		"GIOI_THIEU":
			profile["GioiThieu"] = true
			_dialog.loadBackgroundBlack(false)
			_notify.fire("INFO", "Click vào các dấu chấm hỏi để xem chi tiết các cấu tạo của kính hiển vi")
			state = StateEnum.TIM_HIEU_CAU_TAO_KHV
		"KET_THUC":
			_dialog.loadBackgroundBlack(false)
			_notify.fire("SUCCESS", "Chúc mừng bạn đã hoàn thành bài học này")
			state = StateEnum.HOAN_THANH
			pass
		_:
#			Ghi lại các thành phần đã hoàn thành
			profile[name] = true
			#Xử lý tick chọn khi người dùng nghe hết audio
			handleTickView(name)
			actionFinalAnimation()
			pass
#	Hiển thị nút close trên dialog
	_dialog.loadBtnClose(true)
#	Hiển thị nút đọc lại trên dialog
	_dialog.loadBtnReplay(true)
#	Cho phép kéo thả thanh timeline của audio
	_dialog.loadEditable(true)
	pass

#	Chuyển đổi tên các Animation thành tên của các nút cần hoàn thành
func convertNameAnimationToString(name: String) -> String:
	return Untils.snakeCaseToCamelCase(name)
