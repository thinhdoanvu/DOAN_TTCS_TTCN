shader_type canvas_item;

uniform float alpha: hint_range(0,1,0.1);

void fragment(){
	COLOR = vec4(0,0,0,alpha);
}