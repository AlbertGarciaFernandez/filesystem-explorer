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
    header('Location: index.php');

}

if(isset($_POST['edit_file']))
{
    $old_name=$_POST['old_name'];
    $new_name=$_POST['new_name'];
    rename('root/'.$old_name, 'root/'.$new_name);
    header('Location: index.php');
}

if(isset($_POST['delete_file']))
{
    //rmdir("test2");
    $file_name=$_POST['file_name'];
    unlink($file_name);
    header('Location: index.php');
}

if(isset($_POST['create_dir']))
{
    $dirName= $_POST['dir_name'];
    $dir= mkdir("root/".$dirName) or die("Unable to open file!");
}

if(isset($_POST['search_file']))
{
    $wordToSearch =$_POST['search_file'];
    $result = getDirContents($wordToSearch,"root");
    echo json_encode($result);
}

function getDirContents($wordToSearch,$dir, &$results = array()) {
    $files = scandir($dir);
    //print_r($files);
    foreach ($files as $key => $value) {
        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
        if (!is_dir($path)) {
            $names = explode(DIRECTORY_SEPARATOR, $value);
            $size = count($names);
            $realName = $names[$size-1];
            if(str_contains($realName,$wordToSearch)){
                $results[] = $realName;
            }
        } else if ($value != "." && $value != "..") {
            getDirContents($wordToSearch,$path, $results);
            //$results[] = $path;
        }
    }

    return $results;
}

?>