<div class="container mt-5 px-0">
    <div class="card-body border shadow rounded">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead>
                    <tr>
                        <th scope="col" class="col-2">Program Pelatihan</th>
                        <th scope="col" class="col-1">Angkatan</th>
                        <th scope="col" class="col-2">Tutup Pendaftaran</th>
                        <th scope="col" class="col-2">Mulai Seleksi</th>
                        <th scope="col" class="col-2">Akhir Seleksi</th>
                        <th scope="col" class="col-2">Mulai Pelatihan</th>
                        <th scope="col" class="col-3">Akhir Pelatihan</th>
                        <th scope="col" class="col-2">Awal Uji Kompetensi</th>
                        <th scope="col" class="col-2">Akhir Uji Kompetensi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $schedule): ?>
                        <tr>
                            <td>
                                <?php
                                $majorName = '';
                                foreach ($majors as $major) {
                                    if ($major['id'] == $schedule['major_id']) {
                                        $majorName = esc($major['nama_jurusan']);
                                        break;
                                    }
                                }
                                echo $majorName;
                                ?>
                            </td>
                            <td><?= toRoman((int) $schedule['class_of']); ?></td>
                            <td><?= date('d M Y', strtotime($schedule['end_register'])) ?></td>
                            <td><?= date('d M Y', strtotime($schedule['start_selection'])) ?></td>
                            <td><?= date('d M Y', strtotime($schedule['end_selection'])) ?></td>
                            <td><?= date('d M Y', strtotime($schedule['class_start'])) ?></td>
                            <td><?= date('d M Y', strtotime($schedule['class_end'])) ?></td>
                            <td><?= date('d M Y', strtotime($schedule['exam_start'])) ?></td>
                            <td><?= date('d M Y', strtotime($schedule['exam_end'])) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>