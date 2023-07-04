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
onready var _viewControl = $CanvasLayer/ViewControl
onready var _viewListMauVat = $CanvasLayer/ViewListMauVat
onready var _textureRectKnob = $CanvasLayer/ViewControl/HBoxContainer/Control/TextureRectKnob

# SLIDER
onready var _hSliderSoCap = $CanvasLayer/ViewControl/HBoxContainer/VBoxContainer/HSliderSoCap
onready var _hSliderVicap = $CanvasLayer/ViewControl/HBoxContainer/VBoxContainer/HSliderViCap
onready var _hSliderAnhSang = $CanvasLayer/ViewControl/HBoxContainer/VBoxContainer/HSliderAnhSang
onready var _hSliderX = $CanvasLayer/ViewControl/HSliderX
onready var _vSliderY = $CanvasLayer/ViewControl/VSliderY

# SCOPE
onready var _btnX4 = $CanvasLayer/ViewControl/TextureButtonX4
onready var _btnX10 = $CanvasLayer/ViewControl/TextureButtonX10
onready var _btnX40 = $CanvasLayer/ViewControl/TextureButtonX40
onready var _btnX100 = $CanvasLayer/ViewControl/TextureButtonX100

#ANIMATION
onready var _animation = $AnimationPlayer

# TUTORIAL
onready var _tutorial = $CanvasLayer/Tutorial

onready var _ui = $CanvasLayer/UserInterface
onready var _alert = $CanvasLayer/Alert
onready var _itemList = $CanvasLayer/ViewListMauVat/Panel/ItemList

# ========================================
var data = load("res://data/data_frame6.gd").new()
# LOAD VIEW VAT MAU
const SIZE_VIEW = 290
const FRAME_NAME = "ThucHanh"

var profile = Global.profile[FRAME_NAME]
var final = Global.final[FRAME_NAME]

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

func _ready():
	loadScene()
	loadKHV(0)
	loadChangeScene()
	loadItemList()

func _process(_delta):
	_viewport3D.size = get_viewport().get_size()
	_textureRectKHV.texture = _viewport3D.get_texture()
#	Move x, y
	loadViewMauVat()
#	Light
	loadLight()
	reloadButtonScope()
	loadBlur()
#	Load UI _khv
	loadUIKHV()
	loadUIListMauVat()

	loadBlurOil()
#
	_khv.soCap = _hSliderSoCap.value
	_khv.viCap = _hSliderVicap.value


func loadScene():
	profile["ThucHanh"] = true
	final = true
	percentSoCap = 0.6
	percentViCap = 0.4
	_blurOil.visible = false
	pass

#======================================================
# SOI KINH HIEN VI
func loadItemList():
	for i in data.CONFIG_SCOPE:
		_itemList.add_item(i["name"], load(i["icon"]), false)

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

func reloadButtonScope():
	if _khv.scope != 0:
		_btnX4.texture_normal = load("res://asset/sprite2D/UI/4x.png")
	if _khv.scope != 1:
		_btnX10.texture_normal = load("res://asset/sprite2D/UI/10x.png")
	if _khv.scope != 2:
		_btnX40.texture_normal = load("res://asset/sprite2D/UI/40x.png")
	if _khv.scope != 3:
		_btnX100.texture_normal = load("res://asset/sprite2D/UI/100x.png")

func loadUIListMauVat():
	if _hopDungTieuBan.isOpen:
		_viewListMauVat.rect_position.x = lerp(_viewListMauVat.rect_position.x, 970, 0.05)
	else:
		_viewListMauVat.rect_position.x = lerp(_viewListMauVat.rect_position.x, 1200, 0.05)

func loadUIKHV():
	if isLoadUIKHV:
		_viewControl.rect_position.x = lerp(_viewControl.rect_position.x, 680, 0.05)
	else:
		_viewControl.rect_position.x = lerp(_viewControl.rect_position.x, 1200, 0.05)

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
	_blur.material.set_shader_param("blur", valueSoCap + valueViCap) # [0-1]

func loadBlurOil():
	if _khv.scope == 3:
		_blurOil.visible = not _khv.isNhoDau
		var valueBlurOil = min(valueSoCap + valueViCap + 0.3, 1.0) # [0.3-1]
		_blurOil.material.set_shader_param("blur", valueBlurOil)
	else:
		_blurOil.visible = false

func loadScopeValue(s: String):
	loadScopeSoCap(data.CONFIG_SCOPE[indexVatMau][s]["socap"])
	loadScopeViCap(data.CONFIG_SCOPE[indexVatMau][s]["vicap"])

shader_type canvas_item;

uniform float blur : hint_range(0.0, 1.0);

void fragment(){
	COLOR = textureLod(SCREEN_TEXTURE, SCREEN_UV, blur * 6.0);
}

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
			_viewMauVat.texture = load(data.CONFIG_SCOPE[indexVatMau]["X4"]["path"])
			_textureRectKnob.texture = load("res://asset/sprite2D/lab/len4x.png")
		1:
			_btnX10.texture_normal = load("res://asset/sprite2D/UI/10xPick.png")
			_viewMauVat.texture = load(data.CONFIG_SCOPE[indexVatMau]["X10"]["path"])
			_textureRectKnob.texture = load("res://asset/sprite2D/lab/len10x.png")
		2:
			_btnX40.texture_normal = load("res://asset/sprite2D/UI/40xPick.png")
			_viewMauVat.texture = load(data.CONFIG_SCOPE[indexVatMau]["X40"]["path"])
			_textureRectKnob.texture = load("res://asset/sprite2D/lab/len40x.png")
		3:
			_btnX100.texture_normal = load("res://asset/sprite2D/UI/100xPick.png")
			_viewMauVat.texture = load(data.CONFIG_SCOPE[indexVatMau]["X100"]["path"])
			_textureRectKnob.texture = load("res://asset/sprite2D/lab/len100x.png")
			is100X = true

	loadSizeViewMauVat()

func loadChangeScene():
	_ui.currentScene = self
	_ui.visibleBtnNextScene(true)
	_ui.visibleBtnPrevScene(true)
	_ui.setPrevScene(Global.NAME_FRAME_5, Global.FRAME_5)
	_ui.setNextScene(Global.NAME_FRAME_7, Global.FRAME_7)

func loadSizeViewMauVat():
	var texture = _viewMauVat.get_texture()
	size_x_view = texture.get_width() - SIZE_VIEW
	size_y_view = texture.get_height() - SIZE_VIEW

# Nút chọn vật kính 4X
func _on_TextureButtonX4_button_up():
	if abs(_khv.scope - 0) == 1:
		loadKHV(0)

# Nút chọn vật kính 10X
func _on_TextureButtonX10_button_up():
	if abs(_khv.scope - 1) == 1:
		loadKHV(1)

# Nút chọn vật kính 40X
func _on_TextureButtonX40_button_up():
	if abs(_khv.scope - 2) == 1:
		if _khv.isNhoDau:
			_alert.setText("Lau dầu trước, để tránh làm hỏng các vật kính khác")
			_alert.showAlert(2)
		else:
			loadKHV(2)

# Nút chọn vật kính 100X
func _on_TextureButtonX100_button_up():
	if abs(_khv.scope - 3) == 1:
		loadKHV(3)

func _on_AreaCongTac_input_event(_viewport, event, _shape_idx):
	if event is InputEventMouseButton and event.button_index == BUTTON_LEFT:
		if event.pressed:
			_khv.isCongTac = !_khv.isCongTac

func _on_ItemList_item_selected(index):
	indexVatMau = index
	_khv.layLamKinh()
	loadKHV(_khv.scope)

func _on_AnimationPlayer_animation_started(_anim_name:String):
	isAnimation = true

func _on_AnimationPlayer_animation_finished(_anim_name:String):
	isAnimation = false

func _on_BtnHopTieuBan_button_up():
	_hopDungTieuBan.isOpen = !_hopDungTieuBan.isOpen

func _on_BtnKHV_button_up():
#	_khv.isLamKinh and _khv.isCongTac and Global.isLight
	if _khv.isLamKinh:
		isLoadUIKHV = !isLoadUIKHV
	else:
		if not _khv.isLamKinh:
			_alert.setText("Chưa bỏ tiêu bản vào kính hiển vi")
			_alert.showAlert()
		elif not Global.isLight:
			_alert.setText("Chưa cắm điện cho kính hiển")
			_alert.showAlert()
		elif not _khv.isCongTac:
			_alert.setText("Chưa bật công tắc đèn")
			_alert.showAlert()

func _on_BtnDauSoiKinh_button_up():
	if not isAnimation and is100X and _khv.isLamKinh:
		_animation.play("NhoDau")
	else:
		if not _khv.isLamKinh:
			_alert.setText("Chưa bỏ mẫu vật vào kính hiển vi")
			_alert.showAlert()
		elif not is100X:
			_alert.setText("Chỉ sử dụng dầu soi cho vật kính 100X")
			_alert.showAlert()

func _on_BtnGiayLauKinh_button_up():
	if not isAnimation and is100X and _khv.isLamKinh and _khv.isNhoDau:
		_animation.play("LauDau")
	else:
		if not _khv.isNhoDau:
			_alert.setText("Tiêu bản không có dầu, không cần sử dụng giấy lau")
			_alert.showAlert(2)
