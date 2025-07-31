<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-0">Data Registrasi Peserta MTU</h2>
</div>

<form method="get" class="mb-3 d-flex align-items-center">
    <label for="majorFilter" class="mr-2 mb-0">Filter Jurusan:</label>
    <select name="major" id="majorFilter" class="form-control mr-2" style="width:auto;">
        <option value="">Semua Jurusan</option>
        <?php if (!empty($majors) && is_array($majors)): ?>
            <?php foreach ($majors as $major): ?>
                <?php if (isset($major['is_mtu']) && $major['is_mtu'] == 1): ?>
                    <option value="<?= htmlspecialchars($major['id']) ?>" <?= (isset($_GET['major']) && $_GET['major'] == $major['id']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($major['nama_jurusan']) ?>
                    </option>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </select>
    <button type="submit" class="btn btn-primary">Filter</button>
</form>

<table class="table table-bordered table-hover table-striped">
    <thead class="thead-dark">
        <tr>
            <th>No.</th>
            <th>ID</th>
            <th>Nama Lengkap</th>
            <th>No. Telp</th>
            <th>Link Lokasi</th>
            <th>Minat Kejuruan</th>
            <th>Dokumen</th>
            <th>Tanggal Daftar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Filter data by major if filter is set
        $filteredData = $data;
        if (isset($_GET['major']) && $_GET['major'] !== '') {
            $filteredData = array_filter($data, function ($row) {
                return isset($row['major_id']) && $row['major_id'] == $_GET['major'];
            });
        }
        ?>
        <?php if (!empty($filteredData) && is_array($filteredData)): ?>
            <?php $no = 1;
            foreach ($filteredData as $row): ?>
                <tr>
                    <td><?= $no++ ?>.</td>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['nama_lengkap']) ?></td>
                    <td><?= htmlspecialchars($row['no_telepon']) ?></td>
                    <td><?= htmlspecialchars($row['link_lokasi']) ?></td>
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
                        $id = $row['id'];
                        $basePath = FCPATH . 'uploads/data-regist/mtu/';
                        $baseUrl = base_url('uploads/data-regist/mtu/');

                        $surat_permohonan = base_url($row['surat_permohonan']);

                        foreach (glob($basePath . "*-data-$id") as $folder) {
                            if (is_dir($folder)) {
                                $foundFolder = $folder;
                                $folderName = basename($folder);

                                $namaSanitized = explode('-data-', $folderName)[0];

                                $surat_permohonan = '';

                                $surat_permohonan_path = glob($folder . "/{$namaSanitized}-surat-permohonan.*");
                                if (!empty($surat_permohonan_path)) {
                                    $surat_permohonan = $baseUrl . "$folderName/" . basename($surat_permohonan_path[0]);
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
                                            <!-- <a href="<?= base_url('registration/download-zip-mtu/' . $id) ?>"
                                                class="btn btn-success" target="_blank">
                                                <i class="fas fa-download"></i> Download ZIP
                                            </a> -->
                                        </div>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?php if ($foundFolder): ?>
                                            <div class="row">
                                                <!-- Kiri -->
                                                <div class="col-md-12">
                                                    <!-- PAS FOTO -->
                                                    <div class="dokumen-item mb-3">
                                                        <label>Surat Permohonan :</label>
                                                        <div class="dokumen-preview">
                                                            <?php if ($surat_permohonan): ?>
                                                                <a href="<?= $surat_permohonan ?>" target="_blank"
                                                                    class="btn btn-outline-primary btn-sm mb-2">
                                                                    <i class="fas fa-file-download"></i> Download Surat Permohonan
                                                                </a>
                                                                <br>
                                                                <?php if (preg_match('/\.pdf$/i', $surat_permohonan)): ?>
                                                                    <embed src="<?= $surat_permohonan ?>" type="application/pdf"
                                                                        width="100%" height="600px" />
                                                                <?php else: ?>
                                                                    <img src="<?= $surat_permohonan ?>" alt="Surat Permohonan"
                                                                        class="img-fluid">
                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                                <span class="text-danger">Surat Permohonan tidak ditemukan.</span>
                                                            <?php endif; ?>
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
                    <td><?= htmlspecialchars($row['created_at']) ?></td>
                    <td>
                        <!-- Contoh tombol edit dan hapus -->
                        <!-- <button class="btn btn-sm btn-primary" data-toggle="modal"
                            data-target="#modalEditPeserta<?= $row['id'] ?>">
                            <i class="fas fa-edit"></i>
                        </button> -->
                        <form action="<?= base_url('registration/data-mtu/delete/' . $row['id']) ?>" method="post"
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