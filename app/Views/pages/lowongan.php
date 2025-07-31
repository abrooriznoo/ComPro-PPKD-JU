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

                        <?php
                        // Pagination & Search Setup
                        $perPage = 6;
                        $search = isset($_GET['search']) ? strtolower(trim($_GET['search'])) : '';
                        $filteredData = [];
                        foreach ($data as $row) {
                            $title = strtolower($row['title']);
                            $company = strtolower(isset($row['company']) ? $row['company'] : 'Hariston Hotel & Suites');
                            if ($search && strpos($title, $search) === false && strpos($company, $search) === false) {
                                continue;
                            }
                            $filteredData[] = $row;
                        }
                        $totalFiltered = count($filteredData);
                        $totalPages = max(1, ceil($totalFiltered / $perPage));
                        $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
                        if ($page < 1) $page = 1;
                        if ($page > $totalPages) $page = $totalPages;
                        $start = ($page - 1) * $perPage;
                        $displayData = array_slice($filteredData, $start, $perPage);
                        ?>

                        <div class="row justify-content-center">
                            <?php if (empty($displayData)): ?>
                                <div class="col-12 text-center">
                                    <p class="text-muted">Tidak ada lowongan ditemukan.</p>
                                </div>
                            <?php else: ?>
                                <?php foreach ($displayData as $row): ?>
                                    <div class="col-12 col-sm-6 col-md-4 d-flex justify-content-center mb-5 mt-4">
                                        <div class="card shadow border-0 w-100" style="border-radius: 10px;">
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
                            <?php endif; ?>
                        </div>

                        <!-- Pagination Links -->
                        <?php if ($totalPages > 1): ?>
                            <div class="col-12 d-flex justify-content-center mt-4">
                                <nav>
                                    <ul class="pagination">
                                        <?php
                                        $query = $_GET;
                                        for ($i = 1; $i <= $totalPages; $i++):
                                            $query['page'] = $i;
                                            $url = '?' . http_build_query($query);
                                        ?>
                                            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                                                <a class="page-link" href="<?= $url ?>"><?= $i ?></a>
                                            </li>
                                        <?php endfor; ?>
                                    </ul>
                                </nav>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>