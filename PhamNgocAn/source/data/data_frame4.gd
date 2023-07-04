extends Node

const DATA_DIALOG = [
	{
		"id": "GioiThieu",
		"title": "Giới thiệu",
		"sub": null,
		"content": "Trong bài học này, chúng ta sẽ đi sâu vào các thành phần và cấu trúc của kính hiển vi quang học. Chúng ta sẽ hiểu rõ hơn về chức năng của các bộ phận kính hiển vi, giúp việc sử dụng kính hiển vi sẽ trở nên dễ dàng và nhanh chóng.",
		"image": null,
		"voice": "res://asset/sounds/frame4/voice_GioiThieu_frame4.mp3",
	},
	{
		"id": "BanMangVatMau",
		"title": "Bàn kính/Bàn mang vật mẫu",
		"sub": null,
		"content": "Bàn kính/bàn mang vật mẫu được sử dụng để cố định vật mẫu. Với bàn kính, người dùng có thể dễ dàng di chuyển và xoay vật mẫu để có được góc nhìn tốt nhất cho quá trình quan sát và nghiên cứu.",
		"image": null,
		"voice": "res://asset/sounds/frame4/voice_BanMangVatMau_frame4.mp3",
	},
	{
		"id": "ChanKinh",
		"title": "Chân kính/Đế kính",
		"sub": null,
		"content": "Chân kính/Đế kính được làm bằng kim khí nặng, giúp giữ vững các phần trên của kính hiển vi trong khi sử dụng.",
		"image": null,
		"voice": "res://asset/sounds/frame4/voice_ChanKinh_frame4.mp3",
	},
	{
		"id": "NguonSang",
		"title": "Nguồn sáng",
		"sub": null,
		"content": "Nguồn sáng của kính hiển vi quang học thường được cung cấp bằng đèn Led hoặc đèn Halogen. Người sử dụng có thể dễ dàng điều chỉnh độ sáng của đèn bằng nút chỉnh độ sáng.",
		"image": null,
		"voice": "res://asset/sounds/frame4/voice_NguonSang_frame4.mp3",
	},
	{
		"id": "MamVatKinh",
		"title": "Mâm vật kính",
		"sub": "(đĩa mang vật kính)",
		"content": "Mâm vật kính được thiết kế dưới dạng đĩa gắn các vật kính. Mâm có thể xoay để thay đổi vị trí các vật kính, giúp người sử dụng dễ dàng điều chỉnh và lựa chọn độ phóng đại phù hợp với nhu cầu quan sát.",
		"image": null,
		"voice": "res://asset/sounds/frame4/voice_MamVatKinh_frame4.mp3",
	},
	{
		"id": "OcSoCap",
		"title": "Nút chỉnh thô/Ốc sơ cấp",
		"sub": null,
		"content": "Nút chỉnh thô/Ốc sơ cấp được sử dụng để thay đổi khoảng cách giữa tiêu bản mẫu vật và vật kính với độ chính xác thấp hơn, thường được sử dụng để thực hiện việc điều chỉnh ban đầu trước khi sử dụng ốc chỉnh tinh/ốc vi cấp để điều chỉnh vị trí chi tiết hơn.",
		"image": null,
		"voice": "res://asset/sounds/frame4/voice_OcChinhTho_frame4.mp3",
	},
	{
		"id": "OcViCap",
		"title": "Nút chỉnh tinh/Ốc vi cấp",
		"sub": null,
		"content": "Nút chỉnh tinh/Ốc vi cấp được sử dụng để điều chỉnh khoảng cách giữa tiêu bản mẫu vật và vật kính với độ chính xác rất cao. Giúp người sử dụng có thể điều chỉnh khoảng cách một cách dễ dàng và chính xác để đạt được độ phóng đại tốt nhất.",
		"image": null,
		"voice": "res://asset/sounds/frame4/voice_OcChinhTinh_frame4.mp3",
	},
	{
		"id": "OcChinhDoSang",
		"title": "Công tắc bật nguồn sáng",
		"sub": null,
		"content": "Công tắc bật nguồn sáng có vị trí và thiết kế có thể khác nhau tùy vào từng loại kính hiển vi. Ngoài ra, công tắc còn có thể được kết hợp với núm điều chỉnh lượng ánh sáng để tăng giảm độ sáng phù hợp với yêu cầu quan sát.",
		"image": null,
		"voice": "res://asset/sounds/frame4/voice_OcChinhDoSang_frame4.mp3",
	},
	{
		"id": "OcDiChuyenTieuXa",
		"title": "Ốc chỉnh bàn kính",
		"sub": null,
		"content": "Ốc chỉnh bàn kính được sử dụng để điều chỉnh vị trí của bàn kính, giúp người sử dụng dễ dàng điều chỉnh sang trái, sang phải, lên trên hoặc xuống dưới, lên trước hoặc lùi ra sau.",
		"image": null,
		"voice": "res://asset/sounds/frame4/voice_OcChinhBanKinh_frame4.mp3"
	},
	{
		"id": "ThanKinh",
		"title": "Tay nắm/Thân kính",
		"sub": null,
		"content": "Tay nắm/thân kính là bộ phận được làm bằng kim khí nặng, được sử dụng để di chuyển kính một cách dễ dàng và an toàn.",
		"image": null,
		"voice": "res://asset/sounds/frame4/voice_ThanKinh_frame4.mp3",
	},
	{
		"id": "ThiKinh",
		"title": "Thị kính",
		"sub": "(Ocular lens)",
		"content": "Thị kính là một trong những bộ phận quan trọng của kính hiển vi, thường được trang bị một thấu kính với độ phóng đại khoảng 10x. Thị kính là nơi mà người sử dụng sẽ đặt mắt để quan sát mẫu vật.",
		"image": null,
		"voice": "res://asset/sounds/frame4/voice_ThiKinh_frame4.mp3",
	},
	{
		"id": "TieuXa",
		"title": "Kẹp giữ mẫu/kẹp giữ lam kính",
		"sub": null,
		"content": "Kẹp giữ mẫu/kẹp giữ lam kính là một bộ phận quan trọng trong kính hiển vi, giúp giữ tiêu bản cố định trên bàn để mẫu. Đảm bảo sự ổn định của tiêu bản trong quá trình quan sát và cho phép người sử dụng dễ dàng di chuyển mẫu hoặc lam kính để quan sát các vùng khác nhau trên tiêu bản.",
		"image": null,
		"voice": "res://asset/sounds/frame4/voice_KepGiuTieuBan_frame4.mp3",
	},
	{
		"id": "TuQuang",
		"title": "Màn chắn sáng và thấu kính hội tụ",
		"sub": null,
		"content": "Màn chắn giúp điều chỉnh tăng hoặc giảm lượng ánh sáng đến tiêu bản; Thấu kính hội tụ giúp tập trung ánh sáng vào tiêu bản, nâng cao độ sắc nét và độ phân giải hình ảnh.",
		"image": null,
		"voice": "res://asset/sounds/frame4/voice_ManChanSang_ThauKinhHoiTu_frame4.mp3",
	},
	{
		"id": "VatKinh",
		"title": "Vật kính",
		"sub": "(Objective lens)",
		"content": "Vật kính là kính tiếp xúc với mẫu vật hoặc tiêu bản. Các loại vật kính có độ phóng đại khác nhau, thường là 4x, 10x, 40x và 100x, và được sử dụng tùy thuộc vào mục đích và loại mẫu vật cần quan sát.",
		"image": null,
		"voice": "res://asset/sounds/frame4/voice_VatKinh_frame4.mp3",
	},
	{
		"id": "KetThuc",
		"title":"Chúc mừng bạn đã hoàn thành",
		"sub": null,
		"content": "Chúc mừng bạn đã hoàn thành bài học tìm hiểu cấu tạo và hoạt động của kính hiển vi. Hãy trở về menu chính để đến với bài học tiếp theo.",
		"image": null,
		"voice": "res://asset/sounds/frame4/voice_KetThuc_frame4.mp3"
	},
]