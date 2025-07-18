<section id="home" style="height: 100vh; display: flex; align-items: center; justify-content: center;"
    data-aos="fade-in" data-aos-once="true" data-aos-duration="1000" data-aos-delay="100">
    <div class="container"
        style="height: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center;">
        <img src="asset/hero.jpg" alt=""
            style="width: 100%; height: auto; max-width: 600px; max-height: 80vh; animation: floatY 4s ease-in-out infinite;">
        <h1 class="fw-light" style="margin-top: 24px;">Selamat Datang <p
                style="color: rgb(16, 150, 173); display: inline;">Jaknaker</p>
        </h1>
        <div class="mt-2">
            <p>Tingkatkan Kompetensi mu Untuk Raih Karir yang Kamu Inginkan, in a way. <b>IT'S FREE!</b></p>
        </div>
        <div class="d-flex gap-3 mt-3">
            <button type="button" class="btn btn-info text-white">Mulai</button>
            <div style="display: flex; align-items: center;">
                <i class="fa fa-play-circle-o" aria-hidden="true"
                    style="font-size: 2.5rem; color: rgb(16, 150, 173);"></i>
                <a href="#" id="openVideoModal" style="margin-left: 8px; text-decoration: none; color: black;"
                    data-bs-toggle="modal" data-bs-target="#videoModal">Tonton
                    Video</a>

                <!-- Modal -->
                <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel"
                    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content bg-black">
                            <div class="modal-header border-0">
                                <h5 class="modal-title text-white" id="videoModalLabel">Video Profil</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-0">
                                <div class="ratio ratio-16x9">
                                    <iframe id="youtubeVideo"
                                        src="https://www.youtube.com/embed/CR6jfKSeXT4?enablejsapi=1&origin=<?= $_SERVER['HTTP_HOST'] ?>"
                                        title="Video Profil" frameborder="0"
                                        allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen>
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="tentang" style=" display: flex; align-items: center; justify-content: center;" data-aos="fade-in"
    data-aos-once="true" data-aos-duration="1000" data-aos-delay="100">
    <div class="container-fluid px-0">
        <div class="card mb-4 d-flex" style="background-color: rgb(56, 60, 61); border-radius: 0;">
            <div class="card-body text-white">
                <div class="row justify-content-center m-5">
                    <!-- Item 1 -->
                    <div class="col-md-4 mb-4 d-flex justify-content-center">
                        <div class="service-item position-relative p-3" style="background-color: rgb(56, 60, 61);">
                            <a href="test.php" class="stretched-link text-decoration-none text-white">
                                <div class="text-start">
                                    <i class="bi bi-activity icon"
                                        style="font-size: 3rem; color: rgb(16, 150, 173);"></i>
                                </div>
                                <p class="mt-2 mb-2 fw-bold">Pelatihan Berbasis Kompetensi</p>
                                <p>Pelatihan kerja yang meniitikberatkan pada penguasaan kemampuan kerja. Kemampuan
                                    kerja tersebut mencakup pengetahuan, keterampilan, dan sikap sesuai standar yang
                                    ditetapkan di tempat kerja.</p>
                            </a>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="col-md-4 mb-4 d-flex justify-content-center">
                        <div class="service-item position-relative p-3" style="background-color: rgb(56, 60, 61);">
                            <a href="test2.php" class="stretched-link text-decoration-none text-white">
                                <div class="text-start">
                                    <i class="bi bi-bounding-box-circles icon"
                                        style="font-size: 3rem; color: rgb(16, 150, 173);"></i>
                                </div>
                                <p class="mt-2 mb-2 fw-bold">Sertifikasi</p>
                                <p>Sertifikasi Badan Nasional Standardisasi Profesi (BNSP) melalui Uji Kompetensi yang
                                    dilaksanakan oleh Lembaga Sertifikasi Profesi di PPKD Jakarta Utara.</p>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4 d-flex justify-content-center">
                        <div class="service-item position-relative p-3" style="background-color: rgb(56, 60, 61);">
                            <a href="test2.php" class="stretched-link text-decoration-none text-white">
                                <div class="text-start">
                                    <i class="bi bi-calendar4-week icon"
                                        style="font-size: 3rem; color: rgb(16, 150, 173);"></i>
                                </div>
                                <p class="mt-2 mb-2 fw-bold">Pemasaran Alumni</p>
                                <p>Peserta pelatihan diberikan kesempatan untuk mengikuti proses rekrutmen kerja dari
                                    perusahaan yang telah bekerja sama dengan PPKD Jakarta Utara atau diberikan
                                    informasi lowongan pekerjaan yang sedang berjalan.
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container"
            style="height: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center;">
            <div class="mb-4">
                <h1 class="fw-light" style="margin-top: 24px;">Tentang PPKD Jakut</h1>
            </div>
            <div class="row p-5">
                <div class="col-5 d-flex justify-content-center align-items-center">
                    <img src="asset/ppkd-potrait.jpg" alt=""
                        style="width: 100%; height: 100%; max-width: 600px; max-height: 80vh;" data-aos="fade-up"
                        data-aos-once="true" data-aos-duration="1000" data-aos-delay="100">
                </div>
                <div class="col-6">
                    <p class="fs-4">Pusat Pelatihan Kerja Daerah Jakarta Utara, Dinas Tenaga Kerja Transmigrasi dan
                        Energi Provinsi DKI Jakarta</p>
                    <ul class="nav nav-tabs mb-3 flex-row" id="aboutTab" role="tablist" style="width: 100%;">
                        <li class="nav-item me-2" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="pill"
                                data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                                aria-selected="true">Profile</button>
                        </li>
                        <li class="nav-item me-2" role="presentation">
                            <button class="nav-link" id="tentang-tab" data-bs-toggle="pill"
                                data-bs-target="#tentang-tab-pane" type="button" role="tab"
                                aria-controls="tentang-tab-pane" aria-selected="false">Visi</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="services-tab" data-bs-toggle="pill"
                                data-bs-target="#services-tab-pane" type="button" role="tab"
                                aria-controls="services-tab-pane" aria-selected="false">Misi</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="aboutTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                            aria-labelledby="home-tab">
                            <p>PPKD Jakarta Utara adalah lembaga pelatihan kerja yang menyediakan berbagai program
                                pelatihan untuk meningkatkan keterampilan dan kompetensi tenaga kerja di wilayah Jakarta
                                Utara.</p>
                            <div class="mb-4">
                                <i class="bi bi-check-lg" aria-hidden="true" style="color: rgb(16, 150, 173);"></i>
                                <b>Tugas dan Fungsi</b>
                                <p>Berdasarkan Peraturan Gubernur Provinsi DKI Jakarta 57 Tahun 2022 tentang Organisasi
                                    dan Tata Kerja Pusat Pelatihan Kerja Daerah, PPKD Jakarta Utara mempunyai tugas
                                    utama melaksanakan pelatihan di berbagai kejuruan.</p>
                            </div>
                            <div class="mb-4">
                                <i class="bi bi-check-lg" aria-hidden="true" style="color: rgb(16, 150, 173);"></i>
                                <b>Sejarah</b>
                                <p>Pusat Pelatihan Kerja Daerah Jakarta Utara berdiri pada tahun 1989 dengan nama Balai
                                    Latihan Kerja Daerah (BLKD) Jakarta Utara, kemudian berganti nama menjadi Pusat
                                    Pelatihan Kerja Daerah (PPKD) Jakarta Utara.</p>
                            </div>
                            <div class="mb-4">
                                <i class="bi bi-check-lg" aria-hidden="true" style="color: rgb(16, 150, 173);"></i>
                                <b>Lokasi</b>
                                <p>PPKD Jakarta Utara terletak di Jl. Gereja Tugu Semper No. 20 Kel. Semper Barat, Kec.
                                    Cilincing, Jakarta Utara.</p>
                            </div>
                        </div>
                        <div class=" tab-pane fade" id="tentang-tab-pane" role="tabpanel" aria-labelledby="tentang-tab">
                            <p>Visi PPKD Jakarta Utara.</p>
                            <div class="mb-4">
                                <i class="bi bi-check-lg" aria-hidden="true" style="color: rgb(16, 150, 173);"></i>
                                <b>Visi</b>
                                <p>Menciptakan peserta pelatihan berkarakter kebangsaan dan siap berkompetisi di dunia
                                    kerja.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="services-tab-pane" role="tabpanel"
                            aria-labelledby="services-tab">
                            <p>Misi PPKD Jakarta Utara.</p>
                            <div class="mb-4">
                                <i class="bi bi-check-lg" aria-hidden="true" style="color: rgb(16, 150, 173);"></i>
                                <b>Misi</b>
                                <p>Memberikan pelayanan pelatihan dan keterampilan bagi masyarakat. Meningkatkan
                                    kompetensi dengan melaksanakan Uji Kompetensi. Memasarkan calon tenaga kerja di
                                    sektor industri.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="layanan" style=" display: flex; align-items: center; justify-content: center;" data-aos="fade-in"
    data-aos-once="true" data-aos-duration="1000" data-aos-delay="100">
    <div class="container-fluid px-0">
        <div class="card mb-4 d-flex" style="background-color: rgb(56, 60, 61); border-radius: 0;">
            <div class="card-body text-white">
                <div class="row justify-content-center m-5">
                    <div class="d-flex flex-column justify-content-center align-items-center mb-5">
                        <h1 class="fw-light">Layanan</h1>
                        <p>Pelatihan yang disediakan PPKD Jakarta Utara</p>
                    </div>
                    <!-- Item 1 -->
                    <div class="col-md-4 mb-4 d-flex justify-content-center" data-aos="fade-right"
                        data-aos-duration="1000" data-aos-delay="100">
                        <div class="card shadow border-0 overflow-hidden zoom-card"
                            style="border-radius: 15px; width: 100%; max-width: 350px; background-color: #2e3b45; transition: transform 0.3s;">
                            <img src="asset/grafis.jpg" class="card-img-top" alt="Pelatihan Reguler"
                                style="height: 200px; object-fit: cover;">

                            <div class="card-body text-center text-white position-relative p-4"
                                style="background-color: rgba(14, 15, 16, 0.5);">

                                <!-- Icon Lingkaran -->
                                <div class="icon-circle position-absolute top-0 start-50 translate-middle"
                                    style="width: 60px; height: 60px; background-color: #0fb1bf; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <i class="bi bi-activity" style="color: white; font-size: 24px;"></i>
                                </div>

                                <!-- Konten -->
                                <h5 class="mt-4 fw-bold">Pelatihan Reguler</h5>
                                <p class="mb-0">
                                    Pelatihan Kerja Berbasis Kompetensi yang dilaksanakan di PPKD Jakarta Utara
                                    <em>(In-House Training)</em>
                                </p>

                                <!-- Link jika diperlukan -->
                                <a href="test.php" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="col-md-4 mb-4 d-flex justify-content-center" data-aos="fade-up" data-aos-duration="1000"
                        data-aos-delay="200">
                        <div class="card shadow border-0 overflow-hidden zoom-card"
                            style="border-radius: 15px; width: 100%; max-width: 350px; background-color: #2e3b45; transition: transform 0.3s;">
                            <img src="asset/motor.jpg" class="card-img-top" alt="Pelatihan Reguler"
                                style="height: 200px; object-fit: cover;">

                            <div class="card-body text-center text-white position-relative p-4"
                                style="background-color: rgba(14, 15, 16, 0.5);">

                                <!-- Icon Lingkaran -->
                                <div class="icon-circle position-absolute top-0 start-50 translate-middle"
                                    style="width: 60px; height: 60px; background-color: #0fb1bf; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <i class="bi bi-broadcast" style="color: white; font-size: 24px;"></i>
                                </div>

                                <!-- Konten -->
                                <h5 class="mt-4 fw-bold">Pelatihan Reguler</h5>
                                <p class="mb-0">
                                    Pelatihan Kerja Berbasis Kompetensi yang dilaksanakan di tempat pemohon pelatihan,
                                    seperti di Balai RT/RW, Karangtaruna, Kantor PKK dst.
                                </p>

                                <!-- Link jika diperlukan -->
                                <a href="test.php" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="col-md-4 mb-4 d-flex justify-content-center" data-aos="fade-left"
                        data-aos-duration="1000" data-aos-delay="300">
                        <div class="card shadow border-0 overflow-hidden zoom-card"
                            style="border-radius: 15px; width: 100%; max-width: 350px; background-color: #2e3b45; transition: transform 0.3s;">
                            <img src="asset/kolaborasiptpl.jpg" class="card-img-top" alt="Pelatihan Reguler"
                                style="height: 200px; object-fit: cover;">

                            <div class="card-body text-center text-white position-relative p-4"
                                style="background-color: rgba(14, 15, 16, 0.5);">

                                <!-- Icon Lingkaran -->
                                <div class="icon-circle position-absolute top-0 start-50 translate-middle"
                                    style="width: 60px; height: 60px; background-color: #0fb1bf; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <i class="bi bi-easel" style="color: white; font-size: 24px;"></i>
                                </div>

                                <!-- Konten -->
                                <h5 class="mt-4 fw-bold">Pelatihan Reguler</h5>
                                <p class="mb-0">
                                    Pelatihan Berbasis kompetensi yang dilaksanakan berdasarkan Nota Kesepahaman Bersama
                                    Perusahaan Kolaborator
                                </p>

                                <!-- Link jika diperlukan -->
                                <a href="test.php" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="alur-reg" style=" display: flex; align-items: center; justify-content: center;" data-aos="fade-in"
    data-aos-once="true" data-aos-duration="1000" data-aos-delay="100">
    <div class="container mt-5">
        <div class="row">
            <div class="col text-center">
                <h1 class="fw-light">Alur Pelatihan Reguler</h1>
            </div>
            <div class="container my-5">
                <!-- Navigation Tab Icons -->
                <ul class="nav justify-content-center flex-wrap gap-3 mb-4" id="trainingTab" role="tablist"
                    style="border-radius: 5px; padding: 16px;">
                    <li class="nav-item" role="presentation" data-aos="fade-right" data-aos-once="true"
                        data-aos-duration="1000" data-aos-delay="100">
                        <button class="nav-link border-0 shadow px-4 py-3 d-flex flex-column align-items-center gap-2"
                            id="pendaftaran-tab" data-bs-toggle="tab" data-bs-target="#pendaftaran" type="button"
                            role="tab"
                            style="background: #1096ad; color: #fff; min-width: 170px; min-height: 110px; border-radius: 5px;">
                            <i class="bi bi-binoculars" style="font-size: 2rem;"></i>
                            <div class="col-sm-2">
                                <div class="d-flex justify-content-center align-items-center">
                                    <span class="fw-bold" style="font-size: 1rem;">Pendaftaran Pelatihan</span>
                                </div>
                            </div>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation" data-aos="fade-left" data-aos-once="true"
                        data-aos-duration="1000" data-aos-delay="100">
                        <button class="nav-link border-0 shadow px-4 py-3 d-flex flex-column align-items-center gap-2"
                            id="pemanggilan-tab" data-bs-toggle="tab" data-bs-target="#pemanggilan" type="button"
                            role="tab"
                            style="background: #f3f6fa; color: #7e00c7; min-width: 170px; min-height: 110px; border-radius: 5px;">
                            <i class="bi bi-box" style="font-size: 2rem;"></i>
                            <div class="col-sm-2">
                                <div class="d-flex justify-content-center align-items-center">
                                    <span class="fw-bold" style="font-size: 1rem;">Pemanggilan Seleksi</span>
                                </div>
                            </div>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation" data-aos="fade-up" data-aos-once="true"
                        data-aos-duration="1000" data-aos-delay="100">
                        <button class="nav-link border-0 shadow px-4 py-3 d-flex flex-column align-items-center gap-2"
                            id="seleksi-tab" data-bs-toggle="tab" data-bs-target="#seleksi" type="button" role="tab"
                            style="background: #f3f6fa; color: #00c79f; min-width: 170px; min-height: 120px; border-radius: 5px;">
                            <i class="bi bi-brightness-high" style="font-size: 2rem;"></i>
                            <div class="col-sm-2">
                                <div class="d-flex justify-content-center align-items-center mt-3">
                                    <span class="fw-bold" style="font-size: 1rem;">Seleksi</span>
                                </div>
                            </div>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation" data-aos="fade-down" data-aos-once="true"
                        data-aos-duration="1000" data-aos-delay="100">
                        <button class="nav-link border-0 shadow px-4 py-3 d-flex flex-column align-items-center gap-2"
                            id="pengumuman-tab" data-bs-toggle="tab" data-bs-target="#pengumuman" type="button"
                            role="tab"
                            style="background: #f3f6fa; color: #dc3545; min-width: 170px; min-height: 120px; border-radius: 5px;">
                            <i class="bi bi-command" style="font-size: 2rem;"></i>
                            <div class="col-sm-2">
                                <div class="d-flex justify-content-center align-items-center mt-3">
                                    <span class="fw-bold" style="font-size: 1rem;">Pengumuman</span>
                                </div>
                            </div>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation" data-aos="fade-right" data-aos-once="true"
                        data-aos-duration="1000" data-aos-delay="100">
                        <button class="nav-link border-0 shadow px-4 py-3 d-flex flex-column align-items-center gap-2"
                            id="proses-tab" data-bs-toggle="tab" data-bs-target="#proses" type="button" role="tab"
                            style="background: #f3f6fa; color: #007bff; min-width: 170px; min-height: 110px; border-radius: 5px;">
                            <i class="bi bi-easel" style="font-size: 2rem;"></i>
                            <div class="col-sm-2">
                                <div class="d-flex justify-content-center align-items-center">
                                    <span class="fw-bold" style="font-size: 1rem;">Proses Pelatihan</span>
                                </div>
                            </div>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation" data-aos="fade-left" data-aos-once="true"
                        data-aos-duration="1000" data-aos-delay="100">
                        <button class="nav-link border-0 shadow px-4 py-3 d-flex flex-column align-items-center gap-2"
                            id="uji-tab" data-bs-toggle="tab" data-bs-target="#uji" type="button" role="tab"
                            style="background: #f3f6fa; color: orange; min-width: 170px; min-height: 110px; border-radius: 5px;">
                            <i class="bi bi-map" style="font-size: 2rem;"></i>
                            <div class="col-sm-2">
                                <div class="d-flex justify-content-center align-items-center">
                                    <span class="fw-bold" style="font-size: 1rem;">Uji Kompetensi</span>
                                </div>
                            </div>
                        </button>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content mt-4 p-4 rounded shadow" id="trainingTabContent" style="background: #fff;">
                    <div class="tab-pane fade show active" id="pendaftaran" role="tabpanel">
                        <p class="fs-4 fw-bold mb-4 text-primary">Pendaftaran Pelatihan</p>
                        <div class="row align-items-start g-4">
                            <!-- Deskripsi -->
                            <div class="col-md-8">
                                <p>Pendaftaran dapat dilaksanakan secara online melalui website PPKD Jakarta Utara
                                    maupun langsung datang ke lokasi. Adapun persyaratan yang dibutuhkan untuk
                                    pendaftaran adalah sebagai berikut:</p>

                                <!-- Persyaratan utama -->
                                <ul class="list-unstyled">
                                    <li class="mb-2 d-flex">
                                        <i class="bi bi-check-circle-fill text-info me-2"
                                            style="font-size: 1.2rem;"></i>
                                        <span>Warga DKI Jakarta yang dibuktikan dengan Scan KTP atau Surat Keterangan
                                            Domisili</span>
                                    </li>
                                    <li class="mb-2 d-flex">
                                        <i class="bi bi-check-circle-fill text-info me-2"
                                            style="font-size: 1.2rem;"></i>
                                        <span>Minimal Berusia 17 Tahun</span>
                                    </li>
                                </ul>

                                <p class="mt-4 mb-2">Selain itu, data lainnya yang diperlukan adalah:</p>

                                <!-- Data tambahan -->
                                <ul class="list-unstyled">
                                    <li class="mb-2 d-flex">
                                        <i class="bi bi-check-circle-fill text-info me-2"
                                            style="font-size: 1.2rem;"></i>
                                        <span>Scan Kartu Keluarga</span>
                                    </li>
                                    <li class="mb-2 d-flex">
                                        <i class="bi bi-check-circle-fill text-info me-2"
                                            style="font-size: 1.2rem;"></i>
                                        <span>Scan Ijazah Terakhir</span>
                                    </li>
                                    <li class="mb-2 d-flex">
                                        <i class="bi bi-check-circle-fill text-info me-2"
                                            style="font-size: 1.2rem;"></i>
                                        <span>Berkas scan pas foto 3x4 dengan background merah</span>
                                    </li>
                                </ul>
                            </div>

                            <!-- Gambar -->
                            <div class="col-4 d-flex justify-content-center align-items-center">
                                <img src="asset/features-1.jpg" alt="Fitur Pelatihan" class="img-fluid"
                                    style="max-width: 350px; height: auto; width: auto;">
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pemanggilan" role="tabpanel">
                        <p class="fs-4 fw-bold mb-4 text-primary">Pemanggilan Seleksi</p>
                        <div class="row align-items-start g-4">
                            <!-- Deskripsi -->
                            <div class="col-md-8">
                                <p>Calon peserta pelatihan yang sudah mendaftar akan dipanggil untuk melaksanakan
                                    seleksi melalui Whatsapp, info pemanggilan seleksi berupa :</p>

                                <!-- Persyaratan utama -->
                                <ul class="list-unstyled">
                                    <li class="mb-2 d-flex">
                                        <i class="bi bi-check-circle-fill text-info me-2"
                                            style="font-size: 1.2rem;"></i>
                                        <span>Hari, Tanggal dan Waktu Seleksi</span>
                                    </li>
                                    <li class="mb-2 d-flex">
                                        <i class="bi bi-check-circle-fill text-info me-2"
                                            style="font-size: 1.2rem;"></i>
                                        <span>Tempat Pelaksanaan Seleksi</span>
                                    </li>
                                    <li class="mb-2 d-flex">
                                        <i class="bi bi-check-circle-fill text-info me-2"
                                            style="font-size: 1.2rem;"></i>
                                        <span>Pakaian yang dikenakan</span>
                                    </li>
                                </ul>

                                <p class="mt-4 mb-2">Calon peserta diminta untuk konfirmasi kehadiran seleksi melalui
                                    pesan Whatsapp yang ada.</p>
                            </div>

                            <!-- Gambar -->
                            <div class="col-4 d-flex justify-content-center align-items-center">
                                <img src="asset/features-2.jpg" alt="Fitur Pelatihan" class="img-fluid"
                                    style="max-width: 350px; height: 300px; width: 300px;">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="seleksi" role="tabpanel">
                        <p class="fs-4 fw-bold mb-4 text-primary">Seleksi</p>
                        <div class="row align-items-start g-4">
                            <!-- Deskripsi -->
                            <div class="col-md-8">
                                <p>Seleksi masing-masing program pelatihan terbagi menjadi 2 tahap :</p>

                                <!-- Persyaratan utama -->
                                <ul class="list-unstyled">
                                    <li class="mb-2 d-flex">
                                        <i class="bi bi-check-circle-fill text-info me-2"
                                            style="font-size: 1.2rem;"></i>
                                        <span>Seleksi Tertulis</span>
                                    </li>
                                    <li class="mb-2 d-flex">
                                        <i class="bi bi-check-circle-fill text-info me-2"
                                            style="font-size: 1.2rem;"></i>
                                        <span>Seleksi Wawancara</span>
                                    </li>
                                    <li class="mb-2 d-flex">
                                        <i class="bi bi-check-circle-fill text-info me-2"
                                            style="font-size: 1.2rem;"></i>
                                        <span>Pakaian yang dikenakan</span>
                                    </li>
                                </ul>

                                <p class="mt-4 mb-3">Peserta pelatihan diminta membawa smartphone untuk pelaksanaan
                                    seleksi tertulis.</p>
                                <p>Setelah seleksi tertulis, dilanjutkan seleksi wawancara oleh instruktur pengampu
                                    program pelatihan.</p>
                            </div>

                            <!-- Gambar -->
                            <div class="col-4 d-flex justify-content-center align-items-center">
                                <img src="asset/features-2.svg" alt="Fitur Pelatihan" class="img-fluid"
                                    style="max-width: 350px; height: 300px; width: 300px;">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pengumuman" role="tabpanel">
                        <p class="fs-4 fw-bold mb-4 text-primary">Proses Pelatihan</p>
                        <div class="row align-items-start g-4">
                            <!-- Deskripsi -->
                            <div class="col-md-8">
                                <p>Informasi kelulusan seleksi peserta pelatihan diumumkan melalui website atau
                                    instagram PPKD Jakut, kemudian peserta yang dinyatakan lulus seleksi diminta untuk
                                    mengikuti technical meeting atau pengarahan pra-pelatihan yang menginformasikan :
                                </p>

                                <!-- Persyaratan utama -->
                                <ul class="list-unstyled">
                                    <li class="mb-2 d-flex">
                                        <i class="bi bi-check-circle-fill text-info me-2"
                                            style="font-size: 1.2rem;"></i>
                                        <span>Jadwal pelatihan untuk masing-masing program pelatihan</span>
                                    </li>
                                    <li class="mb-2 d-flex">
                                        <i class="bi bi-check-circle-fill text-info me-2"
                                            style="font-size: 1.2rem;"></i>
                                        <span>Detail kegiatan pelatihan</span>
                                    </li>
                                    <li class="mb-2 d-flex">
                                        <i class="bi bi-check-circle-fill text-info me-2"
                                            style="font-size: 1.2rem;"></i>
                                        <span>Hak dan kewajiban peserta pelatihan</span>
                                    </li>
                                </ul>
                            </div>

                            <!-- Gambar -->
                            <div class="col-4 d-flex justify-content-center align-items-center">
                                <img src="asset/features-4.svg" alt="Fitur Pelatihan" class="img-fluid"
                                    style="max-width: 350px; height: 300px; width: 300px;">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="proses" role="tabpanel">
                        <p class="fs-4 fw-bold mb-4 text-primary">Proses Pelatihan</p>
                        <div class="row align-items-start g-4">
                            <!-- Deskripsi -->
                            <div class="col-md-8">
                                <p>Peserta yang lulus seleksi akan mengikuti pelatihan kerja berbasis kompetensi dari
                                    instruktur profesional Selama 15, 30 atau 45 hari kerja sesuai dengan program
                                    pelatihan yang diikuti secara gratis dan mendapat benefit</p>

                                <!-- Persyaratan utama -->
                                <ul class="list-unstyled">
                                    <li class="mb-2 d-flex">
                                        <i class="bi bi-check-circle-fill text-info me-2"
                                            style="font-size: 1.2rem;"></i>
                                        <span>Pelatihan Keterampilan Inti dari Instruktur Bersertifikat</span>
                                    </li>
                                    <li class="mb-2 d-flex">
                                        <i class="bi bi-check-circle-fill text-info me-2"
                                            style="font-size: 1.2rem;"></i>
                                        <span> Pelatihan Fisik-Mental-Disiplin dari Anggota TNI Koramil 05
                                            Cilincing</span>
                                    </li>
                                    <li class="mb-2 d-flex">
                                        <i class="bi bi-check-circle-fill text-info me-2"
                                            style="font-size: 1.2rem;"></i>
                                        <span>Modul & Bahan Pelatihan</span>
                                    </li>
                                    <li class="mb-2 d-flex">
                                        <i class="bi bi-check-circle-fill text-info me-2"
                                            style="font-size: 1.2rem;"></i>
                                        <span>Seragam Pelatihan</span>
                                    </li>
                                    <li class="mb-2 d-flex">
                                        <i class="bi bi-check-circle-fill text-info me-2"
                                            style="font-size: 1.2rem;"></i>
                                        <span>Materi Softskill</span>
                                    </li>
                                    <li class="mb-2 d-flex">
                                        <i class="bi bi-check-circle-fill text-info me-2"
                                            style="font-size: 1.2rem;"></i>
                                        <span>Kunjungan Industri</span>
                                    </li>
                                    <li class="mb-2 d-flex">
                                        <i class="bi bi-check-circle-fill text-info me-2"
                                            style="font-size: 1.2rem;"></i>
                                        <span>Makan siang dan Snack</span>
                                    </li>
                                    <li class="mb-2 d-flex">
                                        <i class="bi bi-check-circle-fill text-info me-2"
                                            style="font-size: 1.2rem;"></i>
                                        <span>Sertifikat Pelatihan dan Sertifikat BNSP</span>
                                    </li>
                                </ul>
                            </div>

                            <!-- Gambar -->
                            <div class="col-4 d-flex justify-content-center align-items-center">
                                <img src="asset/features-5.svg" alt="Fitur Pelatihan" class="img-fluid"
                                    style="max-width: 350px; height: 350px; width: 350px;">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="uji" role="tabpanel">
                        <p class="fs-4 fw-bold mb-4 text-primary">Uji Kompetensi</p>
                        <div class="row align-items-start g-4">
                            <!-- Deskripsi -->
                            <div class="col-md-8">
                                <p>Uji kompetensi dilaksanakan setelah pelatihan di PPKD Jakarta Utara oleh Asesor yang
                                    ditugaskan Lembaga Sertifikasi Profesi (LSP) terkait skema kompetensi sesuai
                                    kejuruan. LSP merupakan lembaga penyelenggara sertifikasi yang memiliki Lisensi dari
                                    Badan Nasional Sertifikasi Profesi (BNSP). Persyaratan Mengikuti Uji Kompetensi
                                    diantaranya</p>

                                <!-- Persyaratan utama -->
                                <ul class="list-unstyled">
                                    <li class="mb-2 d-flex">
                                        <i class="bi bi-check-circle-fill text-info me-2"
                                            style="font-size: 1.2rem;"></i>
                                        <span>Sertifikat Pelatihan Terkait.</span>
                                    </li>
                                    <li class="mb-2 d-flex">
                                        <i class="bi bi-check-circle-fill text-info me-2"
                                            style="font-size: 1.2rem;"></i>
                                        <span>Ijazah terakhir.</span>
                                    </li>
                                    <li class="d-flex">
                                        <i class="bi bi-check-circle-fill text-info me-2"
                                            style="font-size: 1.2rem;"></i>
                                        <span>Pasfoto 3x4 background merah 2 lembar</span>
                                    </li>
                                </ul>
                            </div>

                            <!-- Gambar -->
                            <div class="col-4 d-flex justify-content-center align-items-center">
                                <img src="asset/ujk.png" alt="Fitur Pelatihan" class="img-fluid"
                                    style="max-width: 350px; height: 350px; width: 350px;">
                            </div>

                            <button type="button" class="btn btn-primary">Daftar Pelatihan Sekarang!</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="alur-mtu" style=" display: flex; align-items: center; justify-content: center;" data-aos="fade-in"
    data-aos-once="true" data-aos-duration="1000" data-aos-delay="100">
    <div class="container-fluid mt-5 px-0">
        <div class="card mb-4 d-flex" style="background-color: rgb(56, 60, 61); border-radius: 0;">
            <div class="card-body text-white">
                <div class="row p-5">
                    <div class="col text-center">
                        <h1 class="fw-light">Alur Pelatihan MTU</h1>
                    </div>
                    <div class="container my-5">
                        <!-- Navigation Tab Icons -->
                        <ul class="nav justify-content-center flex-wrap gap-3 mb-4" id="trainingMTUTab" role="tablist"
                            style="border-radius: 5px; padding: 16px;">
                            <li class="nav-item" role="presentation" style="flex: 1 1 170px; min-width: 170px;"
                                data-aos="fade-right" data-aos-once="true" data-aos-duration="1000"
                                data-aos-delay="100">
                                <button
                                    class="nav-link border-0 shadow px-4 py-3 d-flex flex-column align-items-center gap-2 w-100 h-100"
                                    id="pendaftaran-mtu-tab" data-bs-toggle="tab" data-bs-target="#pendaftaran-mtu"
                                    type="button" role="tab"
                                    style="background: #1096ad; color: #fff; min-height: 120px; border-radius: 5px;">
                                    <i class="bi bi-binoculars" style="font-size: 2rem;"></i>
                                    <span class="fw-bold" style="font-size: 1rem;">Unduh Format Surat Permohonan
                                        Pelatihan MTU</span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation" style="flex: 1 1 170px; min-width: 170px;"
                                data-aos="fade-up" data-aos-once="true" data-aos-duration="1000" data-aos-delay="100">
                                <button
                                    class="nav-link border-0 shadow px-4 py-3 d-flex flex-column align-items-center gap-2 w-100 h-100"
                                    id="pemanggilan-mtu-tab" data-bs-toggle="tab" data-bs-target="#pemanggilan-mtu"
                                    type="button" role="tab"
                                    style="background-color: rgb(56, 60, 61); color: #7e00c7; min-height: 120px; border-radius: 5px;">
                                    <i class="bi bi-box-seam" style="font-size: 2rem;"></i>
                                    <span class="fw-bold" style="font-size: 1rem;">Pengajuan Permohonan Pelatihan
                                        MTU</span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation" style="flex: 1 1 170px; min-width: 170px;"
                                data-aos="fade-down" data-aos-once="true" data-aos-duration="1000" data-aos-delay="100">
                                <button
                                    class="nav-link border-0 shadow px-4 py-3 d-flex flex-column align-items-center gap-2 w-100 h-100"
                                    id="seleksi-mtu-tab" data-bs-toggle="tab" data-bs-target="#seleksi-mtu"
                                    type="button" role="tab"
                                    style="background-color: rgb(56, 60, 61); color: #00c79f; min-height: 120px; border-radius: 5px;">
                                    <i class="bi bi-brightness-high" style="font-size: 2rem;"></i>
                                    <div class="mt-2">
                                        <span class="fw-bold" style="font-size: 1rem;">Survey Lokasi</span>
                                    </div>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation" style="flex: 1 1 170px; min-width: 170px;"
                                data-aos="fade-left" data-aos-once="true" data-aos-duration="1000" data-aos-delay="100">
                                <button
                                    class="nav-link border-0 shadow px-4 py-3 d-flex flex-column align-items-center gap-2 w-100 h-100"
                                    id="pengumuman-mtu-tab" data-bs-toggle="tab" data-bs-target="#pengumuman-mtu"
                                    type="button" role="tab"
                                    style="background-color: rgb(56, 60, 61); color: #356ddcff; min-height: 120px; border-radius: 5px;">
                                    <i class="bi bi-easel" style="font-size: 2rem;"></i>
                                    <div class="mt-2">
                                        <span class="fw-bold" style="font-size: 1rem;">Proses Pelatihan</span>
                                    </div>
                                </button>
                            </li>
                        </ul>

                        <!-- Tab Content -->
                        <div class="tab-content mt-4 p-4 rounded" id="trainingMTUTabContent"
                            style="background-color: rgb(56, 60, 61); ">
                            <div class="tab-pane fade show active" id="pendaftaran-mtu" role="tabpanel"
                                aria-labelledby="pendaftaran-mtu-tab">
                                <p class="fs-4 fw-bold mb-3 text-primary">Unduh Format Surat Permohonan Pelatihan MTU
                                </p>
                                <div class="row align-items-start g-4">
                                    <div class="col-md-8">
                                        <p>Pelatihan MTU merupakan pelatihan yang dilaksanakan di tempat pemohon
                                            pelatihan, seperti LMK, Balai RT/RW dst. Pendaftaran Pelatihan MTU diajukan
                                            secara kolektif untuk 10 orang peserta dalam 1 program pelatihan.
                                            Pendaftaran kolektif tersebut diajukan oleh perwakilan pemohon pelatihan
                                            dengan mengajukan surat permohonan. Contoh format surat permohonan pelatihan
                                            MTU pada link berikut :</p>
                                        <a href="asset/doc/SuratPermohonanMTU.docx" class="btn btn-info mb-3"
                                            download>Unduh Format Surat Permohonan</a>
                                    </div>
                                    <div class="col-4 d-flex justify-content-center align-items-center">
                                        <img src="asset/features-1.jpg" alt="Surat Permohonan MTU" class="img-fluid"
                                            style="max-width: 350px; height: auto; width: auto;">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pemanggilan-mtu" role="tabpanel"
                                aria-labelledby="pemanggilan-mtu-tab">
                                <p class="fs-4 fw-bold mb-4 text-primary">Pengajuan Permohonan Pelatihan MTU</p>
                                <div class="row align-items-start g-4">
                                    <div class="col-md-8">
                                        <p>Pemohon pelatihan dapat mengunggah berkas permohonan pelatihan MTU yang sudah
                                            dibuat ke laman website PPKDJU dan mengisi data :</p>
                                        <ul class="list-unstyled">
                                            <li class="mb-2 d-flex">
                                                <i class="bi bi-check-circle-fill text-info me-2"
                                                    style="font-size: 1.2rem;"></i>
                                                <span>Nama Pemohon.</span>
                                            </li>
                                            <li class="mb-2 d-flex">
                                                <i class="bi bi-check-circle-fill text-info me-2"
                                                    style="font-size: 1.2rem;"></i>
                                                <span>No Whatsapp Pemohon.</span>
                                            </li>
                                            <li class="mb-2 d-flex">
                                                <i class="bi bi-check-circle-fill text-info me-2"
                                                    style="font-size: 1.2rem;"></i>
                                                <span>Link Peta Kandidat Lokasi Pelatihan (Google Map).</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-4 d-flex justify-content-center align-items-center">
                                        <img src="asset/features-2.jpg" alt="Pengajuan Permohonan MTU" class="img-fluid"
                                            style="max-width: 350px; height: 300px; width: 300px;">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="seleksi-mtu" role="tabpanel"
                                aria-labelledby="seleksi-mtu-tab">
                                <p class="fs-4 fw-bold mb-4 text-primary">Survey Lokasi</p>
                                <div class="row align-items-start g-4">
                                    <div class="col-md-8">
                                        <p>Survey lokasi dilaksanakan oleh tim PPKD Jakarta Utara untuk memastikan
                                            kelayakan lokasi pelatihan MTU dengan mempertimbangkan :</p>
                                        <ul class="list-unstyled">
                                            <li class="mb-2 d-flex">
                                                <i class="bi bi-check-circle-fill text-info me-2"
                                                    style="font-size: 1.2rem;"></i>
                                                <span>Akses Jalan.</span>
                                            </li>
                                            <li class="mb-2 d-flex">
                                                <i class="bi bi-check-circle-fill text-info me-2"
                                                    style="font-size: 1.2rem;"></i>
                                                <span>Ruang Pelatihan.</span>
                                            </li>
                                            <li class="mb-2 d-flex">
                                                <i class="bi bi-check-circle-fill text-info me-2"
                                                    style="font-size: 1.2rem;"></i>
                                                <span>Sumber Listrik dan Air.</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-4 d-flex justify-content-center align-items-center">
                                        <img src="asset/features-2.svg" alt="Survey Lokasi MTU" class="img-fluid"
                                            style="max-width: 350px; height: 300px; width: 300px;">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pengumuman-mtu" role="tabpanel"
                                aria-labelledby="pengumuman-mtu-tab">
                                <p class="fs-4 fw-bold mb-4 text-primary">Proses Pelatihan</p>
                                <div class="row align-items-start g-4">
                                    <div class="col-md-8">
                                        <p>Setelah proses survey dan dinyatakan layak, pelatihaan akan dilaksanakan pada
                                            lokasi tersebut diampu oleh instruktur profesional Selama 160, 180, 240 atau
                                            260 Jam Pelatihan (JPL) sesuai dengan program pelatihan yang diikuti secara
                                            gratis dan mendapat benefit.</p>
                                        <ul class="list-unstyled">
                                            <li class="mb-2 d-flex">
                                                <i class="bi bi-check-circle-fill text-info me-2"
                                                    style="font-size: 1.2rem;"></i>
                                                <span>Pelatihan Keterampilan Inti dari Instruktur Bersertifikat.</span>
                                            </li>
                                            <li class="mb-2 d-flex">
                                                <i class="bi bi-check-circle-fill text-info me-2"
                                                    style="font-size: 1.2rem;"></i>
                                                <span>Modul & Bahan Pelatihan.</span>
                                            </li>
                                            <li class="mb-2 d-flex">
                                                <i class="bi bi-check-circle-fill text-info me-2"
                                                    style="font-size: 1.2rem;"></i>
                                                <span> Seragam Pelatihan.</span>
                                            </li>
                                            <li class="mb-2 d-flex">
                                                <i class="bi bi-check-circle-fill text-info me-2"
                                                    style="font-size: 1.2rem;"></i>
                                                <span>Makan siang dan Snack.</span>
                                            </li>
                                            <li class="mb-2 d-flex">
                                                <i class="bi bi-check-circle-fill text-info me-2"
                                                    style="font-size: 1.2rem;"></i>
                                                <span>Sertifikat Pelatihan.</span>
                                            </li>
                                        </ul>
                                        <a href="#" class="btn btn-info mb-3" target="_blank">Daftar Pelatihan
                                            Sekarang!</a>
                                    </div>
                                    <div class="col-4 d-flex justify-content-center align-items-center">
                                        <img src="asset/features-5.svg" alt="Proses Pelatihan MTU" class="img-fluid"
                                            style="max-width: 350px; height: 300px; width: 300px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="alamat" style=" display: flex; align-items: center; justify-content: center;" data-aos="fade-in"
    data-aos-once="true" data-aos-duration="1000" data-aos-delay="100">
    <div class="container-fluid mt-5 px-0 py-5">
        <div class="row">
            <div class="d-flex flex-column justify-content-center align-items-center mb-5">
                <h1 class="fw-light">Alamat</h1>
                <p>Jalan Gereja Tugu No 20 Semper Barat, Kecamatan Cilincing, Kota Administrasi Jakarta Utara, DKI
                    Jakarta 14130</p>
            </div>
            <iframe class="full-width-map"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2407378597173!2d106.92124269999999!3d-6.1258052!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a200f48b528b1%3A0x76f0b97c23e8b33d!2sPPKD%20Jakarta%20Utara!5e0!3m2!1sid!2sid!4v1721112345678!5m2!1sid!2sid"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" data-aos="flip-down"
                data-aos-once="true" data-aos-duration="1500" data-aos-delay="100"></iframe>
        </div>
    </div>
</section>

<?php include APPPATH . 'Views/inc/footer.php'; ?>