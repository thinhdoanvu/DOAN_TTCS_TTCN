@extends('adminshop.mastershop')
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Hóa đơn</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('adminshop.index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Hóa đơn</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card">
                {{-- <div class="card-header">
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: auto">Tên người nhận</th>
                                <th style="width: auto">Số điện thoại người nhận</th>
                                <th style="width: auto">Địa chỉ nhận hàng</th>
                                <th style="width: auto">Ngày giao hàng</th>
                                <th style="width: auto">Tổng đơn hàng</th>
                                <th style="width: auto">Ngày được tạo</th>
                                <th style="width: auto">Tình trạng</th>
                                <th style="width: auto">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($invoices))
                                @foreach ($invoices as $invoice)
                                    <tr>
                                        <td>{{ $invoice->nameRecipient }}</td>
                                        <td>{{ $invoice->phoneRecipient }}</td>
                                        <td>{{ $invoice->deliveryAddress }}</td>
                                        <td>{{ $invoice->deliveryDate }}</td>
                                        <td>{{ number_format($invoice->total) }}đ</td>
                                        <td>{{ $invoice->created_at }}</td>
                                        <td style="text-align: center">
                                            <input type="hidden" id="active-input-{{ $invoice->id }}" name="active-input"
                                                value="{{ $invoice->invoiceStatus }}">
                                            <input type="button" id="active-button-{{ $invoice->id }}"
                                                data-id="{{ $invoice->id }}" class="toggle-active-btn" name="button_active"
                                                data-toggle="modal" data-target="#status-modal-{{ $invoice->id }}"
                                                value="@if ($invoice->invoiceStatus == 0) Đơn đã hủy @elseif($invoice->invoiceStatus == 1)Chờ xác nhận @elseif($invoice->invoiceStatus == 2)Đã xác nhận @else Đã thanh toán @endif"
                                                style="@if ($invoice->invoiceStatus == 0) background-color: #FF6A6A @elseif($invoice->invoiceStatus == 1)background-color: Yellow @elseif($invoice->invoiceStatus == 2)background-color: Skyblue @else background-color: Lime @endif">
                                            <div class="modal fade" id="status-modal-{{ $invoice->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="status-modal-label-{{ $invoice->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="status-modal-label-{{ $invoice->id }}">Chọn trạng thái</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <button class="status-option-btn" data-id="{{ $invoice->id }}"
                                                                data-value="0" style="background-color: #FF6A6A">Đơn đã hủy</button>
                                                            <button class="status-option-btn" data-id="{{ $invoice->id }}"
                                                                data-value="2" style="background-color: Skyblue">Đã xác nhận</button>
                                                            <button class="status-option-btn" data-id="{{ $invoice->id }}"
                                                                data-value="3" style="background-color: Lime">Đã thanh toán</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <abbr title="Xem chi tiết hóa đơn">
                                                    <a href="{{ route('adminshop.invoice.detail', $invoice->id) }}">
                                                        <button type="button" class="btn btn-default btn-sm mr-2">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                    </a>
                                                </abbr>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <td colspan="7">Không có đơn hàng</td>
                            @endif
                        </tbody>
                    </table>
                    <hr>
                    <div>
                        {{ $invoices->appends(request()->all())->links() }}
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    {{-- <script>
        var buttons = document.querySelectorAll(".toggle-active-btn");
        buttons.forEach(function(button) {
            button.addEventListener("click", function() {
                var id = this.getAttribute("data-id");
                var input = document.getElementById("active-input-" + id);
                var invoiceStatus = input.value;
                var invoiceStatus = input.value === "1" ? "0" : "1";
                input.value = input.value === "1" ? "0" : "1";

                document.querySelector('#status-modal-' + id).addEventListener('shown.bs.modal',function() {
                    var statusButtons = document.querySelectorAll('.status-option-btn');
                    statusButtons.forEach(function(statusButton) {
                        statusButton.addEventListener('click', function() {
                            var selectedValue = this.getAttribute('data-value');
                            var buttonText = this.textContent.trim();

                            $.ajax({
                                url: "/adminshop/invoices/",
                                method: "POST",
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    id_invoice: id,
                                    invoiceStatus: selectedValue,
                                },
                                success: function(response) {
                                    var button = document
                                        .getElementById(
                                            "active-button-" + id);
                                    button.style = "";
                                    button.value = buttonText;

                                    if (selectedValue === "0") {
                                        button.style.backgroundColor =
                                            "#FF6A6A";
                                    } else if (selectedValue === "2") {
                                        button.style.backgroundColor =
                                            "Skyblue";
                                    } else if (selectedValue === "3") {
                                        button.style.backgroundColor =
                                            "Lime";
                                    }

                                    if (input.value === "0") {
                                        button.style = "background-color: #FF6A6A";
                                        button.value = "Đơn đã hủy ";
                                    }
                                    if (input.value === "1") {
                                        button.style = "background-color: Yellow";
                                        button.value = "Chờ xác nhận ";
                                    }
                                    if (input.value === "2") {
                                        button.style = "background-color: Skyblue";
                                        button.value = "Đã xác nhận ";
                                    }
                                    if (input.value === "3") {
                                        button.style = "background-color: Lime";
                                        button.value = " Đã thanh toán ";
                                    }
                                },
                            });
                        });
                    });
                });
                document.querySelector('#status-modal-' + id).addEventListener('hidden.bs.modal', function() {
                    input.value = invoiceStatus;
                });
            });
        });
    </script> --}}
    <script>
        var buttons = document.querySelectorAll(".toggle-active-btn");
        buttons.forEach(function(button) {
            button.addEventListener("click", function() {
                var id = this.getAttribute("data-id");
                var input = document.getElementById("active-input-" + id);
                var invoiceStatus = input.value;

                // Xử lý sự kiện khi modal được mở
                $('#status-modal-' + id).on('shown.bs.modal', function() {
                    var statusButtons = document.querySelectorAll('#status-modal-' + id + ' .status-option-btn');
                    statusButtons.forEach(function(statusButton) {
                        statusButton.addEventListener('click', function() {
                            var selectedValue = this.getAttribute('data-value');
                            var buttonText = this.textContent.trim();

                            $.ajax({
                                url: "/adminshop/invoices/",
                                method: "POST",
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    id_invoice: id,
                                    invoiceStatus: selectedValue,
                                },
                                success: function(response) {
                                    var button = document.getElementById("active-button-" + id);
                                    button.style = "";
                                    button.value = buttonText;

                                    if (selectedValue === "0") {
                                        button.style.backgroundColor = "#FF6A6A";
                                    } else if (selectedValue === "2") {
                                        button.style.backgroundColor = "Skyblue";
                                    } else if (selectedValue === "3") {
                                        button.style.backgroundColor = "Lime";
                                    }
                                },
                            });
                        });
                    });
                });

                // Xử lý sự kiện khi modal được đóng
                $('#status-modal-' + id).on('hidden.bs.modal', function() {
                    input.value = invoiceStatus;
                });
            });
        });
    </script>
@endsection
