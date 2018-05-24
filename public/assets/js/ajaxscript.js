var url = "http://localhost:8000/rancangan";

//Menampilkan Form  dan Data
$(document).on('click','.open_modal',function(){
    var usul_id = $(this).val();

    $.get(url + '/' + usul_id, function (data) {
        //success data
        console.log(data);
        $('#usul_id').val(data.id);
        $('#nomor').val(data.nomor);
        $('#tanggal').val(data.tanggal);
        $('#btn-save').val("update");
        $('#myModal').modal('show');
    })
});
//Menampilkan Isian Form
$('#btn_add').click(function(){
    $('#btn-save').val("add");
    $('#frmUsul').trigger("reset");
    $('#myModal').modal('show');
});
