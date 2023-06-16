@php
    use App\Models\Setting ;
    use App\Models\BlogCategory;
    use App\Models\ProductCategory;
    $categoryProducts = ProductCategory::where('parent_id',0)->get();
    $categoryBlogs = BlogCategory::all();
    $item = Setting::where('key','general')->firstOrFail()->toArray(); 
    $result = json_decode($item['value'], true);
@endphp
@include('front.layout.head')
@include('front.layout.header')
<body id="body">

  @yield('body')

@include('front.layout.script')
<script>
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@extends('front.layout.footer')
</body>
  
</html>