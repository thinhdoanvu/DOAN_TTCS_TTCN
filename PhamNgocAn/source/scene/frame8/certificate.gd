extends Node

# _ui - Giao diện UI của người dùng (Trang chủ, âm thanh, logo)
onready var _ui = $CanvasLayer/UserInterface
# _texture - chứa hình ảnh chứng chỉ có đầy đủ
#  thông tin của sinh viên khi được kết xuất từ viewport
onready var _texture = $TextureRect
# _viewport2D - Scene kết xuất ra chứng chỉ
onready var _viewport2D = $Viewport

func _ready():
	loadUI()

# Load giao diện người dùng
func loadUI():
	_ui.currentScene = self
	_ui.visibleBtnNextScene(false)
	_ui.visibleBtnPrevScene(false)

func _process(_delta):
	# Lấy hình ảnh được kết xuất từ _viewport2D hiển thị lên giao diện
	_texture.texture = _viewport2D.get_texture()

# Bắt tín hiệu khi người dùng nhấn nút tải
func _on_BtnDownload_button_down():
	# Lấy dữ liệu hình ảnh từ _viewport2D lưu vào đối tượng image
	var image: Image = _viewport2D.get_texture().get_data()
	# Định nghĩa hình ảnh được tải xuống máy tính
	JavaScript.download_buffer(image.save_png_to_buffer(), "cert.png", "image/png")
