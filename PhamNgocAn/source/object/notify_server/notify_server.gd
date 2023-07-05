extends Control

const TYPE_DEFAULT = "SUCCESS"
const STR_NOTIFY = "This is a notification"
const STICKY_DEFAULT = false

onready var _toastContainer = $ToastContainer

#func _ready():
#	fire("SUCCESS", "Success")
#	fire("INFO", "Info")
#	fire("WARNING", "Warning")
#	fire("DANGER", "Danger")
#	pass

#	type: {SUCCESS, INFO, WARNING, DANGER}
func fire(type: String = TYPE_DEFAULT, notify: String = STR_NOTIFY, sticky: bool = STICKY_DEFAULT):
	var toast = load("res://object/notify_server/toast/toast.tscn").instance()
	if toast:
		_toastContainer.add_child(toast)
		if toast.has_method("setSticky"):
			toast.call("setSticky", sticky)
		if toast.has_method("createToast"):
			toast.call("createToast", type, notify)
	else:
		print("Error: not instance toast")
