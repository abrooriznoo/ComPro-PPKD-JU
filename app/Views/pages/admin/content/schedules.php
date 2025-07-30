<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-0">Daftar Jadwal</h2>
    <button class="btn btn-success" data-toggle="modal" data-target="#modalAddJadwal">
        <i class="fas fa-plus"></i> Tambah Jadwal
    </button>
</div>

<table class="table table-bordered table-hover table-striped">
    <thead class="thead-dark">
        <tr>
            <th>No.</th>
            <th>Major</th>
            <th>Tutup Pendaftaran</th>
            <th>Angkatan</th>
            <th>Mulai Seleksi</th>
            <th>Akhir Seleksi</th>
            <th>Mulai Kelas</th>
            <th>Selesai Kelas</th>
            <th>Mulai Ujian</th>
            <th>Akhir Ujian</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($data) && is_array($data)): ?>
            <?php $no = 1;
            foreach ($data as $row): ?>
                <tr>
                    <td><?= $no++ ?>.</td>
                    <td>
                        <?php
                        $majorName = '';
                        foreach ($majors as $major) {
                            if ($major['id'] == $row['major_id']) {
                                $majorName = esc($major['nama_jurusan']);
                                break;
                            }
                        }
                        echo $majorName;
                        ?>
                    </td>
                    <td><?= date('d M Y', strtotime($row['end_register'])) ?></td>
                    <td><?= esc($row['class_of']) ?></td>
                    <td><?= date('d M Y', strtotime($row['start_selection'])) ?></td>
                    <td><?= date('d M Y', strtotime($row['end_selection'])) ?></td>
                    <td><?= date('d M Y', strtotime($row['class_start'])) ?></td>
                    <td><?= date('d M Y', strtotime($row['class_end'])) ?></td>
                    <td><?= date('d M Y', strtotime($row['exam_start'])) ?></td>
                    <td><?= date('d M Y', strtotime($row['exam_end'])) ?></td>
                    <td>
                        <?= $row['is_active'] ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>' ?>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-primary" data-toggle="modal"
                            data-target="#modalEditJadwal<?= $row['id'] ?>">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form action="<?= base_url('schedules/delete/' . $row['id']) ?>" method="post" style="display:inline;"
                            onsubmit="return confirm('Yakin ingin hapus data ini?')">
                            <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="12" class="text-center text-muted">Belum ada data jadwal.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<!-- MODAL EDIT -->
<?php foreach ($data as $row): ?>
    <div class="modal fade" id="modalEditJadwal<?= $row['id'] ?>" tabindex="-1" role="dialog"
        aria-labelledby="editJadwalLabel<?= $row['id'] ?>" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="<?= base_url('schedules/update/' . $row['id']) ?>" method="post" class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="editJadwalLabel<?= $row['id'] ?>"><i class="fas fa-edit"></i> Edit Jadwal
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Major</label>
                            <select name="major" class="form-control" required>
                                <option value="">- Pilih Major -</option>
                                <?php foreach ($majors as $major): ?>
                                    <option value="<?= esc($major['id']) ?>" <?= $row['major_id'] == $major['id'] ? 'selected' : '' ?>><?= esc($major['nama_jurusan']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Angkatan</label>
                            <select name="class_of" class="form-control" required>
                                <option value="">- Pilih Angkatan -</option>
                                <?php for ($i = 1; $i <= 10; $i++): ?>
                                    <option value="<?= $i ?>" <?= $row['class_of'] == $i ? 'selected' : '' ?>><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Tutup Pendaftaran</label>
                            <input type="date" name="end_register" class="form-control"
                                value="<?= esc(date('Y-m-d', strtotime($row['end_register']))) ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Mulai Seleksi</label>
                            <input type="date" name="start_selection" class="form-control"
                                value="<?= esc(date('Y-m-d', strtotime($row['start_selection']))) ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Akhir Seleksi</label>
                            <input type="date" name="end_selection" class="form-control"
                                value="<?= esc(date('Y-m-d', strtotime($row['end_selection']))) ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Mulai Kelas</label>
                            <input type="date" name="class_start" class="form-control"
                                value="<?= esc(date('Y-m-d', strtotime($row['class_start']))) ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Selesai Kelas</label>
                            <input type="date" name="class_end" class="form-control"
                                value="<?= esc(date('Y-m-d', strtotime($row['class_end']))) ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Mulai Ujian</label>
                            <input type="date" name="exam_start" class="form-control"
                                value="<?= esc(date('Y-m-d', strtotime($row['exam_start']))) ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Akhir Ujian</label>
                            <input type="date" name="exam_end" class="form-control"
                                value="<?= esc(date('Y-m-d', strtotime($row['exam_end']))) ?>" required>
                        </div>
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
<div class="modal fade" id="modalAddJadwal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <form action="<?= base_url('schedules/store') ?>" method="post" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-row d-flex justify-content-between">
                    <div class="form-group col-md-4">
                        <label>Major</label>
                        <select name="major" class="form-control" required>
                            <option value="">- Pilih Major -</option>
                            <?php foreach ($majors as $major): ?>
                                <option value="<?= esc($major['id']) ?>"><?= esc($major['nama_jurusan']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Angkatan</label>
                        <select name="class_of" class="form-control" required>
                            <option value="">- Pilih Angkatan -</option>
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Tutup Pendaftaran</label>
                        <input type="date" name="end_register" class="form-control" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Mulai Seleksi</label>
                        <input type="date" name="start_selection" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Akhir Seleksi</label>
                        <input type="date" name="end_selection" class="form-control" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Mulai Kelas</label>
                        <input type="date" name="class_start" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Selesai Kelas</label>
                        <input type="date" name="class_end" class="form-control" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Mulai Ujian</label>
                        <input type="date" name="exam_start" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Akhir Ujian</label>
                        <input type="date" name="exam_end" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>