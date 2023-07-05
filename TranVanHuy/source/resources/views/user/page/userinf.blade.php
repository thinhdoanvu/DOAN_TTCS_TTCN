@extends('user.usershop')
@section('usermain')

<section class="ftco-section bgpt">
    <div class="container card py-5">
        <form method="POST" enctype="multipart/form-data">
            @csrf
            @if (session('msg'))
                <div class="alert alert-success">{{session('msg')}}</div>
            @endif
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-4">
                    <img class="img-fluid mb-3 mt-4" src="{{$userinfs->image_path}}" alt="Image"
                        style="width: 300px; height: 300px; resize: vertical; object-fit: contain">
                    <input type="file" name="image_path" class="form-control-file">
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-5">
                    <table>
                        <tr>
                            <td><p><b>Họ và tên &emsp;&emsp;&emsp;</b></p></td>
                            <td>
                                <input
                                    class="form-control"
                                    style="border-radius: 50px;"
                                    type="text"
                                    name="full_name"
                                    required
                                    value="{{$userinfs->full_name}}"
                                ><br>
                            </td>
                        </tr>
                        <tr>
                            <td><p style="margin-bottom: 1rem;"><b>Giới tính</b></p></td>
                            <td>
                            <input type="radio" name="gender" value="1"
                                @php
                                    if ($userinfs->gender == 1) {
                                        echo 'checked';
                                    }
                                @endphp>
                            <label class="mr-2">Nam</label>
                            <input type="radio" name="gender" value="0"
                                @php
                                    if ($userinfs->gender == 0) {
                                        echo 'checked';
                                    }
                                @endphp>
                            <label>Nữ</label><br>
                            </td>
                        </tr>
                        <tr>
                            <td><p><b>Ngày sinh</b></p></td>
                            <td>
                                <input
                                    class="form-control"
                                    style="border-radius: 50px;"
                                    type="date"
                                    name="birthday"
                                    required
                                    value="{{$userinfs->birthday}}"
                                ><br>
                            </td>
                        </tr>
                        <tr>
                            <td><p><b>Số điện thoại</b></p></td>
                            <td>
                                <input
                                    class="form-control"
                                    style="border-radius: 50px;"
                                    type="text"
                                    pattern="[0-9]{10}"
                                    name="phone"
                                    required
                                    value="{{$userinfs->phone}}"
                                ><br>
                            </td>
                        </tr>
                        <tr>
                            <td><p><b>Địa chỉ</b></p></td>
                            <td>
                                <input
                                    class="form-control"
                                    style="border-radius: 50px;"
                                    type="text"
                                    name="address"
                                    required
                                    value="{{$userinfs->address}}"
                                ><br>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button type="submit" class="btn btn-primary rounded-3 px-4 py-1 "
                                    name="save">Lưu</button>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </form>
    </div>
</section>
    {{-- <div class="container py-5">
        <form method="POST" enctype="multipart/form-data">
            @csrf
            @if (session('msg'))
                <div class="alert alert-success">{{session('msg')}}</div>
            @endif
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-4">
                    <img class="img-fluid mb-3 mt-4" src="{{$userinfs->image_path}}" alt="Image"
                        style="width: 300px; height: 300px; resize: vertical; object-fit: contain">
                    <input type="file" name="image_path" class="form-control-file">
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-5">
                    <table>
                        <tr>
                            <td><p><b>Họ và tên &emsp;&emsp;&emsp;</b></p></td>
                            <td>
                                <input
                                    class="form-control"
                                    style="border-radius: 50px;"
                                    type="text"
                                    name="full_name"
                                    required
                                    value="{{$userinfs->full_name}}"
                                ><br>
                            </td>
                        </tr>
                        <tr>
                            <td><p style="margin-bottom: 1rem;"><b>Giới tính</b></p></td>
                            <td>
                            <input type="radio" name="gender" value="1"
                                @php
                                    if ($userinfs->gender == 1) {
                                        echo 'checked';
                                    }
                                @endphp>
                            <label class="mr-2">Nam</label>
                            <input type="radio" name="gender" value="0"
                                @php
                                    if ($userinfs->gender == 0) {
                                        echo 'checked';
                                    }
                                @endphp>
                            <label>Nữ</label><br>
                            </td>
                        </tr>
                        <tr>
                            <td><p><b>Ngày sinh</b></p></td>
                            <td>
                                <input
                                    class="form-control"
                                    style="border-radius: 50px;"
                                    type="date"
                                    name="birthday"
                                    required
                                    value="{{$userinfs->birthday}}"
                                ><br>
                            </td>
                        </tr>
                        <tr>
                            <td><p><b>SĐT</b></p></td>
                            <td>
                                <input
                                    class="form-control"
                                    style="border-radius: 50px;"
                                    type="text"
                                    pattern="[0-9]{10}"
                                    name="phone"
                                    required
                                    value="{{$userinfs->phone}}"
                                ><br>
                            </td>
                        </tr>
                        <tr>
                            <td><p><b>Địa chỉ</b></p></td>
                            <td>
                                <input
                                    class="form-control"
                                    style="border-radius: 50px;"
                                    type="text"
                                    name="address"
                                    required
                                    value="{{$userinfs->address}}"
                                ><br>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button type="submit" class="btn btn-primary rounded-3 px-4 py-1 "
                                    name="save">Lưu</button>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </form>
    </div> --}}
@endsection
