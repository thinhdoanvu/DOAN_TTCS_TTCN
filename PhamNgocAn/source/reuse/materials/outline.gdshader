shader_type canvas_item;

uniform float width : hint_range(0.0, 30.0);
uniform vec4 outline_color : hint_color; 
vec4 OutLine(sampler2D _texture_OutLine, vec2 _uv_OutLine, float _width_OutLine, vec4 _color_OutLine){
	float size = _width_OutLine * 1.0 / float(textureSize(_texture_OutLine, 0).x);
	vec4 sprite_color = texture(_texture_OutLine, _uv_OutLine);
	float alpha_1 = sprite_color.a;
	alpha_1 = 1.0 - alpha_1;
	float alpha = -8.0 * sprite_color.a;
	alpha += texture(_texture_OutLine, _uv_OutLine + vec2(size, 0.0)).a;
	alpha += texture(_texture_OutLine, _uv_OutLine + vec2(-size, 0.0)).a;
	alpha += texture(_texture_OutLine, _uv_OutLine + vec2(0.0, size)).a;
	alpha += texture(_texture_OutLine, _uv_OutLine + vec2(0.0, -size)).a;
	alpha += texture(_texture_OutLine, _uv_OutLine + vec2(size, size)).a;
	alpha += texture(_texture_OutLine, _uv_OutLine + vec2(-size, size)).a;
	alpha += texture(_texture_OutLine, _uv_OutLine + vec2(size, -size)).a;
	alpha += texture(_texture_OutLine, _uv_OutLine + vec2(-size, -size)).a;
	alpha = alpha * alpha_1;
	alpha = clamp(abs(alpha), 0.0, 1.0);
	vec4 final_color = mix(sprite_color, _color_OutLine, alpha);
	return vec4(final_color.rgb, alpha + sprite_color.a);
}

void fragment() {
	vec4 col = texture(TEXTURE, UV);
	if(col.rgb == vec3(0,0,0)) {
	    col.a = 0.0;
	}
	COLOR = col;
	COLOR = OutLine(TEXTURE, UV, width, outline_color);
}
