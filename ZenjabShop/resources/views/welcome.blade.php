<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZendayaShop</title>
    <!-- Tambahkan Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Mengimpor file CSS yang telah di-compile -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #6a0dad;">
    <div class="container">
        <a class="navbar-brand fw-bold text-white" href="/">
            ZendayaShop
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/shop">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/posts">Lihat Daftar Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/kategoris">Lihat Daftar Kategoris</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/contact">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

    <!-- Hero Section -->
    <header class="bg-light text-center py-5">
        <div class="container">
            <h1 class="display-4 fw-bold">Selamat Datang di ZendayaShop</h1>
            <p class="lead">Temukan hijab terbaik untuk melengkapi gaya Anda.</p>
            <a href="/shop" class="btn btn-danger btn-lg mb-3">Belanja Sekarang</a>
        </div>
    </header>

    <!-- Content Section (Product Grid) -->
    <main class="container my-5">
        <h2 class="text-center mb-4">Koleksi Hijab Terbaru</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="https://via.placeholder.com/500x300" class="card-img-top" alt="Hijab Instan">
                    <div class="card-body">
                        <h5 class="card-title">Hijab Instan</h5>
                        <p class="card-text">Koleksi hijab instan dengan bahan nyaman dan harga terjangkau.</p>
                        <a href="/shop" class="btn btn-primary w-100">Lihat Koleksi</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="https://via.placeholder.com/500x300" class="card-img-top" alt="Hijab Phasmina">
                    <div class="card-body">
                        <h5 class="card-title">Hijab Phasmina</h5>
                        <p class="card-text">Hijab phasmina dengan desain elegan dan nyaman dipakai sepanjang hari.</p>
                        <a href="/shop" class="btn btn-primary w-100">Lihat Koleksi</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="https://via.placeholder.com/500x300" class="card-img-top" alt="Hijab SegiEmpat">
                    <div class="card-body">
                        <h5 class="card-title">Hijab SegiEmpat</h5>
                        <p class="card-text">Hijab segiempat dengan berbagai pilihan warna dan ukuran sesuai kebutuhan.</p>
                        <a href="/shop" class="btn btn-primary w-100">Lihat Koleksi</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; {{ date('Y') }} ZendayaShop. All Rights Reserved.</p>
        <p>Follow us on:
            <a href="#" class="text-white">Instagram</a> |
            <a href="#" class="text-white">Facebook</a>
        </p>
    </footer>

    <!-- Tambahkan Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
