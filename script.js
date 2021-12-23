
var idBtn= $('button') ;
$(idBtn).on('click', printModal);

async function printModal(){
    emptyModal();
    var nameList ="";
    var response = await callAjax();
    var deserializedJson = JSON.parse(response);
    Object.entries(deserializedJson).forEach(([key, value]) => {
        nameList= nameList + "<option>"+value+"</option>";
    });
    switch (this.value) {
        case 'addFile':
            $('#exampleModalLabel').append(this.value);
            $(".modal-body").append('<form method="post" action="file_operation.php" enctype= "multipart/form-data">'+
            '<label>Nombre de la carpeta</label>'+
            '<input type="text" name="carpeta">'+
            '<input type="file" name="archivo"><hr>'+
            '<input class="btn btn-primary" type="submit" value="Create File" name="create_file">'+
            '</form>');
        break;
        case 'deleteFile':
            $('#exampleModalLabel').append(this.value);
            $(".modal-body").append('<form method="post" action="file_operation.php" id="delete_form">'+
            '<select >'+nameList+'<select><hr>'+
            '<input type="text" name="file_name"> '+
            '<input class="btn btn-primary" type="submit" value="Delete File" name="delete_file">'+
            '</form>');
        break;
        case 'editFile':
            $('#exampleModalLabel').append(this.value);
            $('.modal-body').append('<form method="post" action="file_operation.php" id="edit_form">'+
            '<input type="text" name="old_name">'+
            '<input type="text" name="new_name"><hr>'+
            '<input class="btn btn-primary" type="submit" value="Edit File" name="edit_file">'+
            '</form>')
        break;
        case 'addDir':
            $('#exampleModalLabel').append(this.value);
            $(".modal-body").append('<form method="post" action="file_operation.php" id="dir_form">'+
            '<input type="text" name="dir_name"><hr>'+
            '<input  class="btn btn-primary" type="submit" value="Create Dir" name="create_dir">'+
            '</form>');
            break;
            case 'openFile':
							//	playDocument();
                break;
                default:
            break;
    }
}

async function callAjax(){    
     return $.ajax({
        type: "POST",
        url: 'file_operation.php',
        data: { search_file:""}
   });
}

$('.formFile').submit(function(e) {
    e.preventDefault();
    emptyModal()
    $.ajax({
        type: "POST",
        url: 'functions.php',
        data: $(this).serialize(),
        success: function(response)
        {
            $('#exampleModalLabel').append(response);
       }
   });
 });


function emptyModal(){
    $('#exampleModalLabel').empty();
    $('.modal-body').empty();
}