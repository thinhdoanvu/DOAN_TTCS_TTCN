extends Label

export(int, "Bottom", "Center", "Top") var pos = 0
# Cho phép Alert được hiển thị trên màn hình
export(bool) var sticker = false

onready var _timer = $Timer

func _ready():
	self.visible = sticker
	match pos:
		0:
			bottomAlert()
		1:
			centerAlert()
		2:
			topAlert()

func setText(s: String):
	self.text = s

func setSticker(value: bool):
	sticker = value
	self.visible = sticker

func showAlert(t: float = 1.0):
	if not sticker:
		self.visible = true
		_timer.wait_time = t
		_timer.start()

func bottomAlert():
	anchor_left = 0.5
	anchor_top = 1.0
	anchor_right = 0.5
	anchor_bottom = 1.0
	margin_left = -600.0
	margin_top = -60.0
	margin_right = 600.0
	margin_bottom = 0

func centerAlert():
	anchor_left = 0.5
	anchor_top = 0.5
	anchor_right = 0.5
	anchor_bottom = 0.5
	margin_left = -600.0
	margin_top = -30.0
	margin_right = 600.0
	margin_bottom = 30.0

func topAlert():
	anchor_left = 0.5
	anchor_top = 0
	anchor_right = 0.5
	anchor_bottom = 0
	margin_left = -600.0
	margin_top = 0
	margin_right = 600.0
	margin_bottom = 60.0


func _on_Timer_timeout():
	self.visible = false
