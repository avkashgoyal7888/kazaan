<div>
    @push('css')
        <title>{{ $resorts->resort_name }} | Kazaan Lifestyle</title>
        <meta name="description"
            content="Discover {{ $resorts->resort_name }} with Kazaan Lifestyle – offering premium stays, top amenities, and unforgettable experiences in a stunning location. Book your perfect getaway today.">
<div class="container-fluid bg-breadcrumb" style="background:linear-gradient(rgba(19, 146, 242, 0.2)), url({{ $resorts->primary_img }});">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">{{ $resorts->resort_name }}</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{route('web.home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{{ route('web.resorts') }}}">Resorts</a></li>
            <li class="breadcrumb-item active text-white">{{ $resorts->resort_name }}</li>
        </ol>    
    </div>
</div>

<div class="container py-5">
        <div class="text-left mb-5" style="max-width: 900px;">
            <h2>{{ $resorts->resort_name }}</h2>
            <p>{{ $resorts->resort_address }}</p>
            <span class="fa fa-star checked text-warning"></span>
            <span class="fa fa-star checked text-warning"></span>
            <span class="fa fa-star checked text-warning"></span>
            <span class="fa fa-star checked text-warning"></span>
            <span class="fa fa-star"></span>
        </div>
        <div class="slider-for">
            <img src="{{ $resorts->img_1 }}">
            <img src="{{ $resorts->img_2 }}">
            <img src="{{ $resorts->img_3 }}">
            <img src="{{ $resorts->img_4 }}">
            <img src="{{ $resorts->img_5 }}">
        </div>
        <div class="slider-nav">
            <img src="{{ $resorts->img_1 }}">
            <img src="{{ $resorts->img_2 }}">
            <img src="{{ $resorts->img_3 }}">
            <img src="{{ $resorts->img_4 }}">
            <img src="{{ $resorts->img_5 }}">
        </div>
</div>
    @endpush
</div>
