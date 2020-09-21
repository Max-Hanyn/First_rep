
$('#profileForm').submit(function (e) {
    e.preventDefault();
    var empty = false;
    var data = [];
    var inputs = $("#profileForm").find('input[type="text"]');
    inputs.each(function () {
        data.push($(this).val());
        if(!$(this).val()){
            $(this).attr('id','error');
            empty = true;
        } else{

            $(this).attr('id','');
        }

        console.log($(this).val());
    })
    if (!empty){
        console.log('1');
        $.ajax({
            url:"",
            type:"GET",
            data:{
                name:data[0],
                level:data[1],
                language:data[2]
            },

            success:function (response) {
                var last = response;
                console.log(last);



                $('#profileTable tbody').append('<tr id="skill' +last+'"><td>'+data[0]+'</td><td>'+data[1]+'</td><td>'+data[2]+'</td>' +
                    '<td><div>' +
                    '<button type="button" class="edit btn btn-info" data-toggle="modal" value="'+last+'" ><i class="material-icons">&#xE254;</i></button>' +
                    '<button type="button" class="delete btn btn-danger" data-toggle="modal" value="'+last+'"  ><i class="material-icons">&#xE872;</i></button>' +
                    '</div></td>' +
                    '</tr>');
                $('#profileModal').modal('toggle');
                $('#profileForm')[0].reset();

            }
        });
    }

})

$(document).on("click", ".edit", function(){
    var data = [];
    var id = $(this).val();

    $(this).parents("tr").find("td:not(:last-child)").each(function(){

        data.push($(this).text());
    });


    $(".name1").attr('value',data[0]);
    $(".name1").attr('id','');
    $(".level1").val(data[1]);
    $(".level1").attr('id','');
    $(".language1").val(data[2]);
    $(".language1").attr('id','');
    $("#hiddenId").val(id);
    $("#profileEditModal").modal("toggle");




});

$(document).on("click", ".delete", function() {

    var id = $(this).val();
    $.ajax({
        url: "",
        type: "POST",
        data: {
            idToDelete:id
        },

        success: function () {
            $('#skill' + id).remove();
        }
    });

});


$(document).on("click", ".close", function(){
    console.log("close");


});

$('#profileEditForm').submit(function (e) {
    e.preventDefault();


    var empty = false;
    var id = $("#hiddenId").val();
    var inputs = $("#profileEditForm").find('input[type="text"]');
    var data =[];

    inputs.each(function () {
        console.log($(this).val());
        data.push($(this).val());
        if (!$(this).val()) {
            $(this).attr('id', 'error');
            empty = true;
        } else {

            $(this).attr('id', '');
        }
    });

        if (!empty) {

            $.ajax({
                url: "",
                type: "GET",
                data: {
                    id1: id,
                    name1: data[0],
                    level1: data[1],
                    language1: data[2]
                },

                success: function () {


                    $('#skill' + id + ' td:nth-child(1)').text(data[0]);
                    $('#skill' + id + ' td:nth-child(2)').text(data[1]);
                    $('#skill' + id + ' td:nth-child(3)').text(data[2]);
                    $('#profileEditModal').modal('toggle');
                    $('#profileEditForm')[0].reset();

                }
            });
        }

})