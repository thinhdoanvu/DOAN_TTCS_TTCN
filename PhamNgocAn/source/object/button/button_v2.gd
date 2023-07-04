extends Control

export(AudioStream) var hover_sound
var hover_audio_stream_player = null

func _ready():
	if hover_sound:
		hover_audio_stream_player = AudioStreamPlayer.new()
		self.add_child(hover_audio_stream_player)
		hover_audio_stream_player.stream = hover_sound

func hover_audio_play():
	if hover_audio_stream_player:
		hover_audio_stream_player.play()

func hover_entered():
	hover_audio_play()
	modulate.a = 1

func hover_exited():
	modulate.a = 0.7
