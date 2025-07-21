<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-0">Data Registrasi Peserta Regular</h2>
</div>

<table class="table table-bordered table-hover table-striped">
    <thead class="thead-dark">
        <tr>
            <th>No.</th>
            <th>ID</th>
            <th>Nama Lengkap</th>
            <th>NIK</th>
            <th>Tempat, Tgl Lahir</th>
            <th>Jenis Kelamin</th>
            <th>No. Telp</th>
            <th>Pendidikan</th>
            <th>Tahun Lulus</th>
            <th>Pekerjaan</th>
            <th>Email</th>
            <th>Minat Kelas</th>
            <th>Alamat</th>
            <th>Ukuran Baju</th>
            <th>Dokumen</th>
            <th>Difabel</th>
            <th>Tanggal Daftar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($data) && is_array($data)): ?>
            <?php $no = 1;
            foreach ($data as $row): ?>
                <tr>
                    <td><?= $no++ ?>.</td>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['nama_lengkap']) ?></td>
                    <td><?= htmlspecialchars($row['nik']) ?></td>
                    <td><?= htmlspecialchars($row['tempat_lahir']) ?>, <?= htmlspecialchars($row['tanggal_lahir']) ?></td>
                    <td><?= htmlspecialchars($row['jenis_kelamin']) ?></td>
                    <td><?= htmlspecialchars($row['no_telepon']) ?></td>
                    <td><?= htmlspecialchars($row['pendidikan']) ?></td>
                    <td><?= htmlspecialchars($row['tahun_lulus']) ?></td>
                    <td><?= htmlspecialchars($row['pekerjaan']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td>
                        <?php
                        $majorName = '';
                        if (!empty($majors) && is_array($majors)) {
                            foreach ($majors as $major) {
                                if ($major['id'] == $row['major_id']) {
                                    $majorName = htmlspecialchars($major['nama_jurusan']);
                                    break;
                                }
                            }
                        }
                        echo $majorName;
                        ?>
                    </td>
                    <td>
                        <?php
                        $nama_jalan = isset($row['nama_jalan']) ? $row['nama_jalan'] : '';
                        $rt = isset($row['rt']) ? $row['rt'] : '';
                        $rw = isset($row['rw']) ? $row['rw'] : '';
                        $kelurahan = isset($row['kelurahan']) ? $row['kelurahan'] : '';
                        $kecamatan = isset($row['kecamatan']) ? $row['kecamatan'] : '';
                        $kota = isset($row['kota']) ? $row['kota'] : '';
                        $provinsi = isset($row['provinsi']) ? $row['provinsi'] : '';

                        $alamat = htmlspecialchars($nama_jalan) . ', RT ' . htmlspecialchars($rt) . '/RW ' . htmlspecialchars($rw) .
                            ', Kel. ' . htmlspecialchars($kelurahan) . ', Kec. ' . htmlspecialchars($kecamatan) .
                            ', ' . htmlspecialchars($kota) . ', ' . htmlspecialchars($provinsi);
                        $words = explode(' ', $alamat);
                        $shortAlamat = $alamat;
                        if (count($words) > 8) {
                            $shortAlamat = implode(' ', array_slice($words, 0, 8)) . '...';
                        }
                        echo $shortAlamat;
                        ?>

                        <!-- Tombol Detail Alamat -->
                        <a href="#" style="text-decoration: none; color: black;" data-toggle="modal"
                            data-target="#alamatModal<?= $row['id'] ?>">
                            See More
                        </a>

                        <!-- Modal Detail Alamat -->
                        <div class="modal fade" id="alamatModal<?= $row['id'] ?>" tabindex="-1" role="dialog"
                            aria-labelledby="alamatModalLabel<?= $row['id'] ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="alamatModalLabel<?= $row['id'] ?>">Detail Alamat Peserta
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?= $alamat ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td><?= htmlspecialchars($row['uk_baju_sepatu']) ?></td>
                    <td>
                        <?php
                        $id = $row['id'];
                        $basePath = FCPATH . 'uploads/data-regist/reg/';
                        $baseUrl = base_url('uploads/data-regist/reg/');

                        $pas_foto = base_url($row['pas_foto']);
                        $ktp = base_url($row['ktp']);
                        $kk = base_url($row['kk']);
                        $ijazah = base_url($row['ijazah']);

                        foreach (glob($basePath . "*-data-$id") as $folder) {
                            if (is_dir($folder)) {
                                $foundFolder = $folder;
                                $folderName = basename($folder);

                                $namaSanitized = explode('-data-', $folderName)[0];

                                $pas_foto = '';
                                $ktp = '';
                                $kk = '';
                                $ijazah = '';

                                $pas_foto_path = glob($folder . "/{$namaSanitized}-pasfoto.*");
                                if (!empty($pas_foto_path)) {
                                    $pas_foto = $baseUrl . "$folderName/" . basename($pas_foto_path[0]);
                                }

                                $ktp_path = glob($folder . "/{$namaSanitized}-ktp.*");
                                if (!empty($ktp_path)) {
                                    $ktp = $baseUrl . "$folderName/" . basename($ktp_path[0]);
                                }

                                $kk_path = glob($folder . "/{$namaSanitized}-kk.*");
                                if (!empty($kk_path)) {
                                    $kk = $baseUrl . "$folderName/" . basename($kk_path[0]);
                                }

                                $ijazah_path = glob($folder . "/{$namaSanitized}-ijazah.*");
                                if (!empty($ijazah_path)) {
                                    $ijazah = $baseUrl . "$folderName/" . basename($ijazah_path[0]);
                                }
                                break;
                            }
                        }
                        ?>

                        <!-- Modal Trigger -->
                        <a href="#" class="btn btn-info btn-sm text-white" data-toggle="modal"
                            data-target="#dokumenModal<?= $id ?>">Lihat Dokumen</a>

                        <!-- Modal -->
                        <div class="modal fade" id="dokumenModal<?= $id ?>" tabindex="-1" role="dialog"
                            aria-labelledby="dokumenModalLabel<?= $id ?>" aria-hidden="true">
                            <div class="modal-dialog modal-xxl" role="document" style="max-width:90vw;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="d-flex justify-content-between align-items-center w-100">
                                            <h5 class="modal-title" id="dokumenModalLabel<?= $id ?>">Dokumen Peserta</h5>
                                            <a href="<?= base_url('registration/download-zip/' . $id) ?>"
                                                class="btn btn-success" target="_blank">
                                                <i class="fas fa-download"></i> Download ZIP
                                            </a>
                                        </div>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?php if ($foundFolder): ?>
                                            <div class="row">
                                                <!-- Kiri -->
                                                <div class="col-md-6">
                                                    <!-- PAS FOTO -->
                                                    <div class="dokumen-item mb-3">
                                                        <label>PAS FOTO:</label>
                                                        <div class="dokumen-preview">
                                                            <img src="<?= $pas_foto ?>" alt="Pas Foto" class="img-fluid">
                                                        </div>
                                                    </div>
                                                    <!-- KTP -->
                                                    <div class="dokumen-item mb-3">
                                                        <label>KTP:</label>
                                                        <div class="dokumen-preview">
                                                            <img src="<?= $ktp ?>" alt="KTP" class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Kanan -->
                                                <div class="col-md-6">
                                                    <!-- KK -->
                                                    <div class="dokumen-item mb-3">
                                                        <label>KK:</label>
                                                        <div class="dokumen-preview">
                                                            <img src="<?= $kk ?>" alt="KK" class="img-fluid">
                                                        </div>
                                                    </div>
                                                    <!-- IJAZAH -->
                                                    <div class="dokumen-item mb-3">
                                                        <label>IJAZAH (PDF):</label>
                                                        <div class="dokumen-preview" style="height:600px;">
                                                            <iframe src="<?= $ijazah ?>" style="width:100%;height:100%;"
                                                                frameborder="0"></iframe>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <p class="text-danger">Dokumen tidak ditemukan untuk ID <?= $id ?>.</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <?php
                        switch ($row['is_difabel']) {
                            case '1':
                                echo 'Tuna Rungu';
                                break;
                            case '2':
                                echo 'Tuna Grahita';
                                break;
                            case '3':
                                echo 'Tuna Daksa';
                                break;
                            default:
                                echo 'Tidak Difabel';
                        }
                        ?>
                    </td>
                    <td><?= htmlspecialchars($row['created_at']) ?></td>
                    <td>
                        <!-- Contoh tombol edit dan hapus -->
                        <!-- <button class="btn btn-sm btn-primary" data-toggle="modal"
                            data-target="#modalEditPeserta<?= $row['id'] ?>">
                            <i class="fas fa-edit"></i>
                        </button> -->
                        <form action="<?= base_url('registration/data-reg/delete/' . $row['id']) ?>" method="post"
                            style="display:inline;" onsubmit="return confirm('Yakin ingin hapus data ini?')">
                            <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="17" class="text-center text-muted">Belum ada data peserta.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>