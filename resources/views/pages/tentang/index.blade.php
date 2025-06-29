@extends('layouts.app')

@section('content')
    <!-- Abvout Start -->
    <div class="container-fluid about py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-xl-7 wow fadeInLeft" data-wow-delay="0.2s">
                    <div>
                        <h4 class="text-primary">Sejarah</h4>
                        <h1 class="display-5 mb-4">Masjid Jami' Al-Muqarrabiin</h1>
                        <p class="mb-4">Masjid Jami' Al-Muqarrabiin terletak di Jalan Bukit Cengkeh 2, Kelurahan Tugu,
                            Kecamatan Cimanggis, Kota Depok, Jawa Barat. Masjid ini didirikan pada tahun 1999. Masjid ini
                            memiliki luas tanah 952 m² dan luas bangunan 869 m² dengan status tanah Girik. Jumlah jamaah
                            yang rutin beribadah di masjid ini melebihi 200 orang, didukung oleh 52 muazin, 5 khatib, dan 50
                            remaja yang aktif dalam kegiatan masjid. Masjid ini berperan penting sebagai tempat
                            ibadah dan pusat kegiatan keagamaan bagi masyarakat setempat. Selain itu, masjid ini juga
                            menjadi pusat berbagai kegiatan sosial dan pendidikan bagi warga sekitar. Perumahan Bukit
                            Cengkeh 2 sendiri merupakan salah satu kawasan pemukiman di Kelurahan Tugu,
                            Kecamatan Cimanggis, yang dikenal dengan komunitasnya yang aktif dan beragam fasilitas
                            pendukung.
                        </p>
                    </div>
                </div>
                <div class="col-xl-5 wow fadeInRight" data-wow-delay="0.2s">
                    <div class="bg-primary rounded position-relative overflow-hidden">
                        <img src="https://lh5.googleusercontent.com/p/AF1QipMbQQRTy7UAT055g3tgHBPJ_Ck85ob74hb5I6ck=w141-h235-n-k-no-nu"
                            class="img-fluid rounded w-100" alt="">

                        {{-- <div class="" style="position: absolute; top: -15px; right: -15px;">
                            <img src={{asset('assets/img/about-3.png')}} class="img-fluid" style="width: 150px; height: 150px; opacity: 0.7;"
                                alt="">
                        </div>
                        <div class="" style="position: absolute; top: -20px; left: 10px; transform: rotate(90deg);">
                            <img src={{asset('assets/img/about-4.png')}} class="img-fluid" style="width: 100px; height: 150px; opacity: 0.9;"
                                alt="">
                        </div>
                        <div class="rounded-bottom">
                            <img src={{asset('assets/img/about-5.jpg')}} class="img-fluid rounded-bottom w-100" alt="">
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Features Start -->
    <div class="container-fluid feature pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Organisasi Dewan Kemakmuran Masjid</h4>
                <h1 class="display-5 mb-4">Masjid Jami' Al-Muqarrabin Perumahan Bukit Cengkeh 2</h1>
                {{-- <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis
                    cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt sint
                    dolorem autem obcaecati, ipsam mollitia hic.
                </p> --}}
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Posisi</th>
                                <th scope="col">Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Ketua</td>
                                <td>H. Parman Tohari</td>
                            </tr>
                            <tr>
                                <td>Wakil</td>
                                <td>H. M. Hilmi, SE</td>
                            </tr>
                            <tr>
                                <td>Sekretaris</td>
                                <td>Arisman Candra</td>
                            </tr>
                            <tr>
                                <td>Bendahara</td>
                                <td>H. Iman Subekti</td>
                            </tr>
                            <tr>
                                <td rowspan="5" class="align-middle">Seksi ZIS</td>
                                <td>Wondo Abdul Karim</td>
                            </tr>
                            <tr>
                                <td>
                                    H. Zulkarnaen
                                </td>
                            </tr>
                            <td>
                                H. TB. Mansur Muchtar, S.Sos
                            </td>
                            </tr>
                            <tr>
                                <td>
                                    Farhan Wuryanto
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    H. Sulaeman
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="5" class="align-middle">Seksi Ta'lim</td>
                                <td>Hj. Tuti Wahyuningsih</td>
                            </tr>
                            <tr>
                                <td>
                                    Hj. Eviyanti
                                </td>
                            </tr>
                            <td>
                                Hj. Elly Suprihtan
                            </td>
                            </tr>
                            <tr>
                                <td>
                                    Hj. Tuti Zulkarnaen
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Hj. Farida
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2" class="align-middle">Seksi Ubudiyah</td>
                                <td>Drs. H. Muktasim, M.Si</td>
                            </tr>
                            <tr>
                                <td>
                                    Drs. Bambang Wahyu W M.M
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="4" class="align-middle">Seksi Irmas & Media</td>
                                <td>Ocrifanto Hutabarat, S.E</td>
                            </tr>
                            <tr>
                                <td>
                                    Yudi Nobelia, Faizan
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Muhammad Firdaus
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Aji Sigit Nugroho
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="3" class="align-middle">Seksi Umum</td>
                                <td>H. Shukerlan Witjaksono</td>
                            </tr>
                            <tr>
                                <td>
                                    H. Arham Maulidan Assiri
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    H. Sakim, Mustofa
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- <div class="row g-4">
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="feature-item p-4">
                        <div class="feature-icon p-4 mb-4">
                            <i class="fas fa-chart-line fa-4x text-primary"></i>
                        </div>
                        <h4>Global Management</h4>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea hic laborum odit
                            pariatur...
                        </p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="feature-item p-4">
                        <div class="feature-icon p-4 mb-4">
                            <i class="fas fa-university fa-4x text-primary"></i>
                        </div>
                        <h4>Corporate Banking</h4>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea hic laborum odit
                            pariatur...
                        </p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="feature-item p-4">
                        <div class="feature-icon p-4 mb-4">
                            <i class="fas fa-file-alt fa-4x text-primary"></i>
                        </div>
                        <h4>Asset Management</h4>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea hic laborum odit
                            pariatur...
                        </p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="feature-item p-4">
                        <div class="feature-icon p-4 mb-4">
                            <i class="fas fa-hand-holding-usd fa-4x text-primary"></i>
                        </div>
                        <h4>Investment Bank</h4>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea hic laborum odit
                            pariatur...
                        </p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- Features End -->

    <!-- Team Start -->
    {{-- <div class="container-fluid team pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Our Team</h4>
                <h1 class="display-5 mb-4">Meet Our Advisers</h1>
                <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis
                    cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt sint
                    dolorem autem obcaecati, ipsam mollitia hic.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="team-item">
                        <div class="team-img">
                            <img src={{ asset('assets/img/team-1.jpg') }} class="img-fluid" alt="">
                        </div>
                        <div class="team-title">
                            <h4 class="mb-0">David James</h4>
                            <p class="mb-0">Profession</p>
                        </div>
                        <div class="team-icon">
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                    class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-0" href=""><i
                                    class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="team-item">
                        <div class="team-img">
                            <img src={{ asset('assets/img/team-2.jpg') }} class="img-fluid" alt="">
                        </div>
                        <div class="team-title">
                            <h4 class="mb-0">David James</h4>
                            <p class="mb-0">Profession</p>
                        </div>
                        <div class="team-icon">
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                    class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-0" href=""><i
                                    class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="team-item">
                        <div class="team-img">
                            <img src={{ asset('assets/img/team-3.jpg') }} class="img-fluid" alt="">
                        </div>
                        <div class="team-title">
                            <h4 class="mb-0">David James</h4>
                            <p class="mb-0">Profession</p>
                        </div>
                        <div class="team-icon">
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                    class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-0" href=""><i
                                    class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="team-item">
                        <div class="team-img">
                            <img src={{ asset('assets/img/team-4.jpg') }} class="img-fluid" alt="">
                        </div>
                        <div class="team-title">
                            <h4 class="mb-0">David James</h4>
                            <p class="mb-0">Profession</p>
                        </div>
                        <div class="team-icon">
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                    class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-0" href=""><i
                                    class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Team End -->
@endsection
