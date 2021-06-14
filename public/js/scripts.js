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

$(function() {
    $('#perPage').change(function(e) {
        window.location = "orders?perPage=" + this.value;
    });
})


$(function() {
    $('a.more').click(function(e) {
        e.preventDefault();
        $('#paragraph').append(
            '<div class="form-group"> ' +
            '<label for="issueinput5">Заголовок пункта</label> ' +
            '<input type="text" id="issueinput5" class="form-control" placeholder="Заголовок пункта" name="list_title[]" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="" data-original-title="" title=""> </div> ' +
            '<div class="form-group"> ' +
            '<label for="issueinput6">Текст пункта</label> ' +
            '<textarea name="list_text[]" id="issueinput6" class="form-control"></textarea> </div>');
    });
});

$(document).ready(function(){
    $("a.edit-alias").click(function(){
        $("div.dropdown-alias").toggle();
        $("div.add-alias").toggle();
    });
});
