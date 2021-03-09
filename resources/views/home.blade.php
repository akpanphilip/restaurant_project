<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap files -->
    <link rel="stylesheet" href="{{asset('bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap.min.js') }}"></script>

    <!-- css file -->
    <link rel="stylesheet" href="{{ asset('css/home.css')}}">

    <!-- font awesome -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <title>Restaurant</title>
</head>

<body>
    <div class="topdiv d-flex justify-content-center align-items-center">
        <p>3rd Avenue, Gwarinpa Abuja 08188998899</p>
    </div>

    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid">
            <img class="navbar-brand" src="{{asset('img/logo.png')}}" alt="" />
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav offset-md-2">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <a class="nav-link" href="#">Features</a>
                    <a class="nav-link" href="#">Pricing</a>
                    <a class="nav-link" href="#">Make reservations</a>
                </div>
                <div class="navbar-nav offset-md-4">
                    @guest
                    <a class="nav-link account" href="{{ '/login' }}">Account</a>
                    @endguest
                    @auth
                    <a class="nav-link" href="{{ '/admin/dashboard' }}">{{ auth()->user()->name }}</a>
                    @endauth

                </div>

            </div>
        </div>
    </nav>
    <!-- carousel -->
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('img/bg_5.jpg')}}" class="d-block w-100" alt="..." />
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>
                        Some representative placeholder content for the
                        first slide.
                    </p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('img/bg_1.jpg')}}" class="d-block w-100" alt="..." />
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>
                        Some representative placeholder content for the
                        second slide.
                    </p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/bg_3.jpg')}}" class="d-block w-100" alt="..." />
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>
                        Some representative placeholder content for the
                        third slide.
                    </p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- end of carousel -->

    <!-- find your best food -->
    <p class="bestFoodText">Find your <span class="spantext">best food</span></p>
    <div class="container-fluid container-mealbox">

        <div class="row d-flex">
            @foreach($meals as $meal)
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="mealbox">
                    <div class="mealImg">
                        <img src="{{ asset('adminImages')}}/{{$meal->image}}" alt="{{ asset('adminImages')}}/{{$meal->image}}">
                    </div>
                    <div class="mealDesc">
                        {{$meal->desc}}
                    </div>
                    <div class="orderBtn"></div>
                </div>
                <div class="mealName">
                    {{$meal->name}}
                </div>
                <div class="price">
                    {{$meal->price}}
                </div>
            </div>
        </div>
        @endforeach
    </div>

</body>

</html>