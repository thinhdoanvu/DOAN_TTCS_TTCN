extends Node

onready var loading_scene = preload("res://scene/loading/frame_loading.tscn")

func load_scene(current_scene, next_scene):
	# Thêm màn hình loading vào gốc của cây scene
	var loading_scene_instance = loading_scene.instance()
	get_tree().get_root().call_deferred("add_child", loading_scene_instance)

	# Tìm scene cần tải
	var loader = ResourceLoader.load_interactive(next_scene)

	if loader == null:
		# Xử lý lỗi
		print("Đã xảy ra lỗi khi lấy scene")
		return

	current_scene.queue_free()
	# Tạo độ trễ nhỏ để màn hình loading hiển thị.
	yield(get_tree().create_timer(1.0),"timeout")

	# Tải next_scene sử dụng hàm poll()
	# Vì hàm poll() tải dữ liệu theo từng phần nên chúng ta cần đặt trong vòng lặp
	while true:
		var error = loader.poll()
		# Khi nhận được một phần dữ liệu
		if error == OK:
			# Cập nhật thanh tiến trình theo lượng dữ liệu đã tải
			var progress_bar = loading_scene_instance.get_node("ProgressBar")
			progress_bar.value = float(loader.get_stage())/loader.get_stage_count() * 100
			yield(get_tree().create_timer(0.01),"timeout")
			pass
		# Khi tất cả dữ liệu đã được tải
		elif error == ERR_FILE_EOF:
			# Tạo instance scene từ dữ liệu đã tải
			var scene = loader.get_resource().instance()
			# Thêm scene vào gốc của cây scene
			get_tree().get_root().call_deferred("add_child", scene)
			# Loại bỏ màn hình loading
			loading_scene_instance.queue_free()
			return
		else:
			# Xử lý lỗi
			print("Đã xảy ra lỗi khi tải từng phần dữ liệu")
			return
