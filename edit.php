<?php
require_once('classes/Mahasiswa.php');
$mhs = new Mahasiswa();

//cek berdasarkan nim
if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];
    $data = $mhs->getByNim($nim);
}

// cara proses update data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $mhs->edit($nim, ['nama' => $nama, 'email' => $email, 'gender' => $gender]);
    header('Location: index.php');
    exit;
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card p-4 mx-auto" style="width: 28rem;">
            <h1>Form Edit Mahasiswa</h1>

            <form action="" method="post">
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $data['nim'] ?? ''; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama'] ?? ''; ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $data['email'] ?? ''; ?>">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="laki" name="gender" value="L" <?php echo (isset($data['gender']) && $data['gender'] === 'L') ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="laki">Laki-Laki</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="perempuan" name="gender" value="P" <?php echo (isset($data['gender']) && $data['gender'] === 'P') ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="perempuan">Perempuan</label>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                <a href="index.php" class="btn btn-secondary mt-3">Batal</a>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>