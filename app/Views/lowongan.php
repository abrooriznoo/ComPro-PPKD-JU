<style>
    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    .modal-header.bg-primary {
        background-color: #0056b3 !important;
    }

    .modal-content {
        border-radius: 12px;
        overflow: hidden;
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="icon" href="asset/logo.png" type="image/x-icon">

    <title>Lowongan - PPKD JAKUT</title>
</head>

<body style="margin:0;padding:0;">
    <header>
        <nav>
            <?php include 'inc/header.php'; ?>
        </nav>
    </header>

    <main class="flex-1" style="margin:0;padding:0;" data-aos="fade-in" data-aos-once="true">
        <!-- AOS CSS -->
        <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
        <section data-aos="fade-in" data-aos-once="true" style="overflow-y:auto; overflow-x:hidden;">
            <?php include 'pages/lowongan.php'; ?>
            <!-- / Content -->
        </section>

        <?php foreach ($data as $row): ?>
            <div class="modal fade" id="detailModal<?= $row['id'] ?>" tabindex="-1"
                aria-labelledby="detailModalLabel<?= $row['id'] ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="detailModalLabel<?= $row['id'] ?>">
                                <?= $row['title'] ?>
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <!-- Banner Gambar -->
                            <div class="text-center mb-3">
                                <img src="<?= base_url('uploads/' . $row['photo']) ?>" class="img-fluid rounded shadow"
                                    style="max-height: 300px; object-fit: cover;" alt="Lowongan">
                            </div>

                            <!-- Informasi Umum -->
                            <h4 class="text-center fw-bold">
                                <?= isset($row['company']) ? $row['company'] : 'Hariston Hotel & Suites' ?>
                            </h4>
                            <p class="text-center text-muted mb-1">Diposting:
                                <?= date('d M Y', strtotime($row['created_at'])) ?>
                            </p>
                            <p class="text-center text-muted">Diperbarui:
                                <?= date('d M Y', strtotime($row['updated_at'])) ?>
                            </p>
                            <hr>

                            <!-- Deskripsi Pekerjaan -->
                            <h5 class="fw-bold">Deskripsi Pekerjaan</h5>

                            <!-- Requirements -->
                            <div class="bg-light p-3 rounded mt-3">
                                <h6 class="fw-bold">Requirements:</h6>
                                <ul>
                                    <?php
                                    $descPoints = explode("\n", $row['description']);
                                    foreach ($descPoints as $point) {
                                        $trimmed = trim($point);
                                        if (!empty($trimmed)) {
                                            echo "<li>{$trimmed}</li>";
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>

                            <!-- QR & CTA -->
                            <div class="row mt-4">
                                <div class="col-md-6 text-center">
                                    <img src="<?= base_url('uploads/qr-code.png') ?>" alt="QR Code"
                                        style="max-width: 150px;">
                                    <p class="small mt-2">Scan untuk melamar</p>
                                </div>
                                <div class="col-md-6 d-flex align-items-center justify-content-center">
                                    <a href="#" class="btn btn-primary">
                                        Lamar Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div> -->
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </main>

    <a href="#" class="btn btn-light rounded-circle shadow d-flex align-items-center justify-content-center"
        id="backToTopBtn2" title="Kembali ke atas"
        style="position: fixed; bottom: 32px; right: 32px; z-index: 999; width: 60px; height: 60px; display: none; font-size: 28px; color: #1096ad; background-color: #fff; border: 2px solid #1096ad;">
        <i class="bi bi-chat-quote"></i>
    </a>

    <script>
        // Show/hide button on scroll
        window.addEventListener('scroll', function() {
            var btn = document.getElementById('backToTopBtn');
            if (window.scrollY > 200) {
                btn.style.display = 'flex';
            } else {
                btn.style.display = 'none';
            }
        });

        // Scroll to top on click
        document.getElementById('backToTopBtn').addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>

    <footer>
        <?php include 'inc/footer.php'; ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            mirror: false
        });
    </script>

    <script>
        // Enable dropdown on hover for Bootstrap 5
        document.querySelectorAll('.nav-item.dropdown').forEach(function(dropdown) {
            dropdown.addEventListener('mouseenter', function() {
                let menu = dropdown.querySelector('.dropdown-menu');
                let toggle = dropdown.querySelector('.dropdown-toggle');
                menu.classList.add('show');
                toggle.setAttribute('aria-expanded', 'true');
            });
            dropdown.addEventListener('mouseleave', function() {
                let menu = dropdown.querySelector('.dropdown-menu');
                let toggle = dropdown.querySelector('.dropdown-toggle');
                menu.classList.remove('show');
                toggle.setAttribute('aria-expanded', 'false');
            });
        });

        // Bootstrap tab activation (if not already included elsewhere)
        document.addEventListener('DOMContentLoaded', function() {
            var triggerTabList = [].slice.call(document.querySelectorAll('#trainingTab button'));
            triggerTabList.forEach(function(triggerEl) {
                triggerEl.addEventListener('click', function(event) {
                    triggerTabList.forEach(function(el) {
                        if (el === event.currentTarget) {
                            el.classList.add('active');
                            el.style.background = '#1096ad';
                            el.style.color = '#fff';
                        } else {
                            el.classList.remove('active');
                            el.style.background = '';
                            el.style.color = '';
                        }
                    });
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            var triggerTabList2 = [].slice.call(document.querySelectorAll('#trainingMTUTab button'));
            triggerTabList2.forEach(function(triggerEl) {
                triggerEl.addEventListener('click', function(event) {
                    triggerTabList2.forEach(function(el) {
                        if (el === event.currentTarget) {
                            el.classList.add('active');
                            el.style.background = '#1096ad';
                            el.style.color = '#fff';
                        } else {
                            el.classList.remove('active');
                            el.style.background = '';
                            el.style.color = '';
                        }
                    });
                });
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            var navbar = document.querySelector('.navbar');
            // Tambahkan transisi pada box-shadow
            if (navbar) {
                navbar.style.transition = "box-shadow 0.5s cubic-bezier(.25,.8,.25,1)";
                window.addEventListener('scroll', function() {
                    if (window.scrollY > 0) {
                        navbar.classList.add('shadow');
                    } else {
                        navbar.classList.remove('shadow');
                    }
                });
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const detailButtons = document.querySelectorAll('.btn-info.text-white');
            detailButtons.forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    const href = btn.getAttribute('href');
                    if (href && href.includes('lowongan/details/')) {
                        e.preventDefault();
                        const id = href.split('/').pop();
                        const modal = document.getElementById('detailModal' + id);
                        if (modal) {
                            const bsModal = new bootstrap.Modal(modal);
                            bsModal.show();
                        } else {
                            window.location.href = href;
                        }
                    }
                });
            });
        });
    </script>

</body>

</html>