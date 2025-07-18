<div class="container-fluid mt-5 px-0">
    <div class="card-body">
        <div class="container">
            <h4 class="mb-4">Jadwal Program Pelatihan</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No.</th>
                            <th>Program Pelatihan</th>
                            <th>Angkatan</th>
                            <th>Tutup Pendaftaran</th>
                            <th>Mulai Seleksi</th>
                            <th>Akhir Seleksi</th>
                            <th>Mulai Pelatihan</th>
                            <th>Akhir Pelatihan</th>
                            <th>Awal Uji Kompetensi</th>
                            <th>Akhir Uji Kompetensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data as $schedule):
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
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
</div>