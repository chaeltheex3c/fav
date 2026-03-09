<?php
$base = __DIR__;
$file = isset($_GET['file']) ? $_GET['file'] : null;
$path = realpath($base . "/" . $file);

if ($file && strpos($path, $base) !== 0) {
    die("Access denied");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = $_POST['file'];
    $content = $_POST['content'];
    $path = realpath($base . "/" . $file);

    if ($path && strpos($path, $base) === 0) {
        file_put_contents($path, $content);
        echo "<b>File saved.</b><br><br>";
    }
}

echo "<h3>Simple PHP File Editor</h3>";

if ($file && file_exists($path)) {

    $content = htmlspecialchars(file_get_contents($path));

    echo "<form method='post'>";
    echo "<input type='hidden' name='file' value='".htmlspecialchars($file)."'>";
    echo "<b>Editing:</b> ".htmlspecialchars($file)."<br><br>";
    echo "<textarea name='content' style='width:100%;height:400px;'>$content</textarea><br><br>";
    echo "<button type='submit'>Save</button>";
    echo "</form>";

    echo "<br><a href='?'>Back</a>";

} else {

    $files = scandir($base);

    echo "<ul>";
    foreach ($files as $f) {
        if ($f == "." || $f == "..") continue;

        if (is_file($f)) {
            echo "<li><a href='?file=".urlencode($f)."'>$f</a></li>";
        }
    }
    echo "</ul>";
}
?>
