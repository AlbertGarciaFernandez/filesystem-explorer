
var idBtn= $('button') ;
$(idBtn).on('click', printModal);

function printModal(){
    emptyModal();
    switch (this.value) {
        case 'addFile':
            $(".modal-body").append('<form method="post" action="file_operation.php" id="create_form">'+
            '<input type="text" name="file_name">'+
            '<input type="submit" value="Create File" name="create_file">'+
            '</form>');
        break;
        case 'deleteFile':
            $(".modal-body").append('<form method="post" action="file_operation.php" id="delete_form">'+
            '<input type="text" name="file_name">'+
            '<input type="submit" value="Delete File" name="delete_file">'+
            '</form>');
        break;
        case 'editFile':
            $('.modal-body').append('<form method="post" action="file_operation.php" id="edit_form">'+
            '<input type="text" name="file_name">'+
            '<textarea name="edit_text"></textarea>'+
            '<input type="submit" value="Edit File" name="edit_file">'+
           '</form>')
        break;
                default:
            break;
    }
}


function emptyModal(){
    $('.modal-body').empty();
}