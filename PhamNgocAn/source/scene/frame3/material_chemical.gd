extends Node

onready var _dialog = $CanvasLayer/Dialog
onready var _containerButtonTick = $ContainerButtonTick
onready var _ui = $CanvasLayer/UserInterface
onready var _alert = $CanvasLayer/Alert
onready var _notify = $"%NotifyServer"
onready var _animation = $Animation
onready var _handCursor = $CanvasLayer/HandCursor

enum StateEnum {
	KIEM_TRA_BAN_DAU,
	GIOI_THIEU,
	VAT_LIEU_VA_HOA_CHAT,
	KET_THUC,
	HOAN_THANH
}

var idFrame = Global.ID_FRAME_3

var data = load("res://data/data_frame3.gd").new()

var profile = Global.profile[idFrame]
var final = Global.final[idFrame]

var state = StateEnum.KIEM_TRA_BAN_DAU

func _ready():
	loadHandCursor()
	loadDialog()
	loadTicks()
	loadUI()

func _process(_delta):
	match state:
		StateEnum.KIEM_TRA_BAN_DAU:
			if final == false:
				if profile["GioiThieu"] == false:
					state = StateEnum.GIOI_THIEU
				else:
					state = StateEnum.VAT_LIEU_VA_HOA_CHAT
				pass
			else:
				state = StateEnum.HOAN_THANH
				pass
			pass
		StateEnum.GIOI_THIEU:
			callAnimationByName("GioiThieu")
			pass
		StateEnum.VAT_LIEU_VA_HOA_CHAT:
			for i in _containerButtonTick.get_children():
				if i.isHover:
					showAlert(i.name)
				if i.getIsTick():
					if profile[i.name]:
						callDialogByName(i.name)
					else:
						callAnimationByName(i.name)
			pass
		StateEnum.KET_THUC:
			callAnimationByName("KetThuc")
			pass
		StateEnum.HOAN_THANH:
			_ui.visibleBtnNextScene(true)
			_ui.visibleBtnPrevScene(true)
			_alert.setText("Bạn đã tìm hiểu xong các hóa chất và vật liệu cần thiết trong phòng thí nghiệm")
			_alert.setSticker(true)
			_alert.showAlert()

			for i in _containerButtonTick.get_children():
				if i.getIsTick():
					showDialog(i.name)
			pass
	pass

func loadHandCursor():
	_handCursor.visible = false

func loadDialog():
	_dialog.current = self
	_dialog.methodClose = "actionCloseDialog"
	_dialog.visible = false
	_dialog.data = data.DATA_DIALOG
	_dialog.loadEditable(false)
	pass

func loadTicks():
	for i in _containerButtonTick.get_children():
		i.setIsTrueView(profile[i.name])
		i.loadTickTexture()
		i.current = self

func loadUI():
	_ui.currentScene = self
	_ui.setPrevScene(Global.NAME_FRAME_2, Global.FRAME_2)
	_ui.setNextScene(Global.NAME_FRAME_4, Global.FRAME_4)
	if not final:
		_ui.visibleBtnNextScene(false)
		_ui.visibleBtnPrevScene(false)

func actionCloseDialog() -> void:
	_handCursor.visible = false
	_animation.stop()

func actionFinalAnimation():
	match state:
		StateEnum.VAT_LIEU_VA_HOA_CHAT:
			_animation.stop()
			for i in profile:
				if profile[i] == false:
					return
			final = true
			if final and state == StateEnum.VAT_LIEU_VA_HOA_CHAT:
				state = StateEnum.KET_THUC
			pass
		StateEnum.HOAN_THANH, StateEnum.KET_THUC:
			_notify.fire("SUCCESS", "Chúc mừng bạn đã hoàn thành bài học này")

func checkFinal():
	for i in profile:
		if profile[i] == false:
			return
	final = true

func showAlert(idDialog: String):
	_alert.setText(_dialog.getTitleDialog(idDialog))
	_alert.showAlert()

func showDialog(id: String):
	_dialog.setIndexByName(id)
	_dialog.showDialog()
	if profile.has(id):
		if id == "GioiThieu":
			_dialog.loadBtnClose(profile[id])
			_dialog.loadBtnReplay(false)
		else:
			_dialog.loadBtnReplay(profile[id])
			_dialog.loadEditable(profile[id])

func handleTickView(name: String):
	for i in _containerButtonTick.get_children():
		if i.name == name:
			i.setIsTrueView(true)
			return

# =======================
# func animation
func gioiThieu():
	self.showDialog("GioiThieu")

func gioiThieu1():
	self.showDialog("GioiThieu1")

func giayLauOngKinh():
	self.showDialog("GiayLauOngKinh")

func dauSoiKinh():
	self.showDialog("DauSoiKinh")

func lamelle():
	self.showDialog("Lamelle")

func lamKinh():
	self.showDialog("LamKinh")

func hopDungTieuBan():
	self.showDialog("HopDungTieuBan")

func ketThuc():
	self.showDialog("KetThuc")

func callDialogByName(name: String):
	match name:
		"GiayLauOngKinh":
			giayLauOngKinh()
			pass
		"DauSoiKinh":
			dauSoiKinh()
			pass
		"Lamelle":
			lamelle()
			pass
		"LamKinh":
			lamKinh()
			pass
		"HopDungTieuBan":
			hopDungTieuBan()
			pass
	pass

func callStopAnimationByName(name: String):
	match name:
		"GioiThieu":
			_animation.stop("GIOI_THIEU")
			pass
		"GiayLauOngKinh":
			_animation.stop("GIAY_LAU_ONG_KINH")
			pass
		"DauSoiKinh":
			_animation.stop("DAU_SOI_KINH")
			pass
		"Lamelle":
			_animation.stop("LAMELLE")
			pass
		"LamKinh":
			_animation.stop("LAM_KINH")
			pass
		"HopDungTieuBan":
			_animation.stop("HOP_DUNG_TIEU_BAN")
			pass

func callAnimationByName(name: String):
	match name:
		"GioiThieu":
			_animation.play("GIOI_THIEU")
			pass
		"GiayLauOngKinh":
			_animation.play("GIAY_LAU_ONG_KINH")
			pass
		"DauSoiKinh":
			_animation.play("DAU_SOI_KINH")
			pass
		"Lamelle":
			_animation.play("LAMELLE")
			pass
		"LamKinh":
			_animation.play("LAM_KINH")
			pass
		"HopDungTieuBan":
			_animation.play("HOP_DUNG_TIEU_BAN")
			pass
		"KetThuc":
			_animation.play("KET_THUC")
			pass

func _on_Animation_animation_finished(anim_name):
	var name: String = convertNameAnimationToString(anim_name)
	match anim_name:
		"GIOI_THIEU":
			profile["GioiThieu"] = true
			state = StateEnum.VAT_LIEU_VA_HOA_CHAT
			pass
		"KET_THUC":
			_notify.fire("SUCCESS", "Chúc mừng bạn đã hoàn thành bài học này")
			state = StateEnum.HOAN_THANH
			pass
		_:
			profile[name] = true
			handleTickView(name)
			actionFinalAnimation()
			pass
	_dialog.loadBtnReplay(true)
	_dialog.loadBtnClose(true)
	_dialog.loadEditable(true)

func convertNameAnimationToString(name: String) -> String:
	return Untils.snakeCaseToCamelCase(name)
