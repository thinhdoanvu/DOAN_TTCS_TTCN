extends Node

# _date ánh xạ tới nút label hiển thị ngày hoàn thành
onready var _date = $TextureRect/Date
# _name ánh xạ tới nút label hiển thị tên sinh viên hoàn thành
onready var _name = $TextureRect/Name
# _mssv ánh xạ tới nút label hiển thị mssv hoàn thành
onready var _mssv = $TextureRect/MSSV

# Tạo biến date lưu dữ liệu ngày
var date: Dictionary
# Tạo biến userName lấy tên sinh viên từ biến toàn cục userName
var userName: String = Global.userName
# Tạo biến mssv lấy mssv sinh viên từ biến toàn cục mssv
var mssv: String = Global.mssv

func _ready():
	date = OS.get_date()
	_date.text = formatDay()
	_name.text = formatUserName(userName)
	_mssv.text = mssv

# Hàm định dạng lại tên sinh viên
# VD: pHạm nGọC ẩN => Phạm Ngọc Ẩn
func formatUserName(value: String) -> String:
	var s = ""
	s = value.to_lower()
	s = s.capitalize()
	return s

# Hàm định dạng hiển thị thời gian
# VD: 11/06/2023
func formatDay() -> String:
	var s = ""
	if date.day < 10:
		s += "0" + str(date.day)
	else:
		s += str(date.day)

	if date.month < 10:
		s += "/0" + str(date.month)
	else:
		s += "/" + str(date.month)

	s += "/" + str(date.year)
	return s
