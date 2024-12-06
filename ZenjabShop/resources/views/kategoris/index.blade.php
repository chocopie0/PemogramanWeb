<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kategori Hijab</title>
    <!-- Tambahkan Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Daftar Kategori Hijab</h1>
        
        <!-- Tampilkan kategori dalam grid -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($kategoris as $kategori)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body text-center">
                            <!-- Nama Kategori -->
                            <h5 class="card-title fw-bold">{{ $kategori->nama }}</h5>
                            <!-- Slug -->
                            <p class="card-text text-muted">{{ $kategori->slug }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Tambahkan Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
