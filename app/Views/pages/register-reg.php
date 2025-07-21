<div class="container my-5">
    <div class="row">
        <!-- Keterangan -->
        <div class="col-md-4 mb-4">
            <div class="p-4 shadow">
                <h5 class="mb-3">Keterangan</h5>
                <p>Pelaksanaan seleksi akan diinformasikan melalui WhatsApp sebelum jadwal pelatihan dimulai.</p>
                <hr>
                <div class="d-flex align-items-start mb-3">
                    <span class="me-2" style="font-size: 1.5rem; color: #0dcaf0;">
                        <i class="bi bi-geo-alt"></i>
                    </span>
                    <div>
                        <p class="mb-1"><strong>Lokasi Seleksi:</strong></p>
                        <p class="mb-0">Jalan Raya Gereja Tugu No 20 Semper Barat, Cilincing, Jakarta Utara</p>
                    </div>
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
            <form action="/registrasi/storeReg" method="POST" enctype="multipart/form-data" class="p-4">
                <?= csrf_field() ?>

                <h4 class="mb-4">Form Pendaftaran</h4>

                <div class="mb-3">
                    <label>Nama Lengkap:</label>
                    <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" required>
                </div>

                <div class="mb-3">
                    <label>Nomor Induk Kependudukan (NIK):</label>
                    <input type="text" name="nik" class="form-control" placeholder="NIK" required>
                </div>

                <div class="mb-3">
                    <label>Nomor Kartu Keluarga:</label>
                    <input type="text" name="no_kk" class="form-control" placeholder="Nomor Kartu Keluarga" required>
                </div>

                <div class="mb-3">
                    <label>Tempat Lahir:</label>
                    <input type="text" name="tempat_lahir" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Tanggal Lahir (misal: 29-02-1996):</label>
                    <input type="date" name="tanggal_lahir" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Jenis Kelamin:</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option value="">------</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Nomor WhatsApp/Telepon:</label>
                    <input type="text" name="no_telepon" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Pendidikan Terakhir:</label>
                    <select name="pendidikan" id="pendidikan" class="form-control">
                        <option value="">------</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMK">SMK</option>
                        <option value="SMA">SMA</option>
                        <option value="D1">D1</option>
                        <option value="D2">D2</option>
                        <option value="D3">D3</option>
                        <option value="D4">D4</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                        <option value="PAKET A">PAKET A</option>
                        <option value="PAKET B">PAKET B</option>
                        <option value="PAKET C">PAKET C</option>
                        <option value="TIDAK ADA">TIDAK ADA</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Tahun Lulus:</label>
                    <input type="text" name="tahun_lulus" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Pekerjaan:</label>
                    <select name="pekerjaan" id="pekerjaan" class="form-control">
                        <option value="">------</option>
                        <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                        <option value="Karyawan Swasta">Karyawan Swasta</option>
                        <option value="Mengurus Rumah Tangga">Mengurus Rumah Tangga</option>
                        <option value="Wirausaha">Wirausaha</option>
                        <option value="PNS/Karyawan BUMN/BUMD">PNS/Karyawan BUMN/BUMD</option>
                        <option value="Belum/Tidak Bekerja">Belum/Tidak Bekerja</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Alamat Email:</label>
                    <input type="email" name="email" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Minat Pelatihan:</label>
                    <select name="major_id" id="major_id" class="form-control">
                        <option value="">------</option>
                        <?php foreach ($majors as $class): ?>
                            <option value="<?= htmlspecialchars($class['id']) ?>">
                                <?= htmlspecialchars($class['nama_jurusan']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Nama Jalan (Sesuai KTP atau Surat Domisili):</label>
                    <input type="text" name="nama_jalan" class="form-control">
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label>RT:</label>
                        <input type="text" name="rt" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>RW:</label>
                        <input type="text" name="rw" class="form-control">
                    </div>
                </div>
                <div class="mb-3">
                    <label>Kota:</label>
                    <select name="kota" id="kota" class="form-control">
                        <option value="">------</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Kecamatan:</label>
                    <select name="kecamatan" id="kecamatan" class="form-control">
                        <option value="">------</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Kelurahan:</label>
                    <select name="kelurahan" id="kelurahan" class="form-control">
                        <option value="">------</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Provinsi:</label>
                    <select name="provinsi" class="form-control">
                        <option value="DKI-JAKARTA" selected>DKI JAKARTA</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Ukuran Baju & Sepatu:</label>
                    <input type="text" name="uk_baju_sepatu" class="form-control" placeholder="L dan 40">
                </div>

                <div class="mb-3">
                    <label>Pasfoto (jpg/png/jpeg, maks 1 MB):</label>
                    <input type="file" name="pas_foto" accept=".jpg,.jpeg,.png" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Scan KTP atau Surat Domisili (jpg/png/jpeg, maks 1 MB):</label>
                    <input type="file" name="ktp" accept=".jpg,.jpeg,.png" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Scan Kartu Keluarga (jpg/png/jpeg, maks 1 MB):</label>
                    <input type="file" name="kk" accept=".jpg,.jpeg,.png" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Scan Ijazah (jpg/png/jpeg, maks 1 MB):</label>
                    <input type="file" name="ijazah" accept=".jpg,.jpeg,.png" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Apakah Anda Berkebutuhan Khusus?</label>
                    <select name="is_difabel" class="form-control">
                        <option value="0" selected>NON DIFABEL</option>
                        <option value="1">TUNA RUNGU</option>
                        <option value="2">TUNA GRAHITA</option>
                        <option value="3">TUNA DAKSA</option>
                    </select>
                </div>

                <!-- CAPTCHA -->
                <div class="g-recaptcha my-3" data-sitekey="6LfE_ogrAAAAAGfPXGLT_CStsweNsf8LCYkCD4Oo"></div>

                <button type="submit" class="btn btn-info text-white">Daftar</button>
            </form>
        </div>
    </div>
</div>