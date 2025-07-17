<style>
    .navbar-nav .nav-link {
        position: relative;
        transition: color 0.2s;
    }

    .navbar-nav .nav-link.active:not(.dropdown-toggle)::after,
    .navbar-nav .nav-link:focus:not(.dropdown-toggle)::after,
    .navbar-nav .nav-link:hover:not(.dropdown-toggle)::after {
        width: 100%;
    }

    .navbar-nav .nav-link:not(.dropdown-toggle)::after {
        content: '';
        display: block;
        position: absolute;
        left: 0;
        bottom: -4px;
        width: 0;
        height: 3px;
        background: #0dcaf0;
        border-radius: 2px;
        transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #fff;">
    <div class="container-fluid">
        <div class="d-flex align-items-center gap-3">
            <img src="asset/logo.png" alt="" width="50px" height="50px">
            <h2 class="mt-2"><a class="navbar-brand" href="#">PPKD-JAKUT</a></h2>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ms-5" id="navbarNav">
            <ul class="navbar-nav mb-2 mb-lg-0 mx-auto gap-3">
                <li class="nav-item"><a class="nav-link" href="/" id="nav-home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/#tentang" id="nav-tentang">Tentang</a></li>
                <li class="nav-item"><a class="nav-link" href="/#layanan" id="nav-layanan">Layanan</a></li>
                <li class="nav-item"><a class="nav-link" href="lowongan" id="nav-lowongan">Lowongan</a></li>
                <li class="nav-item"><a class="nav-link" href="#" id="nav-jadwal">Jadwal</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="pelatihanDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Pelatihan
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="pelatihanDropdown">
                        <li><a class="dropdown-item" href="https://ppkdju.com/regular">Regular</a></li>
                        <li><a class="dropdown-item" href="https://ppkdju.com/mtu">Mobile Training Unit (MTU)</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="pendaftaranDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Pendaftaran
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="pendaftaranDropdown">
                        <li><a class="dropdown-item" href="https://ppkdju.com/pendaftaran">Regular</a></li>
                        <li><a class="dropdown-item" href="https://ppkdju.com/pendaftaran-mtu">Mobile Training Unit
                                (MTU)</a></li>
                        <li><a class="dropdown-item" href="#">Kolaborasi Pelatihan</a></li>
                    </ul>
                </li>
            </ul>
            <div class="d-flex ms-auto">
                <button type="button" class="btn btn-info text-white mx-2">Yuk Mulai</button>
            </div>
        </div>
    </div>
</nav>

<script>
    // Tambahkan class active pada nav-link sesuai lokasi/section
    // Highlight nav-link based on click and current page URL
    document.querySelectorAll('.navbar-nav .nav-link').forEach(function (link) {
        link.addEventListener('click', function () {
            document.querySelectorAll('.navbar-nav .nav-link').forEach(function (nav) {
                nav.classList.remove('active');
            });
            this.classList.add('active');
        });

        // Highlight nav-link if its href matches current page URL
        if (
            link.href === window.location.href ||
            (link.getAttribute('href') === '/' && window.location.pathname === '/')
        ) {
            link.classList.add('active');
        }
    });
</script>