
var idBtn= $('button') ;
$(idBtn).on('click', printModal);

function printModal(){
    emptyModal();
    switch (this.value) {
        case 'addFile':
            $('#exampleModalLabel').append(this.value);
            $(".modal-body").append('<form method="post" action="file_operation.php" enctype= "multipart/form-data">'+
            '<label>Nombre de la carpeta</label>'+
            '<input type="text" name="carpeta">'+
            '<input type="file" name="archivo">'+
            '<input type="submit" value="Create File" name="create_file">'+
            '</form>');
        break;
        case 'deleteFile':
            $('#exampleModalLabel').append(this.value);
            $(".modal-body").append('<form method="post" action="file_operation.php" id="delete_form">'+
            '<input type="text" name="file_name">'+
            '<input type="submit" value="Delete File" name="delete_file">'+
            '</form>');
        break;
        case 'editFile':
            $('#exampleModalLabel').append(this.value);
            $('.modal-body').append('<form method="post" action="file_operation.php" id="edit_form">'+
            '<input type="text" name="file_name">'+
            '<textarea name="edit_text"></textarea>'+
            '<input type="submit" value="Edit File" name="edit_file">'+
            '</form>')
        break;
        case 'addDir':
            $('#exampleModalLabel').append(this.value);
            $(".modal-body").append('<form method="post" action="file_operation.php" id="dir_form">'+
            '<input type="text" name="dir_name">'+
            '<input type="submit" value="Create Dir" name="create_dir">'+
            '</form>');
            break;
                default:
            break;
    }
}


function emptyModal(){
    $('#exampleModalLabel').empty();
    $('.modal-body').empty();
}