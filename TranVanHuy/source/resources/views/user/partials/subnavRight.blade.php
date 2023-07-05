@php
    $threeposts = App\Models\Post::orderBy('id', 'desc')
        ->limit(3)
        ->get();
@endphp

{{-- <div class="sidebar-box">
    <form action="#" class="search-form">
        <div class="form-group">
            <span class="icon ion-ios-search"></span>
            <input type="text" class="form-control" placeholder="Search...">
        </div>
    </form>
</div>
<div class="sidebar-box ftco-animate">
    <h3 class="heading">Categories</h3>
    <ul class="categories">
        <li><a href="#">Vegetables <span>(12)</span></a></li>
        <li><a href="#">Fruits <span>(22)</span></a></li>
        <li><a href="#">Juice <span>(37)</span></a></li>
        <li><a href="#">Dries <span>(42)</span></a></li>
    </ul>
</div> --}}

<div class="sidebar-box ftco-animate">
    <h3 class="heading">Bài viết gần đây</h3>
    @foreach ($threeposts as $threepost)
        <div class="block-21 mb-4 d-flex">
            <a class="blog-img mr-4" style="background-image: url({{ $threepost->imagePath }});"></a>
            <div class="text">
                <h3 class="heading-1"><a
                        href="{{ route('blog.slug', $threepost->slug->nameSlug) }}">{{ $threepost->title }}</a></h3>
                {{-- <div class="meta"> --}}
                <div style="font-size: 9pt"><span class="icon-calendar"></span>
                    {{ date('F d, Y', strtotime($threepost['created_at'])) }}</div>
                <div style="font-size: 9pt"><span class="icon-person"></span> {{ $threepost->posterName }}</div>
                {{-- <div><a href="#"><span class="icon-chat"></span> 19</a></div> --}}
                {{-- </div> --}}
            </div>
        </div>
    @endforeach
</div>

{{-- <div class="sidebar-box ftco-animate">
    <h3 class="heading">Tag Cloud</h3>
    <div class="tagcloud">
        <a href="#" class="tag-cloud-link">fruits</a>
        <a href="#" class="tag-cloud-link">tomatoe</a>
        <a href="#" class="tag-cloud-link">mango</a>
        <a href="#" class="tag-cloud-link">apple</a>
        <a href="#" class="tag-cloud-link">carrots</a>
        <a href="#" class="tag-cloud-link">orange</a>
        <a href="#" class="tag-cloud-link">pepper</a>
        <a href="#" class="tag-cloud-link">eggplant</a>
    </div>
</div>

<div class="sidebar-box ftco-animate">
    <h3 class="heading">Paragraph</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod
        mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit
        cupiditate numquam!</p>
</div> --}}
