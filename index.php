<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khodam Dev.</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
   <link rel="stylesheet" href="style.css">
</head>


<body>
    <div class="card">
        <h1>Cek Khodam</h1>
        <p>Masukkan nama untuk mengetahui khodam</p>
        <form action="save_name.php" method="POST">
            <input type="text" id="nameInput" name="name" placeholder="Ketik nama kamu di sini" value="<?php echo isset($_GET['name']) ? htmlspecialchars($_GET['name']) : ''; ?>">
            <button type="submit">Cek Khodam</button>
        </form>
        <div id="loading" class="loading-spinner" style="display: none;"></div>
        <div id="result" style="<?php echo isset($_GET['khodam_name']) ? 'display: block;' : 'display: none;'; ?>">
            <h2 id="khodamName"><?php echo isset($_GET['khodam_name']) ? 'Khodam: ' . htmlspecialchars($_GET['khodam_name']) : ''; ?></h2>
            <p id="khodamMeaning"><?php echo isset($_GET['khodam_meaning']) ? htmlspecialchars($_GET['khodam_meaning']) : ''; ?></p>
        </div>
    </div>
    <div class="footer">
        © 2024 <a href="mhprocode.my.id" target="_blank">NataDev.</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function cekKhodam() {
            const nameInput = document.getElementById('nameInput').value;
            if (!nameInput) {
                Swal.fire({
                    title: 'Tak Olle kosong jek',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }
            document.getElementById('loading').style.display = 'block';
        }

        function resetForm() {
            document.getElementById('result').style.display = 'none';
        }
    </script>
</body>

</html>
