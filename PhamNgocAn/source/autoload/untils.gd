extends Node

func snakeCaseToCamelCase(value: String) -> String:
	value = value.capitalize()
	return value.replace("_", "").replace(" ", "")

func camelCaseToSnakeCase(camel_string: String) -> String:
	var snake_string = ""
	var prev_char_is_upper = false
	var curr_char: String

	for i in range(camel_string.length()):
		curr_char = camel_string.substr(i, 1)

		if curr_char == curr_char.to_upper():
			if prev_char_is_upper and i > 0:
				snake_string += "_"
			prev_char_is_upper = true
		else:
			prev_char_is_upper = false

		snake_string += curr_char.to_upper()

	return snake_string
