<?php include 'template/header.php'; ?>

    <!-- Bootstrap 5 + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&family=Inter:wght@400;500&display=swap" rel="stylesheet">

    <!-- Logo -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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

    <!-- WHY CHOOSE OUR FITNESS SERVICE -->
<section class="why-choose-section">
    <div class="container">
        <div class="row">
            <!-- Kiri: Judul -->
            <div class="col-lg-6 mb-5 mb-lg-0">
                <h1 class="why-title">
                    Why should choose<br>
                    <span class="highlight-red">FITZONE GYM</span><br>
                    service?
                </h1>
            </div>

            <!-- Kanan: Fitur -->
            <div class="col-lg-6">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="bi bi-trophy"></i>
                    </div>
                    <div class="feature-text">
                        <h5>Fitness Mastery</h5>
                        <p>Empowering you every step of the way, ensuring you conquer your goals.</p>
                    </div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="bi bi-bicycle"></i>
                    </div>
                    <div class="feature-text">
                        <h5>Various Workout Options</h5>
                        <p>Empowering you every step of the way, ensuring you conquer your goals.</p>
                    </div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <div class="feature-text">
                        <h5>Supportive Community</h5>
                        <p>Empowering you every step of the way, ensuring you conquer your goals.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- PRICING PLAN SECTION -->
    <section class="pricing-section">
        <div class="container">
            <h2 class="pricing-title">Pricing Plan</h2>
            <p class="pricing-subtitle">
                They will help to attract new customers and members to achieve their goals
            </p>
            <div class="row g-4 justify-content-center">
                <!-- Regular Member -->
                <div class="col-md-4">
                    <div class="pricing-card">
                        <h3 class="card-title">Member TRIWULAN</h3>
                        <div class="card-price">Rp15.000.000 <small>/month</small></div>
                        <ul>
                            <li>Customer support</li>
                            <li>Personal trainer</li>
                            <li>Standard options</li>
                            <li>Basic exercise equipment and facilities</li>
                            <li>Limited or no access to group fitness classes</li>
                        </ul>
                    </div>
                </div>

                <!-- Premium Member (Highlighted) -->
                <div class="col-md-4">
                    <div class="pricing-card premium">
                        <h3 class="card-title">Member TAHUNAN</h3>
                        <div class="card-price">Rp25.000.000 
                        <small>/month</small></div>
                        <ul>
                            <li>Customer support</li>
                            <li>Personal trainer</li>
                            <li>Standard options</li>
                            <li>Wider variety of equipment and facilities (cardio, weights, etc.)</li>
                            <li>Access to a range of group fitness classes (e.g., yoga, spinning, HIIT)</li>
                        </ul>
                    </div>
                </div>
                <!-- Daily Member -->
                <div class="col-md-4">
                    <div class="pricing-card">
                        <h3 class="card-title">Member Harian</h3>
                        <div class="card-price">Rp35.000<small>/month</small></div>
                        <ul>
                            <li>Customer support</li>
                            <li>Personal trainer</li>
                            <li>Standard options</li>
                            <li>Basic exercise equipment and facilities</li>
                            <li>Limited or no access to group fitness classes</li>
                        </ul>
                    </div>
                </div>

                <!-- Standard Member -->
                <div class="col-md-4">
                    <div class="pricing-card">
                        <h3 class="card-title">Member BULANAN</h3>
                        <div class="card-price">Rp5.000.000<small>/month</small></div>
                        <ul>
                            <li>Customer support</li>
                            <li>Personal trainer</li>
                            <li>Standard options</li>
                            <li>Extensive equipment selection and facilities</li>
                            <li>Access to a wide variety of classes and specialized training programs</li>
                        </ul>
                    </div>
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