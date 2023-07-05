extends Node

# ========================================
# KINH HIEN VI
onready var _khv = $Viewport/KinhHienVi
onready var _pluginKHV = $Items/PluginKHV

# HOP DUNG TIEU BAN
onready var _hopDungTieuBan = $Viewport/TieuBan

onready var _viewport3D = $Viewport
onready var _textureRectKHV = $Items2/TextureRectKHV
onready var _textureRectHopTieuBan = $Items2/TextureRectHopTieuBan
onready var _viewMauVat = $CanvasLayer/ViewControl/ViewMauVat
onready var _blur = $CanvasLayer/ViewControl/Blur
onready var _blurOil = $CanvasLayer/ViewControl/BlurOil
onready var _black = $CanvasLayer/ViewControl/Black
onready var _viewListMauVat = $CanvasLayer/ViewListMauVat
onready var _viewControl = $CanvasLayer/ViewControl
onready var _textureRectKnob = $CanvasLayer/ViewControl/HBoxContainer/Control/TextureRectKnob

# ANIMATION
onready var _animation = $AnimationPlayer
onready var _animationNhoDau = $AnimationPlayerNhoDau

# DIALOG
onready var _dialog = $CanvasLayer/DiaLogBottom

# CHAT BUBBLE
onready var _chatBubble = $CanvasLayer/ChatServer

onready var _handCursor = $CanvasLayer/HandCursor

onready var _notify = $CanvasLayer/NotifyServer

onready var _itemList = $CanvasLayer/ViewListMauVat/Panel/ItemList

onready var _ui = $CanvasLayer/UserInterface

onready var _alert = $CanvasLayer/Alert

onready var _btnExamination = $CanvasLayer/ButtonExamination

onready var _btnContinue = $CanvasLayer/ButtonContinue

onready var _congThuc = $CanvasLayer/CongThuc

# SCOPE
onready var _btnX4 = $CanvasLayer/ViewControl/TextureButtonX4
onready var _btnX10 = $CanvasLayer/ViewControl/TextureButtonX10
onready var _btnX40 = $CanvasLayer/ViewControl/TextureButtonX40
onready var _btnX100 = $CanvasLayer/ViewControl/TextureButtonX100

# SLIDER
onready var _hSliderSoCap = $CanvasLayer/ViewControl/HBoxContainer/VBoxContainer/HSliderSoCap
onready var _hSliderVicap = $CanvasLayer/ViewControl/HBoxContainer/VBoxContainer/HSliderViCap
onready var _hSliderAnhSang = $CanvasLayer/ViewControl/HBoxContainer/VBoxContainer/HSliderAnhSang
onready var _hSliderX = $CanvasLayer/ViewControl/HSliderX
onready var _vSliderY = $CanvasLayer/ViewControl/VSliderY

enum StateEnum {
	KIEM_TRA_BAN_DAU,
	GIOI_THIEU,
	CHUAN_BI_KINH,
#	THUC HANH CAM DIEN
	YEU_CAU_CAM_DIEN,
	THUC_HANH_CAM_DIEN,
#	THUC HANH BAT CONG TAC DIEN
	YEU_CAU_BAT_CONG_TAC_DIEN,
	THUC_HANH_BAT_CONG_TAC_DIEN,
	DUONG_DI_CUA_ANH_SANG,
#	THUC HANH DIEU CHINH ANH SANG
	GIOI_THIEU_BUOC_2,
	YEU_CAU_DAT_TIEU_BAN_VAO_KINH,
	THUC_HANH_MO_HOP_TIEU_BAN,
	THUC_HANH_LUA_CHON_TIEU_BAN,
	YEU_CAU_NHIN_VAO_THI_KINH,
	THUC_HANH_MO_KHV,
	VI_DU_DIEU_CHINH_ANH_SANG,
	ANH_SANG_DI_QUA_KHONG_DU,
	YEU_CAU_DIEU_CHINH_ANH_SANG_MANH,
	KHONG_NEN_DIEU_CHINH_ANH_SANG_MANH,
	YEU_CAU_DIEU_CHINH_ANH_SANG,
	THUC_HANH_DIEU_CHINH_ANH_SANG,
#	THUC HANH QUAN SAT VAT MAU
	GIOI_THIEU_BUOC_3,
	DO_PHONG_DAI,
	CACH_TINH_DO_PHONG_DAI,
	DO_PHONG_DAI_CUA_4X,
	LUYEN_TAP_LAY_NET_HIEN_VI,
	LUYEN_TAP_LAY_NET_HIEN_VI_2,
	YEU_CAU_THUC_HANH_DIEU_CHINH_HIEN_VI,
	GIOI_THIEU_THUC_HANH_VOI_VAT_KINH_100X,
	THUC_HANH_NHO_DAU,
	THUC_HANH_DIEU_CHINH_VAT_KINH_100X,
	KET_THUC,
	HOAN_THANH
}

const FRAME_ID = Global.ID_FRAME_5
# LOAD VIEW VAT MAU
const SIZE_VIEW = 290
# TRANSFORM LAM KINH 3D
const TRANSFORM_LAM_KINH = Transform(Vector3(0.0275271, 0, 0), Vector3(0, 1, 0), Vector3(0, 0, 0.0947011), Vector3(-0.174804, 0.0118451, -0.0375324))

const POWER_LIGHT_DEFAULT = 0

const MAU_VAT: Dictionary = {
	# Khoang miệng
	"name": "Khoang miệng",
	"icon": "res://asset/sprite2D/sample/khoang_mieng/Icon.png",
	"X4": {
		"socap": 0.3,
		"vicap": 0.2,
		"path": "res://asset/sprite2D/sample/khoang_mieng/4x.png"
	},
	"X10": {
		"socap": 0.5,
		"vicap": 0.4,
		"path": "res://asset/sprite2D/sample/khoang_mieng/10x.png"
	},
	"X40": {
		"socap": 0.8,
		"vicap": 0.7,
		"path": "res://asset/sprite2D/sample/khoang_mieng/40x.png"
	},
	"X100": {
		"socap": 0.8,
		"vicap": 0.6,
		"path": "res://asset/sprite2D/sample/khoang_mieng/100x.png"
	}
}

var data = load("res://data/data_frame5.gd").new()
var state = StateEnum.KIEM_TRA_BAN_DAU
var profile = Global.profile[FRAME_ID]
var final = Global.final[FRAME_ID]
var stopAnimation = false

# kich thuoc vat mau
var size_x_view = 0
var size_y_view = 0

# gia tri sc, vc hien tai
var valueSoCap = 0
var valueViCap = 0

# ty le lam mo
var percentSoCap = 0
var percentViCap = 0

# thay doi tieu ban
var indexVatMau = 0

# mo _khv
var isLoadUIKHV: bool = false

# animation
var isAnimation: bool = false
var is100X: bool = false

var scCurrent = 0
var vcCurrent = 0

func _ready():
	# Ẩn con trỏ hình bàn tay
	loadHandCursor()
	# Nạp file dữ liệu chứa âm thanh và văn bản cho dialog
	loadDialog()
	# Nạp file dữ liệu chứa âm thanh và văn bản cho bong bóng chat
	loadChatBubble()
	# Nạp danh sách vật mẫu vào menu lựa chọn vật mẫu
	loadItemList()
	# Tải giao diện người dùng
	loadUI()
	# Đặt vật kính ban đầu của kính hiển vi là 4X có chỉ số là 0
	loadKHV(0)
	# Cấu hình các đối tượng khác như ẩn nút kiểm tra, cấu hình KHV
	loadOther()

func _process(_delta):
	match state:
		StateEnum.KIEM_TRA_BAN_DAU:
			profile = Global.profile[FRAME_ID]
			state = StateEnum.GIOI_THIEU
			pass
		StateEnum.GIOI_THIEU:
			if profile["GioiThieu"]:
				state = StateEnum.CHUAN_BI_KINH
			else:
				if not stopAnimation:
					callAnimationByName("GioiThieu")
			pass
		StateEnum.CHUAN_BI_KINH:
			if profile["ChuanBiKinh"]:
				state = StateEnum.YEU_CAU_CAM_DIEN
			else:
				if not stopAnimation:
					callAnimationByName("ChuanBiKinh")
			pass
		StateEnum.YEU_CAU_CAM_DIEN:
			if profile["YeuCauCamDien"]:
				state = StateEnum.THUC_HANH_CAM_DIEN
			else:
				if not stopAnimation:
					callAnimationByName("YeuCauCamDien")
			pass
		StateEnum.THUC_HANH_CAM_DIEN:
			if profile["ThucHanhCamDien"]:
				_pluginKHV.snapFull = true
				state = StateEnum.YEU_CAU_BAT_CONG_TAC_DIEN
			else:
				if _pluginKHV.isSnap and _pluginKHV.selected == false:
					_pluginKHV.snapFull = true
				if not stopAnimation:
					callAnimationByName("ThucHanhCamDien")
				if _pluginKHV.snapFull == true:
					_handCursor.visible = false
					_animation.stop()
					_notify.fire("SUCCESS", "Kính hiển vi đã có điện")
					profile["ThucHanhCamDien"] = true
					state = StateEnum.YEU_CAU_BAT_CONG_TAC_DIEN
			pass
		StateEnum.YEU_CAU_BAT_CONG_TAC_DIEN:
			if profile["YeuCauBatCongTacDien"]:
				_pluginKHV.snapFull = true
				state = StateEnum.THUC_HANH_BAT_CONG_TAC_DIEN
			else:
				if not stopAnimation:
					callAnimationByName("YeuCauBatCongTacDien")
			pass
		StateEnum.THUC_HANH_BAT_CONG_TAC_DIEN:
			if profile["ThucHanhBatCongTacDien"]:
				_khv.valuePower = 0.3
				_khv.isCongTac = true
				Global.isLight = true
				state = StateEnum.DUONG_DI_CUA_ANH_SANG
			else:
				if not stopAnimation:
					callAnimationByName("ThucHanhBatCongTacDien")
				if _khv.isCongTac:
					_animation.stop()
					_khv.valuePower = 0.3
					_handCursor.visible = false
					_notify.fire("SUCCESS", "Đã bật công tắc đèn")
					_chatBubble.hiddenChat()
					profile["ThucHanhBatCongTacDien"] = true
					state = StateEnum.DUONG_DI_CUA_ANH_SANG
			pass
		StateEnum.DUONG_DI_CUA_ANH_SANG:
			if profile["DuongDiCuaAnhSang"]:
				state = StateEnum.GIOI_THIEU_BUOC_2
			else:
				if not stopAnimation:
					callAnimationByName("DuongDiCuaAnhSang")
			pass
		StateEnum.GIOI_THIEU_BUOC_2:
			if profile["GioiThieuBuoc2"]:
				state = StateEnum.YEU_CAU_DAT_TIEU_BAN_VAO_KINH
			else:
				if not stopAnimation:
					callAnimationByName("GioiThieuBuoc2")
			pass
		StateEnum.YEU_CAU_DAT_TIEU_BAN_VAO_KINH:
			if profile["YeuCauDatTieuBanVaoKinh"]:
				state = StateEnum.THUC_HANH_MO_HOP_TIEU_BAN
			else:
				if not stopAnimation:
					callAnimationByName("YeuCauDatTieuBanVaoKinh")
			pass
		StateEnum.THUC_HANH_MO_HOP_TIEU_BAN:
			if profile["ThucHanhMoHopTieuBan"]:
				if profile["ThucHanhLuaChonTieuBan"] == false:
					_hopDungTieuBan.isOpen = true
				state = StateEnum.THUC_HANH_LUA_CHON_TIEU_BAN
			else:
				if not stopAnimation:
					callAnimationByName("ThucHanhMoHopTieuBan")
				if _hopDungTieuBan.isOpen:
					_animation.stop()
					_handCursor.visible = false
					profile["ThucHanhMoHopTieuBan"] = true
					state = StateEnum.THUC_HANH_LUA_CHON_TIEU_BAN
			pass
		StateEnum.THUC_HANH_LUA_CHON_TIEU_BAN:
			if profile["ThucHanhLuaChonTieuBan"]:
				_khv._lamkinh.set_transform(TRANSFORM_LAM_KINH)
				_khv._lamkinh.visible = true
				_khv.isLamKinh = true
				state = StateEnum.YEU_CAU_NHIN_VAO_THI_KINH
			else:

				if not stopAnimation:
					callAnimationByName("ThucHanhLuaChonTieuBan")
				if _khv.isLamKinh:
					_animation.stop()
					_hopDungTieuBan.isOpen = false
					_chatBubble.hiddenChat()
					_handCursor.visible = false
					profile["ThucHanhLuaChonTieuBan"] = true
					state = StateEnum.YEU_CAU_NHIN_VAO_THI_KINH
			pass
		StateEnum.YEU_CAU_NHIN_VAO_THI_KINH:
			if profile["YeuCauNhinVaoThiKinh"]:
				state = StateEnum.THUC_HANH_MO_KHV
			else:
				if not stopAnimation:
					callAnimationByName("YeuCauNhinVaoThiKinh")
			pass
		StateEnum.THUC_HANH_MO_KHV:
			if profile["ThucHanhMoKHV"]:
				if profile["ThucHanhDieuChinhAnhSang"] == false:
					isLoadUIKHV = true
				state = StateEnum.VI_DU_DIEU_CHINH_ANH_SANG
			else:
				if not stopAnimation:
					callAnimationByName("ThucHanhMoKHV")
				if isLoadUIKHV:
					_animation.stop()
					_handCursor.visible = false
					_chatBubble.hiddenChat()
					profile["ThucHanhMoKHV"] = true
					state = StateEnum.VI_DU_DIEU_CHINH_ANH_SANG
			pass
		StateEnum.VI_DU_DIEU_CHINH_ANH_SANG:
			if profile["ViDuDieuChinhAnhSang"]:
				state = StateEnum.ANH_SANG_DI_QUA_KHONG_DU
			else:
				if not stopAnimation:
					callAnimationByName("ViDuDieuChinhAnhSang")
			pass
		StateEnum.ANH_SANG_DI_QUA_KHONG_DU:
			if profile["AnhSangDiQuaKhongDu"]:
				state = StateEnum.YEU_CAU_DIEU_CHINH_ANH_SANG_MANH
			else:
				if not stopAnimation:
					callAnimationByName("AnhSangDiQuaKhongDu")
			pass
		StateEnum.YEU_CAU_DIEU_CHINH_ANH_SANG_MANH:
			if profile["YeuCauDieuChinhAnhSangManh"]:
				_hSliderAnhSang.value = 0.5
				_khv.valuePower = _hSliderAnhSang.value
				_viewMauVat.material.set_shader_param("light_adjust", _hSliderAnhSang.value)
				state = StateEnum.KHONG_NEN_DIEU_CHINH_ANH_SANG_MANH
			else:
				if not stopAnimation:
					callAnimationByName("YeuCauDieuChinhAnhSangManh")
				if _hSliderAnhSang.value == 0.5:
					_animation.stop()
					_hSliderAnhSang.editable = false
					_handCursor.visible = false
					_chatBubble.hiddenChat()
					profile["YeuCauDieuChinhAnhSangManh"] = true
					state = StateEnum.KHONG_NEN_DIEU_CHINH_ANH_SANG_MANH
			pass
		StateEnum.KHONG_NEN_DIEU_CHINH_ANH_SANG_MANH:
			if profile["KhongNenDieuChinhAnhSangManh"]:
				state = StateEnum.THUC_HANH_DIEU_CHINH_ANH_SANG
			else:
				if not stopAnimation:
					_hSliderAnhSang.editable = false
					callAnimationByName("KhongNenDieuChinhAnhSangManh")
			pass
		StateEnum.THUC_HANH_DIEU_CHINH_ANH_SANG:
			if profile["ThucHanhDieuChinhAnhSang"]:
				_btnExamination.visible = false
				_hSliderAnhSang.value = POWER_LIGHT_DEFAULT
				_khv.valuePower = _hSliderAnhSang.value
				_viewMauVat.material.set_shader_param("light_adjust", _hSliderAnhSang.value)
				state = StateEnum.GIOI_THIEU_BUOC_3
		StateEnum.GIOI_THIEU_BUOC_3:
			isLoadUIKHV = false
			if profile["GioiThieuBuoc3"]:
				state = StateEnum.DO_PHONG_DAI
			else:
				if not stopAnimation:
					callAnimationByName("GioiThieuBuoc3")
			pass
		StateEnum.DO_PHONG_DAI:
			if profile["DoPhongDai"]:
				state = StateEnum.CACH_TINH_DO_PHONG_DAI
			else:
				if not stopAnimation:
					callAnimationByName("DoPhongDai")
			pass
		StateEnum.CACH_TINH_DO_PHONG_DAI:
			if profile["CachTinhDoPhongDai"]:
				state = StateEnum.DO_PHONG_DAI_CUA_4X
			else:
				if not stopAnimation:
					callAnimationByName("CachTinhDoPhongDai")
			pass
		StateEnum.DO_PHONG_DAI_CUA_4X:
			if profile["DoPhongDaiCua4X"]:
				state = StateEnum.LUYEN_TAP_LAY_NET_HIEN_VI
			else:
				if not stopAnimation:
					_congThuc.visible = true
					callAnimationByName("DoPhongDaiCua4X")
			pass
		StateEnum.LUYEN_TAP_LAY_NET_HIEN_VI:
			if profile["LuyenTapLayNetHienVi"]:
				isLoadUIKHV = true
				state = StateEnum.LUYEN_TAP_LAY_NET_HIEN_VI_2
			else:
				if not stopAnimation:
					callAnimationByName("LuyenTapLayNetHienVi")
			pass
		StateEnum.LUYEN_TAP_LAY_NET_HIEN_VI_2:
			if profile["LuyenTapLayNetHienVi2"]:
				state = StateEnum.YEU_CAU_THUC_HANH_DIEU_CHINH_HIEN_VI
			else:
				if not stopAnimation:
					callAnimationByName("LuyenTapLayNetHienVi2")
			pass
		StateEnum.YEU_CAU_THUC_HANH_DIEU_CHINH_HIEN_VI:
			if profile["YeuCauThucHanhDieuChinhHienVi"]:
				state = StateEnum.GIOI_THIEU_THUC_HANH_VOI_VAT_KINH_100X
			else:
				if not stopAnimation:
					callAnimationByName("YeuCauThucHanhDieuChinhHienVi")
			pass
		StateEnum.GIOI_THIEU_THUC_HANH_VOI_VAT_KINH_100X:
			if profile["GioiThieuThucHanhVoiVatKinh100X"]:
				state = StateEnum.THUC_HANH_NHO_DAU
			else:
				if not stopAnimation:
					callAnimationByName("GioiThieuThucHanhVoiVatKinh100X")
			pass
		StateEnum.THUC_HANH_NHO_DAU:
			loadKHV(3)
			if profile["ThucHanhNhoDau"]:
				_khv.isNhoDau = true
				state = StateEnum.THUC_HANH_DIEU_CHINH_VAT_KINH_100X
			else:
				if not stopAnimation:
					callAnimationByName("ThucHanhNhoDau")
				if _khv.isNhoDau == true:
					_handCursor.visible = false
					profile["ThucHanhNhoDau"] = true
					state = StateEnum.THUC_HANH_DIEU_CHINH_VAT_KINH_100X
					stopAnimation = false
			pass
		StateEnum.THUC_HANH_DIEU_CHINH_VAT_KINH_100X:
			if profile["ThucHanhDieuChinhVatKinh100X"]:
				state = StateEnum.KET_THUC
			else:
				if not stopAnimation:
					callAnimationByName("ThucHanhDieuChinhVatKinh100X")
			pass
		StateEnum.KET_THUC:
			if profile["KetThuc"]:
				state = StateEnum.HOAN_THANH
			else:
				if not stopAnimation:
					callAnimationByName("KetThuc")
			pass
		StateEnum.HOAN_THANH:
			_alert.setText("Bạn đã hoàn thành bài thực hành quan sát kính hiển vi !!!")
			_alert.setSticker(true)
			_alert.showAlert()
			pass

	handleUIListMauVat()
	handleLoadTextureKHV()
	handleOpenUIKHV()
	handleValueKHV()
	handlBlurOil()
	loadBlur()
	loadLight()
	loadViewMauVat()
	reloadButtonScope()

func loadOther():
	_btnExamination.visible = false
	_btnContinue.visible = false
	percentSoCap = 0.6
	percentViCap = 0.4

func loadUI():
	_ui.currentScene = self
	_ui.visibleBtnNextScene(false)
	_ui.visibleBtnPrevScene(false)
	pass

func loadDialog():
	_dialog.current = self
	_dialog.methodClose = "actionCloseDialog"
	_dialog.visible = false
	_dialog.data = data.DATA_DIALOG
	_dialog.loadEditable(false)

func loadHandCursor():
	_handCursor.visible = false

func actionCloseDialog():
	match state:
		StateEnum.GIOI_THIEU:
			profile["GioiThieu"] = true
			stopAnimation = false
			state = StateEnum.CHUAN_BI_KINH
		StateEnum.CHUAN_BI_KINH:
			profile["ChuanBiKinh"] = true
			stopAnimation = false
			state = StateEnum.YEU_CAU_CAM_DIEN
		StateEnum.DUONG_DI_CUA_ANH_SANG:
			profile["DuongDiCuaAnhSang"] = true
			stopAnimation = false
			state = StateEnum.GIOI_THIEU_BUOC_2
		StateEnum.GIOI_THIEU_BUOC_2:
			profile["GioiThieuBuoc2"] = true
			stopAnimation = false
			state = StateEnum.YEU_CAU_DAT_TIEU_BAN_VAO_KINH
		StateEnum.VI_DU_DIEU_CHINH_ANH_SANG:
			profile["ViDuDieuChinhAnhSang"] = true
			stopAnimation = false
			state = StateEnum.ANH_SANG_DI_QUA_KHONG_DU
		StateEnum.KHONG_NEN_DIEU_CHINH_ANH_SANG_MANH:
			profile["KhongNenDieuChinhAnhSangManh"] = true
			stopAnimation = false
			_hSliderAnhSang.editable = true
			_btnExamination.visible = true
			_hSliderAnhSang.editable = true
			state = StateEnum.THUC_HANH_DIEU_CHINH_ANH_SANG
		StateEnum.GIOI_THIEU_BUOC_3:
			profile["GioiThieuBuoc3"] = true
			stopAnimation = false
			state = StateEnum.DO_PHONG_DAI
		StateEnum.DO_PHONG_DAI:
			profile["DoPhongDai"] = true
			stopAnimation = false
			state = StateEnum.CACH_TINH_DO_PHONG_DAI
		StateEnum.DO_PHONG_DAI_CUA_4X:
			profile["DoPhongDaiCua4X"] = true
			stopAnimation = false
			_congThuc.visible = false
			state = StateEnum.LUYEN_TAP_LAY_NET_HIEN_VI
		StateEnum.LUYEN_TAP_LAY_NET_HIEN_VI:
			profile["LuyenTapLayNetHienVi"] = true
			isLoadUIKHV = true
			stopAnimation = false
			state = StateEnum.LUYEN_TAP_LAY_NET_HIEN_VI_2
		StateEnum.LUYEN_TAP_LAY_NET_HIEN_VI_2:
			profile["LuyenTapLayNetHienVi2"] = true
			isLoadUIKHV = true
			stopAnimation = false
			state = StateEnum.YEU_CAU_THUC_HANH_DIEU_CHINH_HIEN_VI
		StateEnum.GIOI_THIEU_THUC_HANH_VOI_VAT_KINH_100X:
			profile["GioiThieuThucHanhVoiVatKinh100X"] = true
			_btnExamination.visible = true
			stopAnimation = false
			state = StateEnum.THUC_HANH_NHO_DAU
		StateEnum.KET_THUC:
			profile["KetThuc"] = true
			_notify.fire("SUCCESS", "Chúc mừng bạn đã hoàn thành bài học này")
			stopAnimation = false
			state = StateEnum.HOAN_THANH

	_handCursor.visible = false

func loadChatBubble():
	_chatBubble.data = data.DATA_CHAT

func loadBlur():
	$CanvasLayer/ViewControl/Label.text = "SoCap: " + str(_khv.soCap)
	$CanvasLayer/ViewControl/Label2.text = "ViCap: " + str(_khv.viCap)

	match(_khv.scope):
		0:
			loadScopeValue("X4")
		1:
			loadScopeValue("X10")
		2:
			loadScopeValue("X40")
		3:
			loadScopeValue("X100")

	checkScopeValue()
	_blur.material.set_shader_param("blur", valueSoCap + valueViCap)

func showDialog(id: String):
	_dialog.setIndexByName(id)
	_dialog.showDialog()
	if id == "GioiThieu1" || id == "GioiThieu2" || id == "GioiThieu3":
		_dialog.loadBtnClose(profile["GioiThieu"])
		_dialog.loadBtnReplay(false)
	else:
		if profile.has(id):
			_dialog.loadBtnClose(profile[id])
			_dialog.loadBtnReplay(profile[id])
			_dialog.loadEditable(profile[id])

func handleUIListMauVat():
	if _hopDungTieuBan.isOpen:
		_viewListMauVat.rect_position.x = lerp(_viewListMauVat.rect_position.x, 970, 0.05)
	else:
		_viewListMauVat.rect_position.x = lerp(_viewListMauVat.rect_position.x, 1200, 0.05)

func handleLoadTextureKHV():
	_viewport3D.size = get_viewport().get_size()
	_textureRectKHV.texture = _viewport3D.get_texture()

func gioiThieu1():
	_dialog.loadBackgroundBlack(true)
	self.showDialog("GioiThieu1")

func gioiThieu2():
	_dialog.loadBackgroundBlack(true)
	self.showDialog("GioiThieu2")

func gioiThieu3():
	_dialog.loadBackgroundBlack(true)
	self.showDialog("GioiThieu3")

func chuanBiKinh():
	_dialog.loadBackgroundBlack(false)
	self.showDialog("ChuanBiKinh")

func gioiThieuBuoc2():
	_dialog.loadBackgroundBlack(false)
	self.showDialog("GioiThieuBuoc2")

func duongDiCuaAnhSang():
	_dialog.loadBackgroundBlack(true)
	self.showDialog("DuongDiCuaAnhSang")

func viDuDieuChinhAnhSang():
	_dialog.loadBackgroundBlack(true)
	self.showDialog("ViDuDieuChinhAnhSang")

func viDuDieuChinhAnhSang2():
	_dialog.loadBackgroundBlack(true)
	self.showDialog("ViDuDieuChinhAnhSang2")

func viDuDieuChinhAnhSang3():
	_dialog.loadBackgroundBlack(true)
	self.showDialog("ViDuDieuChinhAnhSang3")

func khongNenDieuChinhAnhSangManh():
	_dialog.loadBackgroundBlack(false)
	self.showDialog("KhongNenDieuChinhAnhSangManh")

func yeuCauThucHienBaiKiemTraDoSang():
	_dialog.loadBackgroundBlack(false)
	self.showDialog("YeuCauThucHienBaiKiemTraDoSang")

func gioiThieuBuoc3():
	_dialog.loadBackgroundBlack(true)
	self.showDialog("GioiThieuBuoc3")

func timHieuCachTinhDoPhongDai():
	_dialog.loadBackgroundBlack(true)
	self.showDialog("TimHieuCachTinhDoPhongDai")

func doPhongDai():
	_dialog.loadBackgroundBlack(false)
	self.showDialog("DoPhongDai")

func doPhongDaiCua4x():
	_dialog.loadBackgroundBlack(false)
	self.showDialog("DoPhongDaiCua4X")

func doPhongDaiCuaVatKinhKhac():
	_dialog.loadBackgroundBlack(false)
	self.showDialog("DoPhongDaiCuaVatKinhKhac")

func luyenTapLayNetHienVi():
	_dialog.loadBackgroundBlack(false)
	self.showDialog("LuyenTapLayNetHienVi")

func luyenTapLayNetHienVi1():
	_dialog.loadBackgroundBlack(false)
	self.showDialog("LuyenTapLayNetHienVi1")

func luyenTapLayNetHienVi2():
	_dialog.loadBackgroundBlack(false)
	self.showDialog("LuyenTapLayNetHienVi2")

func luyenTapLayNetHienVi3():
	_dialog.loadBackgroundBlack(false)
	self.showDialog("LuyenTapLayNetHienVi3")

func luyenTapLayNetHienVi4():
	_dialog.loadBackgroundBlack(false)
	self.showDialog("LuyenTapLayNetHienVi4")

func luyenTapLayNetHienVi5():
	_dialog.loadBackgroundBlack(false)
	self.showDialog("LuyenTapLayNetHienVi5")

func gioiThieuThucHanhVoiVatKinh100X():
	_dialog.loadBackgroundBlack(true)
	self.showDialog("GioiThieuThucHanhVoiVatKinh100X")

func gioiThieuThucHanhVoiVatKinh100X1():
	_dialog.loadBackgroundBlack(true)
	self.showDialog("GioiThieuThucHanhVoiVatKinh100X1")

func gioiThieuThucHanhVoiVatKinh100X2():
	_dialog.loadBackgroundBlack(true)
	self.showDialog("GioiThieuThucHanhVoiVatKinh100X2")

func gioiThieuThucHanhVoiVatKinh100X3():
	_dialog.loadBackgroundBlack(true)
	self.showDialog("GioiThieuThucHanhVoiVatKinh100X3")

func gioiThieuThucHanhVoiVatKinh100X4():
	_dialog.loadBackgroundBlack(true)
	self.showDialog("GioiThieuThucHanhVoiVatKinh100X4")

func ketThuc():
	_dialog.loadBackgroundBlack(true)
	self.showDialog("KetThuc")

func callAnimationByName(name: String):
	match name:
		"GioiThieu":
			_animation.play("GIOI_THIEU")
		"ChuanBiKinh":
			_animation.play("CHUAN_BI_KINH")
		"YeuCauCamDien":
			_animation.play("YEU_CAU_CAM_DIEN")
		"ThucHanhCamDien":
			_animation.play("THUC_HANH_CAM_DIEN")
		"YeuCauBatCongTacDien":
			_animation.play("YEU_CAU_BAT_CONG_TAC_DIEN")
		"ThucHanhBatCongTacDien":
			_animation.play("THUC_HANH_BAT_CONG_TAC_DIEN")
		"GioiThieuBuoc2":
			_animation.play("GIOI_THIEU_BUOC_2")
		"YeuCauDatTieuBanVaoKinh":
			_animation.play("YEU_CAU_DAT_TIEU_BAN_VAO_KINH")
		"ThucHanhMoHopTieuBan":
			_animation.play("THUC_HANH_MO_HOP_TIEU_BAN")
		"ThucHanhLuaChonTieuBan":
			_animation.play("THUC_HANH_LUA_CHON_TIEU_BAN")
		"DuongDiCuaAnhSang":
			_animation.play("DUONG_DI_CUA_ANH_SANG")
		"YeuCauNhinVaoThiKinh":
			_animation.play("YEU_CAU_NHIN_VAO_THI_KINH")
		"ThucHanhMoKHV":
			_animation.play("THUC_HANH_MO_KHV")
		"ViDuDieuChinhAnhSang":
			_animation.play("VI_DU_DIEU_CHINH_ANH_SANG")
		"AnhSangDiQuaKhongDu":
			_animation.play("ANH_SANG_DI_QUA_KHONG_DU")
		"YeuCauDieuChinhAnhSangManh":
			_animation.play("YEU_CAU_DIEU_CHINH_ANH_SANG_MANH")
		"KhongNenDieuChinhAnhSangManh":
			_animation.play("KHONG_NEN_DIEU_CHINH_ANH_SANG_MANH")
		"GioiThieuBuoc3":
			_animation.play("GIOI_THIEU_BUOC_3")
		"DoPhongDai":
			_animation.play("DO_PHONG_DAI")
		"CachTinhDoPhongDai":
			_animation.play("CACH_TINH_DO_PHONG_DAI")
		"DoPhongDaiCua4X":
			_animation.play("DO_PHONG_DAI_CUA_4X")
		"LuyenTapLayNetHienVi":
			_animation.play("LUYEN_TAP_LAY_NET_HIEN_VI")
		"LuyenTapLayNetHienVi2":
			_animation.play("LUYEN_TAP_LAY_NET_HIEN_VI_2")
		"YeuCauThucHanhDieuChinhHienVi":
			_animation.play("YEU_CAU_THUC_HANH_DIEU_CHINH_HIEN_VI")
		"GioiThieuThucHanhVoiVatKinh100X":
			_animation.play("GIOI_THIEU_THUC_HANH_VOI_VAT_KINH_100X")
		"ThucHanhNhoDau":
			_animation.play("THUC_HANH_NHO_DAU")
		"ThucHanhDieuChinhVatKinh100X":
			_animation.play("THUC_HANH_DIEU_CHINH_VAT_KINH_100X")
		"KetThuc":
			_animation.play("KET_THUC")

func _on_AnimationPlayer_animation_finished(anim_name):
	match anim_name:
		"GIOI_THIEU":
			stopAnimation = true
			handleEndAnimation()
		"CHUAN_BI_KINH":
			stopAnimation = true
			handleEndAnimation()
		"YEU_CAU_CAM_DIEN":
			profile["YeuCauCamDien"] = true
			state = StateEnum.THUC_HANH_CAM_DIEN
		"YEU_CAU_BAT_CONG_TAC_DIEN":
			profile["YeuCauBatCongTacDien"] = true
			state = StateEnum.THUC_HANH_BAT_CONG_TAC_DIEN
		"DUONG_DI_CUA_ANH_SANG":
			stopAnimation = true
			handleEndAnimation()
		"GIOI_THIEU_BUOC_2":
			stopAnimation = true
			handleEndAnimation()
		"YEU_CAU_DAT_TIEU_BAN_VAO_KINH":
			profile["YeuCauDatTieuBanVaoKinh"] = true
			state = StateEnum.THUC_HANH_MO_HOP_TIEU_BAN
		"YEU_CAU_NHIN_VAO_THI_KINH":
			profile["YeuCauNhinVaoThiKinh"] = true
			state = StateEnum.THUC_HANH_MO_KHV
		"VI_DU_DIEU_CHINH_ANH_SANG":
			stopAnimation = true
			handleEndAnimation()
		"ANH_SANG_DI_QUA_KHONG_DU":
			profile["AnhSangDiQuaKhongDu"] = true
			state = StateEnum.YEU_CAU_DIEU_CHINH_ANH_SANG_MANH
		"KHONG_NEN_DIEU_CHINH_ANH_SANG_MANH":
			stopAnimation = true
			handleEndAnimation()
		"GIOI_THIEU_BUOC_3":
			stopAnimation = true
			handleEndAnimation()
		"DO_PHONG_DAI":
			stopAnimation = true
			handleEndAnimation()
		"CACH_TINH_DO_PHONG_DAI":
			_btnContinue.visible = true
			stopAnimation = true
		"DO_PHONG_DAI_CUA_4X":
			stopAnimation = true
			handleEndAnimation()
		"LUYEN_TAP_LAY_NET_HIEN_VI":
			stopAnimation = true
			handleEndAnimation()
		"LUYEN_TAP_LAY_NET_HIEN_VI_2":
			stopAnimation = true
			handleEndAnimation()
		"YEU_CAU_THUC_HANH_DIEU_CHINH_HIEN_VI":
			stopAnimation = true
			_btnExamination.visible = true
			handleEndAnimation()
		"GIOI_THIEU_THUC_HANH_VOI_VAT_KINH_100X":
			stopAnimation = true
			handleEndAnimation()
		"THUC_HANH_NHO_DAU":
			stopAnimation = true
			handleEndAnimation()
		"THUC_HANH_DIEU_CHINH_VAT_KINH_100X":
			stopAnimation = true
			_btnExamination.visible = true
			handleEndAnimation()
		"KET_THUC":
			stopAnimation = true
			handleEndAnimation()

func handleEndAnimation():
	_dialog.loadBtnReplay(true)
	_dialog.loadBtnClose(true)
	_dialog.loadEditable(true)

func _on_AreaCongTac_input_event(_viewport, event, _shape_idx):
	if state == StateEnum.THUC_HANH_BAT_CONG_TAC_DIEN:
		if event is InputEventMouseButton and event.button_index == BUTTON_LEFT:
			if event.pressed:
				_khv.isCongTac = true

func _on_BtnHopTieuBan_button_up():
	if state == StateEnum.THUC_HANH_MO_HOP_TIEU_BAN:
		_hopDungTieuBan.isOpen = true

func _on_ItemList_item_selected(_index):
	_khv.layLamKinh()
	loadKHV(_khv.scope)

func _on_BtnKHV_button_up():
	if state == StateEnum.THUC_HANH_MO_KHV:
		isLoadUIKHV = true

func loadItemList():
	_itemList.add_item(MAU_VAT["name"], load(MAU_VAT["icon"]), false)

func loadSizeViewMauVat():
	var texture = _viewMauVat.get_texture()
	size_x_view = texture.get_width() - SIZE_VIEW
	size_y_view = texture.get_height() - SIZE_VIEW

func loadLight() -> void:
	if Global.isLight == true && _khv.isCongTac:
		_viewMauVat.material.set_shader_param("light_adjust", _hSliderAnhSang.value)
		_khv.valuePower = _hSliderAnhSang.value
		_black.visible = false
	else:
		_viewMauVat.material.set_shader_param("light_adjust", -0.1)
		_khv.valuePower = -0.5
		_black.visible = true

func loadViewMauVat() -> void:
	_viewMauVat.region_rect.position.x = _hSliderX.value * size_x_view
	_viewMauVat.region_rect.position.y = _vSliderY.value * size_y_view
	_khv.valueY = _vSliderY.value
	_khv.valueX = _hSliderX.value

func loadScopeValue(s: String):
	scCurrent = MAU_VAT[s]["socap"]
	vcCurrent = MAU_VAT[s]["vicap"]
	loadScopeSoCap(scCurrent)
	loadScopeViCap(vcCurrent)

func handleOpenUIKHV():
	if isLoadUIKHV:
		_viewControl.rect_position.x = lerp(_viewControl.rect_position.x, 650, 0.05)
	else:
		_viewControl.rect_position.x = lerp(_viewControl.rect_position.x, 1200, 0.05)

func handleValueKHV():
	_khv.soCap = _hSliderSoCap.value
	_khv.viCap = _hSliderVicap.value

func handlBlurOil():
	if _khv.scope == 3:
		_blurOil.visible = not _khv.isNhoDau
	else:
		_blurOil.visible = false

func reloadButtonScope():
	if _khv.scope != 0:
		_btnX4.texture_normal = load("res://asset/sprite2D/UI/4x.png")
	if _khv.scope != 1:
		_btnX10.texture_normal = load("res://asset/sprite2D/UI/10x.png")
	if _khv.scope != 2:
		_btnX40.texture_normal = load("res://asset/sprite2D/UI/40x.png")
	if _khv.scope != 3:
		_btnX100.texture_normal = load("res://asset/sprite2D/UI/100x.png")

func loadScopeSoCap(sc):
	if sc != -1:
		if _hSliderSoCap.value <= sc:
			valueSoCap = (sc - _hSliderSoCap.value) * (1/sc) * percentSoCap
		else:
			valueSoCap = (_hSliderSoCap.value - sc)
	else:
		valueSoCap = 0.4 * _hSliderSoCap.value + 0.4

func loadScopeViCap(vc):
	if vc != -1:
		if _hSliderVicap.value <= vc:
			valueViCap = (vc - _hSliderVicap.value) * (1/vc) * percentViCap
		else:
			valueViCap = (_hSliderVicap.value - vc)
	else:
		valueViCap = 0.1 * _hSliderVicap.value + 0.3

func checkScopeValue():
	if valueSoCap > percentSoCap:
		valueSoCap = percentSoCap
	elif valueSoCap < 0:
		valueSoCap = 0
	if valueViCap > percentViCap:
		valueViCap = percentViCap
	elif valueViCap < 0:
		valueViCap = 0

func loadKHV(scope):
	_khv.scope = scope
	is100X = false
	match scope:
		0:
			_btnX4.texture_normal = load("res://asset/sprite2D/UI/4xPick.png")
			_viewMauVat.texture = load(MAU_VAT["X4"]["path"])
			_textureRectKnob.texture = load("res://asset/sprite2D/lab/len4x.png")
		1:
			_btnX10.texture_normal = load("res://asset/sprite2D/UI/10xPick.png")
			_viewMauVat.texture = load(MAU_VAT["X10"]["path"])
			_textureRectKnob.texture = load("res://asset/sprite2D/lab/len10x.png")
		2:
			_btnX40.texture_normal = load("res://asset/sprite2D/UI/40xPick.png")
			_viewMauVat.texture = load(MAU_VAT["X40"]["path"])
			_textureRectKnob.texture = load("res://asset/sprite2D/lab/len40x.png")
		3:
			_btnX100.texture_normal = load("res://asset/sprite2D/UI/100xPick.png")
			_viewMauVat.texture = load(MAU_VAT["X100"]["path"])
			_textureRectKnob.texture = load("res://asset/sprite2D/lab/len100x.png")
			is100X = true

	loadSizeViewMauVat()

func _on_TextureButtonX4_button_up():
	if abs(_khv.scope - 0) == 1:
		loadKHV(0)

func _on_TextureButtonX10_button_up():
	if abs(_khv.scope - 1) == 1:
		loadKHV(1)

func _on_TextureButtonX40_button_up():
	if abs(_khv.scope - 2) == 1:
		if _khv.isNhoDau:
			_alert.setText("Lau dầu trước, để tránh làm hỏng các vật kính khác")
			_alert.showAlert(2)
		else:
			loadKHV(2)

func _on_TextureButtonX100_button_up():
	if abs(_khv.scope - 3) == 1:
		loadKHV(3)
	pass

func _on_ButtonExamination_button_up():
	match state:
		StateEnum.THUC_HANH_DIEU_CHINH_ANH_SANG:
			if _hSliderAnhSang.value < POWER_LIGHT_DEFAULT - 0.1:
				_notify.fire("WARNING","Không đủ ánh sáng")
			elif _hSliderAnhSang.value > POWER_LIGHT_DEFAULT + 0.1:
				_notify.fire("WARNING","Ánh sáng quá mạnh")
			else:
				_notify.fire("SUCCESS", "Ánh sáng vừa đủ")
				_btnExamination.visible = false
				profile["ThucHanhDieuChinhAnhSang"] = true
				state = StateEnum.GIOI_THIEU_BUOC_3
		StateEnum.YEU_CAU_THUC_HANH_DIEU_CHINH_HIEN_VI:
			var checkSoCap = checkMiddle(_hSliderSoCap.value, scCurrent)
			var checkViCap = checkMiddle(_hSliderVicap.value, vcCurrent)
			if checkSoCap == 0 and checkViCap == 0:
				_notify.fire("SUCCESS", "Bạn đã làm đúng rồi đấy")
				_btnExamination.visible = false
				profile["YeuCauThucHanhDieuChinhHienVi"] = true
				state = StateEnum.GIOI_THIEU_THUC_HANH_VOI_VAT_KINH_100X
				stopAnimation = false
			else:
				_notify.fire("WARNING", "Vẫn chưa chính xác đâu")
		StateEnum.THUC_HANH_DIEU_CHINH_VAT_KINH_100X:
			var checkSoCap = checkMiddle(_hSliderSoCap.value, scCurrent)
			var checkViCap = checkMiddle(_hSliderVicap.value, vcCurrent)
			if checkSoCap == 0 and checkViCap == 0 and _khv.isNhoDau and _khv.scope == 3:
				_notify.fire("SUCCESS", "Bạn đã làm đúng rồi đấy")
				_btnExamination.visible = false
				_chatBubble.visible = false
				profile["ThucHanhDieuChinhVatKinh100X"] = true
				state = StateEnum.KET_THUC
				stopAnimation = false
			else:
				_notify.fire("WARNING", "Vẫn chưa chính xác đâu")
			pass

func checkMiddle(value, point):
	if value < point - 0.1:
		return -1
	elif value > point + 0.1:
		return 1
	else:
		return 0

func _on_ButtonContinue_button_up():
	profile["CachTinhDoPhongDai"] = true
	_btnContinue.visible = false
	_chatBubble.visible = false
	state = StateEnum.DO_PHONG_DAI_CUA_4X
	stopAnimation = false

func _on_BtnDauSoiKinh_button_up():
	if not isAnimation and is100X and _khv.isLamKinh:
		_animationNhoDau.play("NhoDau")
	else:
		if not _khv.isLamKinh:
			_alert.setText("Chưa bỏ mẫu vật vào kính hiển vi")
			_alert.showAlert()
		elif not is100X:
			_alert.setText("Chỉ sử dụng dầu soi cho vật kính 100X")
			_alert.showAlert()

func _on_AnimationPlayerNhoDau_animation_started(_anim_name):
	isAnimation = true

func _on_AnimationPlayerNhoDau_animation_finished(_anim_name):
	isAnimation = false

func _on_BtnGiayLauKinh_button_up():
	if not isAnimation and is100X and _khv.isLamKinh and _khv.isNhoDau:
		_animationNhoDau.play("LauDau")
	else:
		if not _khv.isNhoDau:
			_alert.setText("Tiêu bản không có dầu, không cần sử dụng giấy lau")
			_alert.showAlert(2)
