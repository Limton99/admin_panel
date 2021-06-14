$( "#status" ).change(function() {
    var id =$("#hid").val();
    var status =$("#status").val();
    console.log(status + " " + id);
    $.ajax({
    type: "GET",
    url: "update/"+ id + "/" + status,
    success: function(data){
    console.log(data);
    $("#update").val(data);
},
});
});

tinymce.init({
    selector: '#mytextarea'
});
