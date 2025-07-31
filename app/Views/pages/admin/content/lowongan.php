<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-0">Daftar Lowongan Pekerjaan</h2>
    <button class="btn btn-success" data-toggle="modal" data-target="#modalAddLowongan">
        <i class="fas fa-plus"></i> Tambah Lowongan
    </button>
</div>

<?php
// Pagination setup
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = 5;
$totalData = count($lowongan);
$totalPages = ceil($totalData / $perPage);
$start = ($page - 1) * $perPage;
$lowonganPage = array_slice($lowongan, $start, $perPage);
?>

<table class="table table-bordered table-hover table-striped">
    <thead class="thead-dark">
        <tr>
            <th>No.</th>
            <th>Photo</th>
            <th>Title</th>
            <th>Company</th>
            <th>Description</th>
            <th>Post Date</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($lowonganPage) && is_array($lowonganPage)): ?>
            <?php
            $no = $start + 1;
            foreach ($lowonganPage as $row):
                ?>
                <tr>
                    <td><?= $no++ ?>.</td>
                    <td>
                        <?php if (!empty($row['photo'])): ?>
                            <img src="<?= base_url('uploads/' . $row['photo']) ?>" alt="Photo" class="img-thumbnail"
                                style="width:60px; height:60px;">
                        <?php else: ?>
                            <span class="text-muted">No Photo</span>
                        <?php endif; ?>
                    </td>
                    <td><?= esc($row['title']) ?></td>
                    <td><?= esc($row['company']) ?></td>
                    <td><?= esc($row['description']) ?></td>
                    <td><?= date('d M Y', strtotime($row['created_at'])) ?></td>
                    <td>
                        <?= $row['is_active'] ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>' ?>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-primary" data-toggle="modal"
                            data-target="#modalEditLowongan<?= $row['id'] ?>">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form action="<?= base_url('lowongan/delete/' . $row['id']) ?>" method="post" style="display:inline;"
                            onsubmit="return confirm('Yakin ingin hapus data ini?')">
                            <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="8" class="text-center text-muted">Belum ada data lowongan.</td>
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
<?php foreach ($lowongan as $row): ?>
    <div class="modal fade" id="modalEditLowongan<?= $row['id'] ?>" tabindex="-1" role="dialog"
        aria-labelledby="editLowonganLabel<?= $row['id'] ?>" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="<?= base_url('lowongan/update/' . $row['id']) ?>" method="post" enctype="multipart/form-data"
                class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="editLowonganLabel<?= $row['id'] ?>"><i class="fas fa-edit"></i> Edit
                        Lowongan</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="<?= esc($row['title']) ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Company</label>
                            <input type="text" name="company" class="form-control" value="<?= esc($row['company']) ?>"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="4"
                            required><?= esc($row['description']) ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Foto Saat Ini</label><br>
                        <?php if (!empty($row['photo'])): ?>
                            <img src="<?= base_url('uploads/' . $row['photo']) ?>" alt="Photo" class="img-thumbnail mb-2"
                                style="width:80px; height:80px;">
                        <?php else: ?>
                            <span class="text-muted">No Photo</span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label>Ganti Foto (opsional)</label>
                        <input type="file" name="photo" class="form-control-file" accept="image/*">
                    </div>
                    <hr>
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
<div class="modal fade" id="modalAddLowongan" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <form action="<?= base_url('lowongan/store') ?>" method="post" enctype="multipart/form-data"
            class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Lowongan</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <!-- Input fields -->
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Company</label>
                    <input type="text" name="company" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label>Foto (opsional)</label>
                    <input type="file" name="photo" class="form-control-file" accept="image/*">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>