<section id="lowongan" style="display: flex; align-items: center; justify-content: center;" data-aos="fade-in"
    data-aos-once="true" data-aos-duration="1000" data-aos-delay="100">
    <div class="container-fluid mt-5 px-0">
        <div class="card d-flex">
            <div class="card-body">
                <div class="row p-5">
                    <div class="col text-center mb-4">
                        <h1 class="fw-light">Info Lowongan Pekerjaan</h1>
                    </div>
                    <div class="container my-5">
                        <!-- Form Pencarian -->
                        <form method="get">
                            <div class="row justify-content-center">
                                <div class="col-md-4 mb-2">
                                    <input type="text" name="search" class="form-control" placeholder="Cari judul atau perusahaan..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                                </div>
                                <div class="col-md-2 mb-2">
                                    <button type="submit" class="btn btn-info text-white w-50">Cari</button>
                                </div>
                            </div>
                        </form>

                        <div class="row justify-content-center">
                            <?php
                            $search = isset($_GET['search']) ? strtolower(trim($_GET['search'])) : '';
                            foreach ($data as $row):
                                $title = strtolower($row['title']);
                                $company = strtolower(isset($row['company']) ? $row['company'] : 'Hariston Hotel & Suites');
                                if ($search && strpos($title, $search) === false && strpos($company, $search) === false) {
                                    continue;
                                }
                            ?>
                                <div class="col-md-4 d-flex py-5">
                                    <div class="card shadow-sm border-0 w-100" style="border-radius: 10px;">
                                        <img src="<?= base_url('uploads/' . $row['photo']) ?>" class="card-img-top"
                                            alt="Lowongan"
                                            style="height: 220px; object-fit: cover; background-color: #f9f9f9;">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title mb-1"><?= $row['title'] ?></h5>
                                            <small class="text-muted mb-2"><?= isset($row['company']) ? $row['company'] : 'Hariston Hotel & Suites' ?></small>
                                            <?php
                                            $maxWords = 15;
                                            $words = explode(' ', strip_tags($row['description']));
                                            if (count($words) > $maxWords) {
                                                $shortDesc = implode(' ', array_slice($words, 0, $maxWords)) . '...';
                                            } else {
                                                $shortDesc = $row['description'];
                                            }
                                            ?>
                                            <p class="card-text small text-muted" style="min-height: 100px;">
                                                <?= $shortDesc ?>
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                                <small class="text-muted">Diposting:
                                                    <?= date('d M Y', strtotime($row['created_at'])) ?></small>
                                                <button type="button" class="btn btn-sm btn-info text-white"
                                                    data-bs-toggle="modal" data-bs-target="#detailModal<?= $row['id'] ?>">
                                                    Detail
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>