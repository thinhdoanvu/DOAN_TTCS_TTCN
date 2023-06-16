<?php 
    $orders = App\Models\Order::All()->count();
    $users = App\Models\User::All()->count();
    $products = App\Models\Product::All()->count();
    $blogs = App\Models\Blog::All()->count();
    $categories = App\Models\ProductCategory::All();
    $brands = App\Models\Brand::All()->count();

?>
@extends('admin.layout.master')

@section('body')

    <!-- Main -->
    @if(session('notification'))
							<div class="alert alert-warning" role="alert">
								{{ session('notification')}}
							</div>
						@endif
    
    <div class="app-main__inner">

            {{-- <h6 class="card-title">Tổng doanh thu hôm nay: {{$tongNgay->tong}} VND.</h6>
            <h6 class="card-title">Tổng doanh thu theo tháng này: {{$tongThang->tong}} VND.</h6>
            <h6 class="card-title">Số đơn hàng tháng này: {{$tongDHang->tong}} đơn hàng.</h6>
            <h6 class="card-title">Sản phẩm bán chạy nhất trong tháng: {{$bestSellerProducts->name}}.</h6>
            <h6 class="card-title">Tổng doanh thu năm nay: {{$tongNam->tong}} VND.</h6><br> --}}
                    
        <div class="row">
          <form autocomplete="off" class="row">
            @csrf
            <div class="col-12 text-center font-weight-bold title">
              <p>Thống kê đơn hàng doanh số</p>
            </div>
            <label class="col-1 col-form-label">Từ ngày</label>
            <div class="col-5 row">
                <div class="rangedatepicker d-flex">
                    <input type="text" id="date_start" name="date_begin" value="" class="form-control date" />
                    <span>~</span>
                    <input type="text" id="date_end" name="date_end" value="" class="form-control date" />
                </div>
            </div>
            <div class="col-2">
              <select class="dashboard-filter form-control sort-date">
                <option value="">-- Chọn --</option>
                <option value="7ngay">7 ngày qua</option>
                <option value="thangtruoc">Tháng trước</option>
                <option value="thangnay">Tháng này</option>
                <option value="365ngayqua">365 ngày qua</option>
            </select>
            
          </div>
          <div class="col-2">
            <input type="button" id="btn-dashboard-filter" class="btn btn-primary" value="Lọc kết quả">
          </div>
          </form>
        </div>
        <div class="row">
            {{-- <div class="col-md-12">
                <style type="text/css">
                  p.title_thongke {
                    text-align: center;
                    font-size: 20px;
                    font-weight: bold;
                  }
                  </style>
                
                    <p class="title_thongke">Thống kê đơn hàng doanh số</p>
                    <div class="row">
                      <form autocomplete="off">
                        @csrf
                        <div class="col-6">
                          <p>Từ ngày: <input type="text" id="date_start" class="form-control"></p>
                          <p>Đến ngày: <input type="text" id="date_end" class="form-control"></p>
                          <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả">
                        </div><br>
                        <div class="col-3">
                          <p>
                            <select class="dashboard-filter form-control">
                              <option value="">-- Chọn --</option>
                              <option value="7ngay">7 ngày qua</option>
                              <option value="thangtruoc">Tháng trước</option>
                              <option value="thangnay">Tháng này</option>
                              <option value="365ngayqua">365 ngày qua</option>
                          </select>
                          </p>
                          
                        </div>
                      </form>
                    </div>
                    
                    <div class="col-md-12">
                      <div id="myfirstchart" style="height: 250px;"></div>
                    </div>
            </div> --}}
            <div class="col-md-12">
              <div id="myfirstchart" style="height: 250px;"></div>
            </div>
            <div class="col-md-4 col-xs-12">
              <p class="title_thongke">Thống kê tổng sản phẩm bài viết đơn hàng</p>
              <div id="donut"  style="height: 250px;"></div>
            </div>
            <div class="col-md-4 col-xs-12">
              <style type="text/css">
                ol.list_view{
                  margin: 10px 0;
                  color: black;
                  list-style:decimal;
                }
                ol.list_view a{
                  font-weight: 400;
                  color: orange;
                }
              </style>
              <h3>Bài viết xem nhiều</h3>
              <ol class="list_view">
                @foreach($blog_views as $blog)
                <li>
                  <a target="_blank" href="{{route('showBlog',['blogName' => Str::slug($blog->title), 'id' => $blog->id])}}">{{$blog->title}} | <span style="color:#0F56D7">{{$blog->blog_view}}</span></a>
                </li>
                @endforeach
              </ol>
            </div>
            <div class="col-md-4 col-xs-12">
              <style type="text/css">
                ol.list_view {
                  margin: 10px 0;
                  color: black;
                  list-style:decimal;
                }
                ol.list_view a {
                  font-weight: 400;
                  color: orange
                }
              </style>
              <h3>Sản phẩm xem nhiều</h3>
              <ol class="list_view">
                @foreach($product_views as $product)
                <li>
                  <a target="_blank" href="{{route('showProduct',['productName' => Str::slug($product->name), 'id' => $product->id])}}">{{$product->name}} | <span style="color:#0F56D7">{{$product->product_view}}</span></a>
                </li>
                @endforeach
              </ol>
            </div>

        </div>

 
    </div>

    </div>
    <!-- End Main -->
    

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    
    @endsection   
@push('scripts')  
<script type="text/javascript">
   
    
  $(document).ready(function(){
      chart30daysorder();
      var chart = new Morris.Bar({
        element: 'myfirstchart',
        //option char
        lineColors: ['#819C79','#fc8710', '#FF6541','#A4ADD3', '#766B56'],
        pointFillColors: ['#ffffff'],
        pointStrokeColors: ['black'],
          fillOpacity: 0.6,
          hideHover: 'auto',
          parseTime: false,

        xkey: 'period',
        ykeys: ['order','sales','profit','quantity'],
        behaveLikeLine: true,
        labels: ['đơn hàng','doanh số','lợi nhuận','số lượng']
      });
      $('.date').daterangepicker({
      singleDatePicker: true,
        showDropdowns: true,
        autoApply: true,
        locale: {
            format: 'YYYY-MM-DD'
        }
    });

      $('.dashboard-filter').change(function(){
        var dashboard_value = $(this).val();
        var month = $(this).val();

switch (month) {
    case "7ngay":
        $('#date_start').val(moment().subtract(7,'d').format('YYYY-MM-DD'))
        $('#date_end').val(moment().format('YYYY-MM-DD'))
        break;
    case "thangtruoc":
        $('#date_start').val(moment().subtract(1,'months').startOf('month').format('YYYY-MM-DD'))
        $('#date_end').val(moment().subtract(1,'months').endOf('month').format('YYYY-MM-DD'))
        break;
    case "thangnay":
        $('#date_start').val(moment().startOf('month').format('YYYY-MM-DD'))
        $('#date_end').val(moment().format('YYYY-MM-DD'))

        break
    case "365ngayqua":
        $('#date_start').val(moment().subtract(1, 'years').format('YYYY-MM-DD'))
        $('#date_end').val(moment().format('YYYY-MM-DD'))
        break;
    case "4":
        $('#date_start').val(moment().add(3, 'months').startOf('month').format('YYYY-MM-DD'))
        $('#date_end').val(moment().add(3, 'months').endOf('month').format('YYYY-MM-DD'))
        break;
    default:
        break;
}
        $.ajax({
            url:"{{route('dashboard.order.filter')}}",
            method:'POST',
            dataType:"JSON",
            data:{
                "_token": "{{ csrf_token() }}",
                dashboard_value:dashboard_value,
            },
            success:function(data){
              console.log(data.length);
              if(data.length > 0){
                chart.setData(data);
              }
                
            },

        })
    });

    $('#btn-dashboard-filter').click(function(){
        var from_date = $('#date_start').val();
        var to_date = $('#date_end').val();
        $.ajax({
            url:"{{route('dashboard.order')}}",
            method:'POST',
            dataType:"JSON",
            data:{
                "_token": "{{ csrf_token() }}",
                from_date:from_date,
                to_date:to_date,
            },
            success:function(data){
                chart.setData(data);
            },

        })
    });

    function chart30daysorder(){
      $.ajax({
            url:"{{route('dashboard.days.order')}}",
            method:'POST',
            dataType:"JSON",
            data:{
                "_token": "{{ csrf_token() }}",
            },
            success:function(data){
                chart.setData(data);
            },
        })
    }
  });
      
</script>

<script type="text/javascript">

$(document).ready(function(){
      var donut = Morris.Donut({
      element: 'donut',
      resize: true,
      colors: [
        '#ce616a',
        '#61a1ce',
        '#66D70F',
        '#f5b942',
        '#D70FBD',
      ],
      //labelColor:"#cccccc", // text color
      //backgroundColor: '#333333', // border color
      data: [
        {label:"San pham", value:<?php echo $products ?>},
        {label:"Bai viet", value:<?php echo $blogs ?>},
        {label:"Don hang", value:<?php echo $orders ?>},
        {label:"Khach hang", value:<?php echo $users ?>},
        {label:"Thuong hieu", value:<?php echo $brands ?>},
      ]
    });
  });
</script>
@endpush

