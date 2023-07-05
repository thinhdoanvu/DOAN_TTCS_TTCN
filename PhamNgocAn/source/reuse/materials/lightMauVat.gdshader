shader_type canvas_item;

uniform float light_adjust: hint_range(-0.5,0.5,0.01);

void fragment(){
	COLOR = texture(TEXTURE, UV);
	if(light_adjust > 0.0){
		COLOR.rgb = mix(COLOR.rgb, vec3(1.0,1.0,1.0), light_adjust);
	} else {
		COLOR.rgb = mix(COLOR.rgb, vec3(0.0,0.0,0.0), abs(light_adjust));
	}
}