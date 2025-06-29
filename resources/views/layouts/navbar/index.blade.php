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
            <a href="{{ route('home') }}"
                class="nav-item nav-link {{ $page_meta['page'] == 'Home' ? 'active' : '' }}">Beranda</a>
            <a href="{{ route('tentang') }}"
                class="nav-item nav-link {{ $page_meta['page'] == 'Tentang' ? 'active' : '' }}">Tentang</a>
            <a href="{{ route('galeri') }}"
                class="nav-item nav-link {{ $page_meta['page'] == 'Galeri' ? 'active' : '' }}">Galeri</a>
            <a href="{{ route('pengumuman') }}"
                class="nav-item nav-link {{ $page_meta['page'] == 'Pengumuman' ? 'active' : '' }}">Pengumuman</a>
            <a href="{{ route('kontak') }}"
                class="nav-item nav-link {{ $page_meta['page'] == 'Kontak' ? 'active' : '' }}">Kontak</a>
            {{-- <div class="nav-item dropdown">
                <a href="#" class="nav-link" data-bs-toggle="dropdown">
                    <span class="dropdown-toggle">Pages</span>
                </a>
                <div class="dropdown-menu m-0">
                    <a href="#" class="dropdown-item">Our Features</a>
                    <a href="#" class="dropdown-item">Our team</a>
                    <a href="#" class="dropdown-item">Testimonial</a>
                    <a href="#" class="dropdown-item">Our offer</a>
                    <a href="#" class="dropdown-item">FAQs</a>
                    <a href="#" class="dropdown-item">404 Page</a>
                </div>
            </div> --}}
        </div>
        <a href="#" class="btn btn-primary rounded-pill py-2 px-4 my-3 my-lg-0 flex-shrink-0">Get Started</a>
    </div>
</nav>
