<?php

function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

$local_dir = './root';

$files = scandir($local_dir);

$files = array_diff($files,array('.','..'));


$files = array_values($files);

$files = array();


$files = array_values(array_dif(scandir($local_dir), array('.','..')));



function clean_scandir($dir){
    return array_values(array_diff(scandir($dir), array('.','..')));
}

$files = array();

if ($handle = opendir($local_dir)){
    while (false !== ($file = readdir($handle))){
        if ($file != '.' && $file != '..'){
            $files[] = $file;
        }
    }
    closedir($handle);
}

function clean_readdir($dir){
    $files = array();

    if ($handle = opendir($dir)){
        while (false !== ($file = readdir($handle))){
            if ($file != '.' && $file != '..'){
                $files[] = $file;
    }
}

closedir($handle);

    }
    return $files;
}
pre_r(clean_readdir($local_dir));



var icon = $('#user-id').attr('data-user-id');
function get_icon($type, $name=""){
    if (strpos($type, 'excel') !== false) {
      return "<img src='xls.png' style='width: 20px'/>";
    }else if(strpos($type, 'pdf') !== false){
      return "<img src='pdf.png' style='width: 20px'/>";
      }else if(strpos($name, 'ppt') !== false){
        return "<img src='ppt.png' style='width: 20px'/>";
      }else if(strpos($name, 'xlsx') !== false){
        return "<img src='xls.png' style='width: 20px'/>";
      }else{
        return "<img src='zip.png' style='width: 20px'/>";
    }else if(strpos($type, 'image') !== false){
      return "<img src='png.png' style='width: 20px'/>";
    }else if(strpos($type, 'video') !== false){
      return "<img src='avi.png' style='width: 20px'/>";
    }else{
      return "<img src='doc.png' style='width: 20px'/>";
    }
  }



var functionschangeselect = $('.functions').children("ul").children();
var selectorschangeselect = $('.selectors').children("ul").children();
var eventschangeselect = $('.events').children("ul").children();

//case 0-18
functionschangeselect.each(function(i, element){
    $(element).on("click",function(){
        vanillaJavaScript(i);
        jQueryScript(i);
    });
});