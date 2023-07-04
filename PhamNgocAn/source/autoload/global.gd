extends Node

# SCENE PATH
const FRAME_1 = "res://scene/frame1/frame1_login.tscn"
const FRAME_2 = "res://scene/frame2/frame2_menu.tscn"
const FRAME_3 = "res://scene/frame3/frame3_material_chemical.tscn"
const FRAME_4 = "res://scene/frame4/frame4_display_information_microscope.tscn"
const FRAME_5 = "res://scene/frame5/frame5_operation_of_microscope.tscn"
const FRAME_6 = "res://scene/frame6/frame6_practice.tscn"
const FRAME_7 = "res://scene/frame7/frame7_exercise.tscn"
const FRAME_8 = "res://scene/frame8/frame8_certificate.tscn"
const FRAME_LOADING = "res://scene/loading/frame_loading.tscn"

# NAME SCENE
const NAME_FRAME_1 = "Đăng nhập"
const NAME_FRAME_2 = "Trang chủ"
const NAME_FRAME_3 = "Vật liệu và hóa chất"
const NAME_FRAME_4 = "Cấu tạo kính hiển vi"
const NAME_FRAME_5 = "Thực hành sử dụng kính hiển vi"
const NAME_FRAME_6 = "Thực hành"
const NAME_FRAME_7 = "Kiểm tra"

# FRAME ID
const ID_FRAME_1 = "Login"
const ID_FRAME_2 = "Menu"
const ID_FRAME_3 = "VatLieuHoaChat"
const ID_FRAME_4 = "CauTaoKHV"
const ID_FRAME_5 = "HoatDongKHV"
const ID_FRAME_6 = "ThucHanh"
const ID_FRAME_7 = "KiemTra"

# USER
var userName: String = ""
var mssv: String = ""

# SETTING
var isAudioOn: bool = true
var isAudioMenu: bool = true
var isLight: bool = false

var profile: Dictionary = {
	"Menu": {
		"GioiThieu": false,
		"VatLieuHoaChat": false,
		"CauTaoKHV": false,
		"HoatDongKHV": false,
		"ThucHanh": false,
		"KiemTra": false,
	},
	"VatLieuHoaChat": {
		"GioiThieu": false,
		"GiayLauOngKinh": false,
		"DauSoiKinh": false,
		"Lamelle": false,
		"LamKinh": false,
		"HopDungTieuBan": false,
	},
	"CauTaoKHV": {
		"GioiThieu": false,
		"ThiKinh": false,
		"VatKinh": false,
		"MamVatKinh": false,
		"TieuXa": false,
		"NguonSang": false,
		"OcSoCap": false,
		"OcViCap": false,
		"ChanKinh": false,
		"BanMangVatMau": false,
		"OcChinhDoSang": false,
		"TuQuang": false,
		"OcDiChuyenTieuXa": false,
		"ThanKinh": false,
	},
	"HoatDongKHV": {
		"GioiThieu": false,
		"ChuanBiKinh": false,
		"YeuCauCamDien": false,
		"ThucHanhCamDien": false,
		"YeuCauBatCongTacDien": false,
		"ThucHanhBatCongTacDien": false,
		"DuongDiCuaAnhSang": false,
		"GioiThieuBuoc2": false,
		"YeuCauDatTieuBanVaoKinh": false,
		"ThucHanhMoHopTieuBan": false,
		"ThucHanhLuaChonTieuBan": false,
		"YeuCauNhinVaoThiKinh": false,
		"ThucHanhMoKHV": false,
		"ViDuDieuChinhAnhSang": false,
		"AnhSangDiQuaKhongDu": false,
		"YeuCauDieuChinhAnhSangManh": false,
		"KhongNenDieuChinhAnhSangManh": false,
		"ThucHanhDieuChinhAnhSang": false,
		"GioiThieuBuoc3": false,
		"DoPhongDai": false,
		"CachTinhDoPhongDai": false,
		"DoPhongDaiCua4X": false,
		"LuyenTapLayNetHienVi": false,
		"LuyenTapLayNetHienVi2": false,
		"YeuCauThucHanhDieuChinhHienVi": false,
		"GioiThieuThucHanhVoiVatKinh100X": false,
		"ThucHanhNhoDau": false,
		"ThucHanhDieuChinhVatKinh100X": false,
		"KetThuc": false
	},
	"ThucHanh": {
		"ThucHanh": false,
	},
	"KiemTra": {
		"ChinhXac": false,
	},
}

var final: Dictionary = {
	"VatLieuHoaChat": false,
	"CauTaoKHV": false,
	"HoatDongKHV": false,
	"ThucHanh": false,
	"KiemTra": false,
}

func _ready():
#	cheatScoreVatLieuVaHoaChat()
#	cheatScoreCauTaoKHV()
#	cheatScoreHuongDanThucHanh()
	pass

func cheatScoreVatLieuVaHoaChat():
	var profile1 = profile[ID_FRAME_3]
	profile1["GioiThieu"] = true
	profile1["GiayLauOngKinh"] = true
	profile1["DauSoiKinh"] = true
	profile1["Lamelle"] = true
	profile1["LamKinh"] = true
	profile1["HopDungTieuBan"] = false

func cheatScoreCauTaoKHV():
	var profile2 = profile[ID_FRAME_4]
	profile2["GioiThieu"] = true
	profile2["ThiKinh"] = true
	profile2["VatKinh"] = true
	profile2["MamVatKinh"] = true
	profile2["TieuXa"] = true
	profile2["NguonSang"] = true
	profile2["OcSoCap"] = true
	profile2["OcViCap"] = true
	profile2["ChanKinh"] = true
	profile2["BanMangVatMau"] = true
	profile2["OcChinhDoSang"] = true
	profile2["TuQuang"] = true
	profile2["OcDiChuyenTieuXa"] = true
	profile2["ThanKinh"] = false

func cheatScoreHuongDanThucHanh():
	var profile3 = profile[ID_FRAME_5]
	profile3["GioiThieu"] = true
	profile3["ChuanBiKinh"] = true
	profile3["YeuCauCamDien"] = true
	profile3["ThucHanhCamDien"] = true
	profile3["YeuCauBatCongTacDien"] = true
	profile3["ThucHanhBatCongTacDien"] = true
	profile3["DuongDiCuaAnhSang"] = true
	profile3["GioiThieuBuoc2"] = true
	profile3["YeuCauDatTieuBanVaoKinh"] = true
	profile3["ThucHanhMoHopTieuBan"] = true
	profile3["ThucHanhLuaChonTieuBan"] = true
	profile3["YeuCauNhinVaoThiKinh"] = true
	profile3["ThucHanhMoKHV"] = true
	profile3["ViDuDieuChinhAnhSang"] = true
	profile3["AnhSangDiQuaKhongDu"] = true
	profile3["YeuCauDieuChinhAnhSangManh"] = true
	profile3["KhongNenDieuChinhAnhSangManh"] = true
	profile3["ThucHanhDieuChinhAnhSang"] = true
	profile3["GioiThieuBuoc3"] = true
	profile3["DoPhongDai"] = true
	profile3["CachTinhDoPhongDai"] = true
	profile3["DoPhongDaiCua4X"] = true
	profile3["LuyenTapLayNetHienVi"] = true
	profile3["LuyenTapLayNetHienVi2"] = true
	profile3["YeuCauThucHanhDieuChinhHienVi"] = true
	profile3["GioiThieuThucHanhVoiVatKinh100X"] = true
	profile3["ThucHanhNhoDau"] = true
	profile3["ThucHanhDieuChinhVatKinh100X"] = true
	profile3["KetThuc"] = true
