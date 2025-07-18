<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-0">Daftar Majors</h2>
    <button class="btn btn-success" data-toggle="modal" data-target="#modalAddMajor">
        <i class="fas fa-plus"></i> Tambah Major
    </button>
</div>

<table class="table table-bordered table-hover table-striped">
    <thead class="thead-dark">
        <tr>
            <th>No.</th>
            <th>Nama Major</th>
            <th>Deskripsi</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($data) && is_array($data)): ?>
            <?php
            $no = 1;
            foreach ($data as $row):
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= esc($row['nama_jurusan']) ?></td>
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
                <td colspan="4" class="text-center text-muted">Belum ada data major.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<!-- MODAL EDIT -->
<?php foreach ($data as $row): ?>
    <div class="modal fade" id="modalEditMajor<?= $row['id'] ?>" tabindex="-1" role="dialog"
        aria-labelledby="editMajorLabel<?= $row['id'] ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="<?= base_url('majors/update/' . $row['id']) ?>" method="post" class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="editMajorLabel<?= $row['id'] ?>"><i class="fas fa-edit"></i> Edit Major</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Major</label>
                        <input type="text" name="name" class="form-control" value="<?= esc($row['nama_jurusan']) ?>"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="description" class="form-control" required><?= esc($row['deskripsi']) ?></textarea>
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
        <form action="<?= base_url('majors/store') ?>" method="post" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Major</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Major</label>
                    <input type="text" name="name" class="form-control" required>
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