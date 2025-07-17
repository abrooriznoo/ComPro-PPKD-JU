<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-0">Daftar Users</h2>
    <button class="btn btn-success" data-toggle="modal" data-target="#modalAddUser">
        <i class="fas fa-plus"></i> Tambah User
    </button>
</div>

<table class="table table-bordered table-hover table-striped">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($users) && is_array($users)): ?>
            <?php
            $no = 1;
            foreach ($users as $row):
            ?>
                <tr>
                    <td><?= $no++ ?>.</td>
                    <td>
                        <?php if (!empty($row['photo'])): ?>
                            <img src="<?= base_url('uploads/users-pict/' . $row['photo']) ?>" alt="Photo" class="img-thumbnail"
                                style="width:60px; height:60px;">
                        <?php else: ?>
                            <span class="text-muted">No Photo</span>
                        <?php endif; ?>
                    </td>
                    <td><?= esc($row['username']) ?></td>
                    <td><?= esc($row['email']) ?></td>
                    <td><?= esc($row['role_id']) ?></td>
                    <td>
                        <?= $row['is_active'] ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>' ?>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-primary" data-toggle="modal"
                            data-target="#modalEditUser<?= $row['id'] ?>">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form action="<?= base_url('users/delete/' . $row['id']) ?>" method="post" style="display:inline;"
                            onsubmit="return confirm('Yakin ingin hapus user ini?')">
                            <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="text-center text-muted">Belum ada data user.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<!-- MODAL EDIT -->
<?php foreach ($users as $row): ?>
    <div class="modal fade" id="modalEditUser<?= $row['id'] ?>" tabindex="-1" role="dialog"
        aria-labelledby="editUserLabel<?= $row['id'] ?>" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="<?= base_url('users/update/' . $row['id']) ?>" method="post" enctype="multipart/form-data"
                class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="editUserLabel<?= $row['id'] ?>"><i class="fas fa-edit"></i> Edit User</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="<?= esc($row['username']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?= esc($row['email']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" class="form-control" required>
                            <option value="">-- Pilih Role --</option>
                            <?php foreach ($roles as $role): ?>
                                <option value="<?= esc($role["id"]) ?>" <?= ($row['role_id'] == $role["id"]) ? 'selected' : '' ?>>
                                    <?= esc($role["name"]) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Foto Saat Ini</label><br>
                        <?php if (!empty($row['photo'])): ?>
                            <img src="<?= base_url('uploads/users-pict/' . $row['photo']) ?>" alt="Photo" class="img-thumbnail mb-2"
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
                        <label for="">Is Active</label>
                        <div class="d-flex gap-3">
                            <div>
                                <input type="radio" id="is_active_publish<?= $row['id'] ?>" name="is_active" class="form-control-radio" value="1" <?= $row['is_active'] ? 'checked' : '' ?>>
                                <label for="is_active_publish<?= $row['id'] ?>">Active</label>
                            </div>
                            <div>
                                <input type="radio" id="is_active_archive<?= $row['id'] ?>" name="is_active" class="form-control-radio" value="0" <?= !$row['is_active'] ? 'checked' : '' ?>>
                                <label for="is_active_archive<?= $row['id'] ?>">Inactive</label>
                            </div>
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
<div class="modal fade" id="modalAddUser" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <form action="<?= base_url('users/store') ?>" method="post" enctype="multipart/form-data"
            class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <!-- Input fields -->
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <?php foreach ($roles as $role): ?>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" class="form-control" required>
                            <option value="">-- Pilih Role --</option>
                            <?php foreach ($roles as $role): ?>
                                <option value="<?= esc($role["id"]) ?>"><?= esc($role["name"]) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                <?php endforeach; ?>
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