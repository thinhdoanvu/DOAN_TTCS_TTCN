extends Node2D

onready var httpRequest = $HTTPRequest
onready var audioStream = $AudioStreamPlayer
onready var buttonPlay = $Button

func _ready():
	httpRequest.request("https://sound-effects-media.bbcrewind.co.uk/mp3/07064020.mp3")
	buttonPlay.disabled = true
	pass

func _on_HTTPRequest_request_completed(result, response_code, headers, body):
	if response_code == 200:
		var newstream = AudioStreamMP3.new()
		newstream.loop = true
		newstream.data = PoolByteArray(body)
		audioStream.stream = newstream
		buttonPlay.disabled = false
		pass

func _on_Button_button_down():
	audioStream.play()
