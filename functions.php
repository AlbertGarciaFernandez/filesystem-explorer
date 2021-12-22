<?php
function callFolders()
{
    $path = "root/";
    if (is_dir($path) && $dh = opendir($path)) {
        while (($file = readdir($dh)) !== false) {
            if ($file !== "." && $file !== ".." &&  !pathinfo($file, PATHINFO_EXTENSION)) {
                $path2 = "root/$file";
                echo "<div><a href='index.php?files=$path2'><i class='bi bi-folder-fill'></i>" . $file . "</a></div>";
                if (is_dir($path2) && $dh2 = opendir($path2)) {
                    while (($file2 = readdir($dh2)) !== false) {
                        if ($file2 !== "." && $file2 !== ".." &&  !pathinfo($file2, PATHINFO_EXTENSION)) {
                            $path3 = "root/$file/$file2";
                            echo "<div  class='subdirectories'><a href='index.php?files=$path3' class='anchor'><i class='bi bi-folder-fill'></i>" . $file2 . "</a></div>";
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
    if (isset($_GET["files"])) {
        $path =  $_GET["files"];
        if (is_dir($path) && $dh = opendir($path)) {
            while (($file = readdir($dh)) !== false) {
                if ($file !== "." && $file !== ".." &&  pathinfo($file, PATHINFO_EXTENSION)) {
                    echo "<div class='col-lg-6 col-xl-4'>";
                    echo "<div class='file-man-box'>" . "<a href='delete.php' class='file-close'>" . "<i class='fa fa-times-circle'>" . "</i>" . "</a>";
                    echo "<div class='file-img-box'>" . Icons($file) . "</div>" . "<a href='#' class='file-download'>" . "<i class='fa fa-download'>" . "</i>" . "</a>" ;
                    echo "<div class='file-man-title'>";
                    echo "<h5 class='mb-0 text-overflow'>" . "<a href='index.php?files=$path'>" . $file . "</a>" . "</h5>";
                    echo "<p>bytes</p>";
                    echo "</div>" . "</div>" . "</div>";
                } else if ($file !== "." && $file !== ".." &&  !pathinfo($file, PATHINFO_EXTENSION)) {
                    echo "<div class = ''><a href='index.php?files=$path/$file'><i class=''></i>" . $file . "</a></div>";
                }
            }
        }
    }
    if (!isset($_GET["files"])) {
        echo "Select a folder";
    }
};



function Icons($file)
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
