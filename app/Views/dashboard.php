<style>
    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    .full-width-map {
        width: 100vw;
        height: 450px;
        border: none;
        display: block;
    }

    .zoom-card {
        transition: transform 0.3s cubic-bezier(.25, .8, .25, 1);
    }

    .zoom-card:hover {
        transform: scale(1.05);
    }

    .zoom-card:active {
        transform: scale(0.98);
    }

    @keyframes floatY {
        0% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-10px);
        }

        100% {
            transform: translateY(0);
        }
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

    <title>Home - PPKD JAKUT</title>
</head>

< style="margin:0;padding:0;">
    <header>
        <nav>
            <?php include 'inc/header.php'; ?>
        </nav>
    </header>

    <main class="flex-1" style="margin:0;padding:0;">
        <!-- AOS CSS -->
        <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
        <section data-aos="fade-in" data-aos-once="true" style="overflow-y:auto; overflow-x:hidden;">
            <?php include 'pages/home.php'; ?>
            <!-- / Content -->
        </section>
    </main>

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
    
    </body>

</html>