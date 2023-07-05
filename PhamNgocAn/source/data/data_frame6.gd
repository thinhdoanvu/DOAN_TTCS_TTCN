extends Node

const CONFIG_SCOPE = [
	{
		# Máu Người
		"name": "Máu người",
		"icon": "res://asset/sprite2D/sample/mau_nguoi/Icon.png",
		"X4": {
			"socap": 0.6,
			"vicap": 0.7,
			"path": "res://asset/sprite2D/sample/mau_nguoi/4x.jpg"
		},
		"X10": {
			"socap": 0.7,
			"vicap": 0.6,
			"path": "res://asset/sprite2D/sample/mau_nguoi/10x.jpg"
		},
		"X40": {
			"socap": 0.5,
			"vicap": 0.8,
			"path": "res://asset/sprite2D/sample/mau_nguoi/40x.jpg"
		},
		"X100": {
			"socap": 0.4,
			"vicap": 0.9,
			"path": "res://asset/sprite2D/sample/mau_nguoi/100x.jpg"
		}
	},
	{
		# Khí khổng
		"name": "Khí khổng",
		"icon": "res://asset/sprite2D/sample/khi_khong/Icon.png",
		"X4": {
			"socap": 0.3,
			"vicap": 0.7,
			"path": "res://asset/sprite2D/sample/khi_khong/4x.jpg"
		},
		"X10": {
			"socap": 0.6,
			"vicap": 0.4,
			"path": "res://asset/sprite2D/sample/khi_khong/10x.jpg"
		},
		"X40": {
			"socap": 0.3,
			"vicap": 0.7,
			"path": "res://asset/sprite2D/sample/khi_khong/40x.jpg"
		},
		"X100": {
			"socap": 0.8,
			"vicap": 0.9,
			"path": "res://asset/sprite2D/sample/khi_khong/100x.jpg"
		}
	},
	{
		# Khoang miệng
		"name": "Khoang miệng",
		"icon": "res://asset/sprite2D/sample/khoang_mieng/Icon.png",
		"X4": {
			"socap": 0.5,
			"vicap": 0.2,
			"path": "res://asset/sprite2D/sample/khoang_mieng/4x.png"
		},
		"X10": {
			"socap": 0.3,
			"vicap": 0.6,
			"path": "res://asset/sprite2D/sample/khoang_mieng/10x.png"
		},
		"X40": {
			"socap": 0.6,
			"vicap": 0.7,
			"path": "res://asset/sprite2D/sample/khoang_mieng/40x.png"
		},
		"X100": {
			"socap": 0.8,
			"vicap": 0.9,
			"path": "res://asset/sprite2D/sample/khoang_mieng/100x.png"
		}
	},
]

const DATA_TUTORIAL = [
	{
		"title": "Bước 1",
		"sub": null,
		"content": """+ Bước 9: Di chuyển nhẹ các nút để
		 thay đổi vị trí hiển thị của làm kính
		+ Bước 10: Thực hiện ghi chú
		""",
		"image": "res://asset/sprite2D/UI/slide/cach_nho_dau.png",
		"voice": null,
	},
	{
		"title": "Bước 2",
		"sub": null,
		"content": null,
		"image": "res://asset/sprite2D/UI/slide/cach_nho_dau.png",
		"voice": null,
	},
	{
		"title": "Bước 3",
		"sub": null,
		"content": "Bước 3",
		"image": null,
		"voice": null,
	}
]
