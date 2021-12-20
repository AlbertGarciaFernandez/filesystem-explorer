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




