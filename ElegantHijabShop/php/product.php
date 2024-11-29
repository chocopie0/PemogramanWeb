<?php
include 'db.php';
header('Content-Type: application/json');

// Path untuk menyimpan gambar
$upload_dir = '../images/';

$method = $_SERVER['REQUEST_METHOD'];

// Pada backend (product.php) untuk mendapatkan produk
if ($method == 'GET') {
    if (isset($_GET['id'])) {
        // Untuk mengambil produk berdasarkan id
        $id = $_GET['id'];
        $query = $conn->prepare("SELECT * FROM products WHERE id=?");
        $query->bind_param("i", $id);
        $query->execute();
        $result = $query->get_result();
        $data = $result->fetch_assoc();
        echo json_encode($data);
    } else {
        // Untuk mendapatkan semua produk
        $result = $conn->query("SELECT * FROM products");
        $data = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($data);
    }
} elseif ($method == 'POST' && isset($_GET['id'])) {
    // Mengupdate produk
    $id = $_GET['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = null;

    // Cek jika file gambar baru diunggah
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        // Hapus file gambar lama
        $query = $conn->prepare("SELECT image FROM products WHERE id=?");
        $query->bind_param("i", $id);
        $query->execute();
        $result = $query->get_result();
        $product = $result->fetch_assoc();
        if ($product && $product['image']) {
            $old_image_path = $upload_dir . $product['image'];
            if (file_exists($old_image_path)) {
                unlink($old_image_path);
            }
        }

        // Simpan file baru
        $image_name = uniqid() . '-' . $_FILES['image']['name'];
        $image_path = $upload_dir . $image_name;
        move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
        $image = $image_name;
    } else {
        // Jika tidak ada file baru, pertahankan file lama
        $query = $conn->prepare("SELECT image FROM products WHERE id=?");
        $query->bind_param("i", $id);
        $query->execute();
        $result = $query->get_result();
        $product = $result->fetch_assoc();
        $image = $product['image'];
    }

    // Update produk dengan data baru
    $query = $conn->prepare("UPDATE products SET name=?, price=?, description=?, image=? WHERE id=?");
    $query->bind_param("sdssi", $name, $price, $description, $image, $id);
    $query->execute();

    echo json_encode(['message' => 'Product updated']);
}
 elseif ($method == 'PUT') {
    parse_str(file_get_contents("php://input"), $_PUT);
    $id = $_GET['id'];
    $name = $_PUT['name'];
    $price = $_PUT['price'];
    $description = $_PUT['description']; // Ambil deskripsi

    // Update query dengan deskripsi
    $query = $conn->prepare("UPDATE products SET name=?, price=?, description=? WHERE id=?");
    $query->bind_param("sdsi", $name, $price, $description, $id); // Bind deskripsi
    $query->execute();

    echo json_encode(['message' => 'Product updated']);
} elseif ($method == 'DELETE') {
    $id = $_GET['id'];

    // Hapus gambar terkait (opsional)
    $query = $conn->prepare("SELECT image FROM products WHERE id=?");
    $query->bind_param("i", $id);
    $query->execute();
    $result = $query->get_result();
    $product = $result->fetch_assoc();
    if ($product && $product['image']) {
        $image_path = $upload_dir . $product['image'];
        if (file_exists($image_path)) {
            unlink($image_path);
        }
    }

    $query = $conn->prepare("DELETE FROM products WHERE id=?");
    $query->bind_param("i", $id);
    $query->execute();
    echo json_encode(['message' => 'Product deleted']);
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Method not allowed']);
}
?>
