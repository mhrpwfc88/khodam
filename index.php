<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khodam Dev.</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <style>
        body {
            background-color: #008080;
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            min-height: 100vh;
            margin: 0;
            box-sizing: border-box;
            text-align: center;
        }

        .card {
            background-color: rgba(147, 148, 171, 0.25);
            padding: 20px;
            border: 1px solid #ffffff;
            border-radius: 10px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px);
            position: relative;
        }

        h1, p {
            color: #ffffff;
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border: 2px solid #ffffff;
            border-radius: 200px;
            text-align: center;
            width: 80%;
            margin-bottom: 20px;
            background-color: transparent;
            color: #f1f1f1;
        }

        button {
            background-color: #439c8f;
            color: #ffffff;
            padding: 10px 25px;
            font-size: 16px;
            border: none;
            border-radius: 200px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s, box-shadow 0.2s;
        }

        button:hover {
            background-color: #4e4aa7;
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .footer {
            color: #97D3FF;
            font-weight: bold;
            position: absolute;
            bottom: 10px;
            width: 100%;
            text-align: center;
        }

        #result {
            display: none;
        }

        .loading-spinner {
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top: 4px solid #FFA500;
            width: 40px;
            height: 40px;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -20px;
            margin-left: -20px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
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
