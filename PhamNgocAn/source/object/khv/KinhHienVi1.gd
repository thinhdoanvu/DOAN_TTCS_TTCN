extends Spatial

onready var lamp = $DenKHV

# Merh X Y
onready var trayY = $Tray1/YTray
onready var trayX = $Tray1/YTray/XTray
onready var tray = $Tray1
onready var disk = $MamKinhBase/MamKinh
onready var light = $OmniLight
onready var lightTB = $OmniLight2
onready var tickSound = $AudioStreamPlayer
onready var congTac = $CongTac/CongTac2
onready var giotDau = $Tray1/YTray/XTray/GiotDau
onready var animation = $AnimationPlayer
onready var _lamkinh = $Tray1/YTray/XTray/LamKinh

const X4 = Vector3(0, 0, 0)
const X10 = Vector3(0, -90, 0)
const X40 = Vector3(0, -180, 0)
const X100 = Vector3(0, -270, 0)
const X40X100 = Vector3(0, -225, 0)
const turnOn = Vector3(0, -10, 0)
const turnOff = Vector3(0, 10, 0)
const TRAY_POS_Y = 0.2

var valuePower: float = -0.5
var valueX: float = 0.5
var valueY: float = 0.5
var scope: int = 0
var soCap: float = 0.0
var viCap: float = 0.0

var isCongTac: bool = false
var isTickSound: bool = false
var isChangeScope: bool = false
var isNhoDau: bool = false
var isX40X100: bool = false
var isLamKinh: bool = false

func _ready():
	scope = 0

func _process(delta):
	loadLight()
	loadXY()
	loadCongTac()
	loadRotationDisk(scope, delta)
	loadGiotDau()

func loadLight():
	lamp.get_active_material(1).set_shader_param("power", valuePower - 0.5)
	light.light_energy = 5 * (valuePower + 0.5)
	lightTB.light_energy = light.light_energy
	
func loadXY():
	trayY.translation.x = -0.145 - 0.02 * valueY
	trayX.translation.z = 0.015 + 0.025 * valueX
	tray.translation.y = TRAY_POS_Y + 0.04 * soCap + 0.01 * viCap

func loadRotationDisk(scope1: int, delta):
	onTickSound()
	if !isX40X100:
		match(scope1):
			0:
				disk.rotation_degrees = lerp(disk.rotation_degrees, X4, 5 * delta)			
				pass
			1:
				disk.rotation_degrees = lerp(disk.rotation_degrees, X10, 5 * delta)
				pass
			2:
				disk.rotation_degrees = lerp(disk.rotation_degrees, X40, 5 * delta)
				pass
			3:
				disk.rotation_degrees = lerp(disk.rotation_degrees, X100, 5 * delta)
				pass

func onTickSound():
	var isTemp: bool = isChangeScope
	match(scope):
		0:
			isChangeScope = (disk.rotation_degrees.y >= -10 && disk.rotation_degrees.y <= 1)
		1:
			isChangeScope = (disk.rotation_degrees.y >= -95 && disk.rotation_degrees.y <= -80)
		2:
			isChangeScope = (disk.rotation_degrees.y >= -185 && disk.rotation_degrees.y <= -160)
		3:
			isChangeScope = (disk.rotation_degrees.y >= -275 && disk.rotation_degrees.y <= -260)
	if isTemp != isChangeScope and isChangeScope:
		isTickSound = true
	if isTickSound:
		tickSound.play()
		isTickSound = false

func loadCongTac():
	if isCongTac:
		congTac.rotation_degrees = turnOn
	else:
		congTac.rotation_degrees = turnOff

func loadGiotDau():
	if isLamKinh:
		giotDau.visible = isNhoDau
	else:
		giotDau.visible = false

func nhoDau():
	if isLamKinh:
		isNhoDau = true

func lauDau():
	isNhoDau = false

func coLamKinh():
	isLamKinh = true

func khongLamKinh():
	isLamKinh = false
	isNhoDau = false

func layLamKinh():
	animation.play("LapLamKinh")

func setLamKinh(value: bool):
	_lamkinh.visible = value
