<?php include 'template/header.php'; ?>

    <!-- Bootstrap 5 + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&family=Inter:wght@400;500&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style-gym-hero.css">
</head>
<body class="bg-black text-white">

    <!-- HERO SECTION -->
    <section class="hero d-flex align-items-center justify-content-center min-vh-100 position-relative overflow-hidden">
        <!-- Background Image -->
        <div class="hero-bg"></div>

        <div class="container position-relative z-3">
            <div class="row align-items-center">
                <!-- LEFT: Text + Button -->
                <div class="col-lg-5">
                    <!-- Logo -->
                    <div class="d-flex align-items-center mb-5">
                        <i class="bi bi-trophy text-red fs-1 me-2"></i>
                        <h1 class="h4 fw-bold mb-0 text-white">FITZONE GYM</h1>
                    </div>

                    <!-- Main Title -->
                    <h1 class="display-1 fw-bold text-orange mb-2" style="letter-spacing: -2px;">
                        GYM WEB DESIGN
                    </h1>

                    <!-- Subtitle -->
                    <h2 class="h4 fw-normal text-white mb-4">
                        WELCOME TO MY WEBSITE GYM MEMBERSHIP
                    </h2>

                    <!-- JOIN NOW Button -->
                    <a href="data-input.php" class="btn btn-orange btn-lg px-5 py-3 rounded-pill fw-bold shadow-lg text-uppercase d-inline-flex align-items-center">
                        <span>JOIN NOW</span>
                    </a>
                </div>

                <!-- RIGHT: Athlete Image -->
                <div class="col-lg-7 text-center">
                    <img src="assets/img/bg-img/valery-sysoev-LDAirERNzew-unsplash.jpg" alt="FITZONE Athlete" class="img-fluid hero-image">
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <?php include 'template/footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>