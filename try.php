<?php

$dir = './root';
$files = scandir($dir);




?>

<ul class="list">
</ul>
<script type="text/javascript">
    var array = <?php echo json_encode($files); ?>;
    array.forEach(element => {
        if (element == "." || element == "..") return;
        let listItem = document.createElement("li");
        listItem.textContent = element;
        document.querySelector('ul').appendChild(listItem);
    })
    
    </script>
<div class="row">
    <div id="foldersContainer" class="col-4 primary foldersContainer" >
    <?php
    require_once("./modules/generateFoldersTree.php");
    generateFoldersTreeFun("./root");
    ?>
    </div>
    <div class="col-4 secondary">
    <?php
    require_once("./modules/generateFiles.php");
    
    $newRoot = $_GET["root"];
    generateFilesFun($newRoot);
    ?>
    </div>
    <div class="col-4 primary">Hola</div>
</div>


function getdatas($file)
{
foreach ($file as $fObject):?>
    <tr>
        <td><?php echo get_icon($fObject["file_type"],$fObject["real_name"]);?> &nbsp;
          <a data-id="<?php echo $fObject["id"];?>" data-type="file" data-filename="<?php echo $fObject["real_name"];?>" class="item" target="_blank" href="<?php echo create_file_link($fObject["file_name"]);?>">
            <?php echo $fObject["real_name"];?></a>
        </td>
        <td><?php  echo $fObject["createdOn"];?></td>
        <td><?php  echo $fObject["file_type"];?></td>
        <td><?php  echo $fObject["file_size"];?></td>
    </tr>
<?php endforeach; 
}

