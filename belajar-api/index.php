<?php
$apiKey = "YOUR_API_KEY"; // Ganti dengan API Key OpenWeatherMap milikmu
$city = isset($_GET['city']) ? $_GET['city'] : 'Jakarta'; // Default kota Jakarta jika belum ada input
$error = "";

// Jika user menginput kota, ambil datanya dari API
if (!empty($city)) {
    $apiUrl = "https://api.openweathermap.org/data/2.5/weather?q=$city&units=metric&appid=$apiKey";
    $response = @file_get_contents($apiUrl); // Gunakan @ untuk menghindari error jika kota tidak ditemukan

    if ($response) {
        $data = json_decode($response, true); // Konversi JSON ke array PHP
        if ($data['cod'] == 200) { // Pastikan respons sukses
            $temp = $data['main']['temp'];
            $weather = $data['weather'][0]['description'];
        } else {
            $error = "Kota tidak ditemukan!";
        }
    } else {
        $error = "Gagal mengambil data cuaca!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Cuaca</title>
</head>
<body>
    <h2>Cek Cuaca</h2>
    <form method="GET" action="">
        <label for="city">Masukkan Nama Kota:</label>
        <input type="text" id="city" name="city" required>
        <button type="submit">Cari</button>
    </form>

    <?php if (!empty($error)) : ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php elseif (!empty($temp)) : ?>
        <h3>Cuaca di <?php echo ucfirst($city); ?></h3>
        <p>Suhu: <?php echo $temp; ?>°C</p>
        <p>Kondisi: <?php echo ucfirst($weather); ?></p>
    <?php endif; ?>
</body>
</html>
