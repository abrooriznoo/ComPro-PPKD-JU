<style>
    .dokumen-list {
        display: flex;
        flex-direction: column;
        gap: 30px;
    }

    .dokumen-item {
        display: flex;
        flex-direction: column;
    }

    .dokumen-item label {
        font-weight: bold;
        margin-bottom: 10px;
    }

    .dokumen-preview img,
    .dokumen-preview iframe {
        width: 100%;
        height: 350px;
        object-fit: cover;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    @media (max-width: 768px) {

        .dokumen-preview img,
        .dokumen-preview iframe {
            height: 250px;
        }
    }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.10-0/css/ionicons.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <!-- Header -->
    <header>
        <?php include 'inc/header.php'; ?>
    </header>

    <!-- Main Content -->
    <main class="container-fluid">
        <div class="card shadow-sm border-0">
            <div class="card-body bg-light">
                <?php
                $viewPath = APPPATH . 'Views/pages/admin/content/' . ($page ?? 'home') . '.php';
                if (file_exists($viewPath)) {
                    include($viewPath);
                } else {
                    echo '<div class="alert alert-warning">Halaman <strong>' . esc($page) . '</strong> tidak ditemukan.</div>';
                }
                ?>
            </div>

        </div>
    </main>
    <div class="footer text-muted text-center fixed-bottom">
        &copy; <?= date('Y') ?> Admin Panel - PPKD
    </div>

    <!-- JS Libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.nav-item.dropdown, .nav-item.dropdown-regis').forEach(function (dropdown) {
                dropdown.addEventListener('mouseenter', function () {
                    var menu = dropdown.querySelector('.dropdown-menu, .dropdown-menu-regis');
                    if (menu) menu.classList.add('show');
                });
                dropdown.addEventListener('mouseleave', function () {
                    var menu = dropdown.querySelector('.dropdown-menu, .dropdown-menu-regis');
                    if (menu) menu.classList.remove('show');
                });
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
</body>

</html>