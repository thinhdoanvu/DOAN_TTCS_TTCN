@extends('adminshop.mastershop')
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Chỉnh sửa</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('adminshop.index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('adminshop.promotion.index') }}">Khuyến mãi</a>
                            </li>
                            <li class="breadcrumb-item active">Chỉnh sửa</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card">
                @if (session('msg'))
                    <div class="alert alert-success">{{ session('msg') }}</div>
                @endif

                <div class="card card-primary mb-0">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Chương trình khuyến mãi</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="form-group">
                                                    <label>Tên chương trình khuyến mãi</label>
                                                    <input type="text" class="form-control" name="name"
                                                        placeholder="Enter Name" value="{{ $result->name }}" required>
                                                </div>
                                                <div class="row">
                                                    <div class="col-7">
                                                        <div class="form-group">
                                                            <label>Loại chương trình khuyến mãi</label>
                                                            <select class="form-control" id="slct1"
                                                                name="type"></select>
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="form-group">
                                                            <label>Mức giảm</label>
                                                            <input type="text" class="form-control" id="slct1_1"
                                                                placeholder="% hoặc VNĐ" name="discount_rate"
                                                                value="{{ $result->discount_rate }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="date_start">Thời gian bắt đầu</label>
                                                    <div>
                                                        <input class="form-control" id="date_start" type="datetime-local"
                                                            name="date_start" value="{{ $result->date_start }}" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="date_end">Thời gian kết thúc</label>
                                                    <div>
                                                        <input class="form-control" id="date_end" type="datetime-local"
                                                            name="date_end" value="{{ $result->date_end }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col (left) -->
                            <div class="col-md-4">
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h3 class="card-title">Sản phẩm</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body-search">
                                        <div class="form-group-search">
                                            <input type="text" name="key"
                                                class="form-control float-right input-search-ajax" placeholder="Tìm kiếm">
                                            <div class="search-ajax-result" id="search_div" hidden="true"></div>
                                            <div id="badges">
                                                @foreach ($promotionproducts as $promotionproduct)
                                                    @if (in_array($promotionproduct->id, $option))
                                                        <span class="badge badge-primary mr-2"
                                                            data-id="{{ $promotionproduct->id }}">{{ $promotionproduct->name }}<input
                                                                type="hidden" name="promotionproduct[]"
                                                                value="{{ $promotionproduct->id }}"><span
                                                                class="close-button ml-1 remove-badge"
                                                                onclick="addRemoveBadgeClickListener()">X</span></span>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col (right) -->
                            <div class="card-footer">
                                <button type="submit" name="submit" id="submit-button"
                                    class="btn btn-primary submit-button">Lưu</button>
                                <a href="{{ route('adminshop.promotion.index') }}">
                                    <button type="button" class="btn btn-primary">Quay lại</button>
                                </a>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script>
        let types = ["Chọn loại chương trình khuyến mãi", "Giảm theo %", "Giảm theo số tiền", "Đồng giá"];
        var type_promotion = @json($result->type);
        var slct1 = document.getElementById("slct1");
        let slct1_1 = document.getElementById("slct1_1");

        types.forEach(function addTypes(item1) {
            let option = document.createElement("option");
            option.text = item1;
            option.value = item1;
            if (option.value == type_promotion) {
                option.setAttribute('selected', true);
            }
            slct1.appendChild(option);
        });

        slct1.onchange = function() {
            if (this.value == "Chọn loại chương trình khuyến mãi") {
                slct1_1.value = "";
                slct1_1.placeholder = "% hoặc VNĐ";
                slct1_1.disabled = true;
            }
            if (this.value == "Giảm theo %") {
                slct1_1.disabled = false;
                slct1_1.value = "";
                slct1_1.placeholder = "%";
                slct1_1.min = 0;
                slct1_1.max = 100;
            }
            if (this.value == "Giảm theo số tiền") {
                slct1_1.disabled = false;
                slct1_1.value = "";
                slct1_1.placeholder = "đ";
                slct1_1.min = 1000;
            }
            if (this.value == "Đồng giá") {
                slct1_1.disabled = false;
                slct1_1.value = "";
                slct1_1.placeholder = "đ";
                slct1_1.min = 1000;
            }
        }

        $('.input-search-ajax').keyup(function() {
            var _text = $(this).val();
            document.getElementById("search_div").removeAttribute("hidden");
            $.ajax({
                url: 'http://127.0.0.1:8000/api/ajax-search-product?key=' + _text,
                type: 'GET',
                success: function(res) {
                    var _html = '';

                    for (var pro of res) {
                        _html += '<div class="menu-item">';
                        _html += '  <img width="50" src="' + pro.image_path + '" alt="' + pro
                            .image_name + '">';
                        _html += '  <a id="link" href="#" data-id="' + pro.id + '">' + pro.name +
                            '</a>';
                        _html += '</div>';
                    }

                    $('.search-ajax-result').html(_html)

                    var links = document.querySelectorAll("#link");

                    for (var i = 0; i < links.length; i++) {
                        var link = links[i];

                        link.addEventListener("click", function(event) {
                            event.preventDefault(); // Ngăn chặn attribute href

                            var linkId = this.getAttribute("data-id");
                            var linkText = this.innerHTML;

                            initBadge(linkId, linkText);
                            addRemoveBadgeClickListener()
                        });
                    }
                }
            });
        })

        function initBadge(id, name) {
            var badge = document.createElement("span");
            var existingBadge = document.querySelector("span[data-id='" + id + "']");
            // Kiểm tra sự tồn tại của span
            if (existingBadge) {
                event.preventDefault();
                event.stopPropagation();
                return;
            }
            // Tạo badge
            badge.setAttribute("data-id", id);
            badge.innerHTML = name;
            badge.className = "badge badge-primary mr-2";

            var inputHidden = document.createElement("input");
            inputHidden.setAttribute("type", "hidden");
            inputHidden.setAttribute("name", "promotionproduct[]");
            inputHidden.setAttribute("value", id);

            // Tạo nút đóng
            var closeButton = document.createElement("span");
            closeButton.innerHTML = "X";
            closeButton.className = "close-button ml-1 remove-badge";

            // Hiển thị badge và nút đóng trong span
            badge.appendChild(inputHidden);
            badge.appendChild(closeButton);
            document.getElementById("badges").appendChild(badge);
        }

        // function addRemoveBadgeClickListener() {
        //     var removeButtons = document.querySelectorAll('.remove-badge');

        //     for (var i = 0; i < removeButtons.length; i++) {
        //         removeButtons[i].addEventListener('click', function() {
        //             var badge = this.parentNode;
        //             badge.parentNode.removeChild(badge);
        //         });
        //     }
        // }
        function addRemoveBadgeClickListener() {
            var removeButtons = document.querySelectorAll('.remove-badge');

            for (var i = 0; i < removeButtons.length; i++) {
                removeButtons[i].addEventListener('click', function() {
                    var badge = this.parentNode;
                    badge.parentNode.removeChild(badge);

                    var badgeId = badge.getAttribute("data-id");

                    // Gửi AJAX request để cập nhật giá trị trong Controller
                    $.ajax({
                        url: "/adminshop/promotions/updateDiscordNull",
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id_product: badgeId
                        },
                        success: function(response) {
                            // Xử lý thành công
                            console.log("Giá trị đã được cập nhật.");
                        },
                    });
                });
            }
        }
    </script>
@endsection
