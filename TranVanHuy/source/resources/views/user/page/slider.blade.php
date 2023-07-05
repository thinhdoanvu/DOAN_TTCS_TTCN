<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">
    @foreach($sliders as $item)
        <div class="slider-item" style="background-image: url({{$item->image_path}});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                    <div class="col-md-12 ftco-animate text-center">
                        <h1 class="mb-2">{{$item->name}}</h1>
                        @if ($item->description != NULL)
                            <h2 class="subheading mb-4">{{$item->description}}</h2>
                        @endif
                        {{-- <p><a href="#" class="btn btn-primary">View Details</a></p> --}}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
  </div>
</section>
