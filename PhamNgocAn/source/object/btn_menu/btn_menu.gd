extends "res://object/button/button_v2.gd"

# _dialogBox ánh xạ tới SpriteDialogBox
onready var _dialogBox = $SpriteDialogBox
# _spriteTickFinal ánh xạ tới SpriteTickFinal
onready var _spriteTickFinal = $SpriteTickFinal

# Trạng thái chuột có hover hay không
var isEnter: bool = false

# Tự động gọi khi màn hình load xong
func _ready():
	# Tắt nút, chờ cài đặt từ bên ngoài để mở nút
	self.disabled = true
	# Ẩn bảng thông báo (dialog kích thước = 0)
	_dialogBox.scale = Vector2.ZERO

# Khi chuột hover vào nút
func _process(_delta):
	if isEnter:
		# Phóng to dialog để hiện rõ thông báo
		_dialogBox.scale = lerp(_dialogBox.scale, Vector2.ONE, 0.15)
	else:
		# Thu nhỏ dialog (biến mất)
		_dialogBox.scale = lerp(_dialogBox.scale, Vector2.ZERO, 0.15)

# Hàm hiển thị dấu tích xanh
func setTickFinal(value: bool):
	_spriteTickFinal.visible = value

# Phát âm thanh và cho biến isEnter = true
# Khi có tín hiệu chuột di chuyển vào nút
func _on_TextureButton_mouse_entered():
	hover_audio_play()
	isEnter = true

# Cho biến isEnter = false
# Khi có tín hiệu chuột di chuyển vào nút
func _on_TextureButton_mouse_exited():
	isEnter = false
