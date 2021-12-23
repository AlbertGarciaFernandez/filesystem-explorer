<?php
if(isset($_POST["fname"]))
{
    echo playDocument();
}
function callFolders()
{
    $path = "root/";
    if (is_dir($path) && $dh = opendir($path)) {
        while (($file = readdir($dh)) !== false) {
            if ($file !== "." && $file !== ".." &&  !pathinfo($file, PATHINFO_EXTENSION)) {
                $path2 = "root/$file";
                echo "<div><a class='list-group-item py-1' href='index.php?path=$path2'><i class='bx bx-folder me-2'></i>" . $file . "</a></div>";
                if (is_dir($path2) && $dh2 = opendir($path2)) {
                    while (($file2 = readdir($dh2)) !== false) {
                        if ($file2 !== "." && $file2 !== ".." &&  !pathinfo($file2, PATHINFO_EXTENSION)) {
                            $path3 = "root/$file/$file2";
                            echo "<div  class='subdirectories'><a href='index.php?path=$path3' class='anchor'><i class='bi bi-folder-fill'></i>" . $file2 . "</a></div>";
                        }
                    }
                }
            }
        }
        closedir($dh);
    }
};
function readDirect()
{
    if (isset($_GET["path"])) {
        $path =  $_GET["path"];
        if (is_dir($path) && $dh = opendir($path)) {
            while (($file = readdir($dh)) !== false) {
                if ($file !== "." && $file !== ".." &&  pathinfo($file, PATHINFO_EXTENSION)) {
                    echo "<div class='col-lg-6 col-xl-4'>";
                    echo "<form class='formFile' action='index.php?path=$path' method='post' class=''>";
                    echo "<div class='file-man-box'>" . "<a href='delete.php' class='file-close'>" . "<i class='fa fa-times-circle'>" . "</i>" . "</a>";
                    echo "<div class='file-img-box'>" . Icons($file) . "</div>" . "<a href='#' class='file-download'>" . "<i class='fa fa-download'>" . "</i>" . "</a>" ;
                    echo "<input type='hidden' id='fname' name='fname' value='$path/$file'></input>";
                    echo "<button type='submit' class='btnTitle ' data-bs-toggle='modal' data-bs-target='#crudModal' value='openFile'>" . $file . "</button>";
                    echo "</div>" . "</form>" . "</div>";
                } else if ($file !== "." && $file !== ".." &&  !pathinfo($file, PATHINFO_EXTENSION)) {
                    echo "<div class = ''><a href='index.php?path=$path/$file'><i class='bi bi-folder-fill'></i>" . $file . "</a></div>";
                }
            }
        }
    }
    if (!isset($_GET["path"])) {
        echo "Select a folder";
    }
};
function Icons($file)
{
    {
        $vari = pathinfo($file, PATHINFO_EXTENSION);
        switch ($vari) {
            case "pdf":
                echo "<img src='assets/img/pdf.png' style='width: 70px'/>";
                break;
            case "doc":
                echo "<img src='assets/img/doc.png' style='width: 70px'/>";
                break;
            case "csv":
                echo "<img src='assets/img/pdf.png' style='width: 70px'/>";
                break;
            case "jpg":
                echo "<img src='assets/img/jpg.png' style='width: 70px'/>";
                break;
            case "png":
                echo "<img src='assets/img/png.png' style='width: 70px'/>";
                break;
            case "txt":
                echo "<img src='assets/img/txt.png' style='width: 70px'/>";
                break;
            case "ppt":
                echo "<img src='assets/img/ppt.png' style='width: 70px'/>";
                break;
            case "odt":
                echo "<img src='assets/img/pdf.png' style='width: 70px'/>";
                break;
            case "zip":
                echo "<img src='assets/img/zip.png' style='width: 70px'/>";
                break;
            case "rar":
                echo "<img src='assets/img/pdf.png' style='width: 70px'/>";
                break;
            case "exe":
                echo "<img src='assets/img/pdf.png' style='width: 70px'/>";
                break;
            case "svg":
                echo "<img src='assets/img/svg.png' style='width: 70px'/>";
                break;
            case "mp3":
                echo "<img src='assets/img/mp3.png' style='width: 70px'/>";
                break;
            case "mp4":
                echo "<img src='assets/img/pdf.png' style='width: 70px'/>";
                break;
            case "psd":
                echo "<img src='assets/img/psd.png' style='width: 70px'/>";
                break;
        }
    }
}
function informationDisplay(){
    if(isset($_POST["fname"])){
   $path = $_POST["fname"];
   if(is_file($path)){
if (filesize($path) >= 1000000
){
$size = filesize($path)/100000 . "MB";
} else if (filesize($path) < 1000000 && filesize($path) > 0
){
    $size = filesize($path)/1000 . "Kylobytes";
} else {
    $size = "file has no data";
}
$fileDate = date(" d F Y H:i.", filemtime($path));
$creationDate = date(" d F Y H:i.", filectime($path));
    $infoArray = pathinfo($path, PATHINFO_ALL);
    echo "Folder direction: " . $infoArray["dirname"] . "<br>
    Name: " . $infoArray["filename"] . "<br>
    File Type: " . $infoArray["extension"] .
    "<br> File Size: $size" . 
    "<br> Date modified: $fileDate".
    "<br>File created: " . $creationDate;
   }
    } else {
      echo  "Select a file to view information details";
    }
}

function playDocument(){
    if(isset($_POST["fname"])){
    $path = $_POST["fname"];
    if(is_file($path)){
    $infoArray = pathinfo($path, PATHINFO_ALL);
            if ($infoArray["extension"] == "mp3") {
                echo "<div class = 'mediaContainer'><audio src='$path' controls>Your browser doesn´t support the audio</audio></div>";
            } elseif ($infoArray["extension"] == "mp4" || $infoArray["extension"] == "MP4") {
                echo "<div class = 'mediaContainer'><video width= '250px' height = '250px' controls> <source src='$path'> Your browser doesn´t support the video </video></div>";
            } elseif ($infoArray["extension"] == "jpg" || $infoArray["extension"] == "png" || $infoArray["extension"] == "JPG") {
                echo "<div class = 'mediaContainer'><img src='$path' width= '250px' height = '250px'></div>";
            }
            echo "</div>";
        }
    } else {
        echo  "Choose a file to play";
    }
    }

