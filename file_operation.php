<?php
if(isset($_POST['create_file']))
{
    $carpeta=$_POST['carpeta'];
    $nombre= $_FILES['archivo']['name'];
    $guardado= $_FILES['archivo']['tmp_name'];
    if(!file_exists('root/'.$carpeta)){
        mkdir('root/'.$carpeta, 0777, true);
        if(file_exists('root/'.$carpeta)){
            if(move_uploaded_file($guardado, 'root/'.$carpeta.'/'.$nombre)){
                echo "archivo guardado";
            }else{
                echo "no se pudo guardar";
            }
        }
    }else{
        if(move_uploaded_file($guardado, 'root/'.$carpeta.'/'.$nombre)){
            echo "archivo guardado";
        }else{
            echo "no se pudo guardar";
        }
    }

}

if(isset($_POST['edit_file']))
{
    $old_name=$_POST['old_name'];
    $new_name=$_POST['new_name'];
    rename('root/'.$old_name, 'root/'.$new_name);
}

if(isset($_POST['delete_file']))
{
    //rmdir("test2");
    $file_name=$_POST['file_name'];
    unlink("root/".$file_name);
}

if(isset($_POST['create_dir']))
{
    $dirName= $_POST['dir_name'];
    $dir= mkdir("root/".$dirName) or die("Unable to open file!");
}
?>