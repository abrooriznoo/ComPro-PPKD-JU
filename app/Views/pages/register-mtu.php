<div class="container my-5">
    <div class="row">
        <!-- Keterangan -->
        <div class="col-md-4 mb-4">
            <div class="p-4 shadow">
                <h5 class="mb-3">Keterangan</h5>
                <p>Pendaftaran MTU dilakukan secara kolektif dengan mengajukan surat permohonan.
                    Format surat permohonan dapat diunduh :</p>
                <div class="d-flex mb-4">
                    <a href="../../asset/doc/SuratPermohonanMTU.docx" class="btn btn-info text-white me-2">Unduh Surat
                        Permohonan</a>
                </div>
                <div class="d-flex align-items-start mb-3">
                    <p>Pelaksanaan Pelatihan akan ditetapkan setelah survey lokasi pelatihan</p>
                </div>
                <div class="d-flex align-items-start mb-3">
                    <span class="me-2" style="font-size: 1.5rem; color: #0dcaf0;">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <div>
                        <p class="mb-1"><strong>Email:</strong></p>
                        <p class="mb-0">ppkdjakartautara@gmail.com</p>
                    </div>
                </div>
                <div class="d-flex align-items-start mb-3">
                    <span class="me-2" style="font-size: 1.5rem; color: #0dcaf0;">
                        <i class="bi bi-whatsapp"></i>
                    </span>
                    <div>
                        <p class="mb-1"><strong>WhatsApp:</strong></p>
                        <p class="mb-0">+62 857 7927 1286</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form -->
        <div class="col-md-8 shadow">
            <form action="/registrasi/storeMTU" method="POST" enctype="multipart/form-data" class="p-4">
                <?= csrf_field() ?>

                <h4 class="mb-4">Form Pendaftaran</h4>

                <div class="mb-3">
                    <label>Nama Lengkap:</label>
                    <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" required>
                </div>

                <div class="mb-3">
                    <label>Nomor WhatsApp/Telepon:</label>
                    <input type="text" name="no_telepon" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Link Kandidat Lokasi Pelatihan(Google Maps):</label>
                    <input type="text" name="link_lokasi" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Minat Pelatihan:</label>
                    <select name="major_id" id="major_id" class="form-control">
                        <option value="">------</option>
                        <?php foreach ($majors as $class): ?>
                            <?php if (isset($class['is_mtu']) && $class['is_mtu'] == 1): ?>
                                <option value="<?= htmlspecialchars($class['id']) ?>">
                                    <?= htmlspecialchars($class['nama_jurusan']) ?>
                                </option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Surat Permohonan (format jpg/png/jpeg | maks 1 MB):</label>
                    <input type="file" name="surat_permohonan" accept=".jpg,.jpeg,.png,.pdf" class="form-control">
                </div>

                <!-- CAPTCHA -->
                <div class="g-recaptcha my-3" data-sitekey="6LcnAokrAAAAAIsAI7pHIZbaw8Kro7N00NmBIjUE"></div>

                <button type="submit" class="btn btn-info text-white">Daftar</button>
            </form>
        </div>
    </div>
</div>