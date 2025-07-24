<section id="pelatihanReg" style="display: flex; align-items: center; justify-content: center;" data-aos="fade-in"
    data-aos-once="true" data-aos-duration="1000" data-aos-delay="100">
    <div class="container-fluid mt-5 px-0">
        <div class="col text-center mb-4">
            <h1 class="fw-light">Kelas Pelatihan</h1>
        </div>
        <div class="container my-5">
            <?php if (isset($data) && count($data) > 0): ?>
                <!-- Form Pencarian -->
                <form method="get" class="mb-5">
                    <div class="row justify-content-center">
                        <div class="col-md-4 mb-2">
                            <input type="text" name="q" class="form-control" placeholder="Cari judul atau perusahaan..."
                                value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '' ?>">
                        </div>
                        <div class="col-md-2 mb-2">
                            <button type="submit" class="btn btn-info text-white w-50">Cari</button>
                        </div>
                    </div>
                </form>

                <?php
                // Filter data berdasarkan pencarian nama_jurusan
                $filteredData = $data;
                if (isset($_GET['q']) && trim($_GET['q']) !== '') {
                    $q = strtolower(trim($_GET['q']));
                    $filteredData = array_filter($data, function ($item) use ($q) {
                        return strpos(strtolower($item['nama_jurusan']), $q) !== false;
                    });
                }
                ?>

                <div class="row g-4 justify-content-center" style="font-size: 1.1rem;">
                    <?php if (count($filteredData) > 0): ?>
                        <?php foreach ($filteredData as $pelatihan): ?>
                            <div class="col-12 col-sm-6 col-md-4 d-flex justify-content-center">
                                <div class="card shadow" style="width: 25rem;">
                                    <img src="<?= base_url('uploads/class_photos/' . $pelatihan['photos']) ?>" class="card-img-top"
                                        alt="Photo Kelas" style="height: 210px; object-fit: cover;" />
                                    <div class="card-body">
                                        <h5 class="card-title text-secondary">
                                            MTU - <?= htmlspecialchars($pelatihan['nama_jurusan']) ?>
                                        </h5>
                                        <p class="badge bg-primary rounded-pill" style="font-size: 0.7rem; padding: 0.5em 0.8em;">
                                            <?= htmlspecialchars($pelatihan['skema_biaya']) ?>
                                        </p>
                                    </div>
                                    <div class="card-footer bg-white">
                                        <div class="mb-2" style="min-height: 20px;">
                                            <small class="text-muted">
                                                <?= nl2br(htmlspecialchars($pelatihan['deskripsi'])) ?>
                                            </small>
                                        </div>
                                        <div class="d-flex align-items-center mb-4">
                                            <i class="bi bi-calendar-event text-info me-2"></i>
                                            <span class="fw-light">
                                                <?php
                                                // Cari jadwal yang sesuai dengan pelatihan saat ini
                                                $classStart = '-';
                                                if (isset($jadwal) && is_array($jadwal)) {
                                                    foreach ($jadwal as $j) {
                                                        if ($j['major_id'] == $pelatihan['id']) {
                                                            $classStart = date('d F Y', strtotime($j['class_start']));
                                                            break;
                                                        }
                                                    }
                                                }
                                                ?>
                                                <?= htmlspecialchars($classStart) ?>
                                            </span>
                                        </div>
                                        <a href="registration/regis-mtu"
                                            class="btn btn-info text-white w-100 rounded-pill shadow py-2 mb-3">
                                            <i class="bi bi-pencil-square me-1"></i> Daftar Sekarang
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div style="min-height: 60vh; width: 100%;">
                            <div class="alert alert-danger" role="alert">
                                Tidak ada data pelatihan yang ditemukan untuk pencarian ini.
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <div style="min-height: 60vh; width: 100%;">
                    <div class="alert alert-warning" role="alert">
                        Tidak ada data pelatihan yang tersedia.
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>