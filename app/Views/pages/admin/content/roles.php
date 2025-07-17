<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-0">Daftar Roles</h2>
    <button class="btn btn-success" data-toggle="modal" data-target="#modalAddRole">
        <i class="fas fa-plus"></i> Tambah Role
    </button>
</div>

<table class="table table-bordered table-hover table-striped">
    <thead class="thead-dark">
        <tr>
            <th>No.</th>
            <th>Nama Role</th>
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
                    <td><?= esc($row['name']) ?></td>
                    <td>
                        <button class="btn btn-sm btn-primary" data-toggle="modal"
                            data-target="#modalEditRole<?= $row['id'] ?>">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form action="<?= base_url('roles/delete/' . $row['id']) ?>" method="post" style="display:inline;"
                            onsubmit="return confirm('Yakin ingin hapus role ini?')">
                            <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" class="text-center text-muted">Belum ada data role.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<!-- MODAL EDIT -->
<?php foreach ($data as $row): ?>
    <div class="modal fade" id="modalEditRole<?= $row['id'] ?>" tabindex="-1" role="dialog"
        aria-labelledby="editRoleLabel<?= $row['id'] ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="<?= base_url('roles/update/' . $row['id']) ?>" method="post" class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="editRoleLabel<?= $row['id'] ?>"><i class="fas fa-edit"></i> Edit Role</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Role</label>
                        <input type="text" name="name" class="form-control" value="<?= esc($row['name']) ?>" required>
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
<div class="modal fade" id="modalAddRole" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url('roles/store') ?>" method="post" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Role</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Role</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>