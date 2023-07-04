extends Control

onready var textTure = $TextureRect
onready var httpRequest = $HTTPRequest

func _ready():
	var url = "http://localhost:8080/api/images/couseFSoft-Page-1.drawio.png"
	var token = "eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1c2VyMSIsImlhdCI6MTY4MDc3MTA2NiwiZXhwIjoxNjgwNzcyNTA2fQ.DUKBsHbnicQQvm81_7Zuvuc7RS3EZRiEZ3UOh0gAEZs"
	var header = [
		"Authorization: Bearer " + token,
	]
	httpRequest.request(url, header)
	pass

func _on_HTTPRequest_request_completed(result, response_code, headers, body):
	if response_code == 200:
		var image = Image.new()
		var texture = ImageTexture.new()
		image.load_png_from_buffer(body)
		texture.create_from_image(image)
		textTure.texture = texture
