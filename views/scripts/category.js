var table;

function init(){

}
function clean(){
    $(#name).val("");
}
function showform(flag){
    clean();
    if (flag){
        $("#listrecords").hide();
        $("#formrecords").show();
        $("#btsave")prop("disabled",false);
    }
    else{
        $("#listrecords").show();
        $("#formrecords").hide();    
    }
}
function cancelform(){
  clean();
  showform(false);
  
}
function list(){
    table=$("tblist").dataTable(
        "aProcesing": true,
        "aServerSide" :true,
        dom 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdf',

        ],
        "ajax":
                {
                   url: '../ajax/category.php?op=list',
                   type: "get",
                   dataType: "json",
                   error: function(e){
                       console.log(e.responseText);
                   } 
                }
    ).DataTable();
}



init();