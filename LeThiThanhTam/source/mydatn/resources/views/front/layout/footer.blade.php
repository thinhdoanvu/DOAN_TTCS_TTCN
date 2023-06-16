


    <footer class="footer">
      <div class="container">
        <div class="row">
              <div class="col-md-6 col-lg-4 col-sm-6 mb-5 mb-lg-0 text-center text-sm-left mr-auto">
                <div class="footer-widget">
                    <h4 class="mb-4"><img src="admin/img/logo/{{$result['logo']}}" alt="Alice" style="width:135px" class="img-fluid"></h4>
                    <p class="lead">Alice cung cấp dịch vụ Mua ONLINE nhận tại CỬA HÀNG. Nàng đã trải nghiệm chưa?</p>
                    
                    <div class="">
                      <p class="mb-0"><strong>Địa chỉ : </strong>{{$result['address']}}</p>
                      <p><strong>Email hỗ trợ : </strong> {{$result['email1']}}</p>
                    </div>
                </div>
              </div>
    
              <div class="col-md-6 col-lg-2 col-sm-6 mb-5 mb-lg-0 text-center text-sm-left">
                <div class="footer-widget">
                  <h4 class="mb-4">Sản phẩm</h4>
                  <ul class="pl-0 list-unstyled mb-0">
                    @foreach($categoryProducts as $categoryProduct)
                    <li><a href="{{route('categoryProduct',['categoryName' => Str::slug($categoryProduct->slug)])}}">{{$categoryProduct->name}}</a></li> 
                    @endforeach
                  </ul>
              </div>
              </div> 
    
              <div class="col-md-6 col-lg-2 col-sm-6 mb-5 mb-lg-0 text-center text-sm-left">
                 <div class="footer-widget">
                  <h4 class="mb-4">Liên kết</h4>
                  <ul class="pl-0 list-unstyled mb-0">
                    <li><a href="{{route('blogIndex')}}">Tin tức</a></li>
                    <li><a href="{{route('shopIndex')}}">Sản phẩm</a></li>
                    <li><a href="{{route('information')}}">Tài khoản</a></li>
                    <li><a href="{{route('ordersHistory')}}">Lịch sử mua hàng</a></li>
                  </ul>
                  </div>
              </div>
    
              <div class="col-md-6 col-lg-3 col-sm-6 text-center text-sm-left">
                 <div class="footer-widget">
                  <h4 class="mb-4">Giờ mở cửa</h4>
                  <ul class="pl-0 list-unstyled mb-5">
                    <li class="d-lg-flex justify-content-between">Thứ 2 - Thứ 6 <span>8.00 - 20.00h</span></li>
                    <li class="d-lg-flex justify-content-between">Thứ 7 <span>10.00 - 20.00h</span></li>
                    <li class="d-lg-flex justify-content-between">Chủ nhật <span>12 - 20.00h</span></li>
                  </ul>
    
                  <h5>Liên hệ : {{$result['phone1']}}</h5>
                </div>
              </div>
           </div>
      </div>
    </footer>
    
    <div class="footer-btm py-4 ">
      <div class="container">
        <div class="row ">
             <div class="col-lg-6">
               <p class="copyright mb-0 ">{{$result['copyright']}} <i style="color:red" class="fa fa-heart" aria-hidden="true"></i><a href="https://www.facebook.com/ttam0228">ThanhTam</a></p>
             </div>
           </div>
      </div>
    </div>
   