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
                        <img src="{{asset('assets/img/masjid-2.jpg')}}"
                            class="img-fluid rounded w-100" alt="">
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
        </div>
    </div>
    <!-- Features End -->
@endsection
