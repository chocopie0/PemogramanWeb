<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Post</title>
    <!-- Tambahkan Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Daftar Post</h1>
        
        <!-- Tampilkan post dalam grid -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($posts as $post)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <!-- Nama Post -->
                            <h5 class="card-title fw-bold">{{ $post->name }}</h5>
                            <!-- Deskripsi -->
                            <p class="card-text">{{ Str::limit($post->description, 100, '...') }}</p>
                            <!-- Harga -->
                            <p class="card-text fw-bold text-success">Rp{{ number_format($post->price, 0, ',', '.') }}</p>
                            <!-- Tombol detail -->
                            <a href="/posts/{{ $post->id }}" class="btn btn-primary w-100">Lihat Detail</a>
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
