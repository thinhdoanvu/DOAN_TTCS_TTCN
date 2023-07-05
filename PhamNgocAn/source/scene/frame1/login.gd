extends CanvasLayer

# _animationLogin ánh xạ tới AnimationPlayer đảm nhiệm animation
onready var _animationLogin = $AnimationPlayer
# _alert ánh xạ tới Alert (hiển thị thông báo khi nhập sai)
onready var _alert = $Interface/Alert
# isLoadMenu: true -> nhập thông tin chính xác | false -> nhập sai
var isLoadMenu: bool = false

func _ready():
	_animationLogin.play("Login")

#  Phương thức kiểm tra hợp lệ của MSSV
func checkMSSV():
	if Global.mssv.length() != 8:
		return false
	if not Global.mssv.is_valid_integer():
		return false
	if Global.mssv.find("+", 0) != -1:
		return false
	if Global.mssv.find("-", 0) != -1:
		return false
	return true

# Khi sinh viên nhấm nút bắt đầu sẽ thực hiện kiểm tra các giá trị
func _on_ButtonStart_button_up():
	if not Global.userName.empty() and checkMSSV():
		isLoadMenu = true
		_animationLogin.play_backwards("Login")
	else:
		if Global.mssv.length() != 8:
			_alert.setText("Mã số sinh viên cần 8 ký tự")
		elif not Global.mssv.is_valid_integer():
			_alert.setText("Mã số sinh viên chỉ được chứa chữ số")
		elif Global.userName.empty():
			_alert.setText("Họ và tên không được bỏ trống")
		_alert.showAlert()

# Chạy hoạt hình hiển thị giao diện của bảng thông tin đăng nhập
func _on_AnimationPlayer_animation_finished(anim_name):
	if anim_name == "Login" and isLoadMenu:
		Load.load_scene(self, Global.FRAME_2)

# Thực hiện hành động khi sinh viên nhập giá trị vào ô input
func _on_LineEditMSSV_text_changed(new_text:String):
	Global.mssv = new_text # Lưu mssv vào biến toàn cục mssv

# Thực hiện hành động khi sinh viên nhập giá trị vào ô input
func _on_LineEditUseName_text_changed(new_text:String):
	Global.userName = new_text # Lưu tên sinh viên vào biến toàn cục userName
