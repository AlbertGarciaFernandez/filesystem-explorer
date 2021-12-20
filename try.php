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





