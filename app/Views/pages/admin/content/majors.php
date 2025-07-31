<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-0">Daftar Majors</h2>
    <button class="btn btn-success" data-toggle="modal" data-target="#modalAddMajor">
        <i class="fas fa-plus"></i> Tambah Major
    </button>
</div>

<?php
// Pagination setup
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = 5;
$totalData = !empty($data) && is_array($data) ? count($data) : 0;
$totalPages = ceil($totalData / $perPage);
$start = ($page - 1) * $perPage;

// Slice data for current page
$displayData = array_slice($data, $start, $perPage);
?>

<table class="table table-bordered table-hover table-striped">
    <thead class="thead-dark">
        <tr>
            <th>No.</th>
            <th>Photos</th>
            <th>Nama Major</th>
            <th>Skema Biaya</th>
            <th>MTU</th>
            <th>Deskripsi</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($displayData) && is_array($displayData)): ?>
            <?php
            $no = $start + 1;
            foreach ($displayData as $row):
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td>
                        <?php if (!empty($row['photos'])): ?>
                            <img src="<?= base_url('uploads/class_photos/' . $row['photos']) ?>" alt="Photo" class="img-thumbnail"
                                style="width: 150px; height: 150px; object-fit: cover; object-position: center;">
                        <?php else: ?>
                            <span class="text-muted">Tidak ada foto</span>
                        <?php endif; ?>
                    </td>
                    <td><?= esc($row['nama_jurusan']) ?></td>
                    <td><?= esc($row['skema_biaya']) ?></td>
                    <td>
                        <?php if ($row['is_mtu'] == 1): ?>
                            <span class="badge badge-success">Ya</span>
                        <?php else: ?>
                            <span class="badge badge-danger">Tidak</span>
                        <?php endif; ?>
                    </td>
                    <td><?= esc($row['deskripsi']) ?></td>
                    <td>
                        <?= $row['is_active'] ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>' ?>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-primary" data-toggle="modal"
                            data-target="#modalEditMajor<?= $row['id'] ?>">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form action="<?= base_url('majors/delete/' . $row['id']) ?>" method="post" style="display:inline;"
                            onsubmit="return confirm('Yakin ingin hapus major ini?')">
                            <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="9" class="text-center text-muted">Belum ada data major.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<!-- Pagination -->
<?php if ($totalPages > 1): ?>
    <nav>
        <ul class="pagination justify-content-center">
            <li class="page-item<?= $page <= 1 ? ' disabled' : '' ?>">
                <a class="page-link" href="?page=<?= $page - 1 ?>" tabindex="-1">Previous</a>
            </li>
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item<?= $i == $page ? ' active' : '' ?>">
                    <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>
            <li class="page-item<?= $page >= $totalPages ? ' disabled' : '' ?>">
                <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
            </li>
        </ul>
    </nav>
<?php endif; ?>

<!-- MODAL EDIT -->
<?php foreach ($data as $row): ?>
    <div class="modal fade" id="modalEditMajor<?= $row['id'] ?>" tabindex="-1" role="dialog"
        aria-labelledby="editMajorLabel<?= $row['id'] ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="<?= base_url('majors/update/' . $row['id']) ?>" method="post" class="modal-content"
                enctype="multipart/form-data">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="editMajorLabel<?= $row['id'] ?>"><i class="fas fa-edit"></i> Edit Major</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Foto Saat Ini</label><br>
                        <?php if (!empty($row['photos'])): ?>
                            <img src="<?= base_url('uploads/class_photos/' . $row['photos']) ?>" alt="Photo"
                                class="img-thumbnail mb-2" style="width: 100px; height: 100px;">
                        <?php else: ?>
                            <span class="text-muted">Tidak ada foto</span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label>Ganti Foto</label>
                        <input type="file" name="photos" class="form-control-file" accept="image/*">
                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                    </div>
                    <div class="form-group">
                        <label>Nama Major</label>
                        <input type="text" name="name" class="form-control" value="<?= esc($row['nama_jurusan']) ?>"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Skema Biaya</label>
                        <input type="text" name="skema_biaya" class="form-control" value="<?= esc($row['skema_biaya']) ?>"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="description" class="form-control" required><?= esc($row['deskripsi']) ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>MTU?</label><br>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-outline-success <?= $row['is_mtu'] == 1 ? 'active' : '' ?>">
                                <input type="radio" name="is_mtu" id="mtuYes<?= $row['id'] ?>" value="1" autocomplete="off"
                                    <?= $row['is_mtu'] == 1 ? 'checked' : '' ?>> Ya
                            </label>
                            <label class="btn btn-outline-danger <?= $row['is_mtu'] == 0 ? 'active' : '' ?>">
                                <input type="radio" name="is_mtu" id="mtuNo<?= $row['id'] ?>" value="0" autocomplete="off"
                                    <?= $row['is_mtu'] == 0 ? 'checked' : '' ?>> Tidak
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Aktif?</label><br>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-outline-success <?= $row['is_active'] ? 'active' : '' ?>">
                                <input type="radio" name="is_active" id="activeYes<?= $row['id'] ?>" value="1"
                                    autocomplete="off" <?= $row['is_active'] ? 'checked' : '' ?>> Aktif
                            </label>
                            <label class="btn btn-outline-danger <?= !$row['is_active'] ? 'active' : '' ?>">
                                <input type="radio" name="is_active" id="activeNo<?= $row['id'] ?>" value="0"
                                    autocomplete="off" <?= !$row['is_active'] ? 'checked' : '' ?>> Tidak Aktif
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
<?php endforeach; ?>

<!-- MODAL TAMBAH -->
<div class="modal fade" id="modalAddMajor" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url('majors/store') ?>" method="post" class="modal-content"
            enctype="multipart/form-data">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Major</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="photos" class="form-control-file" accept="image/*">
                    <small class="form-text text-muted">Pilih foto untuk major (opsional).</small>
                </div>
                <div class="form-group">
                    <label>Nama Major</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Skema Biaya</label>
                    <input type="text" name="skema_biaya" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>MTU?</label><br>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-outline-success">
                            <input type="radio" name="is_mtu" value="1" autocomplete="off"> Ya
                        </label>
                        <label class="btn btn-outline-danger">
                            <input type="radio" name="is_mtu" value="0" autocomplete="off"> Tidak
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="description" class="form-control" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>