<?php
if(isset($_POST['create_file']))
{
 $file_name=$_POST['file_name'];
 $myfile = fopen("root/".$file_name, "w") or die("Unable to open file!");
$txt = "John Doe\n";
fwrite($myfile, $txt);
 fclose($myfile);
}

if(isset($_POST['edit_file']))
{
 $file_name=$_POST['file_name'];
 $$txt=$_POST['edit_text'];
 $myfile = fopen("root/".$file_name, "w") or die("Unable to open file!");
fwrite($myfile, $txt);
 fclose($myfile);
}

if(isset($_POST['delete_file']))
{
$file_name=$_POST['file_name'];
//  $folder="files/";
//  $ext=".txt";
//  $file_name=$folder."".$file_name."".$ext;
 unlink("root/".$file_name);
}
?>