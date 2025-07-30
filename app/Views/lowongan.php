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

    .glass-button {
        background: rgba(255, 255, 255, 0.1);
        /* light transparent bg */
        backdrop-filter: blur(10px) saturate(180%);
        -webkit-backdrop-filter: blur(10px) saturate(180%);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.25);
        transition: all 0.3s ease-in-out;
    }

    .glass-button:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: scale(1.05);
    }

    .glass-button i {
        mix-blend-mode: difference;
        color: white;
        /* Atur ke white atau black tergantung desain */
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
    </main>

    <?php foreach ($data as $row): ?>
        <div class="modal fade" id="detailModal<?= $row['id'] ?>" tabindex="-1"
            aria-labelledby="detailModalLabel<?= $row['id'] ?>" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered">
                <div class="modal-content border-0 shadow rounded-4 overflow-hidden">

                    <!-- Header Gambar dengan Overlay -->
                    <div class="position-relative" style="height: 350px;">
                        <img src="<?= base_url('uploads/' . $row['photo']) ?>" alt="Lowongan" class="w-100 h-100"
                            style="object-fit: cover; object-position: center; width: 100%; height: 100%;">
                        <!-- Floating close button -->
                        <button type="button"
                            class="position-absolute top-0 end-0 m-3 border-0 rounded-circle d-flex align-items-center justify-content-center glass-button"
                            style="width: 32px; height: 32px; z-index: 1.5;" data-bs-dismiss="modal" aria-label="Close">
                            <div class="fw-bold fs-5 text-white">
                                <i class="bi bi-x"></i>
                            </div>
                        </button>
                        <!-- Gradient ke putih -->
                        <div class="position-absolute bottom-0 start-0 w-100"
                            style="height: 120px; background: linear-gradient(to top, #fff, transparent);"></div>
                    </div>

                    <!-- Konten Modal -->
                    <div class="modal-body bg-white px-4 pt-0 pb-4">
                        <div class="text-center mt-n5">
                            <h4 class="fw-bold"><?= $row['title'] ?></h4>
                            <h6 class="text-muted"><?= $row['company'] ?? 'Hariston Hotel & Suites' ?></h6>
                            <p class="text-muted small mb-0">Diposting: <?= date('d M Y', strtotime($row['created_at'])) ?>
                            </p>
                            <p class="text-muted small">Diperbarui: <?= date('d M Y', strtotime($row['updated_at'])) ?></p>
                        </div>

                        <hr class="my-4">

                        <!-- Deskripsi -->
                        <h5 class="fw-semibold mb-3">Deskripsi Pekerjaan</h5>
                        <div class="bg-light p-4 rounded-3">
                            <h6 class="fw-bold mb-2">Requirements:</h6>
                            <ul class="mb-0">
                                <?php
                                $descPoints = explode("\n", $row['description']);
                                foreach ($descPoints as $point) {
                                    $trimmed = trim($point);
                                    if (!empty($trimmed)) {
                                        echo "<li class='mb-1'>{$trimmed}</li>";
                                    }
                                }
                                ?>
                            </ul>
                        </div>

                        <!-- QR & CTA -->
                        <div class="row mt-5">
                            <div class="col-md-6 text-center mb-3 mb-md-0">
                                <img src="<?= base_url('uploads/qr-code.png') ?>" alt="QR Code" class="img-fluid"
                                    style="max-width: 130px;">
                                <p class="small text-muted mt-2">Scan untuk melamar</p>
                            </div>
                            <div class="col-md-6 d-flex align-items-center justify-content-center">
                                <a href="#" class="btn btn-primary btn-lg px-4 rounded-pill shadow-sm">
                                    Lamar Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>



    <!-- Chatbot Button -->
    <button type="button" class="btn btn-light rounded-circle shadow d-flex align-items-center justify-content-center"
        id="backToTopBtn2" title="Chatbot"
        style="position: fixed; bottom: 32px; right: 32px; z-index: 999; width: 60px; height: 60px; display: none; font-size: 28px; color: #1096ad; background-color: #fff; border: 2px solid #1096ad;"
        data-bs-toggle="modal" data-bs-target="#chatbotModal">
        <i class="bi bi-chat-quote"></i>
    </button>

    <!-- Chatbot Modal -->
    <div class="modal fade" id="chatbotModal" tabindex="-1" aria-labelledby="chatbotModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow-lg rounded-4 border-0">
                <div class="modal-header bg-info text-white rounded-top-4">
                    <h5 class="modal-title" id="chatbotModalLabel">
                        <i class="bi bi-robot me-2"></i>Chatbot Bantuan
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body bg-light" style="padding-bottom: 0;">
                    <div class="mb-2 text-center">
                        <span class="badge bg-info bg-gradient text-white px-3 py-2 rounded-pill">
                            <i class="bi bi-chat-dots me-1"></i> Halo! Ada yang bisa saya bantu?
                        </span>
                    </div>
                    <div id="chatContainer"
                        style="max-height: 320px; min-height: 180px; overflow-y: auto; border-radius: 12px; background: #fff; border: 1px solid #e3e6f0; padding: 12px; box-shadow: 0 2px 8px rgba(16,150,173,0.07);">
                        <div id="chatMessages" style="font-size: 15px;"></div>
                    </div>
                    <div class="input-group mt-3 mb-1">
                        <input type="text" id="userInput" class="form-control rounded-start-pill"
                            placeholder="Tulis pesan..." onkeydown="if(event.key==='Enter'){sendMessage();}">
                        <button class="btn btn-info rounded-end-pill text-white px-4" onclick="sendMessage()">
                            <i class="bi bi-send"></i>
                        </button>
                    </div>
                </div>
                <div class="modal-footer bg-light rounded-bottom-4 py-2">
                    <small class="text-muted"><i class="bi bi-shield-lock"></i> Chat ini bersifat simulasi.</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Chatbot Script -->
    <script>
        function sendMessage() {
            const input = document.getElementById('userInput');
            const message = input.value.trim();
            if (!message) return;

            const chatMessages = document.getElementById('chatMessages');

            // Tambahkan pesan pengguna
            const userMsg = document.createElement('div');
            userMsg.innerHTML = `<strong>Anda:</strong> ${message}`;
            chatMessages.appendChild(userMsg);

            // Bersihkan input
            input.value = '';

            // Simulasi balasan bot
            setTimeout(() => {
                const botMsg = document.createElement('div');
                botMsg.innerHTML = `<strong>Bot:</strong> ${getBotReply(message)}`;
                chatMessages.appendChild(botMsg);

                // Scroll ke bawah
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }, 600);
        }

        // Logika jawaban bot sederhana
        function getBotReply(userMessage) {
            const msg = userMessage.toLowerCase();
            if (msg.includes('halo')) return 'Halo juga! Apa yang bisa saya bantu?';
            if (msg.includes('nama')) return 'Saya adalah chatbot sederhana.';
            if (msg.includes('bantuan')) return 'Tentu! Silakan beri tahu apa yang Anda butuhkan.';
            return 'Maaf, saya tidak mengerti. Bisa dijelaskan lagi?';
        }
    </script>

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