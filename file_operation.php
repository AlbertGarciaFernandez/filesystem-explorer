<?php
if(isset($_POST['create_file']))
{
 $file_name=$_POST['file_name'];
 $myfile = fopen("root/".$file_name, "w") or die("Unable to open file!");
$txt = "Texto de ejemplo\n";
fwrite($myfile, $txt);
 fclose($myfile);
}

if(isset($_POST['edit_file']))
{
 $file_name=$_POST['file_name'];
 $txt=$_POST['edit_text'];
 $myfile = fopen("root/".$file_name, "w") or die("Unable to open file!");
fwrite($myfile, $txt);
 fclose($myfile);
}

if(isset($_POST['delete_file']))
{
$file_name=$_POST['file_name'];
 unlink("root/".$file_name);
}
?>