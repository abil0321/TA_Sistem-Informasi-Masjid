<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head.index')
</head>

<body>

    @include('layouts.header.index')

    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="" class="navbar-brand p-0">
                <h1 class="text-primary"><i class="fas fa-search-dollar me-3"></i>Stocker</h1>
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href={{ route('home') }} class="nav-item nav-link">Home</a>
                    <a href={{ route('about') }} class="nav-item nav-link">About</a>
                    <a href="{{ route('service') }}" class="nav-item nav-link">Services</a>
                    <a href="{{ route('blog') }}" class="nav-item nav-link">Blogs</a>
                    <a href="{{ route('contact') }}" class="nav-item nav-link">Contact Us</a>
                    {{-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link active" data-bs-toggle="dropdown">
                            <span class="dropdown-toggle">Pages</span>
                        </a>
                        <div class="dropdown-menu m-0">
                            <a href="#" class="dropdown-item">Our Features</a>
                            <a href="#" class="dropdown-item">Our team</a>
                            <a href="#" class="dropdown-item">Testimonial</a>
                            <a href="#" class="dropdown-item">Our offer</a>
                            <a href="#" class="dropdown-item">FAQs</a>
                            <a href="#" class="dropdown-item active">404 Page</a>
                        </div>
                    </div> --}}
                </div>
                <a href="#" class="btn btn-primary rounded-pill py-2 px-4 my-3 my-lg-0 flex-shrink-0">Get
                    Started</a>
            </div>
        </nav>

        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">404 Pages</h4>
                <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href={{ route('home') }}>Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active text-primary">404 Page</li>
                </ol>
            </div>
        </div>
        <!-- Header End -->
    </div>
    <!-- Navbar & Hero End -->


    <!-- 404 Start -->
    <div class="container-fluid bg-light py-5">
        <div class="container py-5 text-center">
            <div class="row justify-content-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <i class="far fa-frown-open display-1 text-primary mb-4" style="width: 80px; height: 80px;"></i>
                    <h1 class="display-1">404</h1>
                    <h1 class="mb-4">Page Not Found</h1>
                    <p class="mb-4">We're sorry, the page you have looked for does not exist in our website! Maybe go
                        to our home page or try to use a search?</p>
                    <a class="btn btn-primary rounded-pill py-3 px-5" href={{ route('home') }}>Go Back To Home</a>
                </div>
            </div>
        </div>
    </div>
    <!-- 404 End -->

    @include('layouts.footer.index')
</body>

</html>
