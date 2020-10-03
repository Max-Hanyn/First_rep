$(document).ready(function(){

    $.ajax({
        url: "/admin/get",
        type: "POST",
        dataType: "json",
        success: function (response) {

            fillTable(response);

        }
    });
$(document).on('keyup','#search', function () {

    var search = $('#search').val();
    $('.column-row').remove();
    $.ajax({
        url: "/admin/search",
        type: "POST",
        dataType: "json",
        data:{search:search},
        success: function (response) {

            fillTable(response);
            console.log(response);

        }
    });

});
function fillTable(data) {
    $(data.users).each(function (row,values) {
        var verefied = '';
        if(values.verified == '1'){
            verefied = 'verefied'
        }else {
            verefied = '<a href="verify/'+ values.token +'"> Verify </a>'
        }
        $("tbody").append('<tr class="column-row">' +
            '<td>' + values.id +'</td>' +
            '<td>'+ values.email +'</td>' +
            '<td>'+ verefied +'</td>' +
            '<td>' + values.name + '<form  action="admin/changerole" method="post">' +
            '<p><select name="role" size="3" class="select-role">' +
            '<option disabled>Roles</option>' +
            ''+
            '</select></p>' +
            '<p><input type="submit" value="Add role"></p>' +
            ' <input type="hidden" name="userId" value="'+ values.id +'">' +
            '</form>' +'</td>' +
            '<td>' + '<a href="admin/edit/'+ values.id +'">Edit</a>' + '</td>' +
            '</tr>')


    })
    $(data.roles).each(function (row,values) {
        $('<option value="'+ values.id +'">'+ values.name +'</option>').appendTo(".select-role");
    })
}
});
