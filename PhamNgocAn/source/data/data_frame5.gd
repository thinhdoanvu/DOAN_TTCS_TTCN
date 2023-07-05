extends Node

const DATA_DIALOG = [
	{
		"id":"GioiThieu1",
		"title": "Thực hành quan sát vật mẫu bằng kính hiển vi",
		"sub": null,
		"content": "Trong bài hướng dẫn thực hành này, chúng ta sẽ tìm hiểu về cách quan sát mẫu vật dưới kính hiển vi. Các bước thực hiện và các kỹ năng để điều chỉnh và sử dụng kính hiển vi để đạt được hình ảnh tốt nhất.",
		"image": null,
		"voice": "res://asset/sounds/frame5/voice_GioiThieu1_frame5.mp3"
	},
	{
		"id":"GioiThieu2",
		"title": "Mục tiêu",
		"sub": null,
		"content": "Mục đích của bài hướng dẫn này là giúp các bạn hiểu rõ hơn về cách sử dụng kính hiển vi và tăng cường kỹ năng quan sát mẫu vật trong các nghiên cứu khoa học.",
		"image": null,
		"voice": "res://asset/sounds/frame5/voice_GioiThieu2_frame5.mp3"
	},
	{
		"id":"GioiThieu3",
		"title": "Bắt đầu nào!",
		"sub": null,
		"content": "Nào chúng ta hãy bắt đầu bài học nhé !",
		"image": null,
		"voice": "res://asset/sounds/frame5/voice_GioiThieu3_frame5.mp3"
	},
	{
#		BUOC 1. CHUAN BI KINH
		"id":"ChuanBiKinh",
		"title": "Bước 1. Chuẩn bị kính",
		"sub": null,
		"content": "Trong quá trình sử dụng kính hiển vi, việc chuẩn bị kính và môi trường quan sát là điều rất quan trọng. Bạn cần đặt nó ở một nơi vừa tầm quan sát, vừa đủ sáng và gần nguồn cấp điện để đảm bảo hoạt động tốt.",
		"image": null,
		"voice": "res://asset/sounds/frame5/voice_Buoc1_ChuanBiKinh_frame5.mp3"
	},
	{
#		DUONG DI CUA ANH SANG
		"id":"DuongDiCuaAnhSang",
		"title": "Đường truyền của ánh sáng",
		"sub": null,
		"content": "Sau khi cắm điện và bật công tắc. Ánh sáng sẽ truyền từ đèn, đến thấu kính hội tụ, đến mẫu vật, đến các vật kính, gương nằm bên trong thân kính, thị kính và cuối cùng là mắt người quan sát.",
		"image": "res://asset/sprite2D/UI/slide/duong_di_cua_anh_sang.png",
		"voice": "res://asset/sounds/frame5/voice_DuongTruyenCuaAnhSang_frame5.mp3"
	},
	{
#		BUOC 2. DIEU CHINH ANH SANG
		"id":"GioiThieuBuoc2",
		"title": "Bước 2. Điều chỉnh ánh sáng",
		"sub": null,
		"content": "Đặt tiêu bản lên bàn kính sao cho vật mẫu nằm ở trung tâm, dùng kẹp để giữ tiêu bản.",
		"image": null,
		"voice": "res://asset/sounds/frame5/voice_Buoc2_GioiThieuBuoc2_frame5.mp3"
	},
	{
#		Check kỹ audio -> khác ID
#		BUOC 2. DIEU CHINH ANH SANG
		"id":"ViDuDieuChinhAnhSang",
		"title": "Ví dụ minh họa về ánh sáng đi qua vật mẫu",
		"sub": null,
		"content": "Ánh sáng đúng cường độ và đồng đều là yếu tố quan trọng để đạt được hình ảnh rõ ràng và chi tiết khi sử dụng kính hiển vi.",
		"image": "res://asset/sprite2D/UI/slide/luong_anh_sang_di_qua_tieu_ban_3.png",
		"voice": "res://asset/sounds/frame5/voice_ViDuDieuChinhAnhSang2_frame5.mp3"
	},
	{
		"id":"ViDuDieuChinhAnhSang2",
		"title": "Ví dụ minh họa về ánh sáng đi qua vật mẫu",
		"sub": null,
		"content": "Điều chỉnh ánh sáng phù hợp giúp loại bỏ các hiện tượng như bóng đen, hiện tượng chiếu sáng không đều hay mờ điểm hình, từ đó tăng cường chất lượng hình ảnh quan sát được.",
		"image": "res://asset/sprite2D/UI/slide/luong_anh_sang_di_qua_tieu_ban_3.png",
		"voice": "res://asset/sounds/frame5/voice_ViDuDieuChinhAnhSang3_frame5.mp3"
	},
	{
		"id":"ViDuDieuChinhAnhSang3",
		"title": "Ví dụ minh họa về ánh sáng đi qua vật mẫu",
		"sub": null,
		"content": "Lượng ánh sáng xuyên qua mẫu được điều chỉnh thông qua núm điều chỉnh ánh sáng và màn ngăn ánh sáng.",
		"image": "res://asset/sprite2D/UI/slide/luong_anh_sang_di_qua_tieu_ban_3.png",
		"voice": "res://asset/sounds/frame5/voice_ViDuDieuChinhAnhSang_frame5.mp3"
	},
	{
		"id":"KhongNenDieuChinhAnhSangManh",
		"title": "Không nên điều chỉnh ánh sáng mạnh",
		"sub": null,
		"content": "Nếu chúng ta điều chỉnh ánh sáng quá mạnh, có thể gây mỏi mắt và làm biến mất một số chi tiết quan trọng.",
		"image": null,
		"voice": "res://asset/sounds/frame5/voice_KhongNenDieuChinhAnhSangQuaManh_frame5.mp3"
	},
	{
		"id":"YeuCauThucHienBaiKiemTraDoSang",
		"title": "Không nên điều chỉnh ánh sáng mạnh",
		"sub": null,
		"content": "Với ví dụ sai vừa rồi, chúng ta đã thấy rõ tầm quan trọng của việc điều chỉnh ánh sáng khi sử dụng kính hiển vi. Hãy tự điều chỉnh lại ánh sáng cho phù hợp nhất và nhấn vào nút \"Kiểm tra\" để đánh giá độ sáng nhé !!!",
		"image": null,
		"voice": "res://asset/sounds/frame5/voice_YeuCauThucHienBaiKiemTraDoSang_frame5.mp3"
	},
	{
		"id":"GioiThieuBuoc3",
		"title": "Bước 3: Quan sát vật mẫu.",
		"sub": null,
		"content": "Sau khi đã chuẩn bị kính hiển vi và điều chỉnh ánh sáng, chúng ta sẽ tiến hành quan sát vật mẫu.",
		"image": null,
		"voice": "res://asset/sounds/frame5/voice_GioiThieuBuoc3_frame5.mp3"
	},
	{
		"id":"TimHieuCachTinhDoPhongDai",
		"title": "Tìm hiểu cách tính độ phóng đại của vật mẫu",
		"sub": null,
		"content": "Trước tiên chúng ta hãy cùng nhau tìm hiểu cách tính độ phóng đại của vật mẫu nhé!",
		"image": null,
		"voice": "res://asset/sounds/frame5/voice_TimHieuCachTinhDoPhongDai_frame5.mp3"
	},
	{
		"id":"DoPhongDai",
		"title": "Độ phóng đại là gì?",
		"sub": null,
		"content": "Kính hiển vi tạo ra hình ảnh phóng đại của vật mẫu, cho phép chúng ta quan sát chi tiết nhỏ hơn so với mắt thường. Độ phóng đại thể hiện sự tăng kích thước của hình ảnh so với kích thước thực của mẫu.",
		"image": null,
		"voice": "res://asset/sounds/frame5/voice_DoPhongDai_frame5.mp3"
	},
	{
		"id":"DoPhongDaiCua4X",
		"title": "Cách tính độ phóng đại thực tế ?",
		"sub": null,
		"content": "Trong ví dụ này, độ phóng đại của vật kính là 4x, độ phóng đại của thị kính thường là 10x. Như vậy chúng ta sẽ có độ phóng đại ảnh của vật là: 4 x 10 = 40x.",
		"image": null,
		"voice": "res://asset/sounds/frame5/voice_DoPhongDaiCua4x_frame5.mp3"
	},
	{
		"id":"DoPhongDaiCuaVatKinhKhac",
		"title": "Cách tính độ phóng đại thực tế ?",
		"sub": null,
		"content": "Khi chuyển sang vật kính 10x và 40x, độ phóng đại ảnh của vật lần lượt là 10 x 10 = 100 lần và 40 x 10 = 400 lần. Tương tự với vật kính 100x là 1000 lần.",
		"image": null,
		"voice": "res://asset/sounds/frame5/voice_DoPhongDaiCuaVatKinhKhac_frame5.mp3"
	},
	{
		"id":"LuyenTapLayNetHienVi",
		"title": "Luyện tập lấy nét hiển vi",
		"sub": null,
		"content": "Luyện tập lấy nét hiển vi: vặn sơ cấp để chỉnh thô và vi cấp để chỉnh tinh.",
		"image": null,
		"voice": "res://asset/sounds/frame5/voice_LuyenTapLayNetHienVi_frame5.mp3"
	},
	{
		"id":"LuyenTapLayNetHienVi1",
		"title": "Thực hiện với vật kính 4x và nút sơ cấp",
		"sub": null,
		"content": "Chú ý: Khi quan sát ảnh hiển vi, chúng ta nên bắt đầu với nút chỉnh thô trước để có thể quan sát và bắt được ảnh một cách nhanh nhất. Và chúng ta cũng cần bắt đầu với vật kính thấp nhất. Trong ví dụ này là vật kính 4x.",
		"image": null,
		"voice": "res://asset/sounds/frame5/voice_LuyenTapLayNetHienVi1_frame5.mp3"
	},
	{
		"id":"LuyenTapLayNetHienVi2",
		"title": "Các bạn hay làm theo các bước sau nhé!",
		"sub": null,
		"content": "Đặt mắt vào thị kính và nhẹ nhàng xoay nút sơ cấp để chỉnh thô. Khi làm điều này, bàn mẫu sẽ di chuyển lên xuống.",
		"image": null,
		"voice": "res://asset/sounds/frame5/voice_LuyenTapLayNetHienVi2_frame5.mp3"
	},
	{
		"id":"LuyenTapLayNetHienVi3",
		"title": "Các bạn hay làm theo các bước sau nhé!",
		"sub": null,
		"content": "Khi đã thấy hình ảnh của mẫu qua thị kính, chuyển sang nhẹ nhàng xoay nút vi cấp từ từ và cẩn thận để điều chỉnh nét hình ảnh.",
		"image": null,
		"voice": "res://asset/sounds/frame5/voice_LuyenTapLayNetHienVi3_frame5.mp3"
	},
	{
		"id":"LuyenTapLayNetHienVi4",
		"title": "Các bạn hay làm theo các bước sau nhé!",
		"sub": null,
		"content": "Khi chuyển sang vật kính có độ phóng đại lớn hơn, đảm bảo rằng vùng quan sát nằm trong thị trường của kính. Thị trường là vòng sáng mà chúng ta nhìn thấy. Di chuyển mẫu vật để đưa vùng cần quan sát vào giữa thị trường.",
		"image": null,
		"voice": "res://asset/sounds/frame5/voice_LuyenTapLayNetHienVi4_frame5.mp3"
	},
	{
		"id":"LuyenTapLayNetHienVi5",
		"title": "Các bạn hay làm theo các bước sau nhé!",
		"sub": null,
		"content": "Lưu ý rằng khi điều chỉnh nút sơ cấp và nút vi cấp, cần thực hiện nhẹ nhàng và chậm rãi để đạt được kết quả tốt nhất và tránh làm mất đi khả năng quan sát.",
		"image": null,
		"voice": "res://asset/sounds/frame5/voice_LuyenTapLayNetHienVi5_frame5.mp3"
	},
	{
		"id":"GioiThieuThucHanhVoiVatKinh100X",
		"title": "Thực hành với vật kính 100X",
		"sub": null,
		"content": "Tiếp theo chúng ta cùng nhau tìm hiểu cách thực hành điều chỉnh hiển vi với vật kính 100X nhé!",
		"image": null,
		"voice": "res://asset/sounds/frame5/voice_GioiThieuThucHanhVoiVatKinh100X_frame5.mp3"
	},
	{
		"id":"GioiThieuThucHanhVoiVatKinh100X1",
		"title": "Đặc điểm của vật kính 100X",
		"sub": null,
		"content": "Trên thân của vật kính 100x có ghi chứ “oil”, có nghĩa là “dầu”. Vật kính này được sử dụng với một lượng nhỏ dầu soi kính nhỏ lên trên tiêu bản. Dầu giúp ngăn sự tán xạ của ánh sáng trước khi đi vào vật kính.",
		"image": "res://asset/sprite2D/UI/slide/slide_dau_soi_kinh.png",
		"voice": "res://asset/sounds/frame5/voice_GioiThieuThucHanhVoiVatKinh100X_1_frame5.mp3"
	},
	{
		"id":"GioiThieuThucHanhVoiVatKinh100X2",
		"title": "Cách nhỏ dầu soi kính",
		"sub": null,
		"content": "Trước khi chỉnh ảnh ở vật kính 100x. chúng ta cần chỉnh ảnh rõ nhất có thể ở vật kính 40x. Xoay mâm vật kính để mẫu nằm giữa vật kính 40x và 100x. Nhỏ 1 một giọt dầu soi kính vào tiêu bản và tránh để dầu dính vào các bộ phận khác của kính ngoài vật kính 100x và tiêu bản. ",
		"image": "res://asset/sprite2D/UI/slide/hinh_nho_dau_soi.jpg",
		"voice": "res://asset/sounds/frame5/voice_GioiThieuThucHanhVoiVatKinh100X_2_frame5.mp3"
	},
	{
		"id":"GioiThieuThucHanhVoiVatKinh100X3",
		"title": "Chú ý khi dùng vật kính 100X",
		"sub": null,
		"content": "Một khi đã sử dụng vật kính 100x, điều quan trọng cần nhớ là không quay trở lại vật kính 40x. vì dầu sẽ dính vào và làm hỏng vật kính 40x. Vật kính 100x là vật kính duy nhất được chế tạo để có thể sử dụng cùng dầu soi kính. ",
		"image": "res://asset/sprite2D/UI/slide/hinh_nho_dau_soi.jpg",
		"voice": "res://asset/sounds/frame5/voice_GioiThieuThucHanhVoiVatKinh100X_3_frame5.mp3"
	},
	{
		"id":"GioiThieuThucHanhVoiVatKinh100X4",
		"title": "Chú ý khi dùng vật kính 100X",
		"sub": null,
		"content": "Tại vật kính 100x, chỉ sử dụng nút vi cấp để chỉnh tinh. Vì vật kính dầu là vật kính dài nhất và chạm sát vào lam kính, nếu ta sử dụng nút sơ cấp chỉnh thô, có thể chà sát vật kính vào tiêu bản, và có thể làm hỏng tiêu bản hoặc vỡ lam kính hoặc làm hỏng hoặc vỡ vật kính.",
		"image": "res://asset/sprite2D/UI/slide/hinh_nho_dau_soi.jpg",
		"voice": "res://asset/sounds/frame5/voice_GioiThieuThucHanhVoiVatKinh100X_4_frame5.mp3"
	},
	{
		"id": "KetThuc",
		"title":"Chúc mừng bạn đã hoàn thành",
		"sub": null,
		"content": "Chúc mừng bạn đã hoàn thành bài học thực hành sử dụng kính hiển vi quang học.",
		"image": null,
		"voice": "res://asset/sounds/frame5/voice_KetThuc_frame5.mp3"
	},
]

const DATA_CHAT = [
	{
		"id":"YeuCauCamDien",
		"content": "Sau khi chuẩn bị xong hãy chắc chắn rằng bạn đã cắm điện cho kính nhé!",
		"voice": "res://asset/sounds/frame5/chat/chat_ThucHanhCamDien_frame5.mp3"
	},
	{
		"id":"YeuCauBatCongTacDien",
		"content": "Sau khi cấp điện cho kính hiển vi, bạn hãy bật công tắc đèn nhé!",
		"voice": "res://asset/sounds/frame5/chat/chat_YeuCauBatCongTacDen_frame5.mp3"
	},
	{
		"id":"YeuCauDatTieuBanVaoKinh",
		"content": "Hãy mở hộp đựng tiêu bản, sau đó hãy chọn một mẫu tiêu bản để đặt vào kính hiển vi.",
		"voice": "res://asset/sounds/frame5/chat/chat_YeuCauDatTieuBanVaoKinh_frame5.mp3"
	},
	{
		"id":"YeuCauNhinVaoThiKinh",
		"content": "Tiếp theo các bạn hãy đưa mắt nhìn vào thị kính.",
		"voice": "res://asset/sounds/frame5/chat/chat_DuaMatNhinVaoThiKinh_frame5.mp3"
	},
	{
		"id":"AnhSangDiQuaKhongDu",
		"content": "Hình ảnh nhận được có lượng ánh sáng đi qua không đủ nên bị tối và có bóng đen.",
		"voice": "res://asset/sounds/frame5/chat/chat_AnhSangDiQuaKhongDu_frame5.mp3"
	},
	{
		"id":"CachTinhDoPhongDai",
		"content": "Độ phóng đại ảnh của vật mà chúng ta nhận được vào mắt qua thị kính sẽ được tính bằng :",
		"voice": "res://asset/sounds/frame5/chat/chat_CachTinhDoPhongDai_frame5.mp3"
	},
	{
		"id":"CachTinhDoPhongDai1",
		"content": "\"Độ phóng đại ảnh của thị kính\" nhân cho \"độ phóng đại ảnh của vật kính\".",
		"voice": "res://asset/sounds/frame5/chat/chat_CachTinhDoPhongDai1_frame5.mp3"
	},
	{
		"id":"YeuCauThucHanhDieuChinhHienVi",
		"content": "Nào chúng ta hãy bắt đầu thực hành và Hãy nhớ rằng: sơ cấp -> vi cấp nhé.",
		"voice": "res://asset/sounds/frame5/chat/chat_YeuCauThucHanhDieuChinhHienVi_frame5.mp3"
	},
	{
		"id":"ThucHanhNhoDau",
		"content": "Đừng quên phải nhỏ dầu với vật kính 100X nhé.",
		"voice": "res://asset/sounds/frame5/chat/chat_ThucHanhNhoDau_frame5.mp3"
	},
	{
		"id":"ThucHanhDieuChinhVatKinh100X",
		"content": "Thực hiện điều chỉnh bằng nút sơ cấp và vi cấp. Nhớ nhấn kiểm tra để xem mình làm đúng chưa nhé!",
		"voice": "res://asset/sounds/frame5/chat/chat_ThucHanhDieuChinhVatKinh100X_frame5.mp3"
	},
	
]
