@extends('layout.user.main')

@section('content')
    <?php
    $siteMeta2 = \App\Models\SiteMeta::where('key', 'kelola_pengurus')->first();
    ?>
    <section>
        <div class="container">
            <div class="col-md-12">
                <h3>Fasilitas</h3>
                <hr>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="project">
                            <div class="overlay"></div>
                            <img src="https://www.harapanrakyat.com/wp-content/uploads/2022/08/Cara-Menata-Kamar-Tidur-Ukuran-3x4-Lebih-Lega-dan-Menarik.jpg"
                                alt="" height="350px" style="object-fit: cover">
                            <div class="content">
                                <h5 class="text-white">Kamar 3x4</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="project">
                            <div class="overlay"></div>
                            <img src="https://lh3.googleusercontent.com/p/AF1QipOkB609-LpgrcZDgscEFH8akuJUPYu6So7G2-ls=s1360-w1360-h1020"
                                alt="" height="350px" style="object-fit: cover">
                            <div class="content">
                                <h5 class="text-white">Tempat Parkir</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="project">
                            <div class="overlay"></div>
                            <img src="https://asset-a.grid.id/crop/0x0:0x0/700x465/photo/2023/04/15/ruang-cuci-1-1jpg-20230415112046.jpg"
                                alt="" height="350px" style="object-fit: cover">
                            <div class="content">
                                <h5 class="text-white">Tempat Cuci Pakaian</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="project">
                            <div class="overlay"></div>
                            <img src="https://events.rumah123.com/news-content/img/2020/10/15021806/d92622d009e328c68d09ade2b50d7e74.jpg"
                                alt="" height="350px" style="object-fit: cover">
                            <div class="content">
                                <h5 class="text-white">Tempat Jemuran</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="project">
                            <div class="overlay"></div>
                            <img src="https://www.its.ac.id/informatika/wp-content/uploads/sites/44/2020/04/WhatsApp-Image-2020-04-08-at-09.25.41-1-1024x768.jpeg"
                                alt="" height="350px" style="object-fit: cover">
                            <div class="content">
                                <h5 class="text-white">Aula</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="project">
                            <div class="overlay"></div>
                            <img src="https://kepuhkencanaarum.com/wp-content/uploads/2021/06/Mokup-Ruangan-Abu-Abu-1024x769.jpg"
                                alt="" height="350px" style="object-fit: cover">
                            <div class="content">
                                <h5 class="text-white">Ruang TV</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="project">
                            <div class="overlay"></div>
                            <img src="https://static.promediateknologi.id/crop/0x252:719x1147/750x500/webp/photo/2023/04/26/Screenshot_20230426_092557-76998560.jpg"
                                alt="" height="350px" style="object-fit: cover">
                            <div class="content">
                                <h5 class="text-white">Ruang Tamu</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="project">
                            <div class="overlay"></div>
                            <img src="https://lh3.googleusercontent.com/p/AF1QipNklIWxdf1xTlj8cj0bc1xha_HHwVKy1hMXPzaZ=s1360-w1360-h1020"
                                alt="" height="350px" style="object-fit: cover">
                            <div class="content">
                                <h5 class="text-white">Mushalla</h5>
                            </div>
                        </div>
                    </div>
                </div>


                <h3 class="mt-4">Peraturan</h3>
                <hr>
                <h6>kebersihan dan keindahan</h6>
                <ul style="font-size: 14px">
                    <li>Semua anggota asrama ulim diwajibkan menjaga kebersihan lingkungan asrama baik di dalam ruangan
                        maupun diluar ruangan.</li>
                    <li>Dilarang membuang sampah sembarangan.</li>
                    <li>Dilarang membuang sampah di lantai dua, sampah dibuang ke tempat sampah yang sudah disediakan.
                    </li>
                    <li>
                        Dilarang merokok di dalam kamar mandi dan membuang puntung rokok kedalam toilet.
                    </li>
                    <li>Sampah bekas cairan detergent saat mencuci pakaian harap di buang ke tempat sampah agar tidak
                        menyumbat saluran air.</li>
                    <li>Dilarang merusak peralatan-peralatan kebersihan asrama.</li>
                    <li>
                        Peralatan kebersihan yang sudah digunakan harap dikembalikan ke tempat semula.
                    </li>
                </ul>

                <h6>Ketertiban dan kenyamanan</h6>
                <ul style="font-size: 14px">
                    <li>
                        Dilarang keras membawa, menyimpan dan menggunakan barang-barang terlarang.
                    </li>
                    <li>
                        Dilarang keras membunyikan suara/music di saat azan berkumandang.
                    </li>
                    <li>
                        Dilarang melakukan aktivitas di atas jam 9 malam yang dapat menggangu warga sekitaran asrama.
                    </li>
                    <li>Parkirlah kendaraan yang rapi
                    </li>
                </ul>


                <h6>Gotong Royong</h6>
                <ul style="font-size: 14px">
                    <li>Gotong royong dilakukan dua minggu sekali.
                    </li>
                    <li>Anggota Asrama Ulim wajib mengikuti gotong royong, Jika pada hari gotong royong tidak bisa
                        mengikuti karena alasan tertentu wajib membersihkan asrama sehari sebelum gotong royong dan difoto
                        dikirim ke grub.
                    </li>
                    <li>Jika tidak mengikuti gotong royong selama 3 kali berturut-turut tanpa alasan yang jelas maka
                        pengurus asrama akan menindak tegas dan akan dikeluarkan dari asrama.
                    </li>
                </ul>


                <h6>Tamu</h6>
                <ul style="font-size: 14px">
                    <li>Setiap anggota Asrama Ulim yang membawa tamu ke asrama wajib melapor ke pengurus asrama.
                    </li>
                    <li>Bagi warga berdomisili kecamatan Ulim yang ingin menginap di asrama hanya boleh menginap maksimal
                        7 hari, dan Untuk yang bukan berdomisili Kecamatan Ulim tidak diizinkan menginap di asrama.
                    </li>
                    <li>Perempuan dilarang masuk kedalam asrama, kecuali keluarga yang punya keperluan penting.
                    </li>
                </ul>

                <h3 class="mt-4">Struktur Pengurus</h3>
                <hr>
                @if ($siteMeta2)
                    <div class="col-md-6">
                        <a href="{{ asset('storage/struktur_pengurus/' . $siteMeta2->value) }}">
                            <img id="frame" style="object-fit:coverl"
                                src="{{ asset('storage/struktur_pengurus/' . $siteMeta2->value) }}">
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
