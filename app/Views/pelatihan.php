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

    /* .card {
        transition: transform 0.2s, box-shadow 0.2s;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .card:hover:not(.footer) {
        transform: translateY(-5px) scale(1.02);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    .btn-info {
        background: #17a2b8;
        border: none;
    }

    .btn-info:hover {
        background: #138496;
    } */
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
    <link rel="icon" href="../../asset/logo.png" type="image/x-icon">

    <title>Daftar Pelatihan - PPKD JAKUT</title>
</head>

<body>
    <?= session()->getFlashdata('error') ? '<div class="alert alert-danger">' . session()->getFlashdata('error') . '</div>' : '' ?>
    <?= session()->getFlashdata('success') ? '<div class="alert alert-success">' . session()->getFlashdata('success') . '</div>' : '' ?>

    <header>
        <nav>
            <?php include 'inc/header.php'; ?>
        </nav>
    </header>

    <main style="margin-top: 60px; padding: 0;" data-aos="fade-in" data-aos-once="true">
        <div class="card-header" style="padding-top: 30px;">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-3 ms-5">Pelatihan</h4>
                <?php
                $currentPath = $_SERVER['REQUEST_URI'];
                $isRegisReg = strpos($currentPath, '/pelatihan-regular') !== false;
                $isRegisMTU = strpos($currentPath, '/pelatihan-mtu') !== false;
                $pelatihanText = $isRegisMTU ? 'Pelatihan MTU' : 'Pelatihan Regular';
                ?>
                <p class="me-5">
                    <a href="/" style="text-decoration: none; color: black;">Home</a> /
                    <a href="#" class="text-info" style="text-decoration: none;">
                        <?= $pelatihanText ?>
                    </a>
                </p>
            </div>
        </div>
        <!-- AOS CSS -->
        <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
        <section data-aos="fade-in" data-aos-once="true" style="overflow-y:auto; overflow-x:hidden;">
            <?php
            $viewPath = APPPATH . 'Views/pages/' . ($page ?? 'home') . '.php';
            if (file_exists($viewPath)) {
                include($viewPath);
            }
            ?>
            <!-- / Content -->
        </section>
    </main>

    <a href="#" class="btn btn-light rounded-circle shadow d-flex align-items-center justify-content-center"
        id="backToTopBtn2" title="Kembali ke atas"
        style="position: fixed; bottom: 32px; right: 32px; z-index: 999; width: 60px; height: 60px; display: none; font-size: 28px; color: #1096ad; background-color: #fff; border: 2px solid #1096ad;">
        <i class="bi bi-chat-quote"></i>
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Show/hide button on scroll
        window.addEventListener('scroll', function () {
            var btn = document.getElementById('backToTopBtn');
            if (window.scrollY > 200) {
                btn.style.display = 'flex';
            } else {
                btn.style.display = 'none';
            }
        });

        // Scroll to top on click
        document.getElementById('backToTopBtn').addEventListener('click', function () {
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

    <!-- Captha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- Untuk API Kelurahan, Kecamatan, Kota dan Provinsi -->
    <script>
        document.addEventListener("DOMContentLoaded", async () => {
            const kotaSelect = document.getElementById("kota");
            const kecamatanSelect = document.getElementById("kecamatan");
            const kelurahanSelect = document.getElementById("kelurahan");

            // Load kota/kabupaten (Jakarta only)
            await (async function () {
                kotaSelect.innerHTML = `<option value="">Pilih Kota/Kabupaten</option>`;
                try {
                    const res = await fetch("https://www.emsifa.com/api-wilayah-indonesia/api/regencies/31.json");
                    const data = await res.json();
                    data.forEach(item => {
                        kotaSelect.innerHTML += `<option value="${item.name}">${item.name}</option>`;
                    });
                } catch (err) {
                    kotaSelect.innerHTML += `<option value="">Gagal memuat data</option>`;
                }
            })();

            kotaSelect.addEventListener("change", async () => {
                const id = kotaSelect.selectedIndex > 0 ? kotaSelect.options[kotaSelect.selectedIndex].text : "";
                if (id) {
                    kecamatanSelect.innerHTML = `<option value="">Pilih Kecamatan</option>`;
                    kelurahanSelect.innerHTML = `<option value="">Pilih Kelurahan</option>`;
                    try {
                        // Find regency id by name
                        const resRegency = await fetch("https://www.emsifa.com/api-wilayah-indonesia/api/regencies/31.json");
                        const regencies = await resRegency.json();
                        const regency = regencies.find(r => r.name === id);
                        if (regency) {
                            const res = await fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${regency.id}.json`);
                            const data = await res.json();
                            data.forEach(item => {
                                kecamatanSelect.innerHTML += `<option value="${item.name}">${item.name}</option>`;
                            });
                        }
                    } catch (err) {
                        kecamatanSelect.innerHTML += `<option value="">Gagal memuat data</option>`;
                    }
                } else {
                    kecamatanSelect.innerHTML = `<option value="">Pilih Kecamatan</option>`;
                    kelurahanSelect.innerHTML = `<option value="">Pilih Kelurahan</option>`;
                }
            });

            kecamatanSelect.addEventListener("change", async () => {
                const kecamatanName = kecamatanSelect.selectedIndex > 0 ? kecamatanSelect.options[kecamatanSelect.selectedIndex].text : "";
                if (kecamatanName) {
                    kelurahanSelect.innerHTML = `<option value="">Pilih Kelurahan</option>`;
                    try {
                        // Find regency id by name
                        const kotaName = kotaSelect.selectedIndex > 0 ? kotaSelect.options[kotaSelect.selectedIndex].text : "";
                        const resRegency = await fetch("https://www.emsifa.com/api-wilayah-indonesia/api/regencies/31.json");
                        const regencies = await resRegency.json();
                        const regency = regencies.find(r => r.name === kotaName);
                        if (regency) {
                            // Find district id by name
                            const resDistrict = await fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${regency.id}.json`);
                            const districts = await resDistrict.json();
                            const district = districts.find(d => d.name === kecamatanName);
                            if (district) {
                                const res = await fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${district.id}.json`);
                                const data = await res.json();
                                data.forEach(item => {
                                    kelurahanSelect.innerHTML += `<option value="${item.name}">${item.name}</option>`;
                                });
                            }
                        }
                    } catch (err) {
                        kelurahanSelect.innerHTML += `<option value="">Gagal memuat data</option>`;
                    }
                } else {
                    kelurahanSelect.innerHTML = `<option value="">Pilih Kelurahan</option>`;
                }
            });
        });
    </script>

    <?php if (session()->getFlashdata('success')): ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '<?= session()->getFlashdata('success'); ?>',
                    confirmButtonColor: '#1096ad'
                });
            });
        </script>
    <?php endif; ?>

    <!-- Handle Registration link -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Handle Mobile Training Unit link
            var mtuLink = document.getElementById('regis-mtu-link');
            if (mtuLink) {
                mtuLink.addEventListener('click', function (e) {
                    var currentUrl = window.location.pathname;
                    if (currentUrl === '/registration/regis-reg') {
                        e.preventDefault();
                        window.location.replace('/registration/regis-mtu');
                    }
                });
            }

            // Handle Regular Registration link
            var regLink = document.getElementById('regis-reg-link');
            if (regLink) {
                regLink.addEventListener('click', function (e) {
                    var currentUrl = window.location.pathname;
                    if (currentUrl === '/registration/regis-mtu') {
                        e.preventDefault();
                        window.location.replace('/registration/regis-reg');
                    }
                });
            }
        });
    </script>

    <script>
        // Enable dropdown on hover for Bootstrap 5
        document.querySelectorAll('.nav-item.dropdown').forEach(function (dropdown) {
            dropdown.addEventListener('mouseenter', function () {
                let menu = dropdown.querySelector('.dropdown-menu');
                let toggle = dropdown.querySelector('.dropdown-toggle');
                menu.classList.add('show');
                toggle.setAttribute('aria-expanded', 'true');
            });
            dropdown.addEventListener('mouseleave', function () {
                let menu = dropdown.querySelector('.dropdown-menu');
                let toggle = dropdown.querySelector('.dropdown-toggle');
                menu.classList.remove('show');
                toggle.setAttribute('aria-expanded', 'false');
            });
        });

        // Bootstrap tab activation (if not already included elsewhere)
        document.addEventListener('DOMContentLoaded', function () {
            var triggerTabList = [].slice.call(document.querySelectorAll('#trainingTab button'));
            triggerTabList.forEach(function (triggerEl) {
                triggerEl.addEventListener('click', function (event) {
                    triggerTabList.forEach(function (el) {
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

        document.addEventListener('DOMContentLoaded', function () {
            var triggerTabList2 = [].slice.call(document.querySelectorAll('#trainingMTUTab button'));
            triggerTabList2.forEach(function (triggerEl) {
                triggerEl.addEventListener('click', function (event) {
                    triggerTabList2.forEach(function (el) {
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

        document.addEventListener("DOMContentLoaded", function () {
            var navbar = document.querySelector('.navbar');
            // Tambahkan transisi pada box-shadow
            if (navbar) {
                navbar.style.transition = "box-shadow 0.5s cubic-bezier(.25,.8,.25,1)";
                window.addEventListener('scroll', function () {
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
        document.addEventListener('DOMContentLoaded', function () {
            const detailButtons = document.querySelectorAll('.btn-info.text-white');
            detailButtons.forEach(function (btn) {
                btn.addEventListener('click', function (e) {
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